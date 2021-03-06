const { mix } = require('laravel-mix').mix;
mix.disableNotifications();

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
 	'node_modules/sb-admin-2/vendor/bootstrap/js/bootstrap.js',
 	'node_modules/sb-admin-2/vendor/metisMenu/metisMenu.js',
 	'node_modules/sb-admin-2/dist/js/sb-admin-2.js',
 	'resources/assets/js/jquery-1.12.4.js',
 	'resources/assets/js/jquery-ui.js',
 	'resources/assets/js/base.js',
 	],'public/js/base.js');

 mix.js([
 	'node_modules/angular/angular.js',
 	'resources/assets/js/app-angular.js',
 	'node_modules/sb-admin-2/vendor/metisMenu/metisMenu.js',
 	'node_modules/sb-admin-2/dist/js/sb-admin-2.js',
 	'node_modules/sb-admin-2/vendor/bootstrap/js/bootstrap.js',
 	'resources/assets/js/jquery-1.12.4.js',
 	'resources/assets/js/jquery-ui.js',
 	'resources/assets/js/admin.js',
 	],'public/js/admin.js');

 mix.combine([
 	'node_modules/sb-admin-2/vendor/bootstrap/css/bootstrap.css',
 	'node_modules/sb-admin-2/vendor/metisMenu/metisMenu.css',
 	'node_modules/sb-admin-2/dist/css/sb-admin-2.css',
 	'node_modules/sb-admin-2/vendor/font-awesome/css/font-awesome.css',
 	'resources/assets/css/jquery-ui.css',
 	'resources/assets/css/base.css',
 	],'public/css/base.css');

 mix.combine([
 	'node_modules/sb-admin-2/vendor/bootstrap/css/bootstrap.css',
 	'node_modules/sb-admin-2/vendor/metisMenu/metisMenu.css',
 	'node_modules/sb-admin-2/dist/css/sb-admin-2.css',
 	'node_modules/sb-admin-2/vendor/font-awesome/css/font-awesome.css',
 	'resources/assets/css/jquery-ui.css',
 	'resources/assets/css/admin.css',
 	],'public/css/admin.css');

 mix.combine([
 	'resources/assets/css/print.css',
 	],'public/css/print.css');

 mix.version();
