<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function ver_feed()
    {
        $posts = Post::whereNull('deleted_at')->get();
        return view('pag_principal', compact('posts'));
    }
}
