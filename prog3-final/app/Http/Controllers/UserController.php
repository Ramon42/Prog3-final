<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function ver($username = null)
    {
        if (is_null($username)) //arrumar para entrar no próprio perfil
        {
            $show_user = User::where('username','=', $username)->firstOrFail();
            if (isset($show_user))
            {
                return view('perfil.user', compact('show_user'));
            }
            else
            {
                return $this->sendError("Usuário não encontrado", 404);
            }
        }
        $show_user = User::where('username','=', $username)->firstOrFail();

        if (isset($show_user))
        {
            return view('perfil.user', compact('show_user'));
        }
        else
        {
            return $this->sendError("Usuário não encontrado", 404);
        }
    }

    public function cadastrar()
    {
        return view('usuario.cadastrar');
    }

    public function salvar()
    {

    }
}
