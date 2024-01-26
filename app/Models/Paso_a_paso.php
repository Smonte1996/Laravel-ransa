<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paso_a_paso extends Model
{
    use HasFactory;

    protected $fillable = [
        'cabecera_id',
        'descripcion',
        'proceso',
        'imagen',
    ];
}
