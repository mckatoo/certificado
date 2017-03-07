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
Route::get('/', 				        ['as' => 'index', 'uses' => 'HomeController@index']);

Route::group(['prefix' => 'usuarios','as' => 'usuarios.'], function() {
    Route::post('apagar',               ['as' => 'apagar', 'uses' => 'Auth\RegisterController@apagar']);
    Route::get('update',                ['as' => 'update', 'uses' => 'Auth\RegisterController@update']);
    Route::post('update',               ['as' => 'update', 'uses' => 'Auth\RegisterController@postUpdate']);
});

Route::group(['prefix' => 'certificados','as' => 'certificados.'], function() {
    Route::get('',                      ['as' => 'index', 'uses' => 'CertificadosController@index']);
    Route::post('salvar',               ['as' => 'salvar', 'uses' => 'CertificadosController@salvar']);
    Route::post('apagar',               ['as' => 'apagar', 'uses' => 'CertificadosController@apagar']);
    Route::get('print/{id}',            ['as' => 'print', 'uses' => 'CertificadosController@print']);
});

Route::group(['prefix' => 'lotes','as' => 'lotes.'], function() {
    Route::get('', 				        ['as' => 'index', 'uses' => 'LoteController@index']);
    Route::post('salvarLote',           ['as' => 'salvarLote', 'uses' => 'LoteController@salvarLote']);
    Route::post('salvar',		        ['as' => 'salvar', 'uses' => 'LoteController@salvar']);
    Route::post('apagar',               ['as' => 'apagar', 'uses' => 'LoteController@apagar']);
    Route::get('print/{id}',            ['as' => 'print', 'uses' => 'LoteController@print']);
});

Route::group(['prefix' => 'cadastros','as' => 'cadastros.'], function() {
    Route::get('',                      ['as' => 'index', 'uses' => 'HomeController@cadastros']);
});

Route::group(['prefix' => 'instituto','as' => 'instituto.'], function() {
    Route::get('',                      ['as' => 'index', 'uses' => 'InstitutoController@index']);
    Route::post('salvar',               ['as' => 'salvar', 'uses' => 'InstitutoController@salvar']);
    Route::post('apagar',               ['as' => 'apagar', 'uses' => 'InstitutoController@apagar']);
    Route::get('showLogo/{institutoId}',['as' => 'showLogo', 'uses' => 'InstitutoController@showLogo']);
});

Route::group(['prefix' => 'professor','as' => 'professor.'], function() {
    Route::get('', 				        ['as' => 'index', 'uses' => 'ProfessorController@index']);
    Route::post('salvar',		        ['as' => 'salvar', 'uses' => 'ProfessorController@salvar']);
    Route::post('apagar',		        ['as' => 'apagar', 'uses' => 'ProfessorController@apagar']);
    Route::get('procurar',		        ['as' => 'procurar', 'uses' => 'ProfessorController@procurar']);
});

Route::group(['prefix' => 'curso','as' => 'curso.'], function() {
    Route::get('', 				        ['as' => 'index', 'uses' => 'CursoController@index']);
    Route::post('salvar',		        ['as' => 'salvar', 'uses' => 'CursoController@salvar']);
    Route::post('apagar',               ['as' => 'apagar', 'uses' => 'CursoController@apagar']);
    Route::get('procurar/{palavra}',	['as' => 'procurar', 'uses' => 'CursoController@procurar']);
});