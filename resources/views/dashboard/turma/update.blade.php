@extends('layouts.app')

@push('style')

<link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" crossorigin="anonymous" />
    
<style>

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
                      <form action="{{ Route('turmas.update', $turma->id) }}" method="post" class="form-horizontal">
                        @csrf
                        @method('put')
                        <!-- Text input-->
                        <div class="form-group">
                          <label class="col-md-2 control-label required" for="codigo">Código</label>  
                          <div class="col-md-8 ">
                          <input id="codigo" name="codigo" placeholder="" class="form-control input-md @error('codigo') is-invalid @enderror" required="" type="text" value="{{ $turma->codigo }}">
                          @error('codigo')
                            <div class="alert alert-danger">{{ $message }}</div>
                          @enderror
                          </div>
                        </div>
                        <!-- Select Basic -->
                        <div class="form-group">
                          <label class="col-md-2 control-label required" for="curso">Curso</label>
                          <div class="col-md-2">
                            <select required id="curso" name="curso" class="form-control @error('curso') is-invalid @enderror" aria-selected="">
                              <option value=""></option>
                              <option value="ti">TI</option>
                              <option value="agro">AGRO</option>
                              <option value="zoo">ZOO</option>
                            </select>
                            @error('curso')
                              <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                          </div>
                        </div>
                        <div class="col-md-12">
                          <button class="btn btn-success btn-block btn-lg" type="submit">Atualizar Turma</button>
                        </div>
                      </form>
                    </table>
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
    <script>
      var c = "<?php print $turma->curso; ?>";
        if(c === "ti")
          curso.selectedIndex = 1;
        else if(c === "agro")
          curso.selectedIndex = 2;
        else
          curso.selectedIndex = 3;
    </script>
@endpush    



