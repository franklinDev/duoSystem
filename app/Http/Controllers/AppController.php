<?php

namespace DuoSytem\Http\Controllers;

use DuoSytem\Model\StatusAtividade;
use Illuminate\Http\Request;
use DuoSytem\Model\Atividade as Atividade;

class AppController extends Controller
{
    public function index ()
    {
        
        $obj        = new Atividade();
        $atividades = Atividade::paginate(5);
        $status     = StatusAtividade::all();
       
        return view('home', ['status' => $status, 
            'atividades' => $atividades, 
            'pendencias' => $obj->getProcedurePendencias()]
            );
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
       return $this->getDadosAtividades(Atividade::where('status_id', $status)
        ->take(20)
        ->get()
        );
    }

    public function getAtividadesSituacao ($situacao)
    {
        
        return $this->getDadosAtividades(Atividade::where('situacao', $situacao)
                ->take(20)
                ->get()
                );
    }


    private function getDadosAtividades($atividades)
    {
        $dados = [];

        if ($atividades) {
            foreach ($atividades as $key => $atividade) {
            
                //Dados que serao retornados para o grid de atividades via json    
                $dados[$key]['concluido']         = $atividade->status_id == 4 ? true : false;
                $dados[$key]['id']                = $atividade->id;
                $dados[$key]['nome']              = $atividade->nome;
                $dados[$key]['descricao']         = $atividade->descricao;
                $dados[$key]['dt_inicio']         = date('d/m/Y', strtotime($atividade->dt_inicio));
                $dados[$key]['dt_fim']            = date('d/m/Y', strtotime($atividade->dt_fim));
                $dados[$key]['status_descricao']  = $atividade->status->descricao;
                $dados[$key]['situacao']          = $atividade->situacao == 1 ? 'Ativo' : 'Inativo';

            }
        }
        return json_encode($dados); 
    }
}
