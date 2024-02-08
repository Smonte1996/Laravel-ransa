<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Codigo_fconversione extends Model
{
    use HasFactory;

    protected $fillable =[
        'client_id',
        'codigo',
        'descripcion',
        'fc',
        'estado'
    ];


    function Cliente()
    {
        return $this->hasOne(Client::class, 'id', 'client_id');
    }
}
