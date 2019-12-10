<?php

namespace App\Http\Controllers;

use App\Combinacao;
use App\Comentario;
use App\Http\Requests\NewPostRequest;
use App\Mensagem;
use App\Post;
use Illuminate\Http\Request;
<<<<<<< HEAD
<<<<<<< HEAD
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
=======
>>>>>>> parent of 1803a46... novas páginas
=======
>>>>>>> parent of 1803a46... novas páginas

class PostController extends Controller
{
    public function nova_postagem(Request $request)
    {
        $data = $request->all();
        $data['id_user'] = Auth::id();
        Post::create($data);
        return Redirect::to('/sugestoes');
    }

    public function ver_feed()
    {
<<<<<<< HEAD
<<<<<<< HEAD
        /*
        $posts = DB::table('posts')
            ->join('users', 'id_user', '=', 'users.id')
            ->select('posts.id',  'users.username', 'posts.conteudo')
            ->get();
*/
        $id = Auth::id();
        $posts = Post::join('users', 'posts.id_user', 'users.id')
            ->select('posts.id',  'users.username', 'posts.conteudo')
            ->orderBy('posts.updated_at', 'DESC')
            ->get();

        $combinacoes = Combinacao::join('users', 'combinacaos.id_user2', 'users.id')
            ->where('id_user1', '=', $id)
            ->get();

        $comentarios = [];

        foreach ($posts as $row)
        {
            foreach (Comentario::where('id_post', '=', $row['id'])->get() as $coment) {
                $comentario = array(
                    "id_user" => $coment['id_user'],
                    "id_post" => $coment['id_post'],
                    "comentario" => $coment['comentario']);
                array_push($comentarios, $comentario);
            }
        }

/*
=======
        $posts = Post::get();
        $data = [];
>>>>>>> parent of 1803a46... novas páginas
=======
        $posts = Post::get();
        $data = [];
>>>>>>> parent of 1803a46... novas páginas
        foreach ($posts as $post)
        {
            $comentarios = array("id_post"=> $post->id, "comentarios"=>Comentario::where('id_post', $post->id));
            array_push($data, $comentarios);
        }
<<<<<<< HEAD
<<<<<<< HEAD
*/
        return view('pag_principal', compact('posts', 'comentarios', 'combinacoes'));
=======
=======
>>>>>>> parent of 1803a46... novas páginas
        return view('pag_principal', compact('posts'), compact('comentarios'));
>>>>>>> parent of 1803a46... novas páginas
    }
}
