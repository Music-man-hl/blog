<template>
    <div class="content">
        <div class="md-layout">
            <div class="md-layout-item md-medium-size-100 md-xsmall-size-100 md-size-100">
                <md-card>
                    <md-card-header data-background-color="green">
                        <h4 class="card-title">文章</h4>
<!--                        <p class="category">Here is a subtitle for this table</p>-->
                    </md-card-header>

                    <md-card-content>
                        <md-table v-model="articles">
                            <md-table-row slot="md-table-row" slot-scope="{ item }">
                                <md-table-cell md-label="ID">{{ item.id }}</md-table-cell>
                                <md-table-cell md-label="封面"><img v-bind:src="global.domain+item.cover" alt="图片">
                                </md-table-cell>
                                <md-table-cell md-label="标题">{{ item.title }}</md-table-cell>
                                <!--                                    <md-table-cell md-label="内容">{{ item.body.slice(0,50) + '……' }}</md-table-cell>-->
                                <!--                                    <md-table-cell md-label="浏览量">{{ item.view }}</md-table-cell>-->
                                <md-table-cell md-label="最后访问">{{ item.updated_at }}</md-table-cell>
                                <md-table-cell md-label="发布时间">{{ item.created_at }}</md-table-cell>
                                <md-table-cell md-label="是否置顶">
                                    <div class="form-check">
                                        <label v-on:click="switchTop(item)" class="form-check-label"
                                               v-bind:for="'is-top'+item.id"><h5>置顶</h5></label>
                                        <input v-bind:id="'is-top'+item.id" class="form-check-input"
                                               type="checkbox" title=""
                                               v-model="item.is_top">
                                        <i class="form-check-sign"></i>
                                    </div>
                                </md-table-cell>
                                <md-table-cell md-label="是否发布">
                                    <div class="form-check">
                                        <label v-on:click="switchHidden(item)" class="form-check-label"
                                               v-bind:for="'is-hidden'+item.id"><h5>发布</h5></label>
                                        <input v-bind:id="'is-hidden'+item.id" class="form-check-input"
                                               type="checkbox"
                                               v-model="!item.is_hidden">
                                        <i class="form-check-sign"></i>
                                    </div>
                                </md-table-cell>
                            </md-table-row>
                        </md-table>
                    </md-card-content>

                    <!--<div class="card-footer">
                        <nav aria-label="Page navigation">
                            <ul class="pagination pagination-lg">
                                <li v-on:click="getPage('previous')" class="page-item">
                                    <a class="page-link" href="#" aria-label="Previous">
                                        <span aria-hidden="true">&laquo;</span>
                                        <span class="sr-only">Previous</span>
                                    </a>
                                </li>
                                <li class="page-item"><a class="page-link" href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li v-on:click="getPage('next')" class="page-item">
                                    <a class="page-link" href="#" aria-label="Next">
                                        <span aria-hidden="true">&raquo;</span>
                                        <span class="sr-only">Next</span>
                                    </a>
                                </li>
                            </ul>
                        </nav>
                    </div>-->
                </md-card>
            </div>
        </div>
    </div>
</template>

<script>

    export default {
        data() {
            return {
                page: 1,
                articles: []
            }
        },
        methods: {
            switchTop(data) {
                axios.get('/admin/articles/switch-top/' + data.id).then(function (response) {
                    layui.layer.msg(response.statusText);
                })
            },
            switchHidden(data) {
                axios.get('/admin/articles/switch-hidden/' + data.id).then(function (response) {
                    layui.layer.msg(response.statusText);
                })
            },
            getPage(action) {
                let _this = this;
                switch (action) {
                    case 'previous':
                        _this.page--;
                        break;
                    case 'next':
                        _this.page++;
                        break;
                    case 'get':
                        _this.page = 1;
                }
                axios.get('/admin/articles?page=' + _this.page).then(function (response) {
                    if (response.data) {
                        _this.articles = response.data.data.list;
                    }
                })
            }
        },
        created() {
            this.getPage('get')
        }
    }
</script>

<style scoped>

</style>
