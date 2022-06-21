<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdateServerRequest;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;
use App\Server;
use PhpParser\Node\Stmt\TryCatch;

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
        $serv->contato = preg_replace('/[^0-9]/', '', $request->input('contato'));
        /*
            Persistência de dados
        */
        Try {
            if($serv->save()) {
                /**
                 * O Método FLASH retorna junto com a rota servidor.show Uma mensagem ao realizar persistência. Na view (dashboard.servidor.show)
                 * possuí a inclusão da classe Flase 
                 */
                flash('Servidor cadastrado com sucesso!')->success();
                return redirect(route('servidor.show'));
            }
        } catch(QueryException $ex) {
            flash('Não foi possível cadastrar servidor, tente novamente!')->error();
            return redirect(route('servidor.show'));
        }            
    }
    /**
     * Método para buscar o Servidor que deseja atualizar
     */
    protected function update($id) {
        /**
         * Consulta servidor pelo ID
         */
        $result = Server::find($id);
        
        return view('dashboard.servidor.update')
            ->with('server', $result);
    }
    /**
     * Método para atualizar Servidor
     */
    protected function updateConf(Request $request, Server $serv) {
        $serv = new Server();
        $id = $request->input('id');
        $serv = Server::find($id);
        $serv->nome = $request->input('nome');
        $serv->siape = $request->input('siape');
        $serv->funcao = $request->input('funcao');
        $serv->email = $request->input('email');
        $serv->contato = $request->input('contato');

        try {
            if($serv->save()) {
                flash('Servidor atualizado com sucesso!')->success();
                return redirect(route('servidor.show'));
            }
        } catch(QueryException $ex) {
            flash('Não foi possível atualizar servidor, tente novamente!')->error();
            return redirect(route('servidor.show'));
        }
    }
    /**
     * Método para deletar Servidor
     */
    protected function delete($id, Server $serv) {
        $serv = new Server();
        $serv = Server::find($id);

        try {
            if($serv->delete()) {
                flash('Servidor excluído com sucesso!')->success();
                return redirect(route('servidor.show'));
            }
        } catch(QueryException $ex) {
            flash('Não foi possível excluir servidor, tente novamente!')->error();
            return redirect(route('servidor.show'));
        }
    }
}
