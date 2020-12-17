<?php

namespace App\Http\Controllers;
use Illuminate\Database\QueryException;
use PhpParser\Node\Stmt\TryCatch;
use Illuminate\Http\Request;
use App\Aluno;
use App\Http\Requests\StoreUpdateAlunoRequest;
use App\Turma;
use App\Responsavel;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class AlunosController extends Controller
{
    protected function show() {
        $alunos = new Aluno();
        $alunos = Aluno::all();
        $turmas = new Turma();
        $turmas = Turma::all();

        return view('dashboard.aluno.show')
            ->with('alunos', $alunos)
            ->with('turmas', $turmas);
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
    protected function store(StoreUpdateAlunoRequest $request, Aluno $aluno) {
        $aluno = new Aluno();
        $aluno->nome = $request->input('nome');
        $aluno->data_nascimento = $request->input('data_nascimento');
        $aluno->sexo = $request->input('sexo');
        $aluno->naturalidade = $request->input('naturalidade');
        $aluno->municipio = $request->input('municipio');
        $aluno->transporte = $request->input('transporte');
        $aluno->cpf = $request->input('cpf');
        $aluno->tipo_sanguineo = $request->input('tipo_sanguineo');
        $aluno->apelido = $request->input('apelido');
        $aluno->obs_napne = $request->input('obs_napne');
        $aluno->obs_medica = $request->input('obs_medica');
        $aluno->obs_pedagogica = $request->input('obs_pedagogica');
        $aluno->turma_id = $request->input('turma');
        $aluno->responsavel_id = $request->input('responsavel');
        $aluno->image = "";

        Try {
            if($aluno->save()) {
                /**
                 * O Método FLASH retorna junto com a rota servidor.show Uma mensagem ao realizar persistência. Na view (dashboard.servidor.show)
                 * possuí a inclusão da classe Flase 
                 */
                $idAluno = Aluno::max('id');
                $nomeImage = $idAluno;

                if($request->hasFile('imgAlu') && $request->file('imgAlu')->isValid()){
                  $extensao = $request->imgAlu->extension();
                  $nomeImage = "{$nomeImage}.{$extensao}";
                  $request->imgAlu->storeAs($idAluno, $nomeImage, 'archive');
                  $aluno->image = $nomeImage;
                  $aluno->save();
                }

                flash('Aluno cadastrado com sucesso!')->success();
                return redirect(route('aluno.show'));
            }
        } catch(QueryException $ex) {
            flash('Não foi possível cadastrar o Aluno, tente novamente!')->error();
            return redirect(route('aluno.show'));
        }           
    }

    protected function update($id) {
        $turmas = new Turma();
        $responsaveis = new Responsavel();
        $turmas = Turma::all();
        $responsaveis = Responsavel::all();
        $aluno = new Aluno();
        $aluno = Aluno::find($id);
        
        return view('dashboard.aluno.update')
            ->with('aluno', $aluno)
            ->with('turmas', $turmas)
            ->with('responsaveis', $responsaveis);
    }

    protected function updateConf(Request $request) {
        $aluno = new Aluno();
        $aluno = Aluno::find($request->input('id'));
        $aluno->nome = $request->input('nome');
        $aluno->data_nascimento = $request->input('data_nascimento');
        $aluno->sexo = $request->input('sexo');
        $aluno->naturalidade = $request->input('naturalidade');
        $aluno->municipio = $request->input('municipio');
        $aluno->transporte = $request->input('transporte');
        $aluno->cpf = $request->input('cpf');
        $aluno->tipo_sanguineo = $request->input('tipo_sanguineo');
        $aluno->apelido = $request->input('apelido');
        $aluno->obs_napne = $request->input('obs_napne');
        $aluno->obs_medica = $request->input('obs_medica');
        $aluno->obs_pedagogica = $request->input('obs_pedagogica');
        $aluno->turma_id = $request->input('turma_id');
        $aluno->responsavel_id = $request->input('responsavel_id');
        Try {   
            if($request->hasFile('imgAlu') && $request->file('imgAlu')->isValid()) {
                if($aluno->image) {
                    $file = public_path()."/storage/alunos/".$aluno->id."/".$aluno->image;
                    File::delete($file);
                    $file = public_path()."/storage/alunos/".$aluno->id;
                    rmdir($file);
                    $nomeImage = $aluno->id;
                    $extensao = $request->imgAlu->extension();
                    $nomeImage = "{$nomeImage}.{$extensao}";
                    $request->imgAlu->storeAs($aluno->id, $nomeImage, 'archive');
                    $aluno->image = $nomeImage;
                } else {
                    $nomeImage = $aluno->id;
                    $aluno->image = $nomeImage;
                    $extensao = $request->imgAlu->extension();
                    $nomeImage = "{$nomeImage}.{$extensao}";
                    $request->imgAlu->storeAs($aluno->id, $nomeImage, 'archive');
                    $aluno->save();
                }
            } else {
                if($aluno->image) {
                    $aluno->image = $aluno->image;
                }
            }
                
            $aluno->save();
                /**
                 * O Método FLASH retorna junto com a rota servidor.show Uma mensagem ao realizar persistência. Na view (dashboard.servidor.show)
                 * possuí a inclusão da classe Flase 
                 */
            flash('Dados do aluno atualizado com sucesso!')->success();
            return redirect(route('aluno.show'));
            
        } catch(QueryException $ex) {
            flash('Não foi possível atualizar dados do Aluno, tente novamente!')->error();
            return redirect(route('aluno.show'));
        }  
    }

    protected function delete($id) {
        $idAluno = $id;
        $aluno = new Aluno();
        $aluno = Aluno::find($idAluno);
        
        Try {
            if($aluno->delete()) {
                /**
                 * O Método FLASH retorna junto com a rota servidor.show Uma mensagem ao realizar persistência. Na view (dashboard.servidor.show)
                 * possuí a inclusão da classe Flase 
                 */
                if($aluno->image) {
                    $file = public_path()."/storage/alunos/".$aluno->id."/".$aluno->image;
                    File::delete($file);
                    $file = public_path()."/storage/alunos/".$aluno->id;
                    rmdir($file);
                }
                    flash('Dados do aluno deletado com sucesso!')->success();
                    return redirect(route('aluno.show'));
            }
        } catch(QueryException $ex) {
            flash('Não foi possível deletar dados do Aluno, tente novamente!')->error();
            return redirect(route('aluno.show'));
        }  
    }

    protected function filterTurma(Request $request) {
        $alunos = new Aluno();
        $turmas = new Turma();
        $turmas = Turma::all();
        $id = $request->input('turma');
        $alunos = Aluno::where('turma_id', $id)
            ->get();
        
        return view('dashboard.aluno.show')
            ->with('alunos', $alunos)
            ->with('turmas', $turmas);                
    }

    protected function perfil() {
        
        return view('dashboard.aluno.perfil');
    }
}
