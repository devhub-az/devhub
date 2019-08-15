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
   .sass('resources/sass/about.scss', 'public/css')
   .sass('resources/sass/buttons.scss', 'public/css')
   .sass('resources/sass/login.scss', 'public/css')
   .sass('resources/sass/pagination.scss', 'public/css')
   .sass('resources/sass/app.scss', 'public/css');
   mix.copy('resources/assets/images', 'public/images');
mix.disableNotifications();
mix.options({ processCssUrls: false });