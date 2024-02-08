<?php

namespace App\Http\Livewire\Maquila;

use App\Imports\ProduccionImport;
use App\Models\Cabecera;
use App\Models\Client;
use App\Models\Codigo_fconversione;
use App\Models\Paso_a_paso;
use App\Models\Pasoapaso;
use App\Models\Produccione;
use App\Models\Programacione;
use App\Models\Supplier;
use App\Models\Tarifario;
use Exception;
use Faker\UniqueGenerator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Validation\Rules\Unique;
use Livewire\Component;
use Livewire\WithFileUploads;
use Maatwebsite\Excel\Excel;

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

    public $ProgramaDias = [
        [
            'dia' => '',
            'cantidades' => '',
            'fechaP' => '',
            'observa' => '',
        ]
    ];

    public $cliente;
    public $cantidad;
    public $proveedor;
    public $otcliente;
    public $fecha;
    public $code;
    public $Imagenes;
    // public $proceso;
    public $descrip;
    public $GuardarCabecera;
    public $Produccion;
    public $foreot;
    public $filexlsx;
    public $cjun;
    public $codigo;
    public $GuardarProgramcion;
    public $actividad;
    public $Actividad;
    public $columnas;
    public $errors;
    public $success;
    public $Proveedores;
    public $Clientes;
    public $Codigos;
    public $descrip_codigo;
    public $Tarifas;
    public $ean13;
    public $ean14;

    public $open = false;

    public $skus;


    protected $rules = [
        'cliente' => 'required',
        'cantidad' => 'required',
        'proveedor' => 'required',
        'Actividad' => 'required',
        'ean13' => 'required',
        'ean14' => 'required',
        'cjun' => 'required',
        'codigo' => 'required',
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

    function QuitarCampos($index)
    {
        unset($this->actividades[$index]);
    }

    function AgregarDias()
    {
        $this->ProgramaDias[] =
        [
            'dia' => '',
            'cantidades' => '',
            'fechaP' => '',
            'observa' => '',
        ];
    }

    function QuitarDias($index)
    {
        unset($this->ProgramaDias[$index]);
    }

     public function importExcel()
     {
        $arrchivo = $this->validate([
            'filexlsx' => 'required|mimes:xlsx'
        ]);

     (new ProduccionImport($this->GuardarCabecera->id))->import($arrchivo['filexlsx'], 'local', Excel::XLSX);

     $this->emit('alert', 'Se registro exitosamente');

     }

    function Encabezado()
    {
        $Validarcabeera = $this->validate();

        $this->GuardarCabecera = Cabecera::create([
        'codigo' => $this->code,
        'cantidad' => $Validarcabeera['cantidad'],
        'cj_un' => $Validarcabeera['cjun'],
        'supplier_id' => $Validarcabeera['proveedor'],
        'ean13' => $Validarcabeera['ean13'],
        'ean14' => $Validarcabeera['ean14'],
        'fecha' => $Validarcabeera['fecha'],
        'client_id' => $Validarcabeera['cliente'],
        'tarifario_id' => $Validarcabeera['Actividad'],
        'codigo_fconversione_id' => $Validarcabeera['codigo'],
        'estado' => 1,
        'solicitud' => 'Producción',
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


      public function mount()
      {
        // $this->actividad = Tarifario::where('estado', 1)->get();
        $this->Proveedores = Supplier::all();
        $this->Clientes = Client::where('estado', 1)->get();
        // $this->Codigos = Codigo_fconversione::where('estado', 1)->get();
      }


    public function Pasos()
    {
        $validarCampo = $this->validate([
            'descrip' => 'required',
            'Imagenes' => ['nullable','max:3024','image','mimes:jpeg,png,jpg']
        ]);

        if (!is_null($this->Imagenes)) {
            $Imagenes = $this->Imagenes->store('public/Pasoapaso');
            $validarCampo['Imagenes'] = str_replace('public/Pasoapaso/',' ', $Imagenes);
            }

        $guardarproceso = Paso_a_paso::create([
         'cabecera_id' => $this->GuardarCabecera->id,
         'descripcion' => $validarCampo['descrip'],
        //  'proceso' => $validarCampo['proceso'],
         'imagen' => $validarCampo['Imagenes']
        ]);

        $this->emit('alert', 'Se registro exitosamente');

    }

    function Programacion()
    {
   foreach ($this->ProgramaDias as $Dias) {
    $this->GuardarProgramcion = Programacione::create([
        'cabecera_id' =>  $this->GuardarCabecera->id,
        'dia' => 'Dias'." ".$Dias['dia'],
        'cantidad' => $Dias['cantidades'],
        'fecha' => $Dias['fechaP'],
        'observacion' => $Dias['observa']
    ]);
   }

   $this->emit('alert', 'Se registro exitosamente');

    }


    function Enviar()
    {
        $hgs = DB::table('cabeceras')
       ->where('id', $this->GuardarCabecera->id)
       ->update(['estado' => 2]);

       $this->emit('alert', 'Enviado Satisfactoriamente');

        return redirect()->route('adm.Maquila.trabajo');
    }


        public function updatedGuardarCabecera($id)
        {
        $this->skus = Produccione::where('cabecera_id', $id)->get();
        }

        public function updatedcliente($id)
        {
          $this->Codigos = Codigo_fconversione::where('client_id', $id)->where('estado', 1)->get();
          $this->actividad = Tarifario::where('client_id', $id)->where('estado', 1)->get();
        }

        public function updatedcodigo($id)
        {
           $this->descrip_codigo = Codigo_fconversione::where('id', $id)->where('estado', 1)->get();
        }

        public function updatedActividad($id)
        {
          $this->Tarifas = Tarifario::where('id', $id)->where('estado', 1)->get();
        }


    public function render()
    {
        if (isset($this->GuardarCabecera->id)) {
            $this->skus = Produccione::where('cabecera_id', $this->GuardarCabecera->id)->get();
        } else {
          $this->foreot = Cabecera::where('estado', 1)->get();
          $this->GuardarCabecera = Cabecera::find($this->GuardarCabecera);
        }


    //   function generate_unique_code($length)
    //   {
    //       $characters = '0123456789aqwertyuiopsdfghjklzxcvbnmQWERTYUIOPASDFGHJKLZXCVBNM';

    //       $code = 'OT-';
    //       for ($i = 2; $i < $length; $i++) {
    //           $code .= $characters[rand(0, strlen($characters) - 1)];
    //       }
    //       $Verificar = Cabecera::where('codigo', $code)->first();
    //     if ($Verificar) {
    //         return self::generate_unique_code(7);
    //     } else {
    //         return $code;
    //     }
    //   }

         $this->code = Cabecera::generate_unique_code(7);

        //  $this->emit('select2');

        return view('livewire.maquila.ordenes-maquila');
    }
}
