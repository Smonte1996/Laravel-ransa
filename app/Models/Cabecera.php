<?php

namespace App\Models;

use App\Http\Livewire\Maquila\GuiaMaquilas;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cabecera extends Model
{
    use HasFactory;

    protected $fillable = [
        'codigo',
        'tarifario_id',
        'supplier_id',
        'cantidad',
        'cj_un',
        'tarifa',
        'ean13',
        'ean14',
        'fecha',
        'client_id',
        'pvp',
        'tarifario_id',
        'codigo_fconversione_id',
        'estado',
        'solicitud',
        'otcliente'
    ];

    public static function generate_unique_code($length)
    {
        $characters = '0123456789aqwertyuiopsdfghjklzxcvbnmQWERTYUIOPASDFGHJKLZXCVBNM';

        $code = 'OT-';
        for ($i = 2; $i < $length; $i++) {
            $code .= $characters[rand(0, strlen($characters) - 1)];
        }
        $Verificar = Cabecera::where('codigo', $code)->first();
      if ($Verificar) {
          return self::generate_unique_code(7);
      } else {
          return $code;

      }

    }

     public function Tarifarios()
     {
         return $this->belongsToMany(Tarifario::class);
     }

    function Pasoapaso()
    {
        return $this->hasOne(Paso_a_paso::class, 'cabecera_id');
    }

    function Programa()
    {
        return $this->hasMany(Programacione::class, 'cabecera_id');
    }

    function Componentes()
    {
        return $this->hasMany(Produccione::class, 'cabecera_id');
    }

    function Tarifario()
    {
        return $this->hasOne(Tarifario::class, 'id', 'tarifario_id');
    }

    function CodigoF()
    {
        return $this->hasOne(Codigo_fconversione::class, 'id', 'codigo_fconversione_id');
    }

    function Proveedores()
    {
        return $this->hasOne(Supplier::class, 'id', 'supplier_id');
    }

    function Clientes()
    {
        return $this->hasOne(Client::class, 'id', 'client_id');
    }

    function GuiaMaquilas()
    {
        return $this->belongsTo(Guia_remicion::class,'id' ,'cabecera_id');
    }

    function Guias()
    {
        return $this->belongsTo(Guia_remicion::class,'id' ,'cabecera_id')->where('estado', 4);
    }

    function MuestreoMaquila()
    {
        return $this->hasMany(Maquila_muestreo::class, 'cabecera_id');
    }

    function NovedadMaquila()
    {
        return $this->hasMany(Maquila_novedades::class, 'cabecera_id');
    }

    function AvancesMaquila()
    {
        return $this->hasMany(Avance_produccione::class, 'cabecera_id');
    }

    // function MaquilaAvance()
    // {
    //     return $this->hasMany(Avance_produccione::class, 'cabecera_id')->where('created_at', );
    // }

    function MaquilaProductividad()
    {
       return $this->hasMany(Maquila_producctividade::class, 'cabecera_id');
    }

    function Programacion()
    {
        return $this->hasMany(Programacione::class, 'cabecera_id');
    }
}
