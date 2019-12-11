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

//UserController
Route::get('/perfil/{username?}', ['as'=>'perfil.username', 'uses'=>'UserController@ver']);
Route::post('/salvar', ['as'=>'user.salvar', 'uses'=>'UserController@salvar']);
Route::get('/login', ['as'=>'site.login', 'uses'=>'UserController@index']);
Route::post('/login/acessar', ['as'=>'site.login.acessar', 'uses'=>'UserController@login']);
Route::get('/logout', ['as'=>'logout', 'uses'=>'UserController@logout']);
Route::get('/cadastrar', ['as'=>'auth.cadastro', 'uses'=>'UserController@cadastrar']);
Route::post('/cadastrar/send', ['as'=>'site.cadastro.send', 'uses'=>'UserController@register']);

Route::get('/redirect', function (Request $request) {
    $request->session()->put('state', $state = Str::random(40));

    $query = http_build_query([
        'client_id' => 'client-id',
        'redirect_uri' => 'http://example.com/callback',
        'response_type' => 'code',
        'scope' => '',
        'state' => $state,
    ]);

    return redirect('http://your-app.com/oauth/authorize?'.$query);
});
Route::get('/callback', function (Request $request) {
    $state = $request->session()->pull('state');

    throw_unless(
        strlen($state) > 0 && $state === $request->state,
        InvalidArgumentException::class
    );

    $http = new GuzzleHttp\Client;

    $response = $http->post('http://your-app.com/oauth/token', [
        'form_params' => [
            'grant_type' => 'authorization_code',
            'client_id' => 'client-id',
            'client_secret' => 'client-secret',
            'redirect_uri' => 'http://example.com/callback',
            'code' => $request->code,
        ],
    ]);

    return json_decode((string) $response->getBody(), true);
});

//PostController
Route::get('/', ['as'=>'postagens', 'uses'=>'PostController@ver_feed']);
Route::post('/publicar', ['as'=> 'newpost', 'uses'=>'PostController@nova_postagem']);

Auth::routes(['verify'=>true]);

Route::post('/enviar_comentario', ['as' => 'posts.comentar', 'uses'=>'ComentarioController@comentar']);

Route::get('/sugestoes', ['as'=>'sugestoes', 'uses'=>"PreferenciasController@find_matching"]);

Route::get('/chat/{id}', ['as'=>'chat', 'uses'=>'MensagemController@index']);

//ROTAS DE ADMS
Route::get('/adm/preferencias', ['as' => 'adm.pref', 'uses' => 'PreferenciasController@index']);
//Route::get('/adm/preferencias/{id}', ['as' => 'adm.pref', 'uses' => 'PreferenciasController@update']);
Route::get('/adm/preferencias/add', ['as' => 'adm.pref.add', 'uses' => 'PreferenciasController@index_add']);
Route::post('/adm/preferencias/add/send', ['as' => 'adm.pref.add.send', 'uses' => 'PreferenciasController@add']);
