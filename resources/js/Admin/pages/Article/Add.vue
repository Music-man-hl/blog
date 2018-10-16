<template>
    <main-layout>
        <div id="editor" class="layui-form-item layui-form-text">
            <label class="layui-form-label">写文章</label>
            <div class="layui-input-block">
                <textarea id="article" :value="input" @input="update" placeholder="请输入内容" class="layui-textarea"></textarea>
            </div>
        </div>
        <div v-html="compiledMarkdown"></div>
        <div class="layui-form-item">
            <button class="layui-btn" lay-submit="" lay-filter="demo2">跳转式提交</button>
        </div>
    </main-layout>
</template>

<script>
    import MainLayout from "../layouts/MainLayout";

    export default {
        name: "add",
        components: {MainLayout},
        data() {
            return {input: '# hello'}
        },
        computed: {
            compiledMarkdown: function () {
                return marked(this.input, {sanitize: true})
            }
        },
        methods: {
            update: _.debounce(function (e) {
                this.input = e.target.value
            }, 300)
        }
    }
</script>

<style scoped>

</style>