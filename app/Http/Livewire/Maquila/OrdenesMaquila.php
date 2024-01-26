<?php

namespace App\Http\Livewire\Maquila;

use App\Imports\ProduccionImport;
use App\Models\Cabecera;
use App\Models\Paso_a_paso;
use App\Models\Pasoapaso;
use App\Models\Produccione;
use Exception;
use Faker\UniqueGenerator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Validation\Rules\Unique;
use Livewire\Component;
use Livewire\WithFileUploads;
use Maatwebsite\Excel\Facades\Excel;

class OrdenesMaquila extends Component
{
    use WithFileUploads;

    public $actividades = [
        [
         'sku' => '',
         'cantidades' => '',
         'descripcion' => '',
         'fechas' => '',
         'precio' => ''
         ]
    ];

    public $cliente;
    public $cantidad;
    public $proveedor;
    public $otcliente;
    public $fecha;
    public $code;
    public $Imagenes;
    public $proceso;
    public $descrip;
    public $GuardarCabecera;
    public $Produccion;
    public $foreot;
    public $filexlsx;

    public $skus;


    protected $rules = [
        'cliente' => 'required',
        'cantidad' => 'required',
        'proveedor' => 'required',
        'fecha' => 'required|date',
    ];

    function agregarcampo()
    {
     $this->actividades[] =
     [
        'sku' => '',
         'cantidades' => '',
         'descripcion' => '',
         'fechas' => '',
         'precio' => ''
     ];

    }

    public function importExcel()
    {
    //  (new ProduccionImport($this->GuardarCabecera->id))->import(request()->file('filexlsx'), 'local', Excel::XLSX);

    $arrchivo = $this->validate([
        'filexlsx' => 'required|mimes:xlsx'
    ]);
    // Obtener el archivo temporal
     $tempFile = $arrchivo['filexlsx'];

        // Verificar la existencia del archivo
        if (!file_exists($tempFile)) {
            throw new Exception('Archivo temporal no encontrado');
        }

     Excel::import($tempFile, new Produccione($this->GuardarCabecera->id));
    // if ($import->failures()->count() > 0) {
    //     $this->errors = $import->failures();
    // } else {
    //     $this->success = true;
    // }

    }

     public function upload()
     {
         $file = $this->input('filexlsx');

         if ($file) {
              return $file->store('excel');
          }

          return null;
      }

    function Encabezado()
    {
        $Validarcabeera = $this->validate();

        $this->GuardarCabecera = Cabecera::create([
        'codigo' => $this->code,
        'cantidad' => $Validarcabeera['cantidad'],
        'proveedor' => $Validarcabeera['proveedor'],
        'fecha' => $Validarcabeera['fecha'],
        'cliente' => $Validarcabeera['cliente'],
        'estado' => 1,
        'solicitud' => 'Produccion',
        'otcliente' => $this->otcliente,
        ]);

        $this->emit('alert', 'Se registro exitosamente');
    }

    function GuardarDatos()
    {
        foreach ($this->actividades as $actividad) {
           $this->Produccion = Produccione::create([
              'cabecera_id' => $this->GuardarCabecera->id,
              'sku' => $actividad['sku'],
              'cantidad' => $actividad['cantidades'],
              'descripcion' => $actividad['descripcion'],
              'fecha' => $actividad['fechas'],
              'precio' => $actividad['precio']
             ]);
        }

        $this->emit('alert', 'Se registro exitosamente');
    }

    function QuitarCampos($index)
    {
        unset($this->actividades[$index]);
    }

    public function Pasos()
    {
        $validarCampo = $this->validate([
            'descrip' => 'required',
            'proceso' => 'required',
            'Imagenes' => ['nullable','max:3024','image','mimes:jpeg,png,jpg']
        ]);

        if (!is_null($this->Imagenes)) {
            $Imagenes = $this->Imagenes->store('public/Pasoapaso');
            $validarCampo['Imagenes'] = str_replace('public/Pasoapaso/',' ', $Imagenes);
            }

        $guardarproceso = Paso_a_paso::create([
         'cabecera_id' => $this->GuardarCabecera->id,
         'descripcion' => $validarCampo['descrip'],
         'proceso' => $validarCampo['proceso'],
         'imagen' => $validarCampo['Imagenes']
        ]);

        $this->emit('alert', 'Se registro exitosamente');

        $hgs = DB::table('cabeceras')
       ->where('id', $this->GuardarCabecera->id)
       ->update(['estado' => 2]);

        return redirect()->route('adm.Maquila.trabajo');
    }


    public function render()
    {
        if (isset($this->GuardarCabecera->id)) {
          $this->skus = Produccione::where('cabecera_id', $this->GuardarCabecera->id)->get();
        } else {
          $this->foreot = Cabecera::where('estado', 1)->get();
          $this->GuardarCabecera = Cabecera::find($this->GuardarCabecera);
        }


      function generate_unique_code($length)
      {
          $characters = '0123456789aqwertyuiopsdfghjklzxcvbnmQWERTYUIOPASDFGHJKLZXCVBNM';

          $code = 'OT-';
          for ($i = 2; $i < $length; $i++) {
              $code .= $characters[rand(0, strlen($characters) - 1)];
          }

          return $code;
      }

         $this->code = generate_unique_code(7);

        return view('livewire.maquila.ordenes-maquila');
    }
}
