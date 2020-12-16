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

Route::get('/dashboard', [
    'as' => 'dash.show',
    'uses' => 'DashController@redirect'
]);

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => 'auth'], function(){
    Route::get('criar', function(){
        return view('perguntas.create');
    });
    Route::post('salvar', [
        'as' => 'salvar',
        'uses' => 'PerguntasController@store'
    ]);
    Route::get('show', [
        'as' => 'show',
        'uses' => 'PerguntasController@show'
    ]);
    Route::get('editar/{id}', [
        'as' => 'editar',
        'uses' => 'PerguntasController@editar'
    ]);
    Route::post('{id}/salvar', [
        'as' => 'atualizar',
        'uses' => 'PerguntasController@update'
    ]);
    Route::get('apagar/{id}', [
        'as' => 'apagar',
        'uses' => 'PerguntasController@apagar'
    ]);
    Route::get('apagarjs/{id}', [
        'as' => 'apagarjs',
        'uses' => 'RepostasController@apagar'
    ]);
    Route::get('editarjs/{id}', [
        'as' => 'editarjs',
        'uses' => 'RepostasController@editar'
    ]);
    Route::post('{id}/salvarjs', [
        'as' => 'atualizarjs',
        'uses' => 'RepostasController@update'
    ]);
});
