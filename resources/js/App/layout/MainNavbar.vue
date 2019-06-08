<template>
    <navbar type="primary">
        <a class="navbar-brand" href="#/">Home</a>
        <template slot="navbar-menu">
            <li class="nav-item">
                <a href="#/articles" class="nav-link">全部文章</a>
            </li>
            <li class="nav-item">
                <a href="#/picture" class="nav-link">图片</a>
            </li>
            <li class="nav-item">
                <a href="#/picture" class="nav-link">说说</a>
            </li>
        </template>
        <form slot="after-menu" class="form-inline ml-auto" data-background-color>
            <form-group-input placeholder="搜索"
                              addon-right-icon="now-ui-icons ui-1_zoom-bold"></form-group-input>
        </form>
    </navbar>
</template>

<script>
    import {DropDown, NavbarToggleButton, Navbar, NavLink, FormGroupInput} from '../components';
    import {Popover} from 'element-ui';

    export default {
        name: 'main-navbar',
        components: {
            DropDown,
            Navbar,
            NavbarToggleButton,
            NavLink,
            FormGroupInput,
            [Popover.name]: Popover
        }
    };
</script>

<style scoped>
</style>
