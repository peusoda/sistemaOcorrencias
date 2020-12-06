<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Aluno extends Model
{
    protected $fillable = [
        'id',
        'nome',
        'data_nascimento',
        'sexo',
        'naturalidade',
        'municipio',
        'transporte',
        'cpf',
        'tipo_sanguineo',
        'apelido',
        'obs_napne',
        'obs_medica',
        'obs_pedagogica',
        'turma_id',
        'responsavel_id'
    ];

    public function turma()
    {
        return $this->belongsTo(Turma::class, 'turma_id');
    }
    public function responsavel()
    {
        return $this->belongsTo(Responsavel::class, 'responsavel_id');
    }
}
