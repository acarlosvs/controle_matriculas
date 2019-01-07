<?php

namespace App\Http\Controllers;

use App\Models\Escola;

class EscolaController extends Controller
{
    public function getEscolas()
    {
        try {
            $dados = Escola::first();

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