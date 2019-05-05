<template>
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div id="editormd">
                        <textarea style="display:none;">123123</textarea>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    // import MainLayout from "../layouts/MainLayout";

    export default {
        name: "add",
        components: {},
        data() {
            return {input: '# hello'}
        },
        computed: {},
        methods: {
            update: function () {
                testEditor = editormd("test-editormd", {
                    width: "90%",
                    height: 640,
                    syncScrolling: "single",
                    path: "../lib/"
                })
            }
        }
    }
</script>

<style scoped>

</style>