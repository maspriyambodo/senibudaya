const mix = require('laravel-mix');
const webpack = require('webpack');
/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel applications. By default, we are compiling the CSS
 | file for the application as well as bundling up all the JS files.
 |
 */

//mix.js('resources/js/app.js', 'public/js')
//        .postCss('resources/css/app.css', 'public/css', [
//
//        ]);
mix.webpackConfig({
    stats: {
        children: true,
        warnings: true
    },
    resolve: {
        extensions: ["*",".wasm",".mjs",".js",".jsx",".json"]
    }
});
mix.minify(
        ['public/js/bootstrap.min.js', 'public/js/plugins.js', 'public/js/scripts.js', 'public/js/lazyload.min.js'],
        'public/js/c5904c42df6.js'
        )
        .autoload({
            jquery: ['$', 'window.jQuery']
        });
//mix.css('public/css/plugins.css', 'public/css/app.css');
//mix.css('public/css/style.css', 'public/css/app.css');
//mix.css('public/css/color.css', 'public/css/app.css');
mix.styles([
    'public/css/plugins.css',
    'public/css/style.css',
    'public/css/color.css'
], 'public/css/app.css');
//mix.css(['public/css/plugins.css','public/css/style.css','public/css/color.css'],'public/css/app.css');