<?php

namespace App\Exports;

use App\Models\solicitude;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;

class keyuserReclamoExport implements FromView, ShouldAutoSize
{
    use Exportable;
    public $Reclamo;

    public function __construct($id)
    {
      $this->Reclamo = $id;
    //   dd($this->Reclamo);
    }

    public function view(): View
   {
    return view('exports.keyuserReclamoExcel', [
     'reclamo' => solicitude::whereIn('estado', $this->Reclamo)->get()
    ]);

   }
}
