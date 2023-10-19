<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Infor_practicahg extends Model
{
    use HasFactory;

    protected $fillable =[
        'fecha',
        'almacen',
        'evaluador',
        'estado',
    ];


}
