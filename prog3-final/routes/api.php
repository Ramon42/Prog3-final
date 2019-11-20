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

Route::get('/home', ['as'=>'postagens', 'uses'=>'PostController@ver_feed']);
//Route::post('/login/acessar', ['as'=>'auth.login.acessar', 'uses'=>'Auth\LoginController@login']);

Route::group([
    'middleware' => 'auth:api'
], function () {
    Route::get('/home', function () {
        return view('welcome');
    });
    Route::get('/perfil/{username?}', ['as'=>'perfil.username', 'uses'=>'UserController@ver']);
    Route::post('/enviar_comentario', ['as' => 'posts.comentar', 'uses'=>'ComentarioController@comentar']);
    //rotas para categorias
    //post insere
    //put altera
    //get le ou recupera
    //delete remove
});
