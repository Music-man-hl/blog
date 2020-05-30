<template>
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div id="editormd">
                        <textarea style="display:none;">### Hello Editor.md !</textarea>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "add",
        components: {},
        data() {
            return {input: '# hello'}
        },
        computed: {},
        methods: {
            update: function () {
                var editor = editormd("editormd", {
                    path : "../lib/" // Autoload modules mode, codemirror, marked... dependents libs path
                });

                /*
                // or
                var editor = editormd({
                    id   : "editormd",
                    path : "../lib/"
                });
                */
            }
        }
    }
</script>

<style scoped>

</style>