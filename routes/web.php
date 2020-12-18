<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/telacad', function () {
    return view('telaCad');
});

//Grupo de rotas de acesso para o CRUD SERVIDOR
Route::group(['prefix' => 'servidor'], function(){
    //Rota para abrir a dataTables com informações dos servidores
    Route::get('/show', [
        'as' => 'servidor.show',
        'uses' => 'ServersController@show'
    ]);
    //Rota para cadastro de Servidor.
    Route::get('/create', [
        'as' => 'servidor.create',
        'uses' => 'ServersController@create'
    ]);
    //Rota para persistência dos dados vindo do Form.
    Route::post('/create/new', [
        'as' => 'servidor.new',
        'uses' => 'ServersController@store'
    ]);
    //Rotas para atualizar dados servidor
    Route::get('/update/{id}', [
        'as' => 'servidor.update',
        'uses' => 'ServersController@update'
    ]);
    Route::put('/update/updateConf', [
        'as' => 'servidor.updateConf',
        'uses' => 'ServersController@updateConf'
    ]);
    //Rota para deletar Servidor
    Route::get('/delete/{id}', [
        'as' => 'servidor.delete',
        'uses' => 'ServersController@delete'
    ]);

});

//Grupo de Rotas do crud Turma
Route::resource('turmas', 'TurmaController');
Route::get('turmas/{id}/delete', 'TurmaController@destroy')->name('turmas.delete');


//Grupo de rotas de acesso para o CRUD Responsavels
Route::group(['prefix' => 'responsavel'], function(){
    //Rota para abrir a dataTables com informações dos responsaveles
    Route::get('/show', [
        'as' => 'responsavel.show',
        'uses' => 'ResponsavelsController@show'
    ]);
    //Rota para cadastro de responsavel.
    Route::get('/create', [
        'as' => 'responsavel.create',
        'uses' => 'ResponsavelsController@create'
    ]);
    //Rota para persistência dos dados vindo do Form.
    Route::post('/create/new', [
        'as' => 'responsavel.new',
        'uses' => 'ResponsavelsController@store'
    ]);
    //Rotas para atualizar dados responsavel
    Route::get('/update/{id}', [
        'as' => 'responsavel.update',
        'uses' => 'ResponsavelsController@update'
    ]);
    Route::put('/update/updateConf', [
        'as' => 'responsavel.updateConf',
        'uses' => 'ResponsavelsController@updateConf'
    ]);
    //Rota para deletar responsavel
    Route::get('/delete/{id}', [
        'as' => 'responsavel.delete',
        'uses' => 'ResponsavelsController@delete'
    ]);

});
//Grupos de Rotas para acesso ao CRUD Alunos.
Route::group(['prefix' => 'aluno'], function(){
    //Apresentação de todos alunos
    Route::get('/show', [
       'as' => 'aluno.show',
       'uses' => 'AlunosController@show' 
    ]);
    //Apresentação do Perfil do aluno
    Route::get('/perfil', [ 
        'as' => 'aluno.perfil',
        'uses' => 'AlunosController@perfil'
    ]);
    //Rota para abrir tela de cadastro de aluno
    Route::get('/create', [
        'as' => 'aluno.create',
        'uses' => 'AlunosController@create'
    ]);
    //Rota para salvar dados do formulário de cadastro de aluno.
    Route::post('/new', [
        'as' => 'aluno.new',
        'uses' => 'AlunosController@store'
    ]);
    //Rota para caregar dados do aluno para atualização.
    Route::get('/update/{id}', [
        'as' => 'aluno.update',
        'uses' => 'AlunosController@update'
    ]);
    //Rota para atualização dos dados do form do ALuno.
    Route::put('/update/updateConf', [
        'as' => 'aluno.updateConfirm',
        'uses' => 'AlunosController@updateConf'
    ]);
    //Rota para deletar um aluno da base de dados.
    Route::get('/delete/{id}', [
        'as' => 'aluno.delete',
        'uses' => 'AlunosController@delete'
    ]);
    //Rota para filtrar alunos por turma na apresentação.
    Route::post('/filter', [
        'as' => 'aluno.filter',
        'uses' => 'AlunosController@filterTurma'
    ]);
});

//Grupo de rotas de acesso para o CRUD Ocorrencias
Route::group(['prefix' => 'ocorrencia'], function(){
    //Rota para abrir a dataTables com informações dos ocorrencias
    Route::get('/show', [
        'as' => 'ocorrencia.show',
        'uses' => 'OcorrenciasController@show'
    ]);
    //Rota para cadastro de ocorrencia.
    Route::get('/create', [
        'as' => 'ocorrencia.create',
        'uses' => 'OcorrenciasController@create'
    ]);
    //Rota para persistência dos dados vindo do Form.
    Route::post('/create/new', [
        'as' => 'ocorrencia.new',
        'uses' => 'OcorrenciasController@store'
    ]);
    //Rotas para atualizar dados ocorrencia
    Route::get('/update/{id}', [
        'as' => 'ocorrencia.update',
        'uses' => 'OcorrenciasController@update'
    ]);
    Route::put('/update/updateConf', [
        'as' => 'ocorrencia.updateConf',
        'uses' => 'OcorrenciasController@updateConf'
    ]);
    //Rota para deletar ocorrencia
    Route::get('/delete/{id}', [
        'as' => 'ocorrencia.delete',
        'uses' => 'OcorrenciasController@delete'
    ]);

});

//Grupo de rotas de acesso para o CRUD Elogios
Route::group(['prefix' => 'elogio'], function(){
    //Rota para abrir a dataTables com informações dos elogios
    Route::get('/show', [
        'as' => 'elogio.show',
        'uses' => 'ElogiosController@show'
    ]);
    //Rota para cadastro de elogio.
    Route::get('/create', [
        'as' => 'elogio.create',
        'uses' => 'ElogiosController@create'
    ]);
    //Rota para persistência dos dados vindo do Form.
    Route::post('/create/new', [
        'as' => 'elogio.new',
        'uses' => 'ElogiosController@store'
    ]);
    //Rotas para atualizar dados elogio
    Route::get('/update/{id}', [
        'as' => 'elogio.update',
        'uses' => 'ElogiosController@update'
    ]);
    Route::put('/update/updateConf', [
        'as' => 'elogio.updateConf',
        'uses' => 'ElogiosController@updateConf'
    ]);
    //Rota para deletar elogio
    Route::get('/delete/{id}', [
        'as' => 'elogio.delete',
        'uses' => 'ElogiosController@delete'
    ]);

});