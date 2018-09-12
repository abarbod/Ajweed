const mix = require('laravel-mix');
const exec = require("child_process").exec;

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

// Site javascript.
mix.js('resources/js/app.js', 'public/js');

// Site css.
mix.sass('resources/sass/app.scss', 'public/css')
    .then(() => {
        exec('node_modules/rtlcss/bin/rtlcss.js public/css/app.css public/css/app.css');
    });

// Front page css.
mix.sass('resources/sass/front-page.scss', 'public/css')
    .then(() => {
        exec('node_modules/rtlcss/bin/rtlcss.js public/css/front-page.css public/css/front-page.css');
    });

// Nova rtl css.
mix.then(() => {
    exec('node_modules/rtlcss/bin/rtlcss.js ./public/nova-assets/app.css ./public/nova-assets/app-rtl.css');
});

mix.version();

// Copy files to the public directory.
mix.copyDirectory('resources/images/front-page', 'public/images/front-page')
    .copyDirectory('resources/images/partners', 'public/images/partners');

// Source maps.
if (!mix.inProduction()) {
    mix.webpackConfig({
        devtool: 'source-map'
    })
        .sourceMaps()
}
