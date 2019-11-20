<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function ver($username = null)
    {
        if (is_null($username))
        {
            $show_user = User::firstOrFail()->where('username', $username);
            dd($show_user);
            if (isset($show_user))
            {
                return view('perfil.user', compact('show_user'));
            }
            else
            {
                return view('perfil.user', 'Usuário não encontrado');
            }
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
