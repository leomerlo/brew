let mix = require('laravel-mix');

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

mix.js('public/assets/js/improved-links.js', 'public/js');

mix.styles([
    'public/css/all.css',
    'public/css/bootstrap.min.css',
    'node_modules/select2/dist/css/select2.min.css',
    'node_modules/select2-bootstrap-theme/dist/select2-bootstrap.min.css',
], 'public/css/vendors.css');