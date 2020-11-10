const mix = require('laravel-mix');

require('laravel-mix-purgecss');

mix.webpackConfig({
    output: {
        chunkFilename: mix.config.production ? 'js/[name].[chunkhash].js' : 'js/[name].js',
        publicPath: '/'
    },
});

mix.setResourceRoot('./');

mix.copy('node_modules/@mdi/font/fonts/materialdesignicons-webfont.ttf', 'public/fonts/')
    .copy('node_modules/@mdi/font/fonts/materialdesignicons-webfont.woff', 'public/fonts/')
    .copy('node_modules/@mdi/font/fonts/materialdesignicons-webfont.woff2', 'public/fonts/')
    // JS
    .js('resources/js/app.js', 'public/js/', {
        sourceMap: true,
        // outputStyle: mix.inProduction ? 'compressed' : 'expanded',
    }).sourceMaps()
    .js('resources/js/login.js', 'public/js/', {
        sourceMap: true,
        // outputStyle: mix.inProduction ? 'compressed' : 'expanded',
    }).sourceMaps()
    // CSS
    .sass('resources/sass/app.scss', 'public/css', {
        sourceMap: true,
        // outputStyle: mix.inProduction ? 'compressed' : 'expanded',
    }).sourceMaps()
    .sass('resources/sass/login.scss', 'public/css', {
        sourceMap: true,
        // outputStyle: mix.inProduction ? 'compressed' : 'expanded',
    }).sourceMaps()
    .options({
        processCssUrls: false,
    }).sourceMaps()
    .disableNotifications();

// mix.disableNotifications();

if (mix.inProduction()) {
    mix.version();
} else {
    mix.sourceMaps(true, "source-map");
}
