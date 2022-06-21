@extends('layouts.appLogin')

@section('body')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><strong>{{ __('Cadastrar novo usuário') }}</strong></div>

                <div class="card-body">
                    <form method="POST" action="{{ route('users.store') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nome') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            {{ Form::label('responsavel', 'Responsavel', array('class' => 'col-md-4 col-form-label text-md-right'))}}
                            <!--<label class="col-md-1 control-label" for="radios">Função<h11>*</h11></label>-->
                            <div class="col-md-6"> 
                                <select value='' id="responsavel" name="responsavel" class="form-control chosen-select">
                                    <option id="nada" name="nada" value="">Selecione uma opção</option>
                                    @foreach($responsaveis as $responsavel)
                                        <option id="responsavel" name="responsavel" value="{{ $responsavel->id }}">{{ $responsavel->nome }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            {{ Form::label('tipoUsuario', 'Tipo de Usuário', array('class' => 'col-md-4 col-form-label text-md-right'))}}
                            <!--<label class="col-md-1 control-label" for="radios">Função<h11>*</h11></label>-->
                            <div class="col-md-6"> 
                                <select value='' id="tipo" name="tipo" class="form-control chosen-select" required>
                                <option id="nada" name="nada" value="">Selecione uma opção</option>
                                <option id="tipo" name="tipo" value="admin">Administrador</option>
                                <option id="tipo" name="tipo" value="servidor">Servidor</option>
                                <option id="tipo" name="tipo" value="responsavel">Responsável</option>
                                <option id="tipo" name="tipo" value="aluno">Aluno</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Senha') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirme a senha') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn2 btn-primary">
                                    {{ __('Cadastrar') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
