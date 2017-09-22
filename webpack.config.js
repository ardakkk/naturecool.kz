let path = require('path'),
    webpack = require('webpack'),
    HtmlWebpackPlugin = require('html-webpack-plugin'),
    srcRoot = `${__dirname}/src`,
    distRoot = `${__dirname}/dist`,
    PrerenderSpaPlugin = require('prerender-spa-plugin'),
    postcssConfig = require('./postcss.config').plugins,
    BabiliPlugin = require("babili-webpack-plugin"),
    conf = require("./package.json");

const imageOptimizationConfig = {
    bypassOnDebug: true,
    mozjpeg: {
        progressive: true,
        quality: 70
    },
    gifsicle: {
        interlaced: false,
    },
    optipng: {
        optimizationLevel: 7,
    },
    pngquant: {
        quality: '75-90',
        speed: 3,
    }
};

let commonConfig = {
    entry: `${srcRoot}/index.js`,
    output: {
        filename: 'bundle.js',
        path: distRoot,
        publicPath: '/'
    },
    plugins: [new HtmlWebpackPlugin({
        filename: 'index.html',
        template: `${srcRoot}/index.html`
    })],
    module:{
        loaders: [
            {
                test: /\.js$/,
                exclude: /(node_modules)/,
                loader: 'babel-loader?cacheDirectory',
		query: {
                    presets: ['es2015']
                }
            },
            {
                test: /\.vue$/,
                exclude: /(node_modules)/,
                loader: 'vue-loader',
                options: {
                    postcss: postcssConfig,
                    loaders:{
                        //lang scss for syntax highlighting, avoiding scss preprocessing
                        scss: 'vue-style-loader!css-loader!postcss-loader',
			js: 'babel-loader?presets[]=es2015'
                    }
                }
            },
            {
                test: /\.s?css$/,
                use: [{
                    loader: "style-loader",
                    options: {
                        sourceMap: true,
                    },
                }, {
                    loader: "css-loader",
                    options: {
                        sourceMap: true,
                        minimize: true,
                    },
                }, {
                    loader: "postcss-loader",
                    options: {
                        sourceMap: true,
                        plugins: [
                            require("autoprefixer")({ browsers: conf.browserslist }),
                        ],
                    },
                }, {
                    loader: "sass-loader",
                    options: {
                        sourceMap: true,
                    },
                }],
            },
            {
                test: /\.(jpe?g|png|gif|svg)$/i,
                loaders: [
                    'file-loader?hash=sha512&digest=hex&name=assets/images/[name]_[hash].[ext]',
                    `image-webpack-loader?${JSON.stringify(imageOptimizationConfig)}`
                ],
                include: `${srcRoot}/assets`
            },
            {
                test: /\.(otf|eot|svg|ttf|woff|woff2)$/,
                loader: 'file-loader?name=assets/fonts/[name].[ext]',
                include: `${srcRoot}/fonts`
            }
        ]
    },
	resolve: {
        alias: {
            vue: 'vue/dist/vue.js'
        }
    }
};

let devConfig = Object.assign({},commonConfig,{
        devServer: {
            contentBase: distRoot,
            compress: true,
            port: 9001,
            historyApiFallback: true,
            proxy: {
                "/api": {
                    changeOrigin: true,
                    target: "http://naturecool.ru/"
                }
            }
        }
    }),
    prodConfig = Object.assign({},commonConfig,{
        output: {
            filename: 'bundle_[hash].js',
            path: distRoot,
            publicPath: '/'
        },
        plugins:[
            new HtmlWebpackPlugin({
                filename: 'index.html',
                template: `${srcRoot}/index.html`
            }),
            new BabiliPlugin({}),
            new webpack.DefinePlugin({
                'process.env.NODE_ENV': JSON.stringify('production')
            }),
            /*new PrerenderSpaPlugin(
                // Absolute path to compiled SPA
                distRoot,
                // List of routes to prerender
                [ '/', '/technology', '/contest', '/confidentiality', '/rules', '/contacts'],
                {
                    postProcessHtml: function (context) {
                        return context.html.replace(
                            /http:\/\/localhost:([0-9]*)/gi,

                            ''
                        )
                    }
                }
            )*/
        ]
    });

let config = process.env.BUNDLE_MODE === 'development' ?
    devConfig :
    prodConfig;

module.exports = config;
