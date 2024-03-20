<?php

namespace App\Http\Controllers;

use App\Models\Cabecera;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProduccionMaquilaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (auth()->user()->userable_type == "App\Models\Supplier") {
            $Cabeceras = Cabecera::whereIn('estado', [1,2,3,4])->where('supplier_id', Auth::user()->Supplier->id)->get();
        } else {
          $Cabeceras = Cabecera::whereIn('estado', [1,2,3])->get();
        }

        return view('modulos.Produccion_Maquila.index', compact('Cabeceras'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function informeCierre(){
        if (auth()->user()->userable_type == "App\Models\Supplier") {
         $CabecerasCierre = Cabecera::whereIn('estado', [4,5])->where('supplier_id', Auth::user()->Supplier->id)->get();
        } else {
          $CabecerasCierre = Cabecera::whereIn('estado', [4,5])->get();
        }

        return view('modulos.Listado_avanceMaquila.index', compact('CabecerasCierre'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
