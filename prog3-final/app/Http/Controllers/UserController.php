<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function ver($id = null)
    {
        if (is_null($id))
        {

            return view('perfil.user', compact());
        }
        return (null);
    }

    public function cadastrar()
    {
        return view('usuario.cadastrar');
    }

    public function salvar()
    {

    }
}
