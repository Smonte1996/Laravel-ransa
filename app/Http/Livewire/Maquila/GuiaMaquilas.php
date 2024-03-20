<?php

namespace App\Http\Livewire\Maquila;

use App\Mail\NotificacionConfirmacionMaquila;
use App\Models\Cabecera;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
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

        // $cabecera = DB::table('cabeceras')
        // ->where('id', $this->Inf->id)
        // ->update(['estado' => 3]);

       $this->emit('mensaje', 'Guardado Correctamente');

       Mail::to('stevemontenegro_9@hotmail.com')->cc('smontenegrot@ransa.net')->send(new NotificacionConfirmacionMaquila($this->Inf->id));

       return redirect()->route('adm.Guias.Maquila.index');
    }

    public function render()
    {
        return view('livewire.maquila.guia-maquilas');
    }
}
