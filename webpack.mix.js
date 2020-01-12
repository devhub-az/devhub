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

mix.sass('resources/sass/about.scss', 'public/css')
    .sass('resources/sass/buttons.scss', 'public/css')
    .sass('resources/sass/login.scss', 'public/css')
    .sass('resources/sass/pagination.scss', 'public/css')
    .sass('resources/sass/app.scss', 'public/css')
    .sass('resources/sass/conversation.scss', 'public/css')
    .sass('resources/sass/users.scss', 'public/css')
    .sass('resources/sass/header.scss', 'public/css')
    .sass('resources/sass/footer.scss', 'public/css')

    .sourceMaps().version();

mix.js('resources/js/app.js', 'public/js/')
    .js('resources/js/login.js', 'public/js/')
    .js('resources/js/scripts/particles.min.js', 'public/js/scripts')
    .js('resources/js/scripts/particles.settings.js', 'public/js/scripts')
    .sourceMaps().version();


mix.disableNotifications();
mix.options({processCssUrls: false});

if (mix.inProduction()) {
    mix.webpackConfig({
        output: {
            chunkFilename: 'js/[name].js',
        }
    });
    mix.version();
}
