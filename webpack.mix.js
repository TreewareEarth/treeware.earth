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

mix.js('resources/js/app.js', 'public/js')
    .sass('resources/sass/app.scss', 'public/css');


/**
 * Browser Syncnpm
 * */
mix.browserSync({
    proxy: 'https://treeware.dev/',
    logPrefix: "BrowserSync",
    online: true,
    https: true,
    logConnections: true,
    reloadOnRestart: true,
    notify: true,
    files: [
        'app/**/*.php',
        'resources/views/**/*.php',
        'public/js/app.js',
        'public/css/app.css'
    ]
});
