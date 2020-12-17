<?php

namespace App\Http\Controllers;
use Illuminate\Database\QueryException;
use PhpParser\Node\Stmt\TryCatch;
use Illuminate\Http\Request;
use App\Ocorrencia;
use App\OcorrenciaAluno;
use App\Turma;
use App\Aluno;


class ElogiosController extends Controller
{
    protected function show() {
        $elogios = new Ocorrencia();
        $elogios = Ocorrencia::all()->where('categoria','elogio');

        return view('dashboard.elogio.show')
            ->with('elogios', $elogios);
    }
    protected function create() {
        $turmas = new Turma();
        $turmas = Turma::all();
        $alunos = new Aluno();
        $alunos = Aluno::all();
        
        return view('dashboard.elogio.create')
        ->with('turmas', $turmas)
        ->with('alunos', $alunos);

    }
    protected function store(Request $request, Ocorrencia $elogio) {
        $elogio = new Ocorrencia();
        $elogio->categoria = "elogio";
        $elogio->relato = $request->input('relato');
        $elogio->data_ocorrencia = $request->input('data_ocorrencia');
        $elogio->turma_id = $request->input('turma_id');
        $alunosCheck =  $request->input('checkbox');
        //  $elogio->servidor_id = $request->input('servidor_id');
        //dd($request->input('checkbox'));
        
        
        Try {
            if($elogio->save()) {
                if($alunosCheck){
                    foreach ($alunosCheck as $aluno) {
                        $elogioAluno = new OcorrenciaAluno();
                        $elogioAluno->aluno_id = $aluno;
                        $elogioAluno->ocorrencia_id = $elogio->id;
                        $elogioAluno->save();
                    }
                }
                /**
                 * O Método FLASH retorna junto com a rota servidor.show Uma mensagem ao realizar persistência. Na view (dashboard.servidor.show)
                 * possuí a inclusão da classe Flase 
                 */
                flash('Elogio cadastrado com sucesso!')->success();
                return redirect(route('elogio.show'));
            }
        } catch(QueryException $ex) {
            flash('Não foi possível cadastrar o Elogio, tente novamente!')->error();
            return redirect(route('elogio.show'));
        }           
    }

    protected function update($id) {
        $turmas = new Turma();
        $turmas = Turma::all();
        $alunos = new Aluno();
        $alunos = Aluno::all();
        $elogio = new Ocorrencia();
        $elogio = Ocorrencia::find($id);
        
  /*      foreach($elogio->elogioAluno as $oc){
                echo $oc->aluno_id;
        }
        */

        
        return view('dashboard.elogio.update')
            ->with('elogio', $elogio)
            ->with('turmas', $turmas)
            ->with('alunos', $alunos);
    }

    protected function updateConf(Request $request) {
        $elogio = new Ocorrencia();  
        $elogio = Ocorrencia::find($request->input('id'));
        $elogio->categoria = "elogio";
        $elogio->relato = $request->input('relato');
        $elogio->data_ocorrencia = $request->input('data_ocorrencia');
        $elogio->turma_id = $request->input('turma_id');
        $alunosCheck =  $request->input('checkbox');

        Try {
            if($elogio->save()) {
                $elogioAluno = new OcorrenciaAluno();
                $aluno = OcorrenciaAluno::where('ocorrencia_id', $elogio->id);
                $aluno->delete();
                if($alunosCheck){
                    foreach ($alunosCheck as $aluno) {
                        $elogioAluno = new OcorrenciaAluno();
                        $elogioAluno->aluno_id = $aluno;
                        $elogioAluno->ocorrencia_id = $elogio->id;
                        $elogioAluno->save();
                    }
                }
                /**
                 * O Método FLASH retorna junto com a rota ocorrencia.show Uma mensagem ao realizar persistência. Na view (dashboard.ocorrencia.show)
                 * possuí a inclusão da classe Flase 
                 */
                flash('Dados do elogio atualizado com sucesso!')->success();
                return redirect(route('elogio.show'));
            }
        } catch(QueryException $ex) {
            flash('Não foi possível atualizar dados do Elogio, tente novamente!')->error();
            return redirect(route('elogio.show'));
        }  
    }

    protected function delete($id) {
        $idOcorrencia = $id;
        $elogio = new Ocorrencia();
        $elogio = Ocorrencia::find($idOcorrencia);
        
        Try {
            if($elogio->delete()) {
                /**
                 * O Método FLASH retorna junto com a rota servidor.show Uma mensagem ao realizar persistência. Na view (dashboard.servidor.show)
                 * possuí a inclusão da classe Flase 
                 */
                flash('Dados do elogio deletado com sucesso!')->success();
                return redirect(route('elogio.show'));
            }
        } catch(QueryException $ex) {
            flash('Não foi possível deletar dados do Elogio, tente novamente!')->error();
            return redirect(route('elogio.show'));
        }  
    }
}
