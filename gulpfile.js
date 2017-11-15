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
    mix.scripts([
    	'angular/angular.min.js',
    	'angular-ui-router/release/angular-ui-router.min.js',
    ],
    'public/vendor/vendor.js', 'resources/assets/bower_components');
});
