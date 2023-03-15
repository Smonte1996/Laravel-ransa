<?php

namespace App\Http\Livewire\Reclamo;

use App\Models\solicitude;
use Livewire\Component;

class InfnoProcede extends Component
{

    public $solicitude;

    public function render()
    {
        return view('livewire.reclamo.infno-procede');
    }

    public function mount($solicitude)
    {
        $this->solicitude = solicitude::find($solicitude);
    }
}
