<?php

use Illuminate\Database\Seeder;
use App\Models\Curso;

class CursosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cursos')->delete();

        Curso::create([
            'id' 			=> '1',
            'nome'  		=> 'Curso de SQL',
            'requisito' 	=> 'Lógica de Programação',
            'carga_horaria' => '20',
            'preco' 		=> '150',
        ]);

        Curso::create([
            'id' 			=> '2',
            'nome'  		=> 'Curso de Autocad',
            'requisito' 	=> 'Conhecimento em Edificações',
            'carga_horaria' => '50',
            'preco' 		=> '250',
        ]);

        Curso::create([
            'id' 			=> '3',
            'nome'  		=> 'Curso de Cabelereiro',
            'requisito' 	=> 'Nenhum',
            'carga_horaria' => '20',
            'preco' 		=> '150',
        ]);
    }
}
