const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js('resources/js/App/app.js', 'public/js')
    .sass('resources/sass/app.scss', 'public/css');

mix.js(
    [
        'resources/js/Admin/app.js',
        'resources/js/Admin/admin.js'
    ], 'public/js/admin.js')
    .sass('resources/sass/admin.scss', 'public/css')
    .styles([
        'resources/vendor/black-dashboard/css/black-dashboard.css',
        'resources/vendor/black-dashboard/css/nucleo-icons.css'
    ], 'public/css/admin-all.css')
    .scripts([
        'resources/vendor/black-dashboard/js/black-dashboard.js',
        'resources/vendor/black-dashboard/js/chartjs.min.js',
    ], 'public/js/admin-all.js');
