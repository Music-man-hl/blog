<template>
    <div id="app">
        <h1>My Todo App!</h1>
        <div class="z-article-vertical" v-for="article in articles" v-bind:key="article.id">
            <img :src=article.cover class="img-responsive z-cover" alt="max">
            <div class="z-content">
                <span class="label label-info" v-for="tag in article.tags" style="font-size:11px;padding:1px 5px">{{ tag.name }}</span>
                <p class="z-title">{{ article.title }}</p>
                <p class="z-info">- 发表于 {{ article.created_at }} · 最后访问 {{ article.updated_at }} -</p>
                <p class="z-intro"></p>
                <div class="z-center-horizontal">
                    <a v-bind:href="'/articles/'+article.id" class="z-button">read more..</a>
                </div>
            </div>
        </div>
    </div>
</template>

<script>

    export default {
        name: "ArticleList",
        data () {
            return {
                articles : [
                    {id:"1",title:"标题",cover:"",tags:[{name:"标签1"},{name:"标签2"}],created_at:'今天',updated_at:"现在"},
                    {id:"2",title:"标题1",cover:"",tags:[{name:"标签1"},{name:"标签2"}],created_at:"明天",updated_at:"后天"},
                ]
            }
        }
    }
</script>

<style scoped>

</style>