<template>
    <div id="root">
        <c-header :class="{'shown': isUpScroll, 'fixed': isHeaderFixed}" @menuToggle="onMenuToggle" ref="header"/>
        <div id="page" :class="{'page--iframe': this.currentUrl.search('/contest') >= 0} ">
            <router-view/>
        </div>
        <c-footer :class="{'with-span': isBannerActive}"/>
        <Banner @click.native="hideBanner" v-if="isBannerActive" @close="hideBanner(false)"/>
    </div>
</template>
<script>
    import VueScrollTo from 'vue-scrollto'
    import CHeader from './components/Header/Header.vue'
    import CFooter from './components/Footer/Footer.vue'
    import Banner from './components/Banner.vue'
    import "./styles/style.scss"

    let lastScrollTop = 0;
    function scrollHandler(){
        let st = window.pageYOffset || document.documentElement.scrollTop; // Credits: "https://github.com/qeremy/so/blob/master/so.dom.js#L426"
        if (st > 80){
            if (!this.isHeaderFixed) this.isHeaderFixed = true;
            if (st > lastScrollTop && this.isUpScroll){
                this.isUpScroll = false;
            } else if (st <= lastScrollTop && !this.isUpScroll){
                this.isUpScroll = true;
            }
        } else {
            if(st === 0){
                this.isHeaderFixed = false;
                this.isUpScroll = false;
            }
        }
        lastScrollTop = st;
        if (this.$refs.header.isMenuActive) this.$refs.header.toggleMenu(false);
    }

    export default{
        components: {CHeader, CFooter, Banner},
        data(){return{
            isBannerActive: true,
            isUpScroll: false,
            isHeaderFixed: false,
            currentUrl : window.location.href.toString().split(window.location.host)[1]
        }},
        methods: {
            hideBanner(navTo = true){
                if (this.isBannerActive){
                    if (navTo) VueScrollTo.scrollTo(document.getElementById('map'));
                    this.isBannerActive = false;
                }
            },
            onMenuToggle(value){
                if (value) document.body.classList.add('fixed');
                else document.body.classList.remove('fixed');
            }
        },
        mounted(){
            window.addEventListener('scroll', scrollHandler.bind(this), false);
        }
    }
</script>
