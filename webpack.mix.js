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

mix.js('resources/js/app.js', 'public/js')
    .sass('resources/sass/app.scss', 'public/css')
    .styles([
        'public/cowell/client/css/bootstrap.min.css',
        'public/cowell/client/css/font-awesome.min.css',
        'public/cowell/client/css/jquery-ui.min.css',
        'public/cowell/client/css/owl.carousel.min.css',
        'public/cowell/client/css/owl.theme.default.min.css',
        'public/cowell/client/css/aos.css',
        'public/cowell/client/css/style.css'
    ],  'public/cowell/client/css/library.min.css')
    .scripts([
        'public/cowell/client/js/jquery-1.9.1.js',
        'public/cowell/client/js/bootstrap.min.js',
        'public/cowell/client/js/jquery-ui.min.js',
        'public/cowell/client/js/jquery-scrolltofixed-min.js',
        'public/cowell/client/js/aos.js',
        'public/cowell/client/js/clamp.min.js',
        'public/cowell/client/js/owl.carousel.min.js',
        'public/cowell/client/js/sweet.alert.min.js',
        'public/cowell/client/js/custom.js'
    ], 'public/cowell/client/js/library.min.js');