<template>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <article-detail-card :domain="global.domain" :article="article"></article-detail-card>
        </div>
    </div>
</template>

<script>
    import ArticleDetailCard from "./components/ArticleDetailsCard";

    export default {
        name: "Article",
        components: {ArticleDetailCard},
        data() {
            return {
                article: {},
            }
        },
        created() {
            let _this = this;
            axios.get('/articles/' + this.$route.params.id).then(function (response) {
                _this.article = response.data.data;
            })
        }
    }
</script>
