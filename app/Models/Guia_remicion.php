<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guia_remicion extends Model
{
    use HasFactory;

    protected $fillable =[
        'cabecera_id',
        'n_guia',
        'user_id',
        'user_id_confirmar',
        'cantidad',
        'observacion',
        'estado',
    ];

    public static function generate_unique_guia($length)
    {
        $characters = '0123456789aqwertyuiopsdfghjklzxcvbnmQWERTYUIOPASDFGHJKLZXCVBNM';

        $guia = 'GR-';
        for ($i = 2; $i < $length; $i++) {
            $guia .= $characters[rand(0, strlen($characters) - 1)];
        }
        $Verificar = Guia_remicion::where('n_guia', $guia)->first();
      if ($Verificar) {
          return self::generate_unique_guia(5);
      } else {
          return $guia;

      }

    }

    function Cabecera()
    {
        return $this->belongsTo(Cabecera::class);
    }

    // function AvancesEntrega()
    // {
    //     return $this->hasOne();
    // }

    function UsuarioFirma()
    {
        return $this->hasOne(User::class,'id','user_id');
    }

    function confirmafirma()
    {
        return $this->hasOne(User::class,'id','user_id_confirmar');
    }

    function Avances_Maquila()
    {
        return $this->hasMany(Avance_produccione::class, 'guia_remicion_id');
    }

}
