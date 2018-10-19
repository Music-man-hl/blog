import MainLayout from '../pages/Layout/MainLayout.vue'

import NotFound from '../pages/404'
import Index from '../pages/Index'
import ArticleIndex from '../pages/Article/Index'
import PictureIndex from '../pages/Picture/Index.vue'

const routes = [
    {
        path: '/',
        component: MainLayout,
        redirect:'index',
        children: [
            {
                path: 'index',
                name: 'Home',
                component: Index
            },
            {
                path: 'article',
                name: '日志管理',
                component: ArticleIndex
            },
            {
                path: 'picture',
                name: '图片',
                component: PictureIndex
            },
            {
                path: '/*',
                name: 'Notifications',
                component: NotFound
            },
            // {
            //     path: 'maps',
            //     name: 'Maps',
            //     meta: {
            //         hideFooter: true
            //     },
            //     component: Maps
            //
            // },
        ]
    }
];

export default routes

// export default {
//     call(hash) {
//         let route = {
//             '/': 'admin/Index',
//             'article': 'admin/article/Index',
//             'article/add': 'admin/article/Add',
//         };
//         return route[hash || '/'];
//     }