<?php

use Illuminate\Database\Seeder;
use App\Models\Turma;

class TurmasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('turmas')->delete();

        Turma::create([
            'id' 		     => '1',
            'instrutores_id' => '1',
            'cursos_id' 	 => '1',
            'data_inicio'    => '2018-01-01',
            'data_final'     => '2018-01-15',
            'carga_horaria'  => '20'
        ]);

        Turma::create([
            'id' 		     => '2',
            'instrutores_id' => '1',
            'cursos_id' 	 => '1',
            'data_inicio'    => '2018-01-16',
            'data_final'     => '2018-02-04',
            'carga_horaria'  => '20'
        ]);

        Turma::create([
            'id' 		     => '3',
            'instrutores_id' => '2',
            'cursos_id' 	 => '2',
            'data_inicio'    => '2018-03-01',
            'data_final'     => '2018-03-29',
            'carga_horaria'  => '50'
        ]);

        Turma::create([
            'id' 		     => '4',
            'instrutores_id' => '2',
            'cursos_id' 	 => '2',
            'data_inicio'    => '2018-04-01',
            'data_final'     => '2018-04-30',
            'carga_horaria'  => '50'
        ]);

        Turma::create([
            'id' 		     => '5',
            'instrutores_id' => '3',
            'cursos_id' 	 => '3',
            'data_inicio'    => '2018-06-01',
            'data_final'     => '2018-06-20',
            'carga_horaria'  => '20'
        ]);

        Turma::create([
            'id' 		     => '6',
            'instrutores_id' => '3',
            'cursos_id' 	 => '3',
            'data_inicio'    => '2018-07-01',
            'data_final'     => '2018-07-20',
            'carga_horaria'  => '20
'
        ]);
    }
}
