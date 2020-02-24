const mix = require('laravel-mix');

require('laravel-mix-purgecss');

mix
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

// mix.sass('resources/sass/about.scss', 'public/css')
//     .sass('resources/sass/buttons.scss', 'public/css')
//     .sass('resources/sass/login.scss', 'public/css')
//     .sass('resources/sass/pagination.scss', 'public/css')
//     .sass('resources/sass/app.scss', 'public/css')
//     .sass('resources/sass/conversation.scss', 'public/css')
//     .sass('resources/sass/users.scss', 'public/css')
//     .sass('resources/sass/header.scss', 'public/css')
//     .sass('resources/sass/footer.scss', 'public/css')
//     .sass('resources/sass/notification.scss', 'public/css')
//     .sass('resources/sass/saved.scss', 'public/css')
//     .sourceMaps().version();
//
// mix.js('resources/js/app.js', 'public/js/')
//     .js('resources/js/login.js', 'public/js/')
//     .js('resources/js/scripts/particles.min.js', 'public/js/scripts')
//     .js('resources/js/scripts/particles.settings.js', 'public/js/scripts')
//     .sourceMaps().version();

// mix.copy('node_modules/animate.css/animate.min.css', 'public/css/animate.min.css');

if (mix.inProduction()) {
    mix
        .version()
    ;
}
