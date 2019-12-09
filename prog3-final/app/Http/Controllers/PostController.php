<?php

namespace App\Http\Controllers;

use App\Comentario;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    public function ver_feed()
    {
        /*
        $posts = DB::table('posts')
            ->join('users', 'id_user', '=', 'users.id')
            ->select('posts.id',  'users.username', 'posts.conteudo')
            ->get();
*/
        $posts = Post::join('users', 'posts.id_user', 'users.id')
            ->select('posts.id',  'users.username', 'posts.conteudo')
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
        foreach ($posts as $post)
        {
            foreach ($comentarios as $coment)
            {
                if ($post['id'] == $coment['id_post'])
                {
                    $comentarios = array(
                        "id_user" => $coment['id_user'],
                        "id_post" => $coment['id_post'],
                        "comentario" => $coment['comentario']);
                    array_push($data, $comentarios);
                }
            }

        }
*/
        return view('pag_principal', compact('posts'), compact('comentarios'));
    }
}
