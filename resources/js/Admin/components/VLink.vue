<template>

    <li v-bind:class="{'layui-nav-itemed':isActive}" class="layui-nav-item">
        <a class="" href="javascript:">{{ title }}</a>
        <dl class="layui-nav-child">

            <sub-link v-for="submenu in subMenus" v-bind="submenu" :key="submenu.id"></sub-link>

        </dl>
    </li>

</template>

<script>
    import SubLink from "./SubLink";

    export default {
        components: {SubLink},
        data() {
            return {
                isActive: true,
            }
        },
        props: {
            title: {
                type: String,
                required: true
            },
            href: {
                type: String,
                required: true
            },
            subMenus: Array,
        },
        computed: {},
        watch: {
        },
        methods: {
            test(){
                console.log('test')
            }
        }
    }
</script>