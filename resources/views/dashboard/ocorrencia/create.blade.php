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
  img {
    max-width:70px;
    max-height:70px;
    width: auto;
    height: auto;
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
              <img src="" id="img"><br>
                    <div class="form-group">
                      {{ Form::label('imgOco', 'Imagem da ocorrencia', array('class' => 'col-md-2')) }}
                      <div class="col-md-6">
                        <input type="file" 
                        class="form-control"
                        name="imgOco"
                        id="imgOco"
                        onchange=" verificaExtensao(this); preview(event)"
                        accept="image/*"
                        capture="environment"
                        >
                      </div>
                    </div>
             <!-- Select Basic -->
             <div class="form-group">
                {{ Form::label('motivo', 'Motivo da Ocorrência', array('class' => 'col-md-12 control-label required')) }}
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
                {{ Form::label('disciplina', 'Disciplina', array('class' => 'col-md-2 control-label required')) }}
                <div class="col-md-8 ">
                  <input id="disciplina" name="disciplina" placeholder="insira a disciplina da ocorrência" class="form-control input-md" required="true" type="text">
                </div>
              </div>

              <!-- Text input-->
              <div class="form-group">
                {{ Form::label('data_ocorrencia', 'Data da Ocorrência', array('class' => 'col-md-3 control-label required')) }}
                <div class="col-md-3">
                  <input id="data_ocorrencia" name="data_ocorrencia" placeholder="DD/MM/AAAA" class="form-control input-md" required="true" type="date" maxlength="10" OnKeyPress="formatar('##/##/####', this)" onBlur="showhide()">
                </div>
              </div>

              <div class="form-group">
                {{ Form::label('relato', 'Relato sobre a Ocorrência', array('class' => 'col-md-5 control-label required')) }}
                <div class="col-md-12">
                  <input id="relato" name="relato" type="text" placeholder="insira as observações sobre a Ocorrência" class="form-control input-md">
                </div>
              </div>

              <!-- Select Basic -->
              <div class="form-group">
                {{ Form::label('turma', 'Turma', array('class' => 'col-md-4 control-label required')) }}
                <!--<label class="col-md-1 control-label" for="radios">Função<h11>*</h11></label>-->
                <div class="col-md-4">
                  <select value='' id="turma_id" name="turma_id" class="form-control chosen-select" required>
                    <option id="nada" name="nada" value="">Selecione uma opção</option>
                    @foreach($turmas as $turma)
                    <option value="{{ $turma->id }}">{{ $turma->codigo }}</option>
                    @endforeach
                  </select>
                </div>
              </div>

                <table class="table display" id="table" cellspacing="0" width="100%" style="display: none">
                  <label for="relato" class="col-md-5 control-label required table" style="display: none">Selecione os alunos:</label>
                  <thead>
                    <tr>
                      <th style="width: 10px;"><input type="checkbox" id="checkTodos" name="checkTodos"></th>
                      <th></th>
                      <th>Nome</th>
                      <th>Turma</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($alunos as $aluno)
                    <tr class="active" value="{{ $aluno->id }}">
                      <td style="width: 100x;">&nbsp;&nbsp;<input  type="checkbox" name="checkbox[{{ $aluno->id }}]" value="{{ $aluno->id }}"></td>
                      <td style="width: 100x;"><img src="{{ asset('storage/alunos/'.$aluno->id.'/'.$aluno->image) }}" id="img" alt=""></td>
                      <td>{{ $aluno->nome }}</td>
                      <td>{{ $aluno->turma->codigo }}</td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              <!-- Button (Double) -->
            </fieldset>
            <div class="col-md-12">
              {{ Form::submit('Cadastrar Ocorrência', ['class' => 'btn btn-success btn-block btn-lg']) }}
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

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="{{ asset('/js/jquery.min.js')  }}"></script>
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="//gyrocode.github.io/jquery-datatables-checkboxes/1.2.12/js/dataTables.checkboxes.min.js"></script>
<script>
 $(document).ready(function (){
   var table = $('#table').DataTable({
    "language": {
                "lengthMenu": "Mostrando _MENU_ registros por página",
                "zeroRecords": "Nada encontrado",
                "info": " ",
                "infoEmpty": "Nenhum registro disponível",
                "infoFiltered": "(filtrado de _MAX_ registros no total)",
                "sSearch": "Pesquisar",
                "oPaginate": {
                    "sFirst": "Primeiro",
                    "sPrevious": "Anterior",
                    "sNext": "Seguinte",
                    "sLast": "Último"
                }
            },
            paging: false,
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
    table.search(this.selectedOptions[0].textContent).draw();  
    $(".table").show();

  });

});

$("#checkTodos").click(function(){
   	 $('input:checkbox').prop('checked', $(this).prop('checked'));
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