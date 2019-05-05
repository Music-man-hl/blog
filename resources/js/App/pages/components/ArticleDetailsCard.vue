<template>
    <card>
        <img slot="image" class="card-img-top" :src="domain+article.cover" alt="Card image cap">
        <div class="card-body">
            <h3 class="card-title">{{ article.title }}</h3>
            <p class="card-text">{{ article.content }}</p>
        </div>
    </card>
</template>

<script>
    import NButton from "../../components/Button";
    import Card from "../../components/Cards/Card";

    export default {
        name: "ArticleDetailCard",
        components: {Card, NButton},
        props: {
            article: Object,
            domain: String
        }
    }
</script>