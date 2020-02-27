const mix = require('laravel-mix');

require('laravel-mix-purgecss');

mix
    .copy('node_modules/@mdi/font/fonts/materialdesignicons-webfont.ttf', 'public/fonts/')
    .copy('node_modules/@mdi/font/fonts/materialdesignicons-webfont.woff', 'public/fonts/')
    .copy('node_modules/@mdi/font/fonts/materialdesignicons-webfont.woff2', 'public/fonts/')
    // JS
    .js('resources/js/app.js', 'public/js/', {
        sourceMap: true,
        outputStyle: 'compressed',
    })
    .js('resources/js/login.js', 'public/js/', {
        sourceMap: true,
        outputStyle: 'compressed',
    })
    // CSS
    .sass('resources/sass/app.scss', 'public/css', {
        sourceMap: true,
        outputStyle: 'compressed',
    })
    .sass('resources/sass/login.scss', 'public/css', {
        sourceMap: true,
        outputStyle: 'compressed',
    })
    .sass('resources/sass/users.scss', 'public/css', {
        sourceMap: true,
        outputStyle: 'compressed',
    })
    .sass('resources/sass/about.scss', 'public/css', {
        sourceMap: true,
        outputStyle: 'compressed',
    })
    .sass('resources/sass/saved.scss', 'public/css', {
        sourceMap: true,
        outputStyle: 'compressed',
    })
    .options({
        processCssUrls: false,
    })
    .disableNotifications()
    .sourceMaps()
;

if (mix.inProduction()) {
    mix
        .version()
    ;
}
