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

// Plugins
import GlobalComponents from "./globalComponents";
import GlobalDirectives from "./globalDirectives";
import Notifications from "./components/NotificationPlugin";

// MaterialDashboard plugin
import MaterialDashboard from "./material-dashboard";

import Chartist from "chartist";

const global = {domain: '//pp6ykyogj.bkt.clouddn.com'};

// configure router
const router = new VueRouter({
    routes, // short for routes: routes
    linkExactActiveClass: 'nav-item active',
    base: __dirname
});
Vue.prototype.global = global;
Vue.prototype.$Chartist = Chartist;

Vue.use(VueRouter);
Vue.use(MaterialDashboard);
Vue.use(GlobalComponents);
Vue.use(GlobalDirectives);
Vue.use(Notifications);


new Vue({
    router,
    el: '#app',
    render(h) {
        return h(App)
    },
    data: {
        Chartist: Chartist
    }
});
