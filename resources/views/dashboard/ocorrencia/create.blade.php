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
                <div class="card-header">Cadastro de Ocorrência</div>
                <div class="card-body">
                  <div class="portlet-body table-responsive">
                  {{ Form::open(['route' => 'ocorrencia.new', 'method' => 'POST', 'files' => true, 'enctype' => 'multipart/form-data']) }}  
                    <table class="table" id="table">
                        <fieldset>

                            <!-- Text input-->
                            <div class="form-group">
                              {{ Form::label('disciplina', 'Disciplina *', array('class' => 'col-md-2 control-label')) }}
                              <div class="col-md-8 ">
                              <input id="disciplina" name="disciplina" placeholder="insira a disciplina da ocorrência" class="form-control input-md" required="true" type="text">
                              </div>
                            </div>

                            <!-- Text input-->
                            <div class="form-group">
                            {{ Form::label('data_ocorrencia', 'Data da Ocorrência *', array('class' => 'col-md-3 control-label')) }}
                              <div class="col-md-3">
                              <input id="data_ocorrencia" name="data_ocorrencia" placeholder="DD/MM/AAAA" class="form-control input-md" required="true" type="date" maxlength="10" OnKeyPress="formatar('##/##/####', this)" onBlur="showhide()">
                            </div>
                          </div>
                          
                          <!-- Select Basic -->
                          <div class="form-group">
                              {{ Form::label('turma', 'Turma *', array('class' => 'col-md-4 control-label')) }}
                              <!--<label class="col-md-1 control-label" for="radios">Função<h11>*</h11></label>-->
                              <div class="col-md-4"> 
                                  <select value='' id="turma_id" name="turma_id" class="form-control chosen-select" required>
                                      <option id="nada" name="nada" value="">Selecione uma turma</option>
                                      @foreach($turmas as $turma)
                                        <option value="{{ $turma->id }}">{{ $turma->codigo }}</option>
                                      @endforeach
                                  </select>
                              </div>
                          </div>

                          <div class="form-group">
                            {{ Form::label('relato', 'Relato sobre a Ocorrência', array('class' => 'col-md-5 control-label')) }}
                            <div class="col-md-12">
                            <input id="relato" name="relato" type="text" placeholder="insira as observações sobre a Ocorrência" class="form-control input-md">
                            </div>
                          </div>

                            <!-- Button (Double) -->
                        </fieldset>
                      </form>
                    </table>
                    {{ Form::submit('Cadastrar Ocorrencia', ['class' => 'btn btn-success']) }}
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



