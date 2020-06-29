<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Repre extends Model
{
    protected $fillable = [
        'empresa', 'contato', 'uf', 'cidade', 'fone1', 'fone2', 'fone3', 'fone4', 'email'
    ];

    protected $hidden = [
        'created_at', 'updated_at',
    ];
}
