<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();
Route::get('/', ['as' => 'index', 'uses' => 'HomeController@index']);

Route::group(['prefix' => 'certificados','as' => 'certificados.'], function() {
    Route::get('', 				['as' => 'index', 'uses' => 'CertificadosController@index']);
    Route::get('print', 		['as' => 'print', 'uses' => 'CertificadosController@print']);
});