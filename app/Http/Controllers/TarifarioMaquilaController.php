<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Servicio_maquila;
use App\Models\Tarifario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TarifarioMaquilaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Activi = Tarifario::where('estado', 1)->get();

        return view('adm.Tarifario_Maquila.index', compact('Activi'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cliente = Client::where('estado', 1)->get();
        $servicio = Servicio_maquila::where('estado', 1)->get();
        return view('adm.Tarifario_Maquila.create', compact('cliente', 'servicio'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $validarCampos = $request->validate([
        'cliente' => 'required',
        'servicio' => 'required',
        'actividad' => 'required',
        'Tarifa_dprissa' => 'required',
        'Tarifa_serypro' => 'required',
        'Tarifa_cliente' => 'required',
        'Observacion' => 'nullable'
       ]);

       $GuardarDatos = Tarifario::create([
        'client_id' => $validarCampos['cliente'],
        'servicio_maquila_id' => $validarCampos['servicio'],
        'actividad' => $validarCampos['actividad'],
        'tarifa_dprissa' => $validarCampos['Tarifa_dprissa'],
        'tarifa_serypro' => $validarCampos['Tarifa_serypro'],
        'tarifa_cliente' => $validarCampos['Tarifa_cliente'],
        'observacion' => $validarCampos['Observacion'],
        'estado' => 1
       ]);

       return redirect()->route('adm.Tarifa.Maquila.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $Tarifas = Tarifario::find(decrypt($id));
        $servicio = Servicio_maquila::where('estado', 1)->get();
        $clientes = Client::where('estado', 1)->get();
       return view('adm.Tarifario_Maquila.edit', compact('Tarifas', 'servicio', 'clientes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tarifario $tarifario)
    {
        $actualizar = $request->validate([
            'cliente' => 'required',
            'Servicio' => 'required',
            'actividad' => 'required',
            'Tarifa_dprissa' => 'required',
            'Tarifa_serypro' => 'required',
            'Tarifa_cliente' => 'required',
            'Observacion' => 'nullable'
        ]);

          $tarifario->update($request->all());

        return redirect()->route('adm.Tarifa.Maquila.index');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function EliminarActividad(Request $request, $id)
    {
        $Eliminar = DB::table('tarifarios')
        ->where('id', decrypt($id))
        ->update(['estado' => 0]);

        return redirect()->route('adm.Tarifa.Maquila.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
