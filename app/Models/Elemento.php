<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Elemento extends Model
{
    use HasFactory;

    protected $fillable = [
        'tipo_elemento_id',
        'numero_serie',
        'observaciones',
        'estado_id',
    ];
}
