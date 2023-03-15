<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Clasificacion extends Model
{
    use HasFactory;

    protected $fillable =[
    'solicitude_id',
    'employee_id',
    'causal_general_id',
    'detalle_causal_id',
    'codigo_generado',
    ];

     public function causal_general()
     {
        return $this->hasOne(Causal_general::class, 'id', 'causal_general_id');
     }

     public function detalle_causal()
     {
        return $this->hasOne(Detalle_causal::class, 'id', 'detalle_causal_id');
     }

     public function users()
     {
       return $this->hasOne(User::class, 'id', 'user_id'); 
    }
    

   //   public function Investigacion()
   //   {
   //    return $this->belongsTo(Investigacion::class, 'solicitude_id');
   //   }

   public function solicitud()
   {
      return $this->hasOne(solicitude::class, 'id', 'solicitude_id');
   }

   public function Empleados()
   {
      return $this->hasOne(Employee::class, 'id', 'employee_id');
   }
}
