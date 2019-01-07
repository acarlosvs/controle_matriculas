<?php

namespace App\Http\Controllers;

use App\Models\Curso;

class CursoController extends Controller
{
    public function getCadastroDeCursos()
    {
        return view('alunos.cadastro-alunos');
    }

    public function postCadastroDeCursos(Request $request)
    {

    }

    public function getCursos()
    {
        try {
            $dados = Curso::get();

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