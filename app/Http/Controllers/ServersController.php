<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;
use App\Server;

class ServersController extends Controller
{
    /*  
        Função que retorna a view de cadastro de servidor.
    */
    protected function create() {
        return view('dashboard.servidor.create');
    }
    /*
        Função que irá retorna os dados dos servidores cadastrados.
    */
    protected function show() {
        $serv = new Server();
        $result = $serv->all();

        return view('dashboard.servidor.show')
            ->with('serv', $result);
    }
    /*
        Função de recebimento dos dados do formulário (Request $request), e persistência desses dados na tabela Servidor.
    */
    protected function store(Request $request, Server $serv) {
        $serv = new Server();
        /*
            Setando váriaveis
        */
        $serv->nome = $request->input('nome');
        $serv->siape = $request->input('siape');
        $serv->funcao = $request->input('funcao');
        $serv->email = $request->input('email');
        $serv->contato = $request->input('contato');
        /*
            Persistência de dados
        */
        if($serv->save()) {
            /**
             * O Método FLASH retorna junto com a rota servidor.show Uma mensagem ao realizar persistência. Na view (dashboard.servidor.show)
             * possuí a inclusão da classe Flase 
             */
            flash('Servidor cadastrado com sucesso!')->success();
            return redirect(route('servidor.show'));
        }            
    }

    protected function update(Request $request, $id) {
        $result = Server::find($id);
        
        return view('dashboard.servidor.update')
            ->with('server', $result);
    }

    protected function updateConf(Request $request, Server $serv) {
        $serv = new Server();
        $id = $request->input('id');
        $serv = Server::find($id);
        $serv->nome = $request->input('nome');
        $serv->siape = $request->input('siape');
        $serv->funcao = $request->input('funcao');
        $serv->email = $request->input('email');
        $serv->contato = $request->input('contato');

        if($serv->save()) {
            flash('Servidor atualizado com sucesso!')->success();
            return redirect(route('servidor.show'));
        }
    }

    protected function delete($id, Server $serv) {
        $serv = new Server();
        $serv = Server::find($id);

        if($serv->delete()) {
            echo "sucess";
        }
    }
}
