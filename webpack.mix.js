const { mix } = require('laravel-mix');

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

mix.js([        
        'resources/assets/js/app.js',
        'node_modules/cropper/dist/cropper.min.js',
        'node_modules/sweetalert2/dist/sweetalert2.min.js',
        'resources/assets/js/tesseract.js'
    ], 'public/js')

   .styles('resources/assets/css/dropzone.css', 'public/css/dropzone.css')
   .styles('node_modules/sweetalert2/dist/sweetalert2.css', 'public/css/sweetalert2.css')
   .styles('node_modules/cropper/dist/cropper.css', 'public/css/cropper.css')

   .sass( 'resources/assets/sass/app.scss', 'public/css/')
   .sass( 'resources/assets/sass/tesseract.scss', 'public/css/');
