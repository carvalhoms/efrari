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



mix
    .sass(
        'resources/sass/admin.scss', 'public/css/admin/main.css')
    .sass(
        'resources/sass/site.scss', 'public/css/site/main.css')
    .sass(
        'resources/sass/catalog.scss', 'public/css/catalog/main.css')

    .scripts([
        'node_modules/jquery/dist/jquery.js',
        'node_modules/bootstrap/dist/js/bootstrap.js',
        'node_modules/owl.carousel/dist/owl.carousel.js',
        'node_modules/wow.js/dist/wow.js',
        'resources/js/site.js'
    ], 'public/js/site/main.js')
    .version()

    .scripts(
        'resources/js/catalog.js', 'public/js/catalog/main.js'
    ).version()
    
    .scripts(
        'resources/js/admin.js', 'public/js/admin/main.js'
    );