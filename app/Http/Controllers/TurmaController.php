<?php

namespace App\Http\Controllers;

use App\Models\Turma;

class TurmaController extends Controller
{
    public function getCadastroDeTurmas()
    {
        return view('turmas.cadastro-turmas');
    }

    public function postCadastroDeTurmas(Request $request)
    {
        try {
            $dados = $request->all();

            dd($dados);

            $dados['data_inicio'] = DateTime::createFromFormat('d/m/Y', $dados['data_aquisicao'])->format('Y-m-d');

            $dados['data_final'] = DateTime::createFromFormat('d/m/Y', $dados['data_final'])->format('Y-m-d');

            Turma::updateOrCreate(['id' => $dados['id']], $dados);

            return response()->json(
                [
                    'status'  => 'success',
                    'msg'     => 'Salvo com Sucesso!'
                ], 200);
        } catch (\Exception $e) {
            return response()->json(
                [
                    'status'  => 'error',
                    'msg'     => 'Erro ao cadastrar! ' . $e->getMessage()
                ], 200);
        }
    }

    public function getTurmas()
    {
        try {
            $dados = Turma::get();

            return response()->json($dados, 200);;
        } catch (\Exception $e) {
            return response()->json(
                [
                    'status'  => 'error',
                    'msg'     => 'Erro ao processar! ' . $e->getMessage()
                ], 200);
        }
    }

    public function getAlunosTurma($id)
    {
        try {
            $dados = Turma::with('hasMatriculas.hasAlunos')->find($id);

            return response()->json($dados, 200);;
        } catch (\Exception $e) {
            return response()->json(
                [
                    'status'  => 'error',
                    'msg'     => 'Erro ao processar! ' . $e->getMessage()
                ], 200);
        }
    }

    public function getInstrutoresTurma($id)
    {
        try {
            $dados = Turma::with('hasInstrutores')->find($id);

            return response()->json($dados, 200);;
        } catch (\Exception $e) {
            return response()->json(
                [
                    'status'  => 'error',
                    'msg'     => 'Erro ao processar! ' . $e->getMessage()
                ], 200);
        }
    }
    
}