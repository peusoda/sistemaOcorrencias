@extends('layouts.appLogin')

@section('title', 'Update de Usuário')

@section('body')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><b>{{ __('Atualização de Usuário') }}</b></div>
                @include('flash::message')
                <div class="card-body">
                    {{ Form::model($user, ['route' => 'users.update', 'method' => 'PUT', 'files' => true, 'enctype' => 'multipart/form-data']) }}
                    <input type="hidden" value="{{ $user->id }}" name="id">
                        @csrf
                        {{-- Nome do Usuário --}}
                        <div class="form-group row">
                            {{ Form::label('name', 'Nome *', array('class' => 'col-md-4 col-form-label text-md-right')) }}
                            <div class="col-md-6">
                                {{ Form::text('name', 'old'('name'), ['class' => 'form-control', 'required', 'autofocus']) }}
                            </div>
                        </div>
            
                        {{-- Email --}}
                        <div class="form-group row">
                            {{ Form::label('email', 'E-mail *', array('class' => 'col-md-4 col-form-label text-md-right')) }}
                            <div class="col-md-6">
                                {{ Form::email('email', 'old'('email'), ['class' => 'form-control', 'required', 'autofocus']) }}
                                
                                <!-- Classe que verifica o campo de email para vê se o mesmo possui @, verificar como funciona com o blade junto com o form control.
    
                                    class="form-control @error('name') is-invalid @enderror" 

                                -->
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        @if($user->tipo == 'aluno')
                        <div class="form-group row">
                            {{ Form::label('responsavel', 'Responsavel', array('class' => 'col-md-4 col-form-label text-md-right'))}}
                            <!--<label class="col-md-1 control-label" for="radios">Função<h11>*</h11></label>-->
                            <div class="col-md-6"> 
                                <select value='' id="responsavel" name="responsavel" class="form-control chosen-select">
                                    <option id="responsavel" name="responsavel" value="{{ $user->responsalvel_id }}">{{ $user->responsavel->nome }}</option>
                                </select>
                            </div>
                        </div>              
                        @endif
                        {{-- Senha do usuário --}}
                        <div class="form-group row">
                            {{ Form::label('senha', 'Senha *', array('class' => 'col-md-4 col-form-label text-md-right')) }}
                            <div class="col-md-6">
                                {{ Form::password('senha', 'old'('password'), ['class' => 'form-control', 'required', 'autofocus']) }}
                            </div>
                        </div>

                       
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button class="btn btn-success btn-block btn-lg" type="submit">Atualizar Usuário</button>
                            </div>
                        </div>
                    
                    {{ form::close() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
