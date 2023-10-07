<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prestamo extends Model
{
    use HasFactory;

    protected $fillable = [
        'prestatario_id',
        'prestamista_id',
        'elemento_prestado_id',
        'fecha_hora_prestamo',
        'fecha_hora_devolucion',
        'estado_id'
    ];

}
