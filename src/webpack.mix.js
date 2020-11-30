const mix = require('laravel-mix');

const tailwindcss = require('tailwindcss');


// mix.disableNotifications();

/*
 |--------------------------------------------------------------------------
 | Mix Sass
 |--------------------------------------------------------------------------
 */
mix.sass('resources/sass/app.scss', 'public/css')
    .sass('resources/sass/login.scss', 'public/css')
    .postCss("resources/sass/tailwind.css", "public/css", [
        require("tailwindcss"),
    ])

mix.copy('node_modules/@mdi/font/fonts/materialdesignicons-webfont.ttf', 'public/fonts/')
    .copy('node_modules/@mdi/font/fonts/materialdesignicons-webfont.woff', 'public/fonts/')
    .copy('node_modules/@mdi/font/fonts/materialdesignicons-webfont.woff2', 'public/fonts/')

mix.js('resources/js/app.js', 'public/js/')
    .js('resources/js/login.js', 'public/js/')

// mix.extract([
//     'vue',
//     'axios',
//     'moment-mini',
//     'vue-cookies',
//     'noty',
//     'jquery',
// ], 'public/js/vendor.js')
//     .sourceMaps();

mix.options({
    processCssUrls: false,
    disableNotifications: true,
})

mix.webpackConfig({
    output:{
        chunkFilename:'js/vuejs_code_split/[name].js',
    }
});

/*
 |--------------------------------------------------------------------------
 | Mix Version in Production
 |--------------------------------------------------------------------------
 */
if (mix.inProduction()) {
    mix.version()
        .options({
            // Optimize JS minification process
            terser: {
                cache: true,
                parallel: true,
                sourceMap: true
            }
        });
} else {
    // Uses inline source-maps on development
    mix.webpackConfig({
        devtool: 'inline-source-map'
    });
}

