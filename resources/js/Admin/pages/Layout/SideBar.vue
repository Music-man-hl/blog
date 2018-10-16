<template>
    <div class="sidebar" data-background="white">
        <!--
            Tip 1: You can change the color of the sidebar using: data-color="blue | green | orange | red"
                    -->
        <div class="sidebar-wrapper">
            <div class="logo">
                <a href="javascript:void(0)" class="simple-text logo-mini">
                    Yo
                </a>
                <router-link tag="a" v-bind:to="'/'" class="simple-text logo-normal">
                    Home
                </router-link>
            </div>
            <ul class="nav">
                <router-link tag="li" v-bind:to="menu.href" v-for="menu in menus" v-bind:key="menu.id">
                    <a class="nav-link" href="#">
                        <i class="tim-icons " v-bind:class="menu.icon"></i>
                        <p>{{ menu.title }}</p>
                    </a>
                </router-link>
                <!-- your sidebar here -->
            </ul>
        </div>
    </div>
</template>

<script>
    export default {
        name: "SideBar",
        data() {
            return {
                menus: [
                    {
                        'id': 1,
                        'title': '日志',
                        'href': 'article',
                        icon: 'icon-notes'
                    },
                    {
                        'id': 2,
                        'title': '图片',
                        'href': 'picture',
                        icon: 'icon-image-02',
                    },
                    {
                        'id': 3,
                        'title': '用户',
                        'href': 'user',
                        icon: 'icon-single-02'
                    },
                    {
                        'id': 4,
                        'title': '设置',
                        'href': 'setting',
                        icon: 'icon-settings-gear-63'
                    }
                ]
            }
        },
    }
</script>

<style scoped>

</style>