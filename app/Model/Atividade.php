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
}
