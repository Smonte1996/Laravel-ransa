<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Programacione extends Model
{
    use HasFactory;

    protected $fillable = [
     'cabecera_id',
      'dia',
      'cantidad',
      'fecha',
      'observacion',
    ];
}
