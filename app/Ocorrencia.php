<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ocorrencia extends Model
{
    protected $fillable = [
        'id',
        'categoria',
        'disciplina',
        'relato',
        'data_ocorrencia',
        'turma_id',
        'servidor_id'
    ];
}
