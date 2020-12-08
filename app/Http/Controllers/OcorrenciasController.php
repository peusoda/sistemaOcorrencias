<?php

namespace App\Http\Controllers;
use Illuminate\Database\QueryException;
use PhpParser\Node\Stmt\TryCatch;
use Illuminate\Http\Request;
use App\Ocorrencia;
use App\OcorrenciaAluno;
use App\Turma;
use App\Aluno;

class OcorrenciasController extends Controller
{
    protected function show() {
        $ocorrencias = new Ocorrencia();
        $ocorrencias = Ocorrencia::all();

        return view('dashboard.ocorrencia.show')
            ->with('ocorrencias', $ocorrencias);
    }
    protected function create() {
        $turmas = new Turma();
        $turmas = Turma::all();
        $alunos = new Aluno();
        $alunos = Aluno::all();
        
        return view('dashboard.ocorrencia.create')
        ->with('turmas', $turmas)
        ->with('alunos', $alunos);
    }
    protected function store(Request $request, Ocorrencia $ocorrencia) {
        $ocorrencia = new Ocorrencia();
        $ocorrencia->categoria = "punitiva";
        $ocorrencia->disciplina = $request->input('disciplina');
        $ocorrencia->relato = $request->input('relato');
        $ocorrencia->data_ocorrencia = $request->input('data_ocorrencia');
        $ocorrencia->turma_id = $request->input('turma_id');
        //  $ocorrencia->servidor_id = $request->input('servidor_id');
        //dd($request->input('checkbox'));
        
        
        Try {
            if($ocorrencia->save()) {
                $ocorrenciaAluno = new OcorrenciaAluno();
                foreach ($request->input('checkbox') as $aluno) {
                    $ocorrenciaAluno->aluno_id = $aluno;
                    $ocorrenciaAluno->ocorrencia_id = $ocorrencia->id;
                    $ocorrenciaAluno->save();
                }
        
                /**
                 * O Método FLASH retorna junto com a rota servidor.show Uma mensagem ao realizar persistência. Na view (dashboard.servidor.show)
                 * possuí a inclusão da classe Flase 
                 */
                flash('Ocorrencia cadastrado com sucesso!')->success();
                return redirect(route('ocorrencia.show'));
            }
        } catch(QueryException $ex) {
            flash('Não foi possível cadastrar o Ocorrencia, tente novamente!')->error();
            return redirect(route('ocorrencia.show'));
        }           
    }

    protected function update($id) {
        $turmas = new Turma();
        $turmas = Turma::all();
        $ocorrencia = new Ocorrencia();
        $ocorrencia = Ocorrencia::find($id);
        
        return view('dashboard.ocorrencia.update')
            ->with('ocorrencia', $ocorrencia)
            ->with('turmas', $turmas);
    }

    protected function updateConf(Request $request) {
        $ocorrencia = new Ocorrencia();
        $ocorrencia = Ocorrencia::find($request->input('id'));
        $ocorrencia->categoria = "punitiva";
        $ocorrencia->disciplina = $request->input('disciplina');
        $ocorrencia->relato = $request->input('relato');
        $ocorrencia->data_ocorrencia = $request->input('data_ocorrencia');
        $ocorrencia->turma_id = $request->input('turma_id');
        Try {
            if($ocorrencia->save()) {
                /**
                 * O Método FLASH retorna junto com a rota ocorrencia.show Uma mensagem ao realizar persistência. Na view (dashboard.ocorrencia.show)
                 * possuí a inclusão da classe Flase 
                 */
                flash('Dados do ocorrencia atualizado com sucesso!')->success();
                return redirect(route('ocorrencia.show'));
            }
        } catch(QueryException $ex) {
            flash('Não foi possível atualizar dados do Ocorrencia, tente novamente!')->error();
            return redirect(route('ocorrencia.show'));
        }  
    }

    protected function delete($id) {
        $idOcorrencia = $id;
        $ocorrencia = new Ocorrencia();
        $ocorrencia = Ocorrencia::find($idOcorrencia);
        
        Try {
            if($ocorrencia->delete()) {
                /**
                 * O Método FLASH retorna junto com a rota servidor.show Uma mensagem ao realizar persistência. Na view (dashboard.servidor.show)
                 * possuí a inclusão da classe Flase 
                 */
                flash('Dados do ocorrencia deletado com sucesso!')->success();
                return redirect(route('ocorrencia.show'));
            }
        } catch(QueryException $ex) {
            flash('Não foi possível deletar dados do Ocorrencia, tente novamente!')->error();
            return redirect(route('ocorrencia.show'));
        }  
    }
}
