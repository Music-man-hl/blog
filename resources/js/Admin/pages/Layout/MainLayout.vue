<template>
    <div>
        <div class="wrapper">

            <side-bar v-bind:data="'blue'"></side-bar>

            <div class="main-panel" v-bind:data="'blue'">
                <!-- Navbar -->
                <top-navbar></top-navbar>

                <float-search></float-search>
                <!-- End Navbar -->

                <router-view></router-view>

                <content-footer></content-footer>

            </div>
        </div>
        <side-fixed></side-fixed>
    </div>
</template>

<script>
    import TopNavbar from "./TopNavbar";
    import SideBar from "./SideBar";
    import ContentFooter from "./ContentFooter"
    import FloatSearch from "../../components/FloatSearch";
    import SideFixed from "./SideFixed";

    export default {
        components: {SideFixed, FloatSearch, SideBar, TopNavbar, ContentFooter},
        data() {
            return {}
        },
        mounted() {

        },
    }
</script>

<style scoped>

</style>