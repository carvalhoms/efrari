<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Descricao extends Model
{
    protected $table = 'descricoes'; // Mudando o nome da tabela
    
    protected $fillable = [
        'name',
    ];

    protected $hidden = [
        'created_at', 'updated_at',
    ];
}
