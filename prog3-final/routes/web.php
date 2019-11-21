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

Route::get('/perfil/{username?}', ['as'=>'perfil.username', 'uses'=>'UserController@ver']);

Route::post('/salvar', ['as'=>'user.salvar', 'uses'=>'UserController@salvar']);
Route::post('/enviar_comentario', ['as' => 'posts.comentar', 'uses'=>'ComentarioController@comentar']);

Auth::routes();

Route::get('/home', ['as'=>'postagens', 'uses'=>'PostController@ver_feed']);
//Route::get('/home', 'HomeController@index')->name('home');
