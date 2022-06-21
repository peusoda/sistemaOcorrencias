<?php

namespace App\Http\Controllers;

use App\User;
use App\Responsavel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Responsavel $responsavel)
    {
        $responsavel = Responsavel::all();
        return view('dashboard/user/create')
            ->with('responsaveis', $responsavel);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, USer $user)
    {
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->responsavel_id = $request->input('responsavel');
        $user->tipo = $request->input('tipo');
        $user->password = Hash::make($request->input('password'));

        if($user->save()) {
            echo "sucess";
        }



    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        $user = User::all();
        
        return view('dashboard/user/show')
            ->with('user', $user);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user, $id)
    {
        $user = User::find($id);
        
        return view('dashboard.user.update')
            ->with('user', $user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user, $id)
    {
        $user = User::find($id);

        try {
            if($user->delete()) {
                flash('Usuário apagado com sucesso!')->success();
                return redirect()->route('users.show');
            }
        } catch(QueryException $ex) {
            flash('Não foi possível apagar o usuário, tente novamente!')->error();
            return redirect()->route('users.show');

        }
    }
}
