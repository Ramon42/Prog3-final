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

Route::get('/', ['as'=>'postagens', 'uses'=>'PostController@ver_feed']);
Route::get('/perfil/{username?}', ['as'=>'perfil.username', 'uses'=>'UserController@ver']);

Route::post('/salvar', ['as'=>'user.salvar', 'uses'=>'UserController@salvar']);

Auth::routes(['verify'=>true]);

Route::post('/login/acessar', ['as'=>'auth.login.acessar', 'uses'=>'Auth\LoginController@login']);

Route::get('/login', ['as'=>'auth.login', 'uses'=>'Auth\LoginController@index']);
Route::get('/cadastrar', ['as'=>'auth.cadastro', 'uses'=>'Auth\RegisterController@index']);
Route::post('/cadastrar/send', ['as'=>'site.cadastro.send', 'uses'=>'UserController@register']);

Route::get('/home', ['as'=>'postagens', 'uses'=>'PostController@ver_feed']);
Route::post('/enviar_comentario', ['as' => 'posts.comentar', 'uses'=>'ComentarioController@comentar']);
Route::get('/perfil/{username?}', ['as'=>'perfil.username', 'uses'=>'UserController@ver'])->middleware('verified');

