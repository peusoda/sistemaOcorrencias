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
                        {{ Form::open(['route' => 'responsavel.new', 'method' => 'POST', 'files' => true, 'enctype' => 'multipart/form-data']) }}
                        <table class="table" id="table">

                            <fieldset>

                                <!-- Text input-->
                                {{-- Nome do Responsavel --}}
                                <div class="form-group">
                                    {{ Form::label('nome', 'Nome *', array('class' => 'col-md-2 control-label')) }}
                                    <!--<label class="col-md-2 control-label" for="Nome">Nome<h11>*</h11></label>  -->
                                    <div class="col-md-8 ">
                                        <input id="nome" name="nome" placeholder="Nome" class="form-control input-md" required="true" type="text">
                                    </div>
                                </div>

                                <div class="form-group">
                                    {{ Form::label('cpf', 'CPF *', array('class' => 'col-md-5 control-label') )}}
                                    <!--<label class="col-md-5 control-label" for="profissao">Naturalidade<h11>*</h11></label>  -->
                                    <div class="col-md-4">
                                        <input id="cpf" name="cpf" type="text" placeholder="Digite o seu cpf" class="form-control input-md" required="true">
                                    </div>
                                </div>

                                <div class="form-group">
                                    {{ Form::label('email', 'E-mail *', array('class' => 'col-md-5 control-label') )}}
                                    <!--<label class="col-md-5 control-label" for="profissao">Naturalidade<h11>*</h11></label>  -->
                                    <div class="col-md-4">
                                        <input id="email" name="email" type="email" placeholder="Digite o seu e-mail" class="form-control input-md" required="true">
                                    </div>
                                </div>

                                <div class="form-group">
                                    {{ Form::label('contato_1', 'Contato 1*', array('class' => 'col-md-5 control-label')) }}
                                    <!--<label class="col-md-5 control-label" for="#">Município<h11>*</h11></label>  -->
                                    <div class="col-md-4">
                                        <input id="contato_1" name="contato_1" type="text" placeholder="" class="form-control input-md" required="" true>
                                    </div>
                                </div>

                                <div class="form-group">
                                    {{ Form::label('contato_2', 'Contato 2*', array('class' => 'col-md-5 control-label')) }}
                                    <!--<label class="col-md-5 control-label" for="#">Município<h11>*</h11></label>  -->
                                    <div class="col-md-4">
                                        <input id="contato_2" name="contato_2" type="text" placeholder="" class="form-control input-md">
                                    </div>
                                </div>
                    </div>
                    </fieldset>

                    </table>
                    {{ Form::submit('Cadastrar Responsavel', ['class' => 'btn btn-success']) }}
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