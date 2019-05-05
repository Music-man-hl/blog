<template>
    <card>
        <img slot="image" class="card-img-top" :src="domain+article.cover" alt="Card image cap">
        <div class="card-body">
            <h3 class="card-title"><a :href="'#/article/'+article.id">{{ article.title }}</a></h3>
            <p class="card-text">{{ article.content.slice(0,100)+'……' }}</p>
            <div class="col-md-3 pull-right"><p>{{ article.created_at }}</p></div>
            <a class="btn btn-primary" :href="'#/article/'+article.id">查看</a>
        </div>
    </card>
</template>

<script>
    import NButton from "../../components/Button";
    import Card from "../../components/Cards/Card";

    export default {
        name: "ArticleCard",
        components: {Card, NButton},
        props: {
            article: Object,
            domain: String
        }
    }
</script>

<style scoped>

</style>