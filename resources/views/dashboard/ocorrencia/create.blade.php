@extends('layouts.app')
@push('style')
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" crossorigin="anonymous" />
<link rel="stylesheet" href="{{ asset('/js/select2/select2.min.css')  }}" crossorigin="anonymous" />

<style>
  .select2-container {
    width: 100% !important;
    padding: 0;
  }
  h11 {
    color: red;
  }

  #logo {
    width: 50%;
    height: 50%;
  }

  table.dataTable tr th.select-checkbox.selected::after {
    content: "✔";
    margin-top: -11px;
    margin-left: -4px;
    text-align: center;
    text-shadow: rgb(176, 190, 217) 1px 1px, rgb(176, 190, 217) -1px -1px, rgb(176, 190, 217) 1px -1px, rgb(176, 190, 217) -1px 1px;
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
        <div class="card-header">Cadastro de Ocorrência</div>
        <div class="card-body">
          <div class="portlet-body table-responsive">
            {{ Form::open(['route' => 'ocorrencia.new','id' => 'form', 'method' => 'POST', 'files' => true, 'enctype' => 'multipart/form-data']) }}
            <fieldset>

             <!-- Select Basic -->
             <div class="form-group">
                {{ Form::label('motivo', 'Motivo da Ocorrência *', array('class' => 'col-md-12 control-label')) }}
                <!--<label class="col-md-1 control-label" for="radios">Função<h11>*</h11></label>-->
                <div class="col-md-12">
                  <select value='' id="tipo_id" name="tipo_id"  class="form-control chosen-select" required>
                    <option id="nada" name="nada" value="">Selecione o motivo</option>
                    @foreach($tipos as $motivo)
                    <option value="{{ $motivo->id }}">{{ $motivo->descricao }}</option>
                    @endforeach
                  </select>
                </div>
              </div>

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

                <table class="table display" id="table" cellspacing="0" width="100%">
                  <thead>
                    <tr>
                      <th></th>
                      <th>Nome</th>
                      <th>Turma</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($alunos as $aluno)
                    <tr class="active" value="{{ $aluno->id }}">
                      <td><input  type="checkbox" name="checkbox[{{ $aluno->id }}]" value="{{ $aluno->id }}"></td>
                      <td>{{ $aluno->nome }}</td>
                      <td>{{ $aluno->turma->codigo }}</td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              <!-- Button (Double) -->
            </fieldset>
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

<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="//gyrocode.github.io/jquery-datatables-checkboxes/1.2.12/js/dataTables.checkboxes.min.js"></script>
<script>
 $(document).ready(function (){
   var table = $('#table').DataTable({
    /*'columnDefs': [
         {
            'targets': 0,
            'checkboxes': {
               'selectRow': true
            }
         }
      ],
      'select': {
         'style': 'multi'
      },
      'order': [[1, 'asc']],*/
      dom: 'lrtip'

   });

   $(".dataTables_filter").hide();

   $('#turma_id').on('change', function(){
    table.search(this.value).draw();   
  });

});

$(document).ready(function () {
      $('[name=tipo_id]').select2({
            theme: 'bootstrap4',
            width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
            placeholder: $(this).data('placeholder'),
            allowClear: Boolean($(this).data('allow-clear')),
        });
    });
    
</script>
@endpush