<?php

namespace DuoSytem\Http\Controllers;

use Illuminate\Http\Request;
use DuoSytem\Model\Atividade as Atividade;

class AppController extends Controller
{
    public function index ()
    {
        $atividades = Atividade::paginate(1);
        return view('home');
    }

    public function cadastrar ()
    {
		return view('cadastro');
    }

    public function editar () 
    {
    	return view('cadastro');					
    }
}
