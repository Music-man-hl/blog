/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

import App from './App.vue'
import VueRouter from 'vue-router'
import routes from './routes/routes'

const global = {domain: '//pp6ykyogj.bkt.clouddn.com'};

const router = new VueRouter({
    routes, // short for routes: routes
    linkExactActiveClass: 'nav-item active',
    base: __dirname
});

Vue.use(VueRouter);
Vue.prototype.global = global;

new Vue({
    router,
    el: '#app',
    render(h) {
        return h(App)
    }
});