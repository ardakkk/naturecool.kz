import 'babel-polyfill';
import Vue from 'vue';
import VueRouter from 'vue-router';
import VueScrollTo from 'vue-scrollto';
import Vuelidate from 'vuelidate';

import {routes} from './routes';
import Root from './Root.vue';

Vue.use(Vuelidate);
Vue.use(VueRouter);
Vue.use(VueScrollTo, {
    // container: "#page",
    easing: "ease"
});

const router = new VueRouter({
    mode: 'history',
    routes,
    scrollBehavior (to, from, savedPosition) {
        return { x: 0, y: 0 }
    }
});

Vue.component('root', Root);

let App = new Vue({
    router,
    //store,
});



document.addEventListener('DOMContentLoaded', function () {
    App.$mount('#root');
});
