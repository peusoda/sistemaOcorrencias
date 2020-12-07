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
            {{ Form::open(['route' => 'aluno.new', 'method' => 'POST', 'files' => true, 'enctype' => 'multipart/form-data']) }}  
              <table class="table" id="table">
                  <fieldset>

                    <div class="form-group">
                      {{ Form::label('imgAlu', 'Imagem do Aluno *', array('class' => 'col-md-2')) }}
                      <div class="col-md-6">
                        <input type="file" 
                        class="form-control"
                        name="imgAlu"
                        id="imgAlu"
                        onchange=" verificaExtensao(this); preview(event)"
                        accept="image/*"
                        capture="environment"
                        required>
                      </div>
                    </div>
                    <!-- Text input-->
                    <div class="form-group">
                      {{ Form::label('nome', 'Nome *', array('class' => 'col-md-2 control-label')) }}
                      <div class="col-md-8 ">
                      <input id="nome" name="nome" placeholder="insira o nome do aluno" class="form-control input-md" required="true" type="text">
                      </div>
                    </div>

                    <!-- Text input-->
                    <div class="form-group">
                      {{ Form::label('data_nascimento', 'Data de Nascimento *', array('class' => 'col-md-5 control-label')) }}
                      <div class="col-md-3">
                      <input id="data_nascimento" name="data_nascimento" placeholder="DD/MM/AAAA" class="form-control input-md" required="true" type="date" maxlength="10" OnKeyPress="formatar('##/##/####', this)" onBlur="showhide()">
                      </div>
                    </div>

                    <!-- Multiple Radios (inline) -->

                    <div class="form-group">
                      {{ Form::label('sexo', 'Sexo *', array('class' => 'col-md-5 control-label'))}}
                      <!--<label class="col-md-1 control-label" for="radios">Função<h11>*</h11></label>-->
                      <div class="col-md-4"> 
                        <select value='' id="sexo" name="sexo" class="form-control chosen-select" required>
                          <option id="nada" name="nada" value="">Selecione um sexo</option>
                          <option id="sexo" name="sexo" value="m">Masculino</option>
                          <option id="sexo" name="sexo" value="f">Feminino</option>
                          <option id="sexo" name="sexo" value="s">Não declarado</option>
                        </select>
                      </div>
                    </div>

                      <div class="form-group">
                      {{ Form::label('naturalidade', 'Naturalidade *', array('class' => 'col-md-5 control-label')) }}
                        <div class="col-md-4">
                          <input id="naturalidade" name="naturalidade" type="text" placeholder="Rubim" class="form-control input-md" required="true">
                        </div>
                      </div>

                      <div class="form-group">
                        {{ Form::label('municipio', 'Município *', array('class' => 'col-md-5 control-label'))}}
                        <div class="col-md-4">
                        <input id="municipio" name="municipio" type="text" placeholder="Rubim" class="form-control input-md" required="true">
                        </div>
                      </div>

                      <div class="form-group">
                        {{ Form::label('transporte', 'Transporte *', array('class' => 'col-md-5 control-label'))}}
                        <div class="col-md-4"> 
                          <select value='' id="transporte" name="transporte" class="form-control chosen-select" required>
                            <option id="nada" name="nada" value="">Selecione um transporte</option>
                            <option id="transporte" name="transporte" value="bicicleta">Bicileta</option>
                            <option id="transporte" name="transporte" value="pe">Caminhada</option>
                            <option id="transporte" name="transporte" value="familiar">Familiar</option>
                            <option id="transporte" name="transporte" value="onibus">Ônibus</option>
                            <option id="transporte" name="transporte" value="outros">Outros</option>
                          </select>
                        </div>
                      </div>

                      <div class="form-group">
                        {{ Form::label('cpf', 'CPF *', array('class' => 'col-md-2 control-label'))}}
                        <div class="col-md-2">
                          <input id="cpf" name="cpf" placeholder="000.000.000-00" class="form-control input-md cpf" required="true" type="text" maxlength="14">
                        </div>
                      </div>

                      <div class="form-group">
                        {{ Form::label('tipo_sanguineo', 'Tipo Sanguíneo *', array('class' => 'col-md-5 control-label'))}}
                        <div class="col-md-1">
                          <input id="tipo_sanguineo" name="tipo_sanguineo" type="text" placeholder="O" class="form-control input-md" required="true">
                        </div>
                      </div>

                      <div class="form-group">
                        {{ Form::label('apelido', 'Apelido', array('class' => 'col-md-5 control-label'))}}
                        <div class="col-md-4">
                          <input id="apelido" name="apelido" type="text" placeholder="insira o apelido" class="form-control input-md" >
                        </div>
                      </div>

                      <div class="form-group">
                        {{ Form::label('obs_napne', 'Observações', array('class' => 'col-md-5 control-label')) }}
                        <div class="col-md-12">
                          <input id="	obs_napne" name="	obs_napne" type="text" placeholder="insira observações" class="form-control input-md">
                        </div>
                      </div>

                      <div class="form-group">
                        {{ Form::label('obs_medica', 'Observações Médicas', array('class' => 'col-md-5 control-label')) }}
                        <div class="col-md-12">
                          <input id="obs_medica" name="obs_medica" type="text" placeholder="insira as observações médicas" class="form-control input-md">
                        </div>
                      </div>

                      <div class="form-group">
                        {{ Form::label('obs_pedagogica', 'Observações Pedagógicas', array('class' => 'col-md-5 control-label')) }}
                        <div class="col-md-12">
                          <input id="obs_pedagogica" name="obs_pedagogica" type="text" placeholder="insira as observações pedagógicas" class="form-control input-md">
                        </div>
                      </div>


                      <!-- Select Basic -->
                      <div class="form-group">
                        {{ Form::label('turma', 'Turma *', array('class' => 'col-md-4 control-label')) }}
                        <!--<label class="col-md-1 control-label" for="radios">Função<h11>*</h11></label>-->
                        <div class="col-md-4"> 
                          <select value='' id="turma" name="turma" class="form-control chosen-select" required>
                            <option id="nada" name="nada" value="">Selecione uma turma</option>
                            @foreach($turmas as $turma)
                              <option value="{{ $turma->id }}">{{ $turma->codigo }}</option>
                            @endforeach
                          </select>
                        </div>
                      </div>
                      <!-- Prepended text-->
                      <div class="form-group">
                        {{ Form::label('responsavel', 'Responsável *', array('class' => 'col-md-8 control-label')) }}
                        <!--<label class="col-md-1 control-label" for="radios">Função<h11>*</h11></label>-->
                        <div class="col-md-8"> 
                          <select value='' id="responsavel" name="responsavel" class="form-control chosen-select" required>
                            <option id="nada" name="nada" value="">Selecione um responsável</option>
                            @foreach($responsaveis as $responsavel)
                              <option value="{{ $responsavel->id }}">{{ $responsavel->nome }}</option>
                            @endforeach
                          </select>
                        </div>
                      </div>
                      <!-- Button (Double) -->
                  </fieldset>
                </form>
              </table>
              {{ Form::submit('Cadastrar Aluno', ['class' => 'btn btn-success']) }}
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



