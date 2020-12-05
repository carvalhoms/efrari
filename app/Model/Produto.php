<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use League\CommonMark\Reference\Reference;

class Produto extends Model
{
    protected $fillable = [
        'codigo', 'comp'
    ];

    protected $hidden = [
        'created_at', 'updated_at',
    ];

    public function linha()
    {
        return $this->belongsTo(Linha::class);
    }

    public function descricao()
    {
        return $this->belongsTo(Descricao::class);
    }

    public function aplicacoes()
    {
        return $this->hasMany(Aplicacao::class);
    }

    public function referencias()
    {
        return $this->hasMany(Referencia::class);
    }
}
