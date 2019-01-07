<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Instrutor extends Model
{
    protected $table = 'instrutores';

    public $timestamps = false;
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'nome', 'email', 'valor_hora', 'certificados',
    ];

}
