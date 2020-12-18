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
        <div class="card-header"><strong>Cadastro de Aluno</strong></div>
          <div class="card-body">
            <div class="portlet-body table-responsive">
            {{ Form::open(['route' => 'aluno.new', 'method' => 'POST', 'files' => true, 'enctype' => 'multipart/form-data']) }}  
              <table class="table" id="table">
                  <fieldset>
                    <img src="" id="img"><br>
                    <div class="form-group">
                      {{ Form::label('imgAlu', 'Imagem do aluno', array('class' => 'col-md-2')) }}
                      <div class="col-md-6">
                        <input type="file" 
                        class="form-control"
                        name="imgAlu"
                        id="imgAlu"
                        onchange=" verificaExtensao(this); preview(event)"
                        accept="image/*"
                        capture="environment"
                        >
                      </div>
                    </div>
                    <!-- Text input-->
                    <div class="form-group">
                      {{ Form::label('nome', 'Nome do aluno', array('class' => 'col-md-2 control-label required')) }}
                      <div class="col-md-8 ">
                      <input id="nome" name="nome" class="form-control input-md @error('nome') is-invalid @enderror" required type="text">
                      @error('nome')
                        <div class="alert alert-danger">{{ $message }}</div>
                      @enderror
                      </div>
                    </div>

                    <!-- Text input-->
                    <div class="form-group">
                      {{ Form::label('data_nascimento', 'Data de Nascimento', array('class' => 'col-md-5 control-label required')) }}
                      <div class="col-md-3">
                      <input id="data_nascimento" name="data_nascimento" placeholder="DD/MM/AAAA" class="form-control input-md @error('data_nascimento') is-invalid @enderror" required="true" type="date" maxlength="10" OnKeyPress="formatar('##/##/####', this)" onBlur="showhide()">
                      @error('data_nascimento')
                        <div class="alert alert-danger">{{ $message }}</div>
                      @enderror
                      </div>
                    </div>

                    <!-- Multiple Radios (inline) -->

                    <div class="form-group">
                      {{ Form::label('sexo', 'Sexo', array('class' => 'col-md-5 control-label required'))}}
                      <!--<label class="col-md-1 control-label" for="radios">Função<h11>*</h11></label>-->
                      <div class="col-md-4"> 
                        <select value='' id="sexo" name="sexo" class="form-control chosen-select @error('sexo') is-invalid @enderror" required>
                          <option id="nada" name="nada" value="">Selecione uma opção</option>
                          <option id="sexo" name="sexo" value="m">Masculino</option>
                          <option id="sexo" name="sexo" value="f">Feminino</option>
                          <option id="sexo" name="sexo" value="s">Não declarado</option>
                        </select>
                        @error('sexo')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                      </div>
                    </div>

                      <div class="form-group">
                      {{ Form::label('naturalidade', 'Naturalidade', array('class' => 'col-md-5 control-label required')) }}
                        <div class="col-md-4">
                          <input id="naturalidade" name="naturalidade" type="text" class="form-control input-md @error('naturalidade') is-invalid @enderror" required="true">
                          @error('naturalidade')
                          <div class="alert alert-danger">{{ $message }}</div>
                          @enderror
                        </div>
                      </div>

                      <div class="form-group">
                        {{ Form::label('municipio', 'Município', array('class' => 'col-md-5 control-label required'))}}
                        <div class="col-md-4">
                        <input id="municipio" name="municipio" type="text" class="form-control input-md @error('municipio') is-invalid @enderror" required="true">
                        @error('municipio')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        </div>
                      </div>

                      <div class="form-group">
                        {{ Form::label('transporte', 'Transporte', array('class' => 'col-md-5 control-label required'))}}
                        <div class="col-md-4"> 
                          <select value='' id="transporte" name="transporte" class="form-control chosen-select @error('transporte') is-invalid @enderror" required>
                            <option id="nada" name="nada" value="">Selecione uma opção</option>
                            <option id="transporte" name="transporte" value="bicicleta">Bicileta</option>
                            <option id="transporte" name="transporte" value="pe">Caminhada</option>
                            <option id="transporte" name="transporte" value="familiar">Familiar</option>
                            <option id="transporte" name="transporte" value="onibus">Ônibus</option>
                            <option id="transporte" name="transporte" value="outros">Outros</option>
                          </select>
                          @error('transporte')
                          <div class="alert alert-danger">{{ $message }}</div>
                          @enderror
                        </div>
                      </div>

                      <div class="form-group">
                        {{ Form::label('cpf', 'CPF', array('class' => 'col-md-2 control-label required'))}}
                        <div class="col-md-2">
                          <input id="cpf" name="cpf" placeholder="000.000.000-00" class="form-control input-md cpf @error('cpf') is-invalid @enderror" required="true" type="text" maxlength="14">
                          @error('cpf')
                          <div class="alert alert-danger">{{ $message }}</div>
                          @enderror
                        </div>
                      </div>

                      <div class="form-group">
                        {{ Form::label('tipo_sanguineo', 'Tipo Sanguíneo', array('class' => 'col-md-5 control-label required'))}}
                        <div class="col-md-1">
                          <input id="tipo_sanguineo" name="tipo_sanguineo" type="text" placeholder="Ex.: O+" class="form-control input-md @error('tipo_sanguineo') is-invalid @enderror" required="true">
                          @error('tipo_sanguineo')
                          <div class="alert alert-danger">{{ $message }}</div>
                          @enderror
                        </div>
                      </div>

                      <div class="form-group">
                        {{ Form::label('apelido', 'Apelido', array('class' => 'col-md-5 control-label'))}}
                        <div class="col-md-4">
                          <input id="apelido" name="apelido" type="text" class="form-control input-md" >
                        </div>
                      </div>

                      <div class="form-group">
                        {{ Form::label('obs_napne', 'Observações NAPNE', array('class' => 'col-md-5 control-label')) }}
                        <div class="col-md-12">
                          <input id="	obs_napne" name="	obs_napne" type="text" class="form-control input-md">
                        </div>
                      </div>

                      <div class="form-group">
                        {{ Form::label('obs_medica', 'Observações Médicas', array('class' => 'col-md-5 control-label')) }}
                        <div class="col-md-12">
                          <input id="obs_medica" name="obs_medica" type="text" class="form-control input-md">
                        </div>
                      </div>

                      <div class="form-group">
                        {{ Form::label('obs_pedagogica', 'Observações Pedagógicas', array('class' => 'col-md-5 control-label')) }}
                        <div class="col-md-12">
                          <input id="obs_pedagogica" name="obs_pedagogica" type="text" class="form-control input-md">
                        </div>
                      </div>


                      <!-- Select Basic -->
                      <div class="form-group">
                        {{ Form::label('turma', 'Turma', array('class' => 'col-md-4 control-label required')) }}
                        <!--<label class="col-md-1 control-label" for="radios">Função<h11>*</h11></label>-->
                        <div class="col-md-4"> 
                          <select value='' id="turma_id" name="turma_id" class="form-control chosen-select @error('turma_id') is-invalid @enderror" required>
                            <option id="nada" name="nada" value="">Selecione uma opção</option>
                            @foreach($turmas as $turma)
                              <option value="{{ $turma->id }}">{{ $turma->codigo }}</option>
                            @endforeach
                          </select>
                          @error('turma')
                          <div class="alert alert-danger">{{ $message }}</div>
                          @enderror
                        </div>
                      </div>
                      <!-- Prepended text-->
                      <div class="form-group">
                        {{ Form::label('responsavel', 'Responsável', array('class' => 'col-md-8 control-label')) }}
                        <!--<label class="col-md-1 control-label" for="radios">Função<h11>*</h11></label>-->
                        <div class="col-md-8"> 
                          <select value='' id="responsavel" name="responsavel" class="form-control chosen-select">
                            <option id="nada" name="nada" value="">Selecione uma opção</option>
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
              <div class="col-md-12">
                {{ Form::submit('Cadastrar Aluno', ['class' => 'btn btn-success btn-block btn-lg']) }}
              </div>
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



