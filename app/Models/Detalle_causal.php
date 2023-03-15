<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Detalle_causal extends Model
{
    use HasFactory;

    protected $fillable =[
        'name',
        'causal_general_id',
    ];

    public function causal_general()
    {
        return $this->belongsTo(Causal_general::class, 'causal_general_id');
    }
}
