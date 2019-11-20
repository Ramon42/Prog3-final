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


Route::get('/cadastrar', ['as'=>'user.cadastrar', 'uses'=>'UserController@cadastrar']);
Route::post('/salvar', ['as'=>'user.salvar', 'uses'=>'UserController@salvar']);

Route::group([
    'middleware' => 'auth.api'
    ], function () {
    Route::get('/', function () {
        return view('welcome');
    });
    Route::get('/perfil/{id?}', ['as'=>'perfil.id', 'uses'=>'UserController@ver($id = null)']);
});
