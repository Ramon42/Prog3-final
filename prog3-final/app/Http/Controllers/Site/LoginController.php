<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\UserLoginRequest;
use App\Http\Requests\UserStoreRequest;
use Illuminate\Support\Facades\Auth;
use App\User;
use Illuminate\Support\Facades\Redirect;

class LoginController extends Controller
{
    public function index()
    {
        return view('inicial.index');
    }

    public function login(Request $request)
    {
        //$data = $request->except(['_token']);
        $data = $request->all();
        if (Auth::attempt(['email'=>$data['email'], 'password'=>$data['password']]))
        {
            dd($data);
            return redirect()->route('postagens');
        }
        return redirect()->route('site.login');
    }
}
