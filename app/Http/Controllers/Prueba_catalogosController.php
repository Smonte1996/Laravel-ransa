<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Prueba_catalogosController extends Controller
{
    //
    public function CatalogoDisensa()
    {
       return view('modulos.Prueba de catalogo.catalogoDisensa');
    }

    public function CatalogoHolcim()
    {
      return view('modulos.Prueba de catalogo.catalogoHolcim');
    }
}
