<?php

namespace App\Http\Controllers;

use App\Models\Instrutor;

class InstrutorController extends Controller
{
    public function getCadastroDeInstrutor()
    {
        return view('alunos.cadastro-alunos');
    }

    public function postCadastroDeInstrutor(Request $request)
    {

    }

    public function getInstrutores()
    {
        try {
            $dados = Instrutor::get();

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