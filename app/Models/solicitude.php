<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Symfony\Component\HttpFoundation\AcceptHeader;

class solicitude extends Model
{  
    use HasFactory;
    protected $fillable =[
    'nombre',
    'correo',
    'celular',
    'cliente',
    'sede_id',
    'tipo_reclamo_id',
    'servicio_ransa_id',
    'adicional_id',
    'codigo_generado',
    'titulo',
    'Descripcion',
    'estado',
    'fecha_registro',
    'imagen',
    ];
    
    public function sede()
    {
        return $this->hasOne(sede::class, 'id', 'sede_id');
    }

    public function servicio_ransa()
    {
        return $this->hasOne(servicio_ransa::class, 'id', 'servicio_ransa_id');
    }

    public function tipo_reclamo()
    {
        return $this->hasOne(tipo_reclamo::class, 'id','tipo_reclamo_id');
    }
    public function users()
    {
        return $this->belongsTo(User::class);
    }

    public function adicional()
    {
        return $this->hasOne(Adicional::class, 'id', 'adicional_id');
    }

    // public function causal_general()
    // {
    //     return $this->belongsTo(Causal_general::class);
    // }
    // public function detalle_causal()
    // {
    //     return $this->belongsTo(Detalle_causal::class, 'causal_general_id');
    // }

     public function clasificacion()
     {
         return $this->hasOne(Clasificacion::class, 'solicitude_id');
     }

     public function investigacion()
     {
       return $this->hasOne(Investigacion::class, 'solicitude_id');
     }

     public function acciones()
     {
        return $this->hasMany(Accion::class, 'solicitude_id');
     }

     public function encuesta()
     {
        return $this->hasOne(Calificacion::class, 'solicitude_id');
     }

     public function Evidencia()
     {
        return $this->hasMany(Evidencia_solicitude::class, 'solicitude_id');
     }

     public function Analisis()
     {
        return $this->hasMany(Analisis_efecto:: class, 'solicitude_id');
     }

     public function ishikawa()
     {
        return $this->hasMany(Causa_ishikawa::class, 'solicitude_id');
     }
}
