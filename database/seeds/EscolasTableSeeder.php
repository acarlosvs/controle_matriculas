<?php

use Illuminate\Database\Seeder;
use App\Models\Escola;

class EscolasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('escolas')->delete();

        Escola::create([
            'id' 		   => '1',
            'nome'  	   => 'Instituição Teste',
            'endereco'     => 'Rua Teste',
            'razao_social' => 'Razão Social Teste',
            'telefone' 	   => '(98) 3223-3636',
            'cep'		   => '65066270',
        ]);
    }
}
