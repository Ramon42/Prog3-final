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
Route::post('/enviar_comentario', ['as' => 'posts.comentar', 'uses'=>'ComentarioController@comentar']);

Auth::routes();

Route::get('/home', ['as'=>'postagens', 'uses'=>'PostController@ver_feed']);

Route::get('/login', ['as'=>'site.login', 'uses'=>'Site\LoginController@index']);
Route::post('/login/acessar', ['as'=>'site.login.acessar', 'uses'=>'Site\LoginController@login']);

Route::get('/cadastrar', ['as'=>'site.cadastro', 'uses'=>'Site\RegisterController@index']);
Route::post('/cadastrar/send', ['as'=>'site.cadastro.send', 'uses'=>'Site\RegisterController@cadastrar']);

