<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Avance_produccione extends Model
{
    use HasFactory;

    protected $fillable = [
        'guia_remicion_id',
        'programacione_id',
        'cabecera_id',
        'unidades_caja',
        'cantidad_avance',
        'fecha_vencimiento',
        'lote'
    ];

    function Guias_Maquila()
    {
        return $this->hasMany(Guia_remicion::class, 'guia_remicion_id');
    }

    function Guias_Avances()
    {
        return $this->belongsTo(Guia_remicion::class,'guia_remicion_id');
    }

    function Avanceactividad()
    {
        return $this->hasOne(Programacione::class, 'id', 'programacione_id');
    }
}
