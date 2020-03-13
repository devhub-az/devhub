const mix = require('laravel-mix');

require('laravel-mix-purgecss');

mix
    .copy('node_modules/@mdi/font/fonts/materialdesignicons-webfont.ttf', 'public/fonts/')
    .copy('node_modules/@mdi/font/fonts/materialdesignicons-webfont.woff', 'public/fonts/')
    .copy('node_modules/@mdi/font/fonts/materialdesignicons-webfont.woff2', 'public/fonts/')
    // JS
    .js('resources/js/app.js', 'public/js/', {
        sourceMap: true,
        // outputStyle: mix.inProduction ? 'compressed' : 'expanded',
    })
    .js('resources/js/login.js', 'public/js/', {
        sourceMap: true,
        // outputStyle: mix.inProduction ? 'compressed' : 'expanded',
    })
    // CSS
    .sass('resources/sass/animate.scss', 'public/css', {
        sourceMap: true,
        // outputStyle: mix.inProduction ? 'compressed' : 'expanded',
    })
    .sass('resources/sass/balloon.scss', 'public/css', {
        sourceMap: true,
        // outputStyle: mix.inProduction ? 'compressed' : 'expanded',
    })
    .sass('resources/sass/app.scss', 'public/css', {
        sourceMap: true,
        // outputStyle: mix.inProduction ? 'compressed' : 'expanded',
    })
    .sass('resources/sass/login.scss', 'public/css', {
        sourceMap: true,
        // outputStyle: mix.inProduction ? 'compressed' : 'expanded',
    })
    .sass('resources/sass/users.scss', 'public/css', {
        sourceMap: true,
        // outputStyle: mix.inProduction ? 'compressed' : 'expanded',
    })
    .sass('resources/sass/about.scss', 'public/css', {
        // outputStyle: mix.inProduction ? 'compressed' : 'expanded',
    })
    .sass('resources/sass/saved.scss', 'public/css', {
        sourceMap: true,
        // outputStyle: mix.inProduction ? 'compressed' : 'expanded',
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
