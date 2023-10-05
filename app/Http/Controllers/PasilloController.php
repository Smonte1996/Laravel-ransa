<?php

namespace App\Http\Controllers;

use App\Models\Pasillo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PasilloController extends Controller
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
    public function edit($pasillos)
    {
        //
        $pasillo = Pasillo::find($pasillos);
        $supervisor = Pasillo::all();
        return view('adm.Pasillos_checklist.edit', compact('pasillo', 'supervisor'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $pasillo)
    {
        //
        $validated = $request->validate([
            'coordinador' => 'required',
            'supervisor'=> 'required',
            'responsable' => 'required',
        ]);

        $Pasillos = DB::table('pasillos')
        ->where('id', $pasillo)
        ->update(['coordinador' => $validated['coordinador'],
                  'user_id' => $validated['supervisor'],
                  'responsables' => $validated['responsable']]);

        return redirect()->route('adm.check.pasillos.index');
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
