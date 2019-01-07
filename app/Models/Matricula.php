<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Matricula extends Model
{
    protected $table = 'matriculas';
    
    public $timestamps = false;
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'turmas_id', 'alunos_id', 'data_matricula',
    ];

    public function hasAlunos()
    {
        return $this->hasOne('App\Models\Aluno', 'id', 'alunos_id');
    }

}
