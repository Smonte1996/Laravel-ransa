<?php

namespace App\Http\Livewire\Maquila;

use App\Models\Cabecera;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithFileUploads;

class GuiaMaquilas extends Component
{
    use WithFileUploads;

    public $Inf;

    function mount($id)
    {
        $this->Inf = Cabecera::find(decrypt($id));
    }

    function saveSignature()
    {

       $guias = DB::table('guia_remicions')
       ->where('cabecera_id', $this->Inf->id)
       ->update(['user_id' => auth()->user()->id,
        'estado' => 2 ]);

       $this->emit('mensaje', 'Guardado Correctamente');
       return redirect()->route('adm.Guias.Maquila.index');
    }

    public function render()
    {
        return view('livewire.maquila.guia-maquilas');
    }
}
