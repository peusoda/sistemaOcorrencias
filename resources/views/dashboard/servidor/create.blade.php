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
                <div class="card-header"><strong>Cadastro de Servidor</strong></div>
                <div class="card-body">
                  <div class="portlet-body table-responsive">
                  {{ Form::open(['route' => 'servidor.new', 'method' => 'POST', 'files' => true, 'enctype' => 'multipart/form-data']) }}  
                  <table class="table" id="table">
                    
                        <fieldset>

                            <!-- Text input-->
                            {{-- Nome do Servidor --}}
                            <div class="form-group">
                            {{ Form::label('nome', 'Nome do servidor', array('class' => 'col-md-2 control-label required')) }}
                              <!--<label class="col-md-2 control-label" for="Nome">Nome<h11>*</h11></label>  -->
                              <div class="col-md-8 ">
                              <input id="nome" name="nome" class="form-control input-md" required="true" type="text">
                              </div>
                            </div>

                            <!-- Text input-->
                            <div class="form-group">
                            {{ Form::label('siape', 'Siape', array('class' => 'col-md-5 control-label required'))}}
                              <!--<label class="col-md-5 control-label" >Siape<h11>*</h11></label>  -->
                              <div class="col-md-2">
                              <input id="siape" name="siape" class="form-control input-md" required="true" type="text">
                            </div>
                        </div>
                            <div class="form-group">
                                {{ Form::label('funcao', 'Função', array('class' => 'col-md-5 control-label required'))}}
                                <!--<label class="col-md-1 control-label" for="radios">Função<h11>*</h11></label>-->
                                <div class="col-md-4"> 
                                    <select value='' id="funca" name="funcao" class="form-control chosen-select" required>
                                        <option id="nada" name="nada" value="">Selecione uma opção</option>
                                        <option id="funcao" name="funcao" value="p">Professor</option>
                                        <option id="funcao" name="funcao" value="t">Técnico</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                            {{ Form::label('email', 'E-mail', array('class' => 'col-md-5 control-label required') )}}
                            <!--<label class="col-md-5 control-label" for="profissao">Naturalidade<h11>*</h11></label>  -->
                              <div class="col-md-4">
                              <input id="email" name="email" type="email" class="form-control input-md" required value="{{ old('codigo') }}">
                              </div>
                              </div>

                              <div class="form-group">
                              {{ Form::label('contato', 'Contato', array('class' => 'col-md-5 control-label required')) }}
                            <!--<label class="col-md-5 control-label" for="#">Município<h11>*</h11></label>  -->
                              <div class="col-md-4">
                              <input id="contato" name="contato" type="text" class="form-control input-md" required onkeypress="mask(this, mphone);" onblur="mask(this, mphone);" value="{{ old('contato') }}">
                              </div>
                              </div>
                            </div>
                        </fieldset>
                          
                    </table>
                    <div class="col-md-12">
                        {{ Form::submit('Cadastrar Servidor', ['class' => 'btn btn-success btn-block btn-lg']) }}
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



