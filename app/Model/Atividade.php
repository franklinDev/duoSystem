<?php

namespace DuoSytem\Model;

use Illuminate\Database\Eloquent\Model;
use DuoSytem\Model\DB;

class Atividade extends Model
{
    protected $fillable = [
        'nome',
        'descricao',
        'dt_inicio',
        'status_id',
        'situacao'
    ];

    public function status ()
    {
        return $this->belongsTo('DuoSytem\Model\StatusAtividade');
    }

    /*
    * Exemplo chamada de procedure
    */
    public function getProcedurePendencias ()
    { 
        \DB::select('CALL Verificar_quantidade_atividades_pendentes(@total);');
        $pendente = \DB::select('SELECT @total;');
        $pendente = (array) $pendente[0];
        return $pendente['@total'];
    }

    public function saveAtividade ($request)
    {
        
        $atividade                  = new Atividade;
        $atividade->nome            = $request->input('nome');
        $atividade->descricao       = $request->input('descricao');
        $atividade->dt_inicio       = date('Y-m-d H:i:s', strtotime($request->input('dt_inicio')));
        $atividade->dt_fim          = $request->input('dt_fim') ? date('Y-m-d H:i:s', strtotime($request->input('dt_fim'))) : null;
        $atividade->status_id       = $request->input('status');
        $atividade->situacao        = $request->input('situacao');
        
        if ($atividade->save()) {
            return 'Atividade salva';
        } else {
            return false;
        }
    }


    public function editAtividade ($request, $id)
    {
        $atividade                  = Atividade::find($id);
        $atividade->nome            = $request->input('nome');
        $atividade->descricao       = $request->input('descricao');
        $atividade->dt_inicio       = date('Y-m-d H:i:s', strtotime($request->input('dt_inicio')));
        $atividade->dt_fim          = $request->input('dt_fim') ? date('Y-m-d H:i:s', strtotime($request->input('dt_fim'))) : null;
        $atividade->status_id       = $request->input('status');
        $atividade->situacao        = $request->input('situacao');

        if ($atividade->save()) {
            return 'Atividade salva';
        } else {
            return false;
        }
    }
}
