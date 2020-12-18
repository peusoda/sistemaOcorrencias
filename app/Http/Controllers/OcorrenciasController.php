<?php

namespace App\Http\Controllers;
use Illuminate\Database\QueryException;
use PhpParser\Node\Stmt\TryCatch;
use Illuminate\Http\Request;
use App\Ocorrencia;
use App\TipoOcorrencia;
use App\OcorrenciaAluno;
use App\Turma;
use App\Aluno;
use App\Image;
use App\OcorrenciaMotivo;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class OcorrenciasController extends Controller
{
    protected function show() {
        $ocorrencias = new Ocorrencia();
        $ocorrencias = Ocorrencia::all()->where('categoria','punitiva');

        return view('dashboard.ocorrencia.show')
            ->with('ocorrencias', $ocorrencias);
    }
    protected function create() {
        $turmas = new Turma();
        $turmas = Turma::all();
        $alunos = new Aluno();
        $alunos = Aluno::all();
        $tipos = new TipoOcorrencia();
        $tipos = TipoOcorrencia::all();
        
        return view('dashboard.ocorrencia.create')
        ->with('turmas', $turmas)
        ->with('alunos', $alunos)
        ->with('tipos', $tipos);

    }
    protected function store(Request $request, Ocorrencia $ocorrencia) {
        $ocorrencia = new Ocorrencia();
        $ocorrencia->categoria = "punitiva";
        $ocorrencia->disciplina = $request->input('disciplina');
        $ocorrencia->relato = $request->input('relato');
        $ocorrencia->data_ocorrencia = $request->input('data_ocorrencia');
        $ocorrencia->turma_id = $request->input('turma_id');
        $alunosCheck =  $request->input('checkbox');
        //  $ocorrencia->servidor_id = $request->input('servidor_id');
        //dd($request->input('checkbox'));
        
        
        Try {
            if($ocorrencia->save()) {
                if($alunosCheck){
                    foreach ($alunosCheck as $aluno) {
                        $ocorrenciaAluno = new OcorrenciaAluno();
                        $ocorrenciaAluno->aluno_id = $aluno;
                        $ocorrenciaAluno->ocorrencia_id = $ocorrencia->id;
                        $ocorrenciaAluno->save();
                    }
                }
                $ocorrenciaMotivo = new OcorrenciaMotivo();
                $ocorrenciaMotivo->ocorrencia_id = $ocorrencia->id;
                $ocorrenciaMotivo->tipo_ocorrencia_id = $request->input('tipo_id');
                $ocorrenciaMotivo->save();
        
                /**
                 * O Método FLASH retorna junto com a rota servidor.show Uma mensagem ao realizar persistência. Na view (dashboard.servidor.show)
                 * possuí a inclusão da classe Flase 
                 */
    
                if($request->hasFile('imgOco') && $request->file('imgOco')->isValid()){
                    $correncia_id = Ocorrencia::max('id');
                    $nomeImage = $correncia_id;
                    $image = new Image();  
                    $extensao = $request->imgOco->extension();
                    $nomeImage = "{$nomeImage}.{$extensao}";
                    $request->imgOco->storeAs($correncia_id, $nomeImage, 'archive2');
                    $image->image1 = $nomeImage;
                    $image->ocorrencia_id = $correncia_id;
   
                    $image->save();
                }

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
        $alunos = new Aluno();
        $alunos = Aluno::all();
        $ocorrencia = new Ocorrencia();
        $ocorrencia = Ocorrencia::find($id);
        $tipos = new TipoOcorrencia();
        $tipos = TipoOcorrencia::all();
        $image = new Image();
        $image = Image::where('ocorrencia_id', $id)
            ->get();

  /*      foreach($ocorrencia->ocorrenciaAluno as $oc){
                echo $oc->aluno_id;
        }
        */
        return view('dashboard.ocorrencia.update')
            ->with('ocorrencia', $ocorrencia)
            ->with('turmas', $turmas)
            ->with('alunos', $alunos)
            ->with('tipos', $tipos)
            ->with('images', $image);
    }

    protected function updateConf(Request $request) {
        $ocorrencia = new Ocorrencia();
        $ocorrencia = Ocorrencia::find($request->input('id'));
        $ocorrencia->categoria = "punitiva";
        $ocorrencia->disciplina = $request->input('disciplina');
        $ocorrencia->relato = $request->input('relato');
        $ocorrencia->data_ocorrencia = $request->input('data_ocorrencia');
        $ocorrencia->turma_id = $request->input('turma_id');
        $alunosCheck =  $request->input('checkbox');

        Try {
            if($ocorrencia->save()) {
                $ocorrenciaAluno = new OcorrenciaAluno();
                $aluno = OcorrenciaAluno::where('ocorrencia_id', $ocorrencia->id);
                $aluno->delete();
                if($alunosCheck){
                    foreach ($alunosCheck as $aluno) {
                        $ocorrenciaAluno = new OcorrenciaAluno();
                        $ocorrenciaAluno->aluno_id = $aluno;
                        $ocorrenciaAluno->ocorrencia_id = $ocorrencia->id;
                        $ocorrenciaAluno->save();
                    }
                }
                $motivo = new OcorrenciaMotivo();
                $motivo = OcorrenciaMotivo::where('ocorrencia_id', $ocorrencia->id);
                $motivo->delete();
                $ocorrenciaMotivo = new OcorrenciaMotivo();
                $ocorrenciaMotivo->ocorrencia_id = $ocorrencia->id;
                $ocorrenciaMotivo->tipo_ocorrencia_id = $request->input('tipo_id');
                $ocorrenciaMotivo->save();
                /**
                 * O Método FLASH retorna junto com a rota ocorrencia.show Uma mensagem ao realizar persistência. Na view (dashboard.ocorrencia.show)
                 * possuí a inclusão da classe Flase 
                 */
                $image = new Image();
                $id = $ocorrencia->id;
                $image = DB::table('images')
                    ->where('ocorrencia_id', $id)
                    ->get();
                foreach($image as $img)
                
                $image = Image::find($img->id);
                if($request->hasFile('imgOco') && $request->file('imgOco')->isValid()) {
                    if($image->image1) {
                        $file = public_path()."/storage/ocorrencias/".$image->ocorrencia_id."/".$image->image1;
                        File::delete($file);
                        $file = public_path()."/storage/ocorrencias/".$image->ocorrencia_id;
                        rmdir($file);
                        $nomeImage = $image->ocorrencia_id;
                        $extensao = $request->imgOco->extension();
                        $nomeImage = "{$nomeImage}.{$extensao}";
                        $request->imgOco->storeAs($image->ocorrencia_id, $nomeImage, 'archive2');
                        $image->image1 = $nomeImage;
                        $image->ocorrencia_id = $image->ocorrencia_id;
                    } else {
                        $nomeImage = $image->ocorrencia_id;
                        $image->image1 = $nomeImage;
                        $extensao = $request->imgOco->extension();
                        $nomeImage = "{$nomeImage}.{$extensao}";
                        $request->imgOco->storeAs($image->ocorrencia_id, $nomeImage, 'archive2');
                        $image->ocorrencia_id = $image->ocorrencia_id;
                        $image->save();
                    }
                } else {
                    if($image->image1) {
                        $image->image1 = $image->image1;
                        $image->ocorrencia_id = $image->ocorrencia_id;
                    }
                }

                if($image->save())

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
            $image = new Image();
            $id = $idOcorrencia;
            $image = DB::table('images')
                ->where('ocorrencia_id', $id)
                ->get();
            foreach($image as $img)
            
            $image = Image::find($img->id);
            
            if($image->image1) {
                $file = public_path()."/storage/ocorrencias/".$image->ocorrencia_id."/".$image->image1;
                File::delete($file);
                $file = public_path()."/storage/ocorrencias/".$image->ocorrencia_id;
                rmdir($file);
                //$image->delete();
            }
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
