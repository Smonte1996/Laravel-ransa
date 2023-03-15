<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Investigacion extends Model
{
    use HasFactory;
    
    protected $dates = ['fecha_programada'];

    protected $fillable =[
     'solicitude_id',
     'employee_id',
     'correccion',
     'causa_raiz',
     'evaluacion_eficacia',
     'fecha_programada',
     'observacion',
     'archivo',
     'argumento',
     'imagen',  
     'codigo_generado', 
     'date_check',
    ];

     public function user()
     {
        return $this->hasOne(User::class,'id', 'user_id');
     }

     public function Empleados()
     {
        return $this->hasOne(Employee::class, 'id', 'employee_id');
     }
     
}
