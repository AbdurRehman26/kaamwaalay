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

mix.js('resources/js/app.js', 'public/js').vue()
   .sass('resources/sass/app.scss', 'public/css').options({
    processCssUrls: false
});

mix.js('resources/js/front-app.js', 'public/js')
   .sass('resources/sass/front/app.scss', 'public/css/front/').options({
    processCssUrls: false
}); //front sass file

mix.copyDirectory('resources/images', 'public/images');
mix.copyDirectory('resources/fonts', 'public/fonts');
// Front
mix.copyDirectory('resources/images/front', 'public/images/front');
mix.version();
