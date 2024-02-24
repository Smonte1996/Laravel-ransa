<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Confirmacion_maquila extends Model
{
    use HasFactory;

    protected $fillable =[
        'cabecera_id',
        'produccione_id',
        'cantidad_confirmada',
        'Observacion',
    ];
}
