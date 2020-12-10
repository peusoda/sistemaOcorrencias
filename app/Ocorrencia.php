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
    
    public function turma()
    {
        return $this->belongsTo(Turma::class, 'turma_id');
    }
}

class OcorrenciaAluno extends Model{
    protected $table = 'aluno_has_ocorrencia';

    protected $fillable = [
        'id',
        'aluno_id',
        'ocorrencia_id',
    ];
    
}

class OcorrenciaMotivo extends Model{
    protected $table = 'ocorrencia_has_motivo';

    protected $fillable = [
        'id',
        'tipo_ocorrencia_id',
        'ocorrencia_id',
    ];
    
}