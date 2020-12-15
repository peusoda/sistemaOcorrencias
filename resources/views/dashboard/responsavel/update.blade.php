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
        <div class="card-header">Cadastro de Responsável</div>
        <div class="card-body">
          <div class="portlet-body table-responsive">
            {{ Form::model($responsavel, ['route' => 'responsavel.updateConf', 'method' => 'PUT', 'files' => true, 'enctype' => 'multipart/form-data']) }}
            <table class="table" id="table">

              <fieldset>
                <input type="hidden" value="{{ $responsavel->id }}" name="id">
                <!-- Text input-->
                {{-- Nome do Responsavel --}}
                <div class="form-group">
                  {{ Form::label('nome', 'Nome', array('class' => 'col-md-2 control-label required')) }}
                  <div class="col-md-8 ">
                    {{ Form::text('nome', 'old'('nome'), ['class' => 'form-control input-md', 'required']) }}
                  </div>
                </div>

                <div class="form-group">
                  {{ Form::label('cpf', 'Cpf', array('class' => 'col-md-5 control-label required') )}}
                  <div class="col-md-4">
                    {{ Form::text('cpf', 'old'('cpf'), ['class' => 'form-control input-md', 'required']) }}
                  </div>
                </div>

                <div class="form-group">
                  {{ Form::label('email', 'E-mail', array('class' => 'col-md-5 control-label required') )}}
                  <div class="col-md-4">
                    {{ Form::email('email', 'old'('email'), ['class' => 'form-control input-md', 'required']) }}
                  </div>
                </div>

                <div class="form-group">
                  {{ Form::label('contato_1', 'Contato', array('class' => 'col-md-5 control-label required')) }}
                  <div class="col-md-4">
                    {{ Form::text('contato_1', 'old'('contato_1'), ['class' => 'form-control input-md', 'required']) }}
                  </div>
                </div>

                <div class="form-group">
                  {{ Form::label('contato_2', 'Contato', array('class' => 'col-md-5 control-label required')) }}
                  <div class="col-md-4">
                    {{ Form::text('contato_2', 'old'('contato_2'), ['class' => 'form-control input-md', 'required']) }}
                  </div>
                </div>
          </div>
          </fieldset>

          </table>
          <div class="col-md-12">
            {{ Form::submit('Atualizar Responsável', ['class' => 'btn btn-success btn-block btn-lg']) }}
          </div>
          {{ form::close() }}
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