<template>
    <div class="content">
        <div class="row">
            <div class="col-md-2">
                <div class="form-group">
                    <input v-on:change="uploadFile" class="form-control" type="file">
                    <button class="btn btn-info">添加图片</button>
                </div>
                <br> <br>
            </div>
            <div class="col-md-3">
                <div class="card">
                    <img id="previewImage" src="" alt="预览" style="display: none;">
                    <div class="progress" style="display: none;">
                        <div class="progress-bar" role="progressbar" aria-valuenow="0"
                             aria-valuemin="0" id="progressImage"
                             aria-valuemax="100"></div>
                    </div>
                </div>
                <div style="height: 4px"></div>
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
            <div v-for="picture in pictures.files" v-bind:key="picture.id" class="col-md-3">
                <div class="card">
                    <img class="card-img-top" :src="pictures.prefix +'/'+ picture.url+'-thumbnail1'"
                         alt="Card image cap">
                    <div class="card-body">
                        <div class="form-group">
                            <input v-on:keyup.enter="rename(picture,$event)" v-bind:value="picture.title"
                                   class="form-control picture-title" type="text" title="">
                        </div>
                        <p class="card-text"></p>
                        <button v-on:click="del(picture)" class="btn btn-sm btn-primary">删除</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "Index",
        data() {
            return {
                pictures: {},
                file: {},
                tags: []
            }
        },
        created() {
            let _this = this;
            axios.get('/pictures').then(function (response) {
                _this.pictures = response.data.data;
            }).catch(function (error) {
                layer.msg('错误');
                console.log(error);
            });
        },
        methods: {
            test(p) {
                console.log(p)
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
                axios.post('/pictures', {file: this.file, name: name}, {
                    onUploadProgress(event) {
                        progress.parentElement.style.display = 'flex';
                        progress.style.width = (event.loaded / event.total * 100 | 0) + '%'
                    }
                }).then(function (response) {
                    _this.tags = response.data.data.tags;
                    console.log(response.data.data);
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
            del(data) {
                layer.msg('确定删除图片？', {
                    time: 0,
                    btn: ['删除', '不了'],
                    yes: function (index) {
                        layer.close(index);
                        axios.post('/pictures/' + data.id, {_method: 'DELETE'}).then(function (response) {
                            layer.msg(response.data.msg);
                        })
                    }
                })
            }
        }
    }
</script>

<style>
    .picture-title {
        border-color: #27293d;
    }
</style>