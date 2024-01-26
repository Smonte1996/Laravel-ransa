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
        'fecha',
        'precio',
    ];
}
