<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produccione extends Model
{
    use HasFactory;

    protected $fillable = [
        'cabecera_id',
        'sku',
        'descripcion',
        'cantidad',
        'empaque',
        'fecha',
        'precio',
    ];

    function Recibido()
    {
        return $this->hasOne(Confirmacion_maquila::class, 'produccione_id');
    }

    function validarCampos()
    {
      return $this->hasMany(Confirmacion_maquila::class, 'cabecera_id');
    }
}
