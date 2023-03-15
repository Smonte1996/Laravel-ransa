<?php

namespace App\Http\Livewire\Guest;

use App\Models\solicitude;
use Livewire\Component;

class Consultas extends Component
{
     public $solicitudes = [];
    public $buscar = null;
     
    protected $rules =[
     'buscar' => 'required',
    ];

    // public function mount()
    // {
    //    $this->solicitudes = solicitude::all();
    // }

    public function Buscardatos()
    {
       if (empty($this->buscar)) {
        $this->emit('show-sweetalert',[
            'type' => 'warning',
            'title' => 'Campo de búsqueda es Requerido',
            'message' => 'Por favor, ingrese algo para buscar.'
        ]);
        return;
       }

        $this->solicitudes = solicitude::where('codigo_generado', 'like', '%'.$this->buscar.'%')->get();
        
    }

    public function render()
    {
        $solicitudes = solicitude::all();

        return view('livewire.guest.consultas', compact('solicitudes'))->layout('layouts.guest2');
    }
}
