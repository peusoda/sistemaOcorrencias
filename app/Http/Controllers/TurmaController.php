<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateTurmaRequest;
use App\Turma;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;

class TurmaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    //Método para direcionar a pagina para a tela de apresentação de turmas.
    public function index()
    {
        $turmas = Turma::all();
        return view('dashboard/turma/show')->with('turmas', $turmas);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    //Método para direcionar a pagina para a tela de criação de turma.
    public function create()
    {
        return view('dashboard/turma/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    //Método para cadastrar uma turma.
    public function store(StoreUpdateTurmaRequest $request)
    {
        $turma = new Turma();

        $turma->codigo = $request->input('codigo');
        $turma->curso = $request->input('curso');
        
        try {
            if($turma->save()) {
                flash('Turma criada com sucesso!')->success();
                return redirect()->route('turmas.index');
            }
        } catch(QueryException $ex) {
            flash('Não foi possível criar a turma, tente novamente!')->error();
            return redirect()->route('turmas.index');

        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    //Método para direcionar a pagina para a tela de atualização de turma.
    public function edit($id)
    {
        $turma = Turma::find($id);
        return view('dashboard/turma/update')->with('turma', $turma);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    //Método para atualizar uma turma.
    public function update(StoreUpdateTurmaRequest $request, $id)
    {
        $turma = new Turma;
        $turma = Turma::find($id);
       
        $turma->codigo = $request->input('codigo');
        $turma->curso = $request->input('curso');
        try {
            if($turma->save()) {
                flash('Turma atualizada com sucesso!')->success();
                return redirect()->route('turmas.index');
            }
        } catch(QueryException $ex) {
            flash('Não foi possível atualizar a turma, tente novamente!')->error();
            return redirect()->route('turmas.index');

        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    //Metodo para apagar uma turma.
    public function destroy($id)
    {
        $turma = Turma::find($id);

        try {
            if($turma->delete()) {
                flash('Turma apagada com sucesso!')->success();
                return redirect()->route('turmas.index');
            }
        } catch(QueryException $ex) {
            flash('Não foi possível apagar a turma, tente novamente!')->error();
            return redirect()->route('turmas.index');

        }
    }
}
