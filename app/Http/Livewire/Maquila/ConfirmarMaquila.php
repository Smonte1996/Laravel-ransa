<?php

namespace App\Http\Livewire\Maquila;

use App\Mail\NotificacionGuiasCompleta;
use App\Mail\NotificacionGuiasConfirmada;
use App\Models\Cabecera;
use App\Models\Confirmacion_maquila;
use App\Models\Guia_remicion;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;

class ConfirmarMaquila extends Component
{
    public $Inf;
    public $CantidadRecibida;
    public $Observacion;
    public $ActualizarCampo;
    public $empaque;
    public $valor;


    protected $rules = [
        'CantidadRecibida' => 'required',
        'empaque' => 'required'
    ];

    public function mount($id)
    {
     $this->Inf = Cabecera::find(decrypt($id));

     $validar = Confirmacion_maquila::where('cabecera_id', decrypt($id))->get();
     foreach ($validar as $value) {
        $this->valor[] = $value->cabecera_id;
     }
    }

    public function GuardarConfirmacion()
    {
        $validarCampo = $this->validate();

       foreach ( $this->Inf->Componentes as $value) {
         $idCompomente[] = $value->id;
         $idCompomente1[] = $value->cabecera_id;
         $cantidad[] = $value->cantidad;
       }
       $valortotal = array_sum($cantidad);
    //    dd($valortotal);

       $Valores = $validarCampo['CantidadRecibida'];
       $valorempaque = $validarCampo['empaque'];
       $valorsolo = array_values($Valores);
       $valor = array_keys($Valores);
       $empa = array_values($valorempaque);
       //dd($valorobserva);
     for ($i=0; $i <count($idCompomente) ; $i++) {
         $valores1 = $idCompomente[$i];
         $key = $valor[$i];
         $valores2 = $idCompomente1[$i];
         $valores3 = $valorsolo[$i];
         $valores4 = $empa[$i];
    //    dd($valores1, $valores3, $key);
      $GuardarConfirmacion = Confirmacion_maquila::create([
        'cabecera_id' => $valores2,
        'produccione_id'=> $key,
        'cantidad_confirmada' => $valores3,
        'empaque' => $valores4
      ]);
    }
     $valorbase = array_sum($valorsolo);
    if ($valortotal == $valorbase) {
        $hgsr = DB::table('guia_remicions')
        ->where('cabecera_id', $this->Inf->id)
        ->update(['estado' => 3,
          'user_id_confirmar' => auth()->user()->id,
          'observacion' => $this->Observacion,
        ]);
        $hgcabecera = DB::table('cabeceras')
        ->where('id', $this->Inf->id)
        ->update(['estado' => 3]);
    }else {
        $hgsr = DB::table('guia_remicions')
        ->where('cabecera_id', $this->Inf->id)
        ->update(['user_id_confirmar' => auth()->user()->id,
        'observacion' => $this->Observacion]);

        $hgcabecera = DB::table('cabeceras')
        ->where('id', $this->Inf->id)
        ->update(['estado' => 3]);
    }

      Mail::to('stevemontenegro_9@hotmail.com')->cc('smontenegrot@ransa.net')->send(new NotificacionGuiasConfirmada($this->Inf->id));

     $this->emit('mensaje', 'Guardado exitosamente');

     return redirect()->route('adm.Guias.confirmacion.maquila.index');
    }

    function ActualizacionCampos()
    {
      $key = array_keys($this->ActualizarCampo);
      $campos = array_values($this->ActualizarCampo);
      for ($i=0; $i <count($key) ; $i++) {
        $id = $key[$i];
        $valor = $campos[$i];
        $hgsr = DB::table('confirmacion_maquilas')
        ->where('produccione_id', $id)
        ->update(['cantidad_confirmada' => $valor]);
      }
       foreach ($this->Inf->Componentes as $value) {
        $valor1[] = $value->cantidad;
       }

       $campoactual = Confirmacion_maquila::where('cabecera_id', $this->Inf->id)->get();
       foreach ($campoactual as $value) {
        $valor2[]  = $value->cantidad_confirmada;
       }
       $canti = array_sum($valor1);
       $canti2 = array_sum($valor2);

    if ($canti == $canti2) {

        $hgcabecera = DB::table('cabeceras')
        ->where('id', $this->Inf->id)
        ->update(['estado' => 3]);

        $hgsr = DB::table('guia_remicions')
        ->where('cabecera_id', $this->Inf->id)
        ->update(['estado' => 3,
          'user_id_confirmar' => auth()->user()->id,
          'observacion' => $this->Observacion]);
    }else {
        $hgcabecera = DB::table('cabeceras')
        ->where('id', $this->Inf->id)
        ->update(['estado' => 3]);

        $hgsr = DB::table('guia_remicions')
        ->where('cabecera_id', $this->Inf->id)
        ->update(['user_id_confirmar' => auth()->user()->id,
        'observacion' => $this->Observacion]);
    }

    Mail::to('stevemontenegro_9@hotmail.com')->cc('smontenegrot@ransa.net')->send(new NotificacionGuiasCompleta($this->Inf->id));

      $this->emit('mensaje', 'Guardado exitosamente');

      return redirect()->route('adm.Guias.confirmacion.maquila.index');

    }

    public function render()
    {
        return view('livewire.maquila.confirmar-maquila');
    }
}
