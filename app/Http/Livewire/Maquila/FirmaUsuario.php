<?php

namespace App\Http\Livewire\Maquila;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Livewire\Component;


class FirmaUsuario extends Component
{
    public $firma;
    public $usuarios;
    public $user;

    protected $rules = [
        'firma' => 'required',
    ];

    function mount()
    {
        $this->usuarios = User::all();
    }

    function saveSignature()
    {
       $validarfirma = $this->validate();
        $firma =  $validarfirma['firma'];
        $firmas = base64_encode($firma);

       $guias = DB::table('users')
       ->where('id', $this->user)
       ->update(['firma' => $firmas]);

       $this->emit('mensaje', 'Guardado Correctamente');
    }

    public function render()
    {
        $this->emit('select2');
        return view('livewire.maquila.firma-usuario');
    }
}
