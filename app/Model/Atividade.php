<?php

namespace DuoSytem\Model;

use Illuminate\Database\Eloquent\Model;

class Atividade extends Model
{
    protected $fillable = [
        'nome',
        'descricao',
        'dt_inicio',
        'status_id',
        'situacao'
    ];

    public function status()
    {
        return $this->belongsTo('DuoSytem\Model\StatusAtividade');
    }
}
