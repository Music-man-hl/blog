<template>
    <dd v-bind:class="{'layui-this':active}" v-on:click="go"><a href="javascript:">{{ title }}</a></dd>
</template>

<script>
    import routes from '../routes'

    export default {
        name: "SubLink",
        data() {
            return {
                active:false
            }
        },
        props: {
            href: {
                type: String,
                required: true
            },
            title: {
                type: String,
                required: true
            }
        },
        watch: {},
        methods: {
            go(event) {
                event.preventDefault();
                this.$root.currentRoute = this.href;
                window.history.pushState(
                    null,
                    routes.call(this.href),
                    '#/' + this.href
                );
            },
        },
    }
</script>

<style scoped>

</style>