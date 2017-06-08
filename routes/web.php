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

Route::get('/', 'AppController@index');
Route::get('/cadastrar', 'AppController@cadastrar');
Route::get('/editar/{id}', 'AppController@editar');
Route::get('/getAtividadesStatus/{status}', 'AppController@getAtividadesStatus');
Route::get('/getAtividadesSituacao/{situacao}', 'AppController@getAtividadesSituacao');
