const { mix } = require('laravel-mix');
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

mix
	.combine([
		'node_modules/sb-admin-2/vendor/bootstrap/css/bootstrap.css',
		'node_modules/sb-admin-2/vendor/metisMenu/metisMenu.css',
		'node_modules/sb-admin-2/dist/css/sb-admin-2.css',
		'node_modules/sb-admin-2/vendor/font-awesome/css/font-awesome.css',
		'resources/assets/css/base.css'
		],'public/css/base.css')
	.combine([
		'node_modules/sb-admin-2/vendor/bootstrap/css/bootstrap.css',
		'node_modules/sb-admin-2/vendor/metisMenu/metisMenu.css',
		'node_modules/sb-admin-2/dist/css/sb-admin-2.css',
		'node_modules/sb-admin-2/vendor/font-awesome/css/font-awesome.css',
		'resources/assets/css/admin.css'
		],'public/css/admin.css')
	.js([
		'node_modules/sb-admin-2/vendor/jquery/jquery.js',
		'node_modules/sb-admin-2/vendor/bootstrap/js/bootstrap.js',
		'node_modules/sb-admin-2/vendor/metisMenu/metisMenu.js',
		'node_modules/sb-admin-2/dist/js/sb-admin-2.js',
		'resources/assets/js/base.js'
		],'public/js/base.js')
	.js([
		'node_modules/angular/angular.js',
		'resources/assets/js/app-angular.js',
		'node_modules/sb-admin-2/vendor/jquery/jquery.js',
		'node_modules/sb-admin-2/vendor/metisMenu/metisMenu.js',
		'node_modules/sb-admin-2/dist/js/sb-admin-2.js',
		'node_modules/sb-admin-2/vendor/bootstrap/js/bootstrap.js',
		'resources/assets/js/admin.js'
		],'public/js/admin.js')
	.version();
