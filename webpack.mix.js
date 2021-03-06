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

mix.setPublicPath(path.resolve('./'))
.sass('assets/src/sass/vendor.scss', 'assets/dist/vendor.css')
.sass('assets/src/sass/print.scss', 'assets/dist/print.css')
.sass('assets/src/sass/app.scss', 'assets/dist/app.css')
.js('assets/src/js/app.js', 'assets/dist').extract(['@babel/polyfill', 'axios', 'vue', 'leaflet', 'clipboard', 'moment', 'showdown', 'vue-media-embed', 'vuex'])
.copy('assets/src/img', 'assets/dist/img').options({
  fileLoaderDirs: {
      images: 'assets/dist/img'
  }
})
.copy('assets/src/fonts/', 'assets/dist/fonts').options({
  fileLoaderDirs: {
      fonts: 'assets/dist/fonts'
  }
})
.version()
.browserSync({
  proxy: 'http://ck-frontend.test',
  https: true,
  files: [
    'assets/dist/app.css',  // Generated .css file
    'assets/dist/app.js',    // Generated .js file
    'templates/**/*.+(html|twig|php)',
    'index.php'
  ]
});
