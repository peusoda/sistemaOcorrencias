<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Aluno;
class AlunosController extends Controller
{
    protected function show() {
        $alunos = new Aluno();
        $alunos = Aluno::all();

        return view('dashboard.aluno.show')
            ->with('alunos', $alunos);
    }
    protected function create() {
        return view('dashboard.aluno.create');
    }
}
