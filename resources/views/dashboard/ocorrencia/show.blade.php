@extends('layouts.app')

@push('style')

<link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" crossorigin="anonymous" />

@endpush
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Listagem de todos os ocorrencias cadastrados no sistema
                    <button type="submit" class="btn btn-primary btnp">
                        <!-- Redirecionando para a rota de cadastro -->
                        <div class="btn"> <a href="{{ route('ocorrencia.create') }}" id="btn">Cadastrar </a></div>
                    </button>
                </div>
                @include('flash::message')
                <div class="card-body">
                    <div class="portlet-body table-responsive">

                        <table class="table" id="table">
                            <thead>
                                <tr>
                                    <th>Turma</th>
                                    <th>Relato</th>
                                    <th>Atualizar</th>
                                    <th>Excluir</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($ocorrencias as $ocorrencia)
                                <tr class="active">
                                    <td>{{ @$ocorrencia->turma->codigo }}</td>
                                    <td>{{ $ocorrencia->relato }}</td>
                                    <td><a href="{{ route('ocorrencia.update', $ocorrencia->id) }}" class="btn btn-info btn-sm"> Atualizar
                                        </a>&ensp;</td>
                                    <td><a class="btn btn-danger btn-sm delete-confirm" href="{{ route('ocorrencia.delete', $ocorrencia->id) }}">
                                            Excluir </a></td>

                                </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('js')
<!--script do alert ao deletar-->
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="{{ asset('/js/jquery.min.js')  }}"></script>
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#table').DataTable({
            "language": {
                "lengthMenu": "Mostrando _MENU_ registros por página",
                "zeroRecords": "Nada encontrado",
                "info": "Mostrando página _PAGE_ de _PAGES_",
                "infoEmpty": "Nenhum registro disponível",
                "infoFiltered": "(filtrado de _MAX_ registros no total)",
                "sSearch": "Pesquisar",
                "oPaginate": {
                    "sFirst": "Primeiro",
                    "sPrevious": "Anterior",
                    "sNext": "Seguinte",
                    "sLast": "Último"
                }
            }

        });
    });
    //Função para mostrar alert ao clickar no botão deletar.
    $('.delete-confirm').on('click', function(event) {
        event.preventDefault();
        const url = $(this).attr('href');
        swal({
            title: 'Quer mesmo excluir essa Ocorrencia?',
            text: 'O Ocorrencia será excluído permanentemente.',
            icon: 'warning',
            buttons: ["Não", "Sim"],
        }).then(function(value) {
            if (value) {
                window.location.href = url;
            }
        });
    });
</script>

@endpush