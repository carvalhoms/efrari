<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Montadora extends Model
{
    protected $fillable = [
        'name',
    ];

    protected $hidden = [
        'created_at', 'updated_at',
    ];

    public function veiculos()
    {
        return $this->hasMany(Veiculo::class);
    }

    public function aplicacao()
    {
        return $this->hasOne(Aplicacao::class);
    }
}
