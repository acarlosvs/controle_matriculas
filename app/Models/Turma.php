<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Turma extends Model
{
    protected $table = 'turmas';

    public $timestamps = false;
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'instrutores_id', 'cursos_id', 'data_inicio', 'data_final', 'carga_horaria',
    ];

    public function hasMatriculas()
    {
        return $this->hasMany('App\Models\Matricula', 'turmas_id', 'id');
    }

    public function hasInstrutores()
    {
        return $this->hasMany('App\Models\Instrutor', 'id', 'instrutores_id');
    }
}
