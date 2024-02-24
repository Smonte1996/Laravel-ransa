<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Maquila_muestreo extends Model
{
    use HasFactory;

    protected $fillable = [
        'cabecera_id',
        'programacione_id',
        'cantidad_muestra',
        'cj_un_muestra',
        'cantidad_aceptado',
        'cj_un_aceptado',
        'cantidad_rechazado',
        'cj_un_rechazado',
        'obsevacion_rechazado',
        'cantidad_reprocesado',
        'cj_un_reprocesado'
    ];

}
