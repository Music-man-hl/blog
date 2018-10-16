<template>
    <nav class="navbar navbar-expand-lg navbar-absolute navbar-transparent">
        <div class="container-fluid">
            <div class="navbar-wrapper">
                <div class="navbar-toggle d-inline">
                    <button type="button" class="navbar-toggler">
                        <span class="navbar-toggler-bar bar1"></span>
                        <span class="navbar-toggler-bar bar2"></span>
                        <span class="navbar-toggler-bar bar3"></span>
                    </button>
                </div>
                <a class="navbar-brand" href="javascript:void(0)">Dashboard</a>
            </div>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation"
                    aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-bar navbar-kebab"></span>
                <span class="navbar-toggler-bar navbar-kebab"></span>
                <span class="navbar-toggler-bar navbar-kebab"></span>
            </button>
            <div class="collapse navbar-collapse" id="navigation">
                <ul class="navbar-nav ml-auto">
                    <li class="search-bar input-group">
                        <button class="btn btn-link" id="search-button" data-toggle="modal"
                                data-target="#searchModal"><i class="tim-icons icon-zoom-split"></i>
                            <span class="d-lg-none d-md-block">Search</span>
                        </button>
                    </li>
                    <li class="dropdown nav-item">
                        <a href="javascript:void(0)" class="dropdown-toggle nav-link" data-toggle="dropdown">
                            <div class="notification d-none d-lg-block d-xl-block"></div>
                            <i class="tim-icons icon-sound-wave"></i>
                            <p class="d-lg-none">
                                Notifications
                            </p>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-right dropdown-navbar">
                            <li class="nav-link">
                                <a href="#" class="nav-item dropdown-item">Mike John responded to your email</a>
                            </li>
                        </ul>
                    </li>
                    <li class="dropdown nav-item">
                        <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
                            <div class="photo">
                                <img v-bind:src="user.photo" alt="Profile Photo">
                            </div>
                            <b class="caret d-none d-lg-block d-xl-block"></b>
                            <p class="d-lg-none">
                                Log out
                            </p>
                        </a>
                        <ul class="dropdown-menu dropdown-navbar">
                            <li class="nav-link">
                                <a href="/home" class="nav-item dropdown-item">前台</a>
                            </li>
                            <li class="nav-link">
                                <a href="javascript:void(0)" class="nav-item dropdown-item">Settings</a>
                            </li>
                            <li class="dropdown-divider"></li>
                            <li class="nav-link">
                                <a v-on:click="logOut" href="javascript:void(0)" class="nav-item dropdown-item">Log out</a>
                            </li>
                        </ul>
                    </li>
                    <li class="separator d-lg-none"></li>
                </ul>
            </div>
        </div>
    </nav>
</template>

<script>
    export default {
        name: "TopNavbar",
        data() {
            return {
                user: {
                    id: 1,
                    name: "yo调调",
                    email: "756623526@qq.com",
                    photo: '/g.jpeg',
                    email_verified_at: null,
                    created_at: null
                },
            }
        },
        methods: {
            logOut() {
                axios.post('/logout').then(function (response){
                    layer.msg('已退出登录',function (){
                        window.location.pathname = '/';
                    });
                })
            },
        },
        created() {
            let that = this;
            axios.get('/user').then(function (response) {
                that.user = response.data;
            }).catch(function (error) {
                layer.msg('错误');
                console.log(error);
            });
        },
    }
</script>

<style scoped>

</style>