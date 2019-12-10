<?php

namespace App\Http\Controllers;

use App\Preferencia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class PreferenciasController extends Controller
{
    public function index()
    {
        return view('admin.prefs.ver_preferencias');
    }

    public function index_add()
    {
        return view('admin.prefs.add_preferencias');
    }

    public function add(Request $request)
    {
        $data = $request->all();
        Preferencia::create($data);
        return Redirect::to('/adm/preferencias');
    }

    public function update(Request $request, $id)
    {
        $pref = Preferencia::find($id);
        if (!isset($pref)){
            return $this->sendError("Preferência não encontrada",404) ;
        }
        $data = $request->validated();
        $success = $pref->update($data);
        if ($success){
            return $this->sendMessage("Preferência alterada com sucesso");
        } else {
            return $this->sendError("Erro ao alterar a Preferência") ;
        }
    }
}
