<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Referencia extends Model
{
    protected $fillable = [
        'ref', 'marca'
    ];

    public function produto()
    {
        return $this->belongsTo(Produto::class);
    }
}
