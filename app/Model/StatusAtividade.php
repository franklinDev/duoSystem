<?php

namespace DuoSytem\Model;

use Illuminate\Database\Eloquent\Model;

class StatusAtividade extends Model
{
    protected $fillable = ['descricao', 'situacao'];

    public function atividade()
    {
        return $this->hasMany('DuoSytem\Model\Atividade');
    }
}
