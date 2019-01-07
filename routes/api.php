<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/alunos/api-lista', 'AlunoController@getAlunos');

Route::get('/escolas/api-lista', 'EscolaController@getEscolas');

Route::get('/cursos/api-lista', 'CursoController@getCursos');

Route::get('/instrutores/api-lista', 'InstrutorController@getInstrutores');

Route::get('/matriculas/api-lista', 'MatriculaController@getMatriculas');

Route::group(['prefix'=> 'turmas'], function(){
    Route::get('/api-lista', 'TurmaController@getTurmas');
    Route::get('/alunos-turma/{id}', 'TurmaController@getAlunosTurma');
    Route::get('/instrutores-turma/{id}', 'TurmaController@getInstrutoresTurma');
});