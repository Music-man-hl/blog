import Vue from 'vue';
import Router from 'vue-router';
import Index from './pages/Index.vue';
import Article from './pages/Article.vue';
import MainNavbar from './layout/MainNavbar.vue';
import MainFooter from './layout/MainFooter.vue';

Vue.use(Router);

export default new Router({
    routes: [
        {
            path: '/',
            name: 'index',
            components: {default: Index, header: MainNavbar, footer: MainFooter},
            props: {
                header: {colorOnScroll: 400},
                footer: {backgroundColor: 'black'}
            }
        },
        {
            path: '/article/:id',
            name: 'article/show',
            components: {default: Article, header: MainNavbar, footer: MainFooter},
            props: {
                header: {colorOnScroll: 400},
                footer: {backgroundColor: 'black'}
            }
        },
    ],
    scrollBehavior: to => {
        if (to.hash) {
            return {selector: to.hash};
        } else {
            return {x: 0, y: 0};
        }
    }
});
