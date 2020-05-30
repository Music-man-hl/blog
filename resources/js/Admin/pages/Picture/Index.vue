<template>
    <div class="content">
        <div class="row">
            <div class="col-md-3">
                <div class="form-group">
                    <div class="d-none"><input v-on:change="uploadFile" class="form-control"
                                               type="file" id="file"></div>
                    <button v-on:click="btClick" class="btn btn-info">添加图片</button>
                </div>
                <br> <br>
            </div>
            <div class="col-md-3 col-lg-2">
                <div class="card">
                    <div class="progress" style="display: none;">
                        <div class="progress-bar" role="progressbar" aria-valuenow="0"
                             aria-valuemin="0" id="progressImage"
                             aria-valuemax="100"></div>
                    </div>
                    <div style="display: none; height: 2px;"></div>
                    <img id="previewImage" src="" alt="预览" style="display: none;">
                </div>

            </div>
            <div class="col-md-3">
                <div class="card" style="width: 20rem;">
                    <div class="card-header">
                        <i class="tim-icons icon-tag"></i> 标签
                    </div>
                    <ul class="list-group-flush">
                        <li v-for="tag in tags" class="list-group-item" style="color: black;">
                            <div class="row">
                                <div class="col-md-6"> {{ tag.tag_name }}</div>
                                <div class="col-md-6">{{ tag.tag_confidence }}%</div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row">
            <div v-for="(picture,index) in data.files" v-bind:key="picture.id" class="col-md-6 col-lg-4 col-xl-3">
                <md-card>
                    <md-card-content>
                        <img class="card-img-top" :src="data.prefix + picture.url+'-thumbnail'" alt="Card image cap">

                        <div class="form-group">
                            <input v-on:keyup.enter="rename(picture,$event)" v-bind:value="picture.title"
                                   class="form-control picture-title" type="text" title="">
                        </div>
                        <p class="card-text"></p>
                        <button v-on:click="showPicture(data.prefix + picture.url,picture.title)"
                                class="btn btn-sm btn-info"
                                data-toggle="modal"
                                data-target="#pictureModal">查看
                        </button>
                        <button class="btn btn-sm btn-info" type="button" data-toggle="collapse"
                                v-bind:data-target="'#collapseTag'+picture.id" aria-expanded="false"
                                :aria-controls="'#collapseTag'+picture.id">标签
                        </button>
                        <button v-on:click="del(picture,index)" class="btn btn-sm btn-primary">删除</button>
                        <div class="collapse" v-bind:id="'collapseTag'+picture.id">
                            <div class="list-group">
                                <li v-for="tag in picture.tags" class="list-group-item" style="color: black;">
                                    <div class="row">
                                        <div class="col-md-6"> {{ tag.name }}</div>
                                    </div>
                                </li>
                            </div>
                        </div>
                    </md-card-content>
                </md-card>
            </div>
            <big-view v-bind:picture-src=showPictureSrc v-bind:picture-title="showPictureTitle"></big-view>
        </div>
    </div>
</template>

<script>
    import BigView from "./BigView";
    import StatsCard from "../../components/Cards/StatsCard";

    export default {
        name: "Index",
        components: {StatsCard, BigView},
        data() {
            return {
                data: {},
                file: '',
                tags: [],
                showPictureSrc: '',
                showPictureTitle: ''
            }
        },
        created() {
            let _this = this;
            axios.get('/pictures').then(function (response) {
                _this.data = response.data.data;
            }).catch(function (error) {
                layer.msg('错误');
                console.log(error);
            });
        },
        methods: {
            showPicture(data, title) {
                this.showPictureSrc = data;
                this.showPictureTitle = title;
            },
            uploadFile(event) {
                if (event.target.files.length > 0) {
                    let file = event.target.files[0];
                    let reader = new FileReader();
                    let preview = document.getElementById("previewImage");
                    let _this = this;

                    reader.onloadstart = function () {
                    };
                    reader.onprogress = function (p) {
                        //do something
                    };
                    reader.onload = function () {
                        preview.style.display = 'block';
                        preview.setAttribute('src', reader.result);
                        _this.file = reader.result;
                        _this.add(file.name)
                    };
                    reader.onloadend = function () {
                        if (reader.error) {
                            console.log(reader.error);
                        }
                    };
                    reader.readAsDataURL(file);
                }
            },
            add(name) {
                let _this = this;
                let progress = document.getElementById("progressImage");
                layer.load(2);
                axios.post('/pictures', {file: this.file, name: name}, {
                    onUploadProgress(event) {
                        // progress.parentElement.style.display = 'flex';
                        // progress.style.width = (event.loaded / event.total * 100 | 0) + '%';
                        console.log(event.loaded, event.total)
                    }
                }).then(function (response) {
                    _this.tags = response.data.data.tags;
                    _this.data.files.push(response.data.data.picture);
                    layer.closeAll('loading');
                    layer.msg(response.data.msg);
                })
            },
            rename(data, event) {
                axios.post('/pictures/' + data.id, {
                    _method: 'PUT',
                    title: event.target.value
                }).then(function (response) {
                    data.title = event.target.value;
                    event.target.blur();
                    layer.msg(response.data.msg)
                }).catch(function (error) {
                    layer.msg('错误');
                    console.log(error);
                });
            },
            del(data, index) {
                let _this = this;
                layer.msg('确定删除图片？', {
                    time: 0,
                    btn: ['删除', '不了'],
                    yes: function (ix) {
                        layer.close(ix);
                        axios.post('/pictures/' + data.id, {_method: 'DELETE'}).then(function (response) {
                            layer.msg(response.data.msg);
                            _this.data.files.splice(index, 1)
                        })
                    }
                })
            },
            btClick() {
                document.getElementById('file').click()
            },
        }
    }
</script>

<style>
    .picture-title {
        border-color: #27293d;
    }
</style>
