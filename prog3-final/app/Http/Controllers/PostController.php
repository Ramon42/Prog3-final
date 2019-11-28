<?php

namespace App\Http\Controllers;

use App\Comentario;
use App\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function ver_feed()
    {
        $posts = Post::get();
        $data = [];
        foreach ($posts as $post)
        {
            $comentarios = array("id_post"=> $post->id, "comentarios"=>Comentario::where('id_post', $post->id));
            array_push($data, $comentarios);
        }
        return view('pag_principal', compact('posts'), compact('comentarios'));
    }
}
