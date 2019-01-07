<?php

use Illuminate\Database\Seeder;
use App\Models\Aluno;

class AlunosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('alunos')->delete();

        Aluno::create([
            'id' 			  => '1',
            'cpf' 			  => '11122233344',
            'nome'  		  => 'Joao de deus',
            'email' 		  => 'joao@deus.com',
            'fone'  		  => '651232222',
            'data_nascimento' => '1990-07-04',
        ]);

        Aluno::create([
            'id' 			  => '2',
            'cpf' 			  => '55566633399',
            'nome'  		  => 'Maria de Jesus',
            'email' 		  => 'maria@jesus.com',
            'fone'  		  => '98525455',
            'data_nascimento' => '1994-07-05',
        ]);

        Aluno::create([
            'id' 			  => '3',
            'cpf' 			  => '88899977766',
            'nome'  		  => 'Pedro Augusto',
            'email' 		  => 'pedro@augusto.com',
            'fone'  		  => '9851254552',
            'data_nascimento' => '1997-01-05',
        ]);

        Aluno::create([
            'id' 			  => '4',
            'cpf' 			  => '44477711122',
            'nome'  		  => 'Sonia Gomes',
            'email' 		  => 'sonia@gomes.com',
            'fone'  		  => '98545125',
            'data_nascimento' => '2000-07-04',
        ]);

        Aluno::create([
            'id' 			  => '5',
            'cpf' 			  => '88877744499',
            'nome'  		  => 'Luana Souto',
            'email' 		  => 'luana@souto.com',
            'fone'  		  => '984545121',
            'data_nascimento' => '2001-08-01',
        ]);
    }
}