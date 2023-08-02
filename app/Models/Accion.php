<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Accion extends Model
{
    use HasFactory;
   
    protected $dates = ['fecha_programacion'];

    protected $fillable =[
    'solicitude_id',
    'name',
    'employee_id',
    'fecha_programacion',
    'date_check',
    ];
    
    public function userse()
    {
       return $this->hasOne(User::class, 'id', 'user_id');
    }

    public function Empleado()
     {
        return $this->hasOne(Employee::class, 'id', 'employee_id');
     }

     public function userses()
    {
       return $this->hasMany(User::class, 'id', 'user_id');
    }

}
