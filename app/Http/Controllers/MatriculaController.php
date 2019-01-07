<?php

namespace App\Http\Controllers;

use App\Models\Matricula;

class MatriculaController extends Controller
{
    public function getCadastroDeMatriculas()
    {
        return view('alunos.cadastro-alunos');
    }

    public function postCadastroDeMatriculas(Request $request)
    {

    }

    public function getMatriculas()
    {
        try {
            $dados = Matricula::get();

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