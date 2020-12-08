@extends('layouts.app')
@push('style')
    <style>
    h11 {
    color:red;
    }
    #logo {
      width:50%;
      height:50%;
    }
    .panel-heading{
      font-size:150%;
    }
    #img {
      padding: 10px;
      margin: 20px;
      width: 150px;
    }
    </style>
@endpush
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Cadastro de Aluno</div>
                <div class="card-body">
                  <div class="portlet-body table-responsive">
                  {{ Form::model($aluno, ['route' => 'aluno.updateConfirm', 'method' => 'PUT', 'files' => true, 'enctype' => 'multipart/form-data']) }}  
                    <table class="table" id="table">
                        <fieldset>
                          <img src="{{ asset('storage/alunos/'.$aluno->id.'/'.$aluno->image) }}" id="img"><br>
                          <div class="form-group">
                            {{ Form::label('imgAlu', 'Imagem do Aluno *', array('class' => 'col-md-2')) }}
                            <div class="col-md-6">
                              <input type="file" class="form-control" name="imgAlu" id="imgAlu" onchange=" verificaExtensao(this); preview(event)">
                            </div>
                          </div>
                          <input type="hidden" value="{{ $aluno->id }}" name="id">  
                            <!-- Text input-->
                            <div class="form-group">
                              {{ Form::label('nome', 'Nome *', array('class' => 'col-md-2 control-label')) }}
                              <div class="col-md-8 ">
                              {{ Form::text('nome', 'old'('nome'), ['class' => 'form-control input-md', 'required']) }}
                              </div>
                            </div>

                            <!-- Text input-->
                            <div class="form-group">
                            {{ Form::label('data_nascimento', 'Data de Nascimento *', array('class' => 'col-md-5 control-label')) }}
                              <div class="col-md-3">
                              {{ Form::date('data_nascimento', 'old'('data_nascimento'), ['class' => 'form-control input-md', 'required']) }}
                            </div>
                          </div>

                            <!-- Multiple Radios (inline) -->

                            <div class="form-group">
                                {{ Form::label('sexo', 'Sexo *', array('class' => 'col-md-5 control-label'))}}
                                <!--<label class="col-md-1 control-label" for="radios">Função<h11>*</h11></label>-->
                                <div class="col-md-4"> 
                                    <select value='' id="sexo" name="sexo" class="form-control chosen-select" required>
                                      @if($aluno->sexo == 'm')
                                        <option id="sexo" name="sexo" value="m">Masculino</option>
                                        <option id="sexo" name="sexo" value="f">Feminino</option>
                                        <option id="sexo" name="sexo" value="s">Não declarado</option>
                                      @endif
                                      @if($aluno->sexo == 'f')
                                        <option id="sexo" name="sexo" value="f">Feminino</option>
                                        <option id="sexo" name="sexo" value="m">Masculino</option>
                                        <option id="sexo" name="sexo" value="s">Não declarado</option>
                                      @endif
                                      @if($aluno->sexo == 's')
                                        <option id="sexo" name="sexo" value="s">Não declarado</option>
                                        <option id="sexo" name="sexo" value="f">Feminino</option>
                                        <option id="sexo" name="sexo" value="m">Masculino</option>
                                      @endif
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                            {{ Form::label('naturalidade', 'Naturalidade *', array('class' => 'col-md-5 control-label')) }}
                              <div class="col-md-4">
                              {{ Form::text('naturalidade', 'old'('naturalidade'), ['class' => 'form-control input-md', 'required']) }}
                              </div>
                              </div>

                              <div class="form-group">
                              {{ Form::label('municipio', 'Município *', array('class' => 'col-md-5 control-label'))}}
                              <div class="col-md-4">
                              {{ Form::text('municipio', 'old'('municipio'), ['class' => 'form-control input-md', 'required']) }}
                              </div>
                              </div>

                              <div class="form-group">
                              {{ Form::label('transporte', 'Transporte *', array('class' => 'col-md-5 control-label'))}}
                              <div class="col-md-4"> 
                                    <select value='' id="transporte" name="transporte" class="form-control chosen-select" required>
                                      @if($aluno->transporte =='bicicleta')
                                        <option id="transporte" name="transporte" value="bicicleta">Bicileta</option>
                                        <option id="transporte" name="transporte" value="pe">Caminhada</option>
                                        <option id="transporte" name="transporte" value="familiar">Familiar</option>
                                        <option id="transporte" name="transporte" value="onibus">Ônibus</option>
                                        <option id="transporte" name="transporte" value="outros">Outros</option>
                                      @endif
                                      @if($aluno->transporte =='pe')
                                        <option id="transporte" name="transporte" value="pe">Caminhada</option>
                                        <option id="transporte" name="transporte" value="bicicleta">Bicileta</option>
                                        <option id="transporte" name="transporte" value="familiar">Familiar</option>
                                        <option id="transporte" name="transporte" value="onibus">Ônibus</option>
                                        <option id="transporte" name="transporte" value="outros">Outros</option>
                                      @endif
                                      @if($aluno->transporte =='familiar')
                                        <option id="transporte" name="transporte" value="familiar">Familiar</option>
                                        <option id="transporte" name="transporte" value="bicicleta">Bicileta</option>
                                        <option id="transporte" name="transporte" value="pe">Caminhada</option>
                                        <option id="transporte" name="transporte" value="onibus">Ônibus</option>
                                        <option id="transporte" name="transporte" value="outros">Outros</option>
                                      @endif
                                      @if($aluno->transporte =='onibus')
                                        <option id="transporte" name="transporte" value="onibus">Ônibus</option>  
                                        <option id="transporte" name="transporte" value="bicicleta">Bicileta</option>
                                        <option id="transporte" name="transporte" value="pe">Caminhada</option>
                                        <option id="transporte" name="transporte" value="familiar">Familiar</option>
                                        <option id="transporte" name="transporte" value="outros">Outros</option>
                                      @endif
                                      @if($aluno->transporte =='outros')
                                        <option id="transporte" name="transporte" value="outros">Outros</option>
                                        <option id="transporte" name="transporte" value="bicicleta">Bicileta</option>
                                        <option id="transporte" name="transporte" value="pe">Caminhada</option>
                                        <option id="transporte" name="transporte" value="familiar">Familiar</option>
                                        <option id="transporte" name="transporte" value="onibus">Ônibus</option>
                                      @endif

                                    </select>
                                </div>
                              </div>

                              <div class="form-group">
                              {{ Form::label('cpf', 'CPF *', array('class' => 'col-md-2 control-label'))}}
                              <div class="col-md-2">
                              {{ Form::text('cpf', 'old'('cpf'), ['class' => 'form-control input-md cpf', 'required']) }}
                              </div>
                            </div>

                            <div class="form-group">
                            {{ Form::label('tipo_sanguineo', 'Tipo Sanguíneo *', array('class' => 'col-md-5 control-label'))}}
                              <div class="col-md-1">
                              {{ Form::text('tipo_sanguineo', 'old'('tipo_sanguineo'), ['class' => 'form-control input-md', 'required']) }}
                              </div>
                              </div>

                              <div class="form-group">
                              {{ Form::label('apelido', 'Apelido', array('class' => 'col-md-5 control-label'))}}
                              <div class="col-md-4">
                              {{ Form::text('apelido', 'old'('apelido'), ['class' => 'form-control input-md']) }}
                              </div>
                              </div>

                              <div class="form-group">
                              {{ Form::label('obs_napne', 'Observações', array('class' => 'col-md-5 control-label')) }}
                              <div class="col-md-12">
                              {{ Form::text('obs_napne', 'old'('obs_napne'), ['class' => 'form-control input-md']) }}
                              </div>
                              </div>

                              <div class="form-group">
                              {{ Form::label('obs_medica', 'Observações Médicas', array('class' => 'col-md-5 control-label')) }}
                              <div class="col-md-12">
                              {{ Form::text('obs_medica', 'old'('obs_medica'), ['class' => 'form-control input-md']) }}
                              </div>
                              </div>

                              <div class="form-group">
                              {{ Form::label('obs_pedagogica', 'Observações Pedagógicas', array('class' => 'col-md-5 control-label')) }}
                              <div class="col-md-12">
                              {{ Form::text('obs_pedagogica', 'old'('obs_pedagogica'), ['class' => 'form-control input-md']) }}
                              </div>
                              </div>


                            <!-- Select Basic -->
                            <div class="form-group">
                                {{ Form::label('turma_id', 'Turma *', array('class' => 'col-md-4 control-label')) }}
                                <!--<label class="col-md-1 control-label" for="radios">Função<h11>*</h11></label>-->
                                <div class="col-md-4"> 
                                    {{ Form::select (
                                        'turma_id',
                                        $turmas->pluck('codigo', 'id'),
                                        old('turma_id'),
                                        [
                                        'class' => 'form-control chosen-select',
                                        'required',
                                        'autofocus'
                                    ])
                                }}
                                </div>
                            </div>
                            <!-- Prepended text-->
                            <div class="form-group">
                                {{ Form::label('responsavel_id', 'Responsável *', array('class' => 'col-md-8 control-label')) }}
                                <!--<label class="col-md-1 control-label" for="radios">Função<h11>*</h11></label>-->
                                <div class="col-md-8"> 
                                    {{ Form::select (
                                        'responsavel_id',
                                        $responsaveis->pluck('nome', 'id'),
                                        old('responsavel_id'),
                                        [
                                        'class' => 'form-control chosen-select',
                                        'required',
                                        'autofocus'
                                    ])
                                }}
                                </div>
                            </div>
                            <!-- Button (Double) -->
                        </fieldset>
                      </form>
                    </table>
                    {{ Form::submit('Atualizar Aluno', ['class' => 'btn btn-success']) }}
                    {{ Form::close() }}
                  </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!------ Include the above in your HEAD tag ---------->
@endsection

@push('js')
  <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
  <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
  {{-- Carregar a img ao ser adicionada --}}
  <script>
    function preview(event) {
      var input = event.target.files[0];
      var reader = new FileReader();
      reader.onload = function() {
        var result = reader.result;
        var img = document.getElementById('img');
          img.src = result;
      }
      reader.readAsDataURL (input);
    }
  </script>
  {{-- Verificar extensão da imagem --}}
  <script>
    function verificaExtensao($input) {
      var extPermitidas = ['jpg', 'png', 'jpeg'];
      var extArquivo = $input.value.split('.').pop();

      if(typeof extPermitidas.find(function(ext){ return extArquivo == ext; }) == 'undefined') {
          alert('Extensão "' + extArquivo + '" não permitida!\n Adicione um arquivo com a extensões: ".png", "jpeg" ou ".jpg"');
          document.getElementById("imgProd").value = ''
      }
    }
  </script>
    
@endpush    



