<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Causal_general extends Model
{
    use HasFactory;
    protected $fillable =[
        'name',
    ];

    public function detalle_causal()
    {
        return $this->hasMany(Detalle_causal::class, 'id');
    }
}
