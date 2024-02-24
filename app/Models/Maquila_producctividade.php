<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Maquila_producctividade extends Model
{
    use HasFactory;

    protected $fillable = [
        'cabecera_id',
        'programacione_id',
        'hora_inicio',
        'hora_pausa',
        'n_persona_1',
        'hora_reinicio',
        'hora_fin',
        'n_persona_2'
    ];
}
