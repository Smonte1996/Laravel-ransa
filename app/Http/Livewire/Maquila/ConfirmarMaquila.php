<?php

namespace App\Http\Livewire\Maquila;

use App\Models\Cabecera;
use App\Models\Confirmacion_maquila;
use App\Models\Guia_remicion;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class ConfirmarMaquila extends Component
{
    public $Inf;
    public $CantidadRecibida;
    public $Observacion;
    public $validar;
    public $ActualizarCampo;


    protected $rules = [
        'CantidadRecibida' => 'required'
    ];

    public function mount($id)
    {
     $this->Inf = Cabecera::find(decrypt($id));

     $this->validar = Confirmacion_maquila::where('cabecera_id', decrypt($id))->get();

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
       $valorsolo = array_values($Valores);
       //dd($valorobserva);
     for ($i=0; $i <count($idCompomente) ; $i++) {
         $valores1 = $idCompomente[$i];
         $valores2 = $idCompomente1[$i];
         $valores3 = $valorsolo[$i];
    //  dd($valores3);
      $GuardarConfirmacion = Confirmacion_maquila::create([
        'cabecera_id' => $valores2,
        'produccione_id'=> $valores1,
        'cantidad_confirmada' => $valores3,
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
    }else {
        $hgsr = DB::table('guia_remicions')
        ->where('cabecera_id', $this->Inf->id)
        ->update(['user_id_confirmar' => auth()->user()->id,
        'observacion' => $this->Observacion]);
    }

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

    if ($canti === $canti2) {
        $hgsr = DB::table('guia_remicions')
        ->where('cabecera_id', $this->Inf->id)
        ->update(['estado' => 3,
          'user_id_confirmar' => auth()->user()->id,
          'observacion' => $this->Observacion]);
    }else {
        $hgsr = DB::table('guia_remicions')
        ->where('cabecera_id', $this->Inf->id)
        ->update(['user_id_confirmar' => auth()->user()->id,
        'observacion' => $this->Observacion]);
    }

      $this->emit('mensaje', 'Guardado exitosamente');

      return redirect()->route('adm.Guias.confirmacion.maquila.index');

    }

    public function render()
    {
        return view('livewire.maquila.confirmar-maquila');
    }
}
