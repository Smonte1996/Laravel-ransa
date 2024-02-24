<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tarifario extends Model
{
    use HasFactory;

    protected $fillable = [
        'client_id',
        'servicio_maquila_id',
        'actividad',
        'supplier_id',
        'tarifa_serypro',
        'tarifa_dprissa',
        'tarifa_cliente',
        'observacion',
        'estado'
    ];

    function clientes()
    {
        return $this->hasOne(Client::class, 'id','client_id');
    }

    function Servicios()
    {
        return $this->hasOne(Servicio_maquila::class, 'id', 'servicio_maquila_id');
    }

    function ServiciosMaquila()
    {
        return $this->belongsTo(Servicio_maquila::class, 'servicio_maquila_id');
    }

     function cabercera()
     {
         return $this->belongsToMany(Cabecera::class);
     }

    // function Servico_Maquila()
    //  {
    //     return $this->hasMany(Servicio_maquila::class,'id', 'servicio_maquila_id' );
    // }

}
