<?php

namespace DuoSytem\Http\Controllers;

use DuoSytem\Model\StatusAtividade;
use Illuminate\Http\Request;
use DuoSytem\Model\Atividade as Atividade;

class AppController extends Controller
{
    public function index ()
    {
        $atividades = Atividade::paginate(5);
        $status = StatusAtividade::all();
        return view('home', ['status' => $status, 'atividades' => $atividades]);
    }

    public function cadastrar ()
    {
		return view('cadastro');
    }

    public function editar ($id)
    {
        $atividade = Atividade::find($id);
    	return view('cadastro', ['atividade' => $id]);
    }

    public function getAtividadesStatus ($status)
    {
        return json_encode(Atividade::where(['status_id' => $status]));
    }

    public function getAtividadesSituacao ($situacao)
    {
        return Atividade::find(['situacao' => $situacao]);
    }
}
