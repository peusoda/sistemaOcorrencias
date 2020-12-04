<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Aluno;
use App\Turma;
use App\Responsavel;
class AlunosController extends Controller
{
    protected function show() {
        $alunos = new Aluno();
        $alunos = Aluno::all();

        return view('dashboard.aluno.show')
            ->with('alunos', $alunos);
    }
    protected function create() {
        $turmas = new Turma();
        $responsaveis = new Responsavel();
        $turmas = Turma::all();
        $responsaveis = Responsavel::all();
        
        return view('dashboard.aluno.create')
            ->with('turmas', $turmas)
            ->with('responsaveis', $responsaveis);
    }
}
