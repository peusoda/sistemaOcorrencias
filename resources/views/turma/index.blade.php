@extends('layouts.app')

@push('style')

    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" crossorigin="anonymous" />

@endpush
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Turmas cadastrados no sistema
                    <button type="submit" class="btn btn-primary btnp">
                        <div class="btn"> <a href="{{ asset('turmas/create') }}" id="btn">Cadastrar </a></div>
                    </button>
                </div>
                <div class="card-body">
                   <div class="portlet-body table-responsive">
                   
                    <table class="table" id="table">
                        <thead>
                            <tr>
                                <th>Código</th>
                                <th>Curso</th>
                                <th>Update</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                            <tr class="active">
                                <td>x</td>
                                <td>x</td>
                                <td><a class="btn btn-info btn-sm" href="#"> Atualizar</a></td>
                                <td><a class="btn btn-danger btn-sm delete-confirm" href="#">Excluir</a></td>
                            </tr>
                            

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
<script src="{{ asset('/js/jquery.min.js')  }}"></script>
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script type="text/javascript">
    $(document).ready( function () {
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
    } );
</script>

@endpush