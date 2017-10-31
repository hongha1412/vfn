let mix = require('laravel-mix');

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

mix.js('resources/assets/js/admin/dboard5.js', 'public/assets/scripts/admin')
.js('resources/assets/js/admin/daypackage.js', 'public/assets/scripts/admin')
.js('resources/assets/js/admin/package.js', 'public/assets/scripts/admin')
.js('resources/assets/js/admin/giftcode.js', 'public/assets/scripts/admin')
.js('resources/assets/js/admin/notice.js', 'public/assets/scripts/admin')
.js('resources/assets/js/admin/price.js', 'public/assets/scripts/admin')
.js('resources/assets/js/admin/speed.js', 'public/assets/scripts/admin')
.js('resources/assets/js/admin/token.js', 'public/assets/scripts/admin')
.js('resources/assets/js/admin/token-check.js', 'public/assets/scripts/admin')
.js('resources/assets/js/admin/token-report.js', 'public/assets/scripts/admin');
