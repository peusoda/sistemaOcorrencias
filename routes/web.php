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