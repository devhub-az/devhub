const mix = require('laravel-mix');

mix.extract(['vue', 'jquery', 'axios', 'popper.js', 'moment', 'lodash']);

mix.disableNotifications();

mix.copy('node_modules/animate.css/animate.min.css', 'public/css')
    //Pages
    .js('resources/js/pages/home.js', 'public/js')
    .js('resources/js/pages/hubs.js', 'public/js')
    .js('resources/js/pages/users.js', 'public/js')
    .js('resources/js/pages/about-us.js', 'public/js')
    .js('resources/js/pages/article-show.js', 'public/js')
    .js('resources/js/pages/article-create.js', 'public/js')
    .js('resources/js/pages/settings.js', 'public/js')
    .js('resources/js/scripts/scroller.js', 'public/js')
    .js('resources/js/pages/admin.js', 'public/js')
    .js('resources/js/pages/author.js', 'public/js')
    .copy('resources/js/vendor/particles.json', 'public/assets')

    .js('resources/js/includes/header.js', 'public/js')
    .js('resources/js/includes/footer.js', 'public/js')
    .js('resources/js/login.js', 'public/js')
    .postCss("resources/sass/tailwind.css", "public/css", [
        require('postcss-import'),
        require("tailwindcss"),
        require('autoprefixer'),
    ])
    .vue()

if (mix.inProduction()) {
    mix.version();
}
