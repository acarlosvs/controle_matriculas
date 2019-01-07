<?php

namespace App\Http\Controllers;

use App\Models\Aluno;

class AlunoController extends Controller
{
    public function getCadastroDeAlunos()
    {
        return view('alunos.cadastro-alunos');
    }

    public function postCadastroDeAlunos(Request $request)
    {

    }

    public function getAlunos()
    {
        try {
            $dados = Aluno::get();

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