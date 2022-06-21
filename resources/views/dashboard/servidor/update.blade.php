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
                <div class="card-header">Cadastro de Servidor</div>
                <div class="card-body">
                  <div class="portlet-body table-responsive">
                  {{ Form::model($server, ['route' => 'servidor.updateConf', 'method' => 'PUT', 'files' => true, 'enctype' => 'multipart/form-data']) }}  
                  <table class="table" id="table">
                    
                        <fieldset>
                            <input type="hidden" value="{{ $server->id }}" name="id">
                            <!-- Text input-->
                            {{-- Nome do Servidor --}}
                            <div class="form-group">
                            {{ Form::label('nome', 'Nome', array('class' => 'col-md-2 control-label required')) }}
                              <!--<label class="col-md-2 control-label" for="Nome">Nome<h11>*</h11></label>  -->
                              <div class="col-md-8 ">
                                {{ Form::text('nome', 'old'('nome'), ['class' => 'form-control input-md', 'required']) }}
                              </div>
                            </div>

                            <!-- Text input-->
                            <div class="form-group">
                            {{ Form::label('siape', 'Siape', array('class' => 'col-md-5 control-label required'))}}
                              <!--<label class="col-md-5 control-label" >Siape<h11>*</h11></label>  -->
                              <div class="col-md-2">
                                  {{ Form::text('siape', 'old'('siape'), ['class' => 'form-control input-md', 'required']) }}
                            </div>
                        </div>
                            <div class="form-group">
                                {{ Form::label('funcao', 'Função', array('class' => 'col-md-5 control-label required'))}}
                                <!--<label class="col-md-1 control-label" for="radios">Função<h11>*</h11></label>-->
                                <div class="col-md-4"> 
                                    <select value='' id="funca" name="funcao" class="form-control chosen-select" required>
                                        @if($server->funcao == 'p')
                                        <option id="funcao" name="funcao" value="p">Professor</option>
                                        <option id="funcao" name="funcao" value="t">Técnico</option>
                                        @else
                                        <option id="funcao" name="funcao" value="t">Técnico</option>
                                        <option id="funcao" name="funcao" value="p">Professor</option>
                                        @endif
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                            {{ Form::label('email', 'E-mail', array('class' => 'col-md-5 control-label required') )}}
                            <!--<label class="col-md-5 control-label" for="profissao">Naturalidade<h11>*</h11></label>  -->
                              <div class="col-md-4">
                                {{ Form::email('email', 'old'('email'), ['class' => 'form-control input-md', 'required']) }}
                              </div>
                              </div>

                              <div class="form-group">
                              {{ Form::label('contato', 'Contato', array('class' => 'col-md-5 control-label required')) }}
                            <!--<label class="col-md-5 control-label" for="#">Município<h11>*</h11></label>  -->
                              <div class="col-md-4">
                                {{ Form::text('contato', 'old'('contato'), ['class' => 'form-control input-md', 'required  onkeypress="mask(this, mphone);" onblur="mask(this, mphone);"']) }}
                              </div>
                              </div>
                            </div>
                        </fieldset>
                          
                    </table>
                    <div class="col-md-12">
                      {{ Form::submit('Atualizar Servidor', ['class' => 'btn btn-success btn-block btn-lg']) }}
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



