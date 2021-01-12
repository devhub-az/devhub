const mix = require('laravel-mix');

mix.disableNotifications();

mix.copy('node_modules/animate.css/animate.min.css', 'public/css')
    .vue()
    //Pages
    .js('resources/js/pages/home.js', 'public/js')
    .js('resources/js/pages/hubs.js', 'public/js')
    .js('resources/js/pages/users.js', 'public/js')
    .js('resources/js/pages/about-us.js', 'public/js')
    .js('resources/js/pages/article-show.js', 'public/js')
    .js('resources/js/pages/article-create.js', 'public/js')
    .copy('resources/js/vendor/particles.json', 'public/assets')

    .js('resources/js/includes/header.js', 'public/js')
    .js('resources/js/login.js', 'public/js')
    .sass('resources/sass/login.scss', 'public/css')
    .postCss("resources/sass/tailwind.css", "public/css", [
        require("tailwindcss"),
    ])
    .postCss("resources/sass/vendor/balloon.css", "public/css")

if (mix.inProduction()) {
    mix.version()
}
