@extends('layouts.app')

@push('style')

<link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" crossorigin="anonymous" />
    

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
                <div class="card-header">Cadastro de Turma</div>
                <div class="card-body">
                  <div class="portlet-body table-responsive">
                    <table class="table" id="table">
                      <form action="{{ route('turmas.store')}}" method="POST" class="form-horizontal">
                        <fieldset>

                            <!-- Text input-->
                            <div class="form-group">
                              <label class="col-md-2 control-label" for="codTurma">Código<h11>*</h11></label>  
                              <div class="col-md-8 ">
                              <input id="codTurma" name="codTurma" placeholder="" class="form-control input-md" required="" type="text">
                              </div>
                            </div>

                            <!-- Select Basic -->
                            <div class="form-group">
                              <label class="col-md-2 control-label" for="Estado Civil">Curso<h11>*</h11></label>
                              <div class="col-md-2">
                                <select required id="Estado Civil" name="Estado Civil" class="form-control">
                                    <option value=""></option>
                                  <option value="curso1">TI</option>
                                  <option value="curso2">AGRO</option>
                                  <option value="curso3">ZOO</option>
                                </select>
                              </div>
                              </div>

                        </fieldset>
                      </form>
                    </table>
                  </div>
                  <button class="btn btn-success" type="Submit">Cadastrar</button>
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



