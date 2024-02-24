<?php

namespace App\Http\Controllers;

use App\Models\Cabecera;
use App\Models\Guia_remicion;
use Illuminate\Http\Request;
use PDF;

class Guia_MaquilaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
       $Cabecera = Guia_remicion::whereIn('estado', [1,2])->get();

       return view('modulos.Guias_Maquila.index', compact('Cabecera'));
    }

     /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function GuiaRemicion($id)
    {
        $pdf = Cabecera::find(decrypt($id));

        $pdfs = PDF::loadView('pdf.GuiaRemicion_operacion', compact('pdf'));

        return $pdfs->stream("{{$pdf->GuiaMaquilas->n_guia}}.pdf");
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
