<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/', ['as'=>'postagens', 'uses'=>'PostController@ver_feed']);
Route::get('/login', ['as'=>'site.login', 'uses'=>'Auth\LoginController@index']);
Route::post('/login/acessar', ['as'=>'auth.login.acessar', 'uses'=>'Auth\LoginController@login']);
Route::post('/enviar_comentario', ['as' => 'posts.comentar', 'uses'=>'ComentarioController@comentar']);

Route::get('/cadastrar', ['as'=>'site.cadastro', 'uses'=>'Auth\RegisterController@index']);
Route::post('/cadastrar/send', ['as'=>'site.cadastro.send', 'uses'=>'UserController@register']);
