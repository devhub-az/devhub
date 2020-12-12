const mix = require('laravel-mix');
const webpack = require('webpack');

mix.disableNotifications();

let config = {
    resolve: {
        modules: [
            'node_modules',
            path.resolve(__dirname, "resources")
        ]
    },
    plugins: [
        new webpack.IgnorePlugin(/^\.\/locale$/, /moment$/)
    ]
}

if (!process.argv.includes('--hot')) {
    config = Object.assign(config, {
        output: {
            publicPath: "/",
            chunkFilename: 'js/[name].[chunkhash].js'
        }
    })
}

mix.webpackConfig(config)

// let vendor = [
//     'resources/js/vendor/particles.min.js',
//     'resources/js/vendor/particles.settings.js',
//     'resources/js/vendor/quill-custom.js',
//     'resources/js/vendor/scroll.js',
//     'resources/js/vendor/search.js',
// ];
//
// vendor.forEach((item) => {
//     mix.js(item, 'public/js/vendor')
// })

mix.sass('resources/sass/app.scss', 'public/css')

    //Pages
    .js('resources/js/pages/home.js', 'public/js')
    .js('resources/js/pages/hubs.js', 'public/js')
    .js('resources/js/pages/users.js', 'public/js')
    .js('resources/js/pages/article-show.js', 'public/js')
    .js('resources/js/pages/article-create.js', 'public/js')

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


