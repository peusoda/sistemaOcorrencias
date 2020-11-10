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
    public function index()
    {
        $turmas = Turma::all();
        return view('turma/index')->with('turmas', $turmas);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
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
    public function store(StoreUpdateTurmaRequest $request)
    {
        $turma = new Turma();

        $turma->codigo = $request->input('codigo');
        $turma->curso = $request->input('curso');
        
        $turma->save();

        return redirect()->route('turmas.index');
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
    public function edit($id)
    {
        $turma = Turma::find($id);
        return view('dashboard/turma/edit')->with('turma', $turma);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreUpdateTurmaRequest $request, $id)
    {
        $turma = Turma::find($request->input('id'));
        
        $turma->codigo = $request->input('codigo');
        $turma->curso = $request->select('curso');

        try {
            if($turma->save()) {
                return redirect()->route('turmas.index');
            }
        } catch(QueryException $ex) {

            return redirect()->route('turmas.index');

        }

        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $turma = Turma::find($id);

        try {
            if($turma->delete()) {
                return redirect()->route('turmas.index');
            }
        } catch(QueryException $ex) {

            return redirect()->route('turmas.index');

        }
    }
}
