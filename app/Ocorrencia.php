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

    public function ocorrenciaAluno()
    {
        return $this->hasMany(OcorrenciaAluno::class, 'ocorrencia_id');
    }
    public function tipo()
    {
        return $this->hasOne(OcorrenciaMotivo::class, 'ocorrencia_id','id');
    }
}

class OcorrenciaAluno extends Model{
    protected $table = 'aluno_has_ocorrencia';

    protected $fillable = [
        'id',
        'aluno_id',
        'ocorrencia_id',
    ];

    public function aluno()
    {
        return $this->hasOne(Aluno::class, 'id','aluno_id');
    }
    
    public function ocorrencia()
    {
        return $this->hasOne(Ocorrencia::class, 'id','ocorrencia_id');
    }
}

class OcorrenciaMotivo extends Model{
    protected $table = 'ocorrencia_has_motivo';

    protected $fillable = [
        'id',
        'tipo_ocorrencia_id',
        'ocorrencia_id',
    ];
    
}