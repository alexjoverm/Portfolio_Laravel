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

elixir(function(mix) {

    mix.sass('app.scss');


    // Vendor
    mix.styles([
        'vendor/bootflat/bootflat/css/bootstrap.min.css',
        'vendor/bootflat/bootflat/bootflat/css/bootflat.css'
    ], 'public/css/vendor.css', './');

    mix.scripts([
        'vendor/bootflat/bootflat/js/jquery-1.10.1.min.js',
        'vendor/bootflat/bootflat/js/bootstrap.min.js',
        'vendor/bootflat/bootflat/bootflat/js/icheck.min.js',
        'vendor/bootflat/bootflat/bootflat/js/jquery.fs.selecter.min.js',
        'vendor/bootflat/bootflat/bootflat/js/jquery.fs.stepper.min.js'

    ], 'public/js/vendor.js', './');
});
