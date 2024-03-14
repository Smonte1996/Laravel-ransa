<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Maquila_novedades extends Model
{
    use HasFactory;

    protected $fillable = [
        'cabecera_id',
        'programacione_id',
        'sku',
        'cantidad',
        'caj_uni',
        'estado',
        'observacion',
        'imagen'
    ];

    function ProgramacionNovedades()
    {
        return $this->hasOne(Programacione::class, 'id', 'programacione_id');
    }
}
