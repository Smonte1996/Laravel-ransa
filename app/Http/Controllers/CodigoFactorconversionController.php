<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Codigo_fconversione;
use Illuminate\Http\Request;

class CodigoFactorconversionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Codigos = Codigo_fconversione::where('estado', 1)->get();
        return view('adm.Codigo_FC.index', compact('Codigos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $Clientes = Client::where('estado', 1)->get();
        return view('adm.Codigo_FC.create', compact('Clientes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $campoCodigos = $request->validate([
            'cliente' => 'required',
            'codigo' => 'required|unique:App\Models\Codigo_fconversione,codigo',
            'descripcion' => 'required',
            'fc' => 'required'
        ]);

        $gurdarCampos = Codigo_fconversione::create([
            'client_id' => $campoCodigos['cliente'],
            'codigo' => $campoCodigos['codigo'],
            'descripcion' => $campoCodigos['descripcion'],
            'fc' => $campoCodigos['fc'],
            'estado' => 1
        ]);

        return redirect()->route('adm.codigo.fc.index');
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
