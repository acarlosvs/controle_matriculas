<?php

use Illuminate\Database\Seeder;
use App\Models\Matricula;

class MatriculasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('matriculas')->delete();

        Matricula::create([
            'id' 		     => '1',
            'turmas_id'		 => '1',
            'alunos_id'		 => '1',
            'data_matricula' => '2018-01-01',
        ]);

        Matricula::create([
            'id' 		     => '2',
            'turmas_id'		 => '1',
            'alunos_id'		 => '2',
            'data_matricula' => '2018-01-01',
        ]);

        Matricula::create([
            'id' 		     => '3',
            'turmas_id'		 => '2',
            'alunos_id'		 => '1',
            'data_matricula' => '2018-01-02',
        ]);

        Matricula::create([
            'id' 		     => '4',
            'turmas_id'		 => '2',
            'alunos_id'		 => '3',
            'data_matricula' => '2018-01-05',
        ]);

        Matricula::create([
            'id' 		     => '5',
            'turmas_id'		 => '3',
            'alunos_id'		 => '1',
            'data_matricula' => '2018-06-01',
        ]);

        Matricula::create([
            'id' 		     => '6',
            'turmas_id'		 => '3',
            'alunos_id'		 => '2',
            'data_matricula' => '2018-01-07',
        ]);

        Matricula::create([
            'id' 		     => '7',
            'turmas_id'		 => '3',
            'alunos_id'		 => '4',
            'data_matricula' => '2018-01-07',
        ]);

        Matricula::create([
            'id' 		     => '8',
            'turmas_id'		 => '1',
            'alunos_id'		 => '5',
            'data_matricula' => '2018-01-09',
        ]);
    }
}
