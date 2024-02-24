<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Avance_produccione extends Model
{
    use HasFactory;

    protected $fillable = [
        'programacione_id',
        'cabecera_id',
        'unidades_caja',
        'cantidad_avance',
        'fecha_vencimiento',
        'lote'
    ];
}
