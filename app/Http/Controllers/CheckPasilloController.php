<?php

namespace App\Http\Controllers;

use App\Models\Pasillo;
use Illuminate\Http\Request;

class CheckPasilloController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $Pasillos_R = Pasillo::all();
        return view('adm.Pasillos_checklist.index', compact('Pasillos_R'));
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
    public function show(Pasillo $pasillo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Pasillo $pasillos)
    {
        //
        return view('adm.Pasillos_checklist.edit', compact('pasillos'));
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pasillo $Pasillo)
    {
        //
        $validated = $request->validate([
            'Bodega' => 'required',
            'pasillo' => 'required',
            'coordinador' => 'required',
            'supervisor'=> 'required',
            'responsable' => 'required',
        ]);
        $Pasillo->update($request->all());
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
