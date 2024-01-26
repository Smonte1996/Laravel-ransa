<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cabecera extends Model
{
    use HasFactory;

    protected $fillable = [
        'codigo',
        'cantidad',
        'proveedor',
        'fecha',
        'cliente',
        'estado',
        'solicitud',
        'otcliente'
    ];
}
