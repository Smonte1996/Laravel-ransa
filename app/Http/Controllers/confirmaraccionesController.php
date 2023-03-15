<?php

namespace App\Http\Controllers;

use App\Models\Accion;
use App\Models\solicitude;
use Illuminate\Http\Request;
use App\Models\Investigacion;
use Illuminate\Support\Facades\DB;

class confirmaraccionesController extends Controller
{
    //
    public function index($solicitude)
    {
        $solicitude = solicitude::find($solicitude);
        return view('modulos.reclamoscliente.checkacciones', compact('solicitude'));
    }
    
    public function store(Request $request)
    {
        $validatedData = $request->validate([
         'evaluacion_check' => 'required',
         'accion_check' => 'required'
        ]);
         if ($validatedData) {
            return response()->json(['error' => 'Debes cumplir todo la acciones para cerrar el reclamo.']);
         }
    }

    public function update(Request $request, $solicitude)
    {
        $notificacioninv = DB::table('investigacions')
      ->where('solicitude_id', $solicitude)
      ->update(['date_check' => request()->has('evaluacion_check') ? now(): null,]);

       $notificacionacc = DB::table('accions')
       ->where('solicitude_id', $solicitude)
       ->update(['date_check'=> request()->has('accion_check') ? now(): null,]);

        return back();
    }
}
