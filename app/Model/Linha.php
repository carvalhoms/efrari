<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Linha extends Model
{
    protected $fillable = [
        'name',
    ];

    protected $hidden = [
        'created_at', 'updated_at',
    ];
}
