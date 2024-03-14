<?php

namespace App\Http\Controllers;

use App\Models\Guia_remicion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ListadoGuiasMaquilaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (auth()->user()->userable_type == "App\Models\Supplier") {
            $listado = Guia_remicion::whereIn('estado', [3, 5])->wherehas('Cabecera', function($query){
             $query->where('supplier_id', Auth::user()->Supplier->id);
            })->get();
        } else {
            $listado = Guia_remicion::whereIn('estado', [3, 5])->get();
        }
        return view('modulos.ListadoGuiasMaquila.index', compact('listado'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

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
