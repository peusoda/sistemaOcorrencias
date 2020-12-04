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
}
