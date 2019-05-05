<template>
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">文章</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table tablesorter ">
                                <thead class="text-primary">
                                <tr>
                                    <th width="80">ID</th>
                                    <th width="180">封面</th>
                                    <th>标题</th>
                                    <th width=380>内容</th>
                                    <th width="80">浏览量</th>
                                    <th width="80">最后访问</th>
                                    <th width="80">发布时间</th>
                                    <th width="80">是否置顶</th>
                                    <th width="80">是否发布</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr v-for="article in articles">
                                    <td>{{ article.id }}</td>
                                    <td><img v-bind:src="global.domain+article.cover" alt="图片"></td>
                                    <td>{{ article.title }}</td>
                                    <td>{{ article.content.slice(0,50) + '……' }}</td>
                                    <td>{{ article.view }}</td>
                                    <td>{{ article.updated_at }}</td>
                                    <td>{{ article.created_at }}</td>
                                    <td>
                                        <div class="form-check">
                                            <label v-on:click="switchTop(article)" class="form-check-label"
                                                   v-bind:for="'is-top'+article.id"><h5>置顶</h5></label>
                                            <input v-bind:id="'is-top'+article.id" class="form-check-input"
                                                   type="checkbox" title=""
                                                   v-model="article.is_top">
                                            <i class="form-check-sign"></i>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-check">
                                            <label v-on:click="switchHidden(article)" class="form-check-label"
                                                   v-bind:for="'is-hidden'+article.id"><h5>发布</h5></label>
                                            <input v-bind:id="'is-hidden'+article.id" class="form-check-input"
                                                   type="checkbox"
                                                   v-model="!article.is_hidden">
                                            <i class="form-check-sign"></i>
                                        </div>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="card-footer">
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
                    </div>
                </div>
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
                axios.get('/articles?page=' + _this.page).then(function (response) {
                    _this.articles = response.data.data.list;
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