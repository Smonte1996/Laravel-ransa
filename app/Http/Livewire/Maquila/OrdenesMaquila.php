<?php

namespace App\Http\Livewire\Maquila;

use App\Imports\ProduccionImport;
use App\Mail\NotificacionClienteMaquila;
use App\Mail\NotificacionMaquila;
use App\Mail\NotificacionOperacionMaquila;
use App\Models\Cabecera;
use App\Models\Client;
use App\Models\Codigo_fconversione;
use App\Models\Guia_remicion;
use App\Models\Paso_a_paso;
use App\Models\Pasoapaso;
use App\Models\Produccione;
use App\Models\Programacione;
use App\Models\Supplier;
use App\Models\Tarifario;
use Exception;
use Faker\UniqueGenerator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
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
         'descripcion' => '',
         'cantidades' => '',
         'empa' => '',
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

    public $pvp;
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
    public $guardarproceso;
    public $guia;

    public $open = false;

    public $skus;


    protected $rules = [
        'cliente' => 'required',
        'cantidad' => 'required',
        'proveedor' => 'required',
        'ean13' => 'nullable',
        'ean14' => 'nullable',
        'cjun' => 'required',
        'pvp' => 'required',
        'codigo' => 'required',
        'fecha' => 'required|date',
    ];

    function agregarcampo()
    {
     $this->actividades[] =
     [
        'sku' => '',
         'descripcion' => '',
         'cantidades' => '',
         'empa' => '',
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
        'codigo_fconversione_id' => $Validarcabeera['codigo'],
        'pvp'=> $Validarcabeera['pvp'],
        'estado' => 1,
        'solicitud' => 'Producción',
        'otcliente' => $this->otcliente,
        ]);
        foreach ($this->Actividad as $key => $value) {
          $this->GuardarCabecera->Tarifarios()->attach($value);
        }

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
              'fecha' => $actividad['fechas'] ?? null,
              'empaque' => $actividad['empa'],
               'precio' => $actividad['precio'] ?? null
             ]);
        }

        $this->emit('alert', 'Se registro exitosamente');
    }


      public function mount()
      {
         $this->actividad = Tarifario::where('estado', 1)->get();
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

        $this->guardarproceso = Paso_a_paso::create([
         'cabecera_id' => $this->GuardarCabecera->id,
         'descripcion' => $validarCampo['descrip'],
         'imagen' => $validarCampo['Imagenes']
        ]);

        $this->emit('alert', 'Se registro exitosamente');

    }

    function Programacion()
    {
   foreach ($this->ProgramaDias as $Dias) {
    $this->GuardarProgramcion = Programacione::create([
        'cabecera_id' =>  $this->GuardarCabecera->id,
        'dia' => 'Dia'." ".$Dias['dia'],
        'cantidad' => $Dias['cantidades'],
        'fecha' => $Dias['fechaP'],
        'observacion' => $Dias['observa']
    ]);
   }

   $this->emit('alert', 'Se registro exitosamente');

    }

    // function GuardarGuia()
    // {
    //     $this->guia = Guia_remicion::generate_unique_guia(4);
    //     $datosguias = Guia_remicion::create([
    //     'cabecera_id' => $this->GuardarCabecera->id,
    //     'n_guia' => $this->guia,
    //     'estado' => 1,
    //    ]);
    // }

    function Enviar()
    {
        $this->guia = Guia_remicion::generate_unique_guia(5);
        $datosguias = Guia_remicion::create([
        'cabecera_id' => $this->GuardarCabecera->id,
        'n_guia' => $this->guia,
        'estado' => 1,
       ]);

        $hgs = DB::table('cabeceras')
       ->where('id', $this->GuardarCabecera->id)
       ->update(['estado' => 2]);

       Mail::to('stevemontenegro_9@hotmail.com')->cc('smontenegrot@ransa.net')->send(new NotificacionClienteMaquila($this->GuardarCabecera->id));
       Mail::to('stevenmontorres96@gmail.com')->cc('smontenegrot@ransa.net')->send(new NotificacionOperacionMaquila($this->GuardarCabecera->id));
       Mail::to('stevemontenegro_9@hotmail.com')->cc('smontenegrot@ransa.net')->send(new NotificacionMaquila($this->GuardarCabecera->id));

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
        //   $this->actividad = Tarifario::where('client_id', $id)->where('estado', 1)->get();
        }

        public function updatedcodigo($id)
        {
           $this->descrip_codigo = Codigo_fconversione::where('id', $id)->where('estado', 1)->get();
        //    $this->dispatchBrowserEvent('initSelect1');
        }

        public function updatedActividad($id)
        {
        //   dd($id);
           $this->Tarifas = Tarifario::whereIn('id', $id)->where('estado', 1)->get();
        //   $this->dispatchBrowserEvent('initSelect2');
        }


    public function render()
    {
        if (isset($this->GuardarCabecera->id)) {
            $this->skus = Produccione::where('cabecera_id', $this->GuardarCabecera->id)->get();
        } else {
          $this->foreot = Cabecera::where('estado', 1)->get();
          $this->GuardarCabecera = Cabecera::find($this->GuardarCabecera);
        }

         $this->code = Cabecera::generate_unique_code(7);

          $this->dispatchBrowserEvent('initSelect1');

        return view('livewire.maquila.ordenes-maquila');
    }
}
