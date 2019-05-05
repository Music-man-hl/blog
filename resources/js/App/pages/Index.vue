<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <article-card v-for="article in articles" :domain="global.domain" :article="article"
                              :key="article.id"></article-card>
            </div>
        </div>
        <n-pagination class="justify-content-center" @input="getData" :page-count="countPagination" v-model="page">
            <span slot="prev">上一页</span>
            <span slot="next">下一页</span>
        </n-pagination>
    </div>
</template>
<script>
    import ArticleCard from "./components/ArticleCard";
    import NPagination from "../components/Pagination";

    export default {
        name: 'index',
        bodyClass: 'index-page',
        data() {
            return {
                articles: {},
                page: 1,
                countPagination: 1,
            }
        },
        methods: {
            getData(page) {
                let _this = this;
                this.page = page;
                axios.get('/articles?page=' + this.page).then(function (response) {
                    _this.articles = response.data.data.list;
                    _this.countPagination = response.data.data.count;
                })
            }
        },
        created() {
            this.getData(1)
        },
        components: {
            NPagination,
            ArticleCard
        }
    };
</script>