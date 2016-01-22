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
    mix.copy('semantic/dist/semantic.min.css', 'public/css/lib/semantic/semantic.min.css')
        .copy('semantic/dist/semantic.min.js', 'public/js/lib/semantic/semantic.min.js')
        .copy('semantic/dist/themes', 'public/css/themes')
        //Jquery
        .copy('bower_components/jquery/dist/jquery.js', 'public/js/lib/jquery/jquery.min.js')
        //Infinite Ajax Scroll
        .copy('bower_components/jquery-ias/src/jquery-ias.js', 'public/js/lib/ias/jquery-ias.js')
        .copy('bower_components/jquery-ias/src/callbacks.js', 'public/js/lib/ias/callbacks.js')
        .copy('bower_components/jquery-ias/src/extension', 'public/js/lib/ias/extension')
        .scriptsIn('public/js/lib/ias', 'public/js/lib/ias/jquery-ias.min.js')
        //Swiper
        .copy('bower_components/swiper/dist/js/swiper.min.js', 'public/js/lib/swiper/swiper.min.js')
        .copy('bower_components/swiper/dist/css/swiper.min.css', 'public/css/lib/swiper/swiper.min.css')
        //NoUISlider
        .copy('bower_components/nouislider/distribute/nouislider.min.js', 'public/js/lib/nouislider/nouislider.min.js')
        .copy('bower_components/nouislider/distribute/nouislider.min.css', 'public/css/lib/nouislider/nouislider.min.css')
        //SweetAlert
        .copy('bower_components/sweetalert/dist/sweetalert.min.js', 'public/js/lib/sweetalert/sweetalert.min.js')
        .copy('bower_components/sweetalert/dist/sweetalert.css', 'public/css/lib/sweetalert/sweetalert.css')
        //Font Awesome
        .copy('bower_components/font-awesome/css/font-awesome.min.css', 'public/css/lib/font-awesome/font-awesome.min.css')
        .copy('bower_components/font-awesome/fonts/', 'public/fonts');

    //Styles
    elixir(function (mix) {
        mix.stylesIn('public/css/lib', 'public/css/lib/all.css');
    });

    mix.styles([
        'lib/all.css',
        'app.css'
    ], './public/css/all.min.css', './public/css');

    //Scripts
    mix.browserify('app.js');

    mix.scripts([
        'lib/jquery/jquery.min.js',
        'lib/ias/jquery-ias.min.js',
        'lib/swiper/swiper.min.js',
        'lib/nouislider/nouislider.min.js',
        'lib/sweetalert/sweetalert.min.js',
        'lib/semantic/semantic.min.js',
        'app.js'
    ], './public/js/app.min.js', './public/js');
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