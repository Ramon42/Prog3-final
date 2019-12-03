<?php

namespace App\Http\Controllers;

use App\User;
use App\Http\Requests\UserLoginRequest;
use App\Http\Requests\UserStoreRequest;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Http\Request;

class UserController extends Controller
{
    use SendsPasswordResetEmails;

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

    public function register(UserStoreRequest $request)
    {
        $data = $request->validated();
        $data['password'] = bcrypt($data['password']);
        $user = User::create($data);
        if ($user) {
            return redirect('/home');
        }
    }
    public function logout()
    {
        $user = Auth::user();
        $userTokens = $user->tokens;
        foreach($userTokens as $token) {
            $token->revoke();
        }
        return  $this->sendMessage("Logout realizado com sucesso");
    }


    public function salvar()
    {

    }
}
