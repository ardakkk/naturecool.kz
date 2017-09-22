<script>
    import Logo from '../Logo/Logo.vue'
    import "./header.scss"
    import VueScrollTo from 'vue-scrollto'
    const exclusiveSections = {
        'game': 'main',
        'technology': 'main',
        'map': 'main',
        'model': 'technology',
        'technologyPage': 'technology'
    };
    export default{
        components: {Logo},
        data(){return{
            currentUrl : window.location.href.toString().split(window.location.host)[1],
           isMenuActive: false
        }},
        methods:{
            navTo(destination){

                this.toggleMenu(false);
                const currentUrl = window.location.href.toString().split(window.location.host)[1];
                console.log(destination);
                if ((currentUrl === "/technology") && (destination === 'game')) {
                    this.$router.push('/');
                    setTimeout(_=>this.navTo(destination),100);
                    return false;
                }

                if ((currentUrl === "/technology") && (destination === 'technology')) {
                    this.$router.push('/');
                    setTimeout(_=>this.navTo(destination),100);
                    return false;
                }

                if (document.getElementById(destination)){
                    VueScrollTo.scrollTo(document.getElementById(destination));
                }else{
                    if (exclusiveSections[destination]){
                        this.$router.push({name: exclusiveSections[destination]});
                        if (!~destination.indexOf('Page')) setTimeout(_=>this.navTo(destination),100)
                    }
                }
            },
            toggleMenu(value){
                if (typeof value === 'boolean') this.isMenuActive = value;
                else this.isMenuActive = !this.isMenuActive;
                this.$emit('menuToggle', this.isMenuActive)
            }
        },
        mounted () {

            if (this.currentUrl === "/game") {
                setTimeout(_=>this.navTo("game"),100);
            }
        }
    }
</script>
<template v-if="this.currentUrl.search('/contest') < 0">
    <div class="Header" v-if="this.currentUrl.search('/contest') < 0">
        <a href="/">

            <Logo/>
        </a>
        <div class="menu-placeholder" @click="toggleMenu">
            <div class="menu-toggler" :class="!isMenuActive ? 'icon-hamburger' : 'icon-close'"></div>
        </div>
        <ul class="menu" :class="{'active': isMenuActive}">
            <li @click="navTo('game')" onclick="ga('send', 'event', 'button', 'game');">
                <a title="Игра">
                    Игра
                </a>
            </li>
            <li @click="navTo('technology')" onclick="ga('send', 'event', 'button', 'feature');">
                <a title="Преимущества">
                    Преимущества
                </a>
            </li>
            <li @click="navTo('technologyPage')" onclick="ga('send', 'event', 'button', 'tech');">
                <router-link to="technology">Технологии</router-link>
            </li>
            <li @click="navTo('model')" onclick="ga('send', 'event', 'button', 'models');">
                <a title="Модели">
                    Модели
                </a>
            </li>
            <li class="buy" @click="navTo('map')" onclick="ga('send', 'event', 'button', 'where');">
                Где купить
            </li>
        </ul>
    </div>
</template>
