<?php

namespace App\Http\Controllers;

use App\Comentario;
use http\Header;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class ComentarioController extends Controller
{
    public function comentar(Request $request)
    {
        $data = $request->all();
        $data['id_user'] = Auth::id();
        Comentario::create($data);
        return Redirect::to('/home');
    }
}
