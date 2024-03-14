<?php

namespace App\Http\Controllers;

use App\Models\Guia_remicion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Guia_Confirmacion_MaquilaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (auth()->user()->userable_type == "App\Models\Supplier") {
         $Cabecera = Guia_remicion::whereIn('estado', [2])->wherehas('Cabecera', function($query){
            $query->where('supplier_id', Auth::user()->Supplier->id);
           })->get();
        } else {
         $Cabecera = Guia_remicion::whereIn('estado', [2])->get();
        }

         return view('modulos.Maquila_confirmacion.index', compact('Cabecera'));
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
        //
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
