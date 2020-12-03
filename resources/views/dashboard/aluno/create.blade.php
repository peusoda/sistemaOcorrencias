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
                  {{ Form::open(['route' => 'servidor.new', 'method' => 'POST', 'files' => true, 'enctype' => 'multipart/form-data']) }}  
                    <table class="table" id="table">
                        <fieldset>

                            <!-- Text input-->
                            <div class="form-group">
                              {{ Form::label('nome', 'Nome *', array('class' => 'col-md-2 control-label')) }}
                              <div class="col-md-8 ">
                              <input id="Nome" name="Nome" placeholder="insira o nome do aluno" class="form-control input-md" required="true" type="text">
                              </div>
                            </div>

                            <!-- Text input-->
                            <div class="form-group">
                            {{ Form::label('data_nascimento', 'Data de Nascimento *', array('class' => 'col-md-5 control-label')) }}
                              <div class="col-md-2">
                              <input id="dtnasc" name="dtnasc" placeholder="DD/MM/AAAA" class="form-control input-md" required="true" type="text" maxlength="10" OnKeyPress="formatar('##/##/####', this)" onBlur="showhide()">
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
                              <input id="#" name="#" type="text" placeholder="Rubim" class="form-control input-md" required="true">
                              </div>
                              </div>

                              <div class="form-group">
                              {{ Form::label('municipio', 'Município *', array('class' => 'col-md-5 control-label'))}}
                              <div class="col-md-4">
                              <input id="#" name="#" type="text" placeholder="Rubim" class="form-control input-md" required="">
                              </div>
                              </div>

                              <div class="form-group">
                              {{ Form::label('transporte', 'Transporte *', array('class' => 'col-md-5 control-label'))}}
                              <div class="col-md-4"> 
                                    <select value='' id="transporte" name="transporte" class="form-control chosen-select" required>
                                        <option id="nada" name="nada" value="">Selecione um transporte</option>
                                        <option id="sexo" name="sexo" value="bicicleta">Bicileta</option>
                                        <option id="transporte" name="transporte" value="pe">Caminhada</option>
                                        <option id="sexo" name="sexo" value="familiar">Familiar</option>
                                        <option id="sexo" name="sexo" value="onibus">Ônibus</option>
                                        <option id="transporte" name="transporte" value="outros">Outros</option>
                                    </select>
                                </div>
                              </div>

                              <div class="form-group">
                              {{ Form::label('cpf', 'CPF *', array('class' => 'col-md-2 control-label'))}}
                              <div class="col-md-2">
                              <input id="cpf" name="cpf" placeholder="121.454.555-45" class="form-control input-md" required="true" type="text" maxlength="14">
                              </div>
                            </div>

                            <div class="form-group">
                            {{ Form::label('tipo_saguineo', 'Tipo Sanguíneo *', array('class' => 'col-md-5 control-label'))}}
                              <div class="col-md-1">
                              <input id="#" name="#" type="text" placeholder="O" class="form-control input-md" required="">
                              </div>
                              </div>

                              <div class="form-group">
                              {{ Form::label('apelido', 'Apelido', array('class' => 'col-md-5 control-label'))}}
                              <div class="col-md-4">
                              <input id="#" name="#" type="text" placeholder="" class="form-control input-md" required="">
                              </div>
                              </div>

                              <div class="form-group">
                              {{ Form::label('observacao', 'Observações', array('class' => 'col-md-5 control-label'))}}
                              <div class="col-md-12">
                              <input id="profissao" name="profissao" type="text" placeholder="" class="form-control input-md" required="">
                              </div>
                              </div>

                              <div class="form-group">
                            <label class="col-md-5 control-label" for="profissao">Observações Médicas</label>  
                              <div class="col-md-12">
                              <input id="profissao" name="profissao" type="text" placeholder="" class="form-control input-md" required="">
                              </div>
                              </div>

                              <div class="form-group">
                            <label class="col-md-5 control-label" for="profissao">Observações Pedagógicas</label>  
                              <div class="col-md-12">
                              <input id="profissao" name="profissao" type="text" placeholder="" class="form-control input-md" required="">
                              </div>
                              </div>


                            <!-- Select Basic -->
                            <div class="form-group">
                              <label class="col-md-2 control-label" for="Estado Civil">Turma<h11>*</h11></label>
                              <div class="col-md-2">
                                <select required id="Estado Civil" name="Estado Civil" class="form-control">
                                    <option value=""></option>
                                  <option value="turma">TI 0118</option>
                                  <option value="turma">TI 0119</option>
                                  <option value="turma">TI 0120</option>
                                  <option value="turma">AGRO 0118</option>
                                  <option value="turma">AGRO 0119</option>
                                  <option value="turma">AGRO 0120</option>
                                  <option value="turma">ZOO 0118</option>
                                  <option value="turma">ZOO 0119</option>
                                  <option value="turma">ZOO 0120</option>
                                </select>
                              </div>
                              </div>
                            <!-- Prepended text-->
                            <div class="form-group">
                                {{ Form::label('responsavel', 'Responsável *', array('class' => 'col-md-8 control-label'))}}
                                <!--<label class="col-md-1 control-label" for="radios">Função<h11>*</h11></label>-->
                                <div class="col-md-8"> 
                                    <select value='' id="responsavel" name="responsavel" class="form-control chosen-select" required>
                                        <option id="nada" name="nada" value="">Selecione um responsável</option>
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
@endpush    



