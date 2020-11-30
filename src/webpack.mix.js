const mix = require('laravel-mix');

const tailwindcss = require('tailwindcss');

mix.copy('node_modules/@mdi/font/fonts/materialdesignicons-webfont.ttf', 'public/fonts/')
    .copy('node_modules/@mdi/font/fonts/materialdesignicons-webfont.woff', 'public/fonts/')
    .copy('node_modules/@mdi/font/fonts/materialdesignicons-webfont.woff2', 'public/fonts/')
    .js('resources/js/app.js', 'public/js/', {
        sourceMap: true,
        // outputStyle: mix.inProduction ? 'compressed' : 'expanded',
    })
    .js('resources/js/login.js', 'public/js/', {
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
    .postCss("resources/sass/tailwind.css", "public/css", [
        require("tailwindcss"),
    ])
    .options({
        processCssUrls: false,
    })
    .disableNotifications();

// mix.disableNotifications();


