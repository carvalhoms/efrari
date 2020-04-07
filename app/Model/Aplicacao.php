<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Aplicacao extends Model
{
    protected $table = 'aplicacoes';

    protected $fillable = [
        'aplic', 'montadora_id'
    ];

    public function produto()
    {
        return $this->belongsTo(Produto::class);
    }

    public function montadora()
    {
        return $this->belongsTo(Montadora::class);
    }
}
