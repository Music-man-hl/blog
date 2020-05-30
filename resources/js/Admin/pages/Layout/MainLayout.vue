<template>
    <div>
        <div class="wrapper" :class="{ 'nav-open': $sidebar.showSidebar }">
            <notifications></notifications>

            <side-bar>
                <mobile-menu slot="content"></mobile-menu>
                <sidebar-link v-bind:to="menu.href" v-for="menu in menus" v-bind:key="menu.id">
                    <md-icon>{{ menu.icon }}</md-icon>
                    <p>{{ menu.title }}</p>
                </sidebar-link>
            </side-bar>

            <div class="main-panel">
                <top-navbar></top-navbar>

                <dashboard-content> </dashboard-content>

                <content-footer v-if="!$route.meta.hideFooter"></content-footer>
            </div>
        </div>
    </div>
</template>

<script>
    import TopNavbar from "./TopNavbar.vue";
    import ContentFooter from "./ContentFooter.vue";
    import DashboardContent from "./Content.vue";
    import MobileMenu from "@/pages/Layout/MobileMenu.vue";

    export default {
        components: {
            TopNavbar,
            DashboardContent,
            ContentFooter,
            MobileMenu
        },
        data() {
            return {
                menus: [
                    {
                        'id': 1,
                        'title': '日志',
                        'href': 'article',
                        'icon': 'person'
                    },
                    {
                        'id': 2,
                        'title': '图片',
                        'href': 'picture',
                        'icon': 'content_paste',
                    },
                    {
                        'id': 3,
                        'title': '用户',
                        'href': 'user',
                        'icon': 'library_books'
                    },
                    {
                        'id': 4,
                        'title': '设置',
                        'href': 'setting',
                        'icon': 'unarchive'
                    }
                ]
            }
        }
    };
</script>

<style scoped>

</style>
