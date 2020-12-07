@extends('layouts.app')
@push('style')
<style>
  h11 {
    color: red;
  }

  #logo {
    width: 50%;
    height: 50%;
  }

  .panel-heading {
    font-size: 150%;
  }
</style>
@endpush
@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">Cadastro de Ocorrencia</div>
        <div class="card-body">
          <div class="portlet-body table-responsive">
            {{ Form::model($ocorrencia, ['route' => 'ocorrencia.updateConf', 'method' => 'PUT', 'files' => true, 'enctype' => 'multipart/form-data']) }}
            <table class="table" id="table">
              <fieldset>
                <input type="hidden" value="{{ $ocorrencia->id }}" name="id">
                <!-- Text input-->
                <div class="form-group">
                  {{ Form::label('disciplina', 'Disciplina *', array('class' => 'col-md-2 control-label')) }}
                  <div class="col-md-8 ">
                    {{ Form::text('disciplina', 'old'('disciplina'), ['class' => 'form-control input-md', 'required']) }}
                  </div>
                </div>

                <!-- Text input-->
                <div class="form-group">
                  {{ Form::label('data_ocorrencia', 'Data da Ocorrência *', array('class' => 'col-md-5 control-label')) }}
                  <div class="col-md-3">
                    {{ Form::date('data_ocorrencia', 'old'('data_ocorrencia'), ['class' => 'form-control input-md', 'required']) }}
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

                <div class="form-group">
                  {{ Form::label('relato', 'Relato', array('class' => 'col-md-5 control-label')) }}
                  <div class="col-md-12">
                    {{ Form::text('relato', 'old'('relato'), ['class' => 'form-control input-md']) }}
                  </div>
                </div>

                <!-- Button (Double) -->
              </fieldset>
              </form>
            </table>
            {{ Form::submit('Atualizar Ocorrencia', ['class' => 'btn btn-success']) }}
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