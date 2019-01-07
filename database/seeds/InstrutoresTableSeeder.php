<?php

use Illuminate\Database\Seeder;
use App\Models\Instrutor;

class InstrutoresTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('instrutores')->delete();

        Instrutor::create([
            'id' 		   => '1',
            'nome'  	   => 'Roberto Lopes',
            'email' 	   => 'roberto@roberto.com',
            'valor_hora'   => '47',
            'certificados' => 'Tecnico em Edificações',
        ]);

        Instrutor::create([
            'id' 		   => '2',
            'nome'  	   => 'Ricardo Pereira',
            'email' 	   => 'ricardo@pereira.com',
            'valor_hora'   => '45',
            'certificados' => 'Certificado SENAC',
        ]);

        Instrutor::create([
            'id' 		   => '3',
            'nome'  	   => 'Solange Coelho',
            'email' 	   => 'solange@coelho.com',
            'valor_hora'   => '45',
            'certificados' => 'Certifiado SENAI',
        ]);
    }
}
