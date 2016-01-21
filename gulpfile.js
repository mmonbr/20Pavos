var elixir = require('laravel-elixir');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for our application, as well as publishing vendor resources.
 |
 */

elixir(function (mix) {

    /*
     * FRONTEND
     */

    //Semantic UI
    mix.copy('semantic/dist/semantic.min.css', 'public/css/lib/semantic.min.css')
        .copy('semantic/dist/semantic.min.js', 'public/js/lib/semantic.min.js')
        .copy('semantic/dist/themes', 'public/css/themes');

    //Styles
    mix.styles([
        'lib/swiper.min.css',
        'lib/nouislider.min.css',
        'lib/semantic.min.css',
        'lib/sweetalert.css',
         'app.css'
    ], './public/css/all.min.css', './public/css');

    //JS
    mix.browserify('app.js');

    //Scripts
    mix.scripts([
        'lib/jquery-2.2.0.min.js',
        'lib/jquery-ias.min.js',
        'lib/swiper.min.js',
        'lib/nouislider.min.js',
        'lib/url.min.js',
        'lib/semantic.min.js',
        'lib/sweetalert.min.js',
        'app.js'
    ], './public/js/app.min.js', './public/js');

    /*
     * ADMIN
     */

    /*mix.less('AdminLTE.less', 'public/css/admin.css');

    mix.styles([
        'lib/bootstrap.min.css',
        'admin.css'
    ], './public/css/admin.min.css', './public/css');

    mix.browserify('admin.js');

    mix.scripts([
        'lib/jquery-2.1.4.min.js',
        'lib/bootstrap.min.js',
        'lib/fastclick.min.js',
        'lib/jquery.slimscroll.min.js',
        'admin.js'
    ], './public/js/admin.min.js', './public/js');*/

});

/*
 * Semantic UI
 */

var
    gulp = require('gulp'),
    watch = require('./semantic/tasks/watch'),
    build = require('./semantic/tasks/build')
    ;

gulp.task('watch-ui', watch);
gulp.task('build-ui', build);