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

});

//Grupo de Rotas do crud Turma
Route::resource('turmas', 'TurmaController');
Route::get('turmas/{id}/delete', 'TurmaController@destroy')->name('turmas.delete');