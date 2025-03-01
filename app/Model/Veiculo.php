<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Veiculo extends Model
{
    protected $fillable = [
        'name',
    ];

    protected $hidden = [
        'created_at', 'updated_at',
    ];

    public function montadora()
    {
        return $this->belongsTo(Montadora::class);
    }
}
