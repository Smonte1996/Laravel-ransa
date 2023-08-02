<?php

namespace App\Http\Livewire\Guest;

use App\Models\Client;
use Livewire\Component;
use App\Models\Muestreo;
use Livewire\WithFileUploads;
use App\Models\Data_logistica;
use App\Models\File_evidencia;
use App\Mail\NotificacionInforme;
use App\Models\Aql_defecto;
use App\Models\Defecto;
use App\Models\Evidencia_muestreo;
use App\Models\Matriz_defecto;
use App\Models\Niveles_estandar;
use App\Models\Tamano_muestra;
use PDF;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class Muestreos extends Component
{
   use WithFileUploads;

   
    public $datas;
    public $tamaño_muestreo; 
    public $data_logis;
    public $logis;
    public $bodega;
    public $clientes;
    public $cliente;
    public $contenedor;
    public $fecha_elaboracion;
    public $fecha_vencimiento;
    public $etiqueta;
    public $Guia;
    public $vida_logistica;
    public $fecha_recepcion;
    public $hora_recepcion;
    public $pedido;
    public $responsable;
    public $pvp;
    public $sku;
    public $nivelesestandars = null;
    public $letratamano = null;
    public $imagen_muestreo;
    public $cantidad;
    public $lote;
    public $Muestras = null;
    public $Letras = null;
    public $Niveles;
    public $registro_sanitario;
    public $Evidencias;
    public $obsrva;
    public $estatus;
    public $Muestreos;
    public $Matrices = null;
    public $matrizdefecto;
    public $Evidencia_muestreos;
    public $defectoProducto = null;
    public $Defectos = null;
    public $Matrices_defectos = null;
    public $descrip = null;
    public $open = false;
    public $Unilever_defectos;
    public $Quipitos_defectos;
    public $Nutribela_defectos;
    public $Aqls;
    public $acrec;
    public $Aceptaciones;
    public $cantidad_caja;
    public $caja_un;
 


    protected $rules = [
        'bodega' => 'required',
        'clientes' => 'required',
        // 'regex:/^(?=.*[a-zA-Z])(?=[^{}[\]+*]+$)/'
        'contenedor' => ['required'],
        'Guia' => ['required' , 'numeric'],
        'fecha_recepcion' => ['required', 'date'],
        'hora_recepcion' => ['required', 'date_format:H:i'],
        'pedido' => ['nullable','numeric'],
        'responsable' => ['required', 'regex:/^[\pL\s]+$/u'],
        // 'sku' => 'required',
        // 'cantidad' => 'required',
        // 'nivelesestandars' => 'required',
        // 'letratamano' => 'required',
        // 'vida_logistica' => 'required',
        // 'pvp' => 'required',
        // 'lote' => 'required',
        // 'etiqueta' => 'required',
        // 'cantidad' => ['required' , 'numeric'],
        // 'nivel_muestreo' => ['required'],
    ];

    // public function updated($propertyName)
    // {
    //     $this->validateOnly($propertyName);
    // }
    
      public function RegistrarInfor() 
    {
       $dataInfor = $this->validate();

       $this->Muestreos = Muestreo::create([
        'bodega' => $dataInfor['bodega'],
        'client_id' => $dataInfor['clientes'],
        'contenedor' => strtoupper($dataInfor['contenedor']),
         'guias' => $dataInfor['Guia'],
         'fecha_recepcion' => $dataInfor['fecha_recepcion'],
         'hora_recepcion' => $dataInfor['hora_recepcion'] ,
         'n_pedido' => $dataInfor['pedido'],
         'responsable' => $dataInfor['responsable'] ,
         'estado' => 1,
        
    ]);
      
    }

    public function validarCampos()
    {
        $dato = $this->validate([
        'sku' => 'required',
        'cantidad' => 'required',
        'nivelesestandars' => 'required',
        'letratamano' => 'required',
        'vida_logistica' => 'required',
        'pvp' => 'required',
        'lote' => 'required',
        'etiqueta' => 'required',
        'registro_sanitario' =>'required',
        'estatus'=>'required', ]);
        
        $this->Evidencias = Evidencia_muestreo::create([
            'muestreo_id' => $this->Muestreos->id,
            'data_logistica_id' => $dato['sku'],
            'tamano_muestra_id' => $dato['letratamano'],
            'niveles_estandar_id' => $dato['nivelesestandars'],
            'sku_quala' => 'na',
            'cantidad' => $dato['cantidad'],
            'registro_sanitario' => $dato['registro_sanitario'],
            'fecha_elaboracion' => $this->fecha_elaboracion,
            'fecha_vencimiento' => $this->fecha_vencimiento,
            'vida_util' => $dato['vida_logistica'],
            'lote_fecha' => $dato['lote'],
            'etiqueta_producto' => $dato['etiqueta'],
            'matriz_defecto_id'=> $this->defectoProducto,
            'defecto_id' => $this->matrizdefecto,
            'aql_defecto_id' =>$this->acrec,
            'cantidad_caja' => $this->cantidad_caja,
            'caja_un' => $this->caja_un,
            'pvp' => $dato['pvp'],
            'estado' => 1,
            'estatu_producto' => $dato['estatus'],
            'observacion' => $this->obsrva,
        ]);

           if (!is_null($this->imagen_muestreo)) {
             foreach ($this->imagen_muestreo as $image) {
                 $url =  $image->store('public/evidencia_muestreo');
                 $files_evidecencia = File_evidencia::create([
                     'muestreo_id' => $this->Muestreos->id,
                     'evidencia_muestreo_id' => $this->Evidencias->id,
                     'data_logistica_id' => $dato['sku'],
                     'name' => $image->hashName(),
                 ]);
             }
         }

        $this->reset(['sku','letratamano','nivelesestandars','cantidad','vida_logistica','lote','etiqueta','pvp', 'fecha_elaboracion', 'fecha_vencimiento', 'open', 'defectoProducto', 'matrizdefecto','registro_sanitario', 'imagen_muestreo', 'cantidad_caja', 'caja_un', 'acrec', 'estatus']);

    }

    public function EnviosCorreo()
    {
        $affected = DB::table('muestreos')
            ->where('id', $this->Muestreos->id)
            ->update(['estado' => 2]);

            $Tabla_evidencia = DB::table('evidencia_muestreos')
            ->where('muestreo_id', $this->Muestreos->id)
            ->update(['estado' => 2]);

         switch ($this->Muestreos->client_id) {
             case '1':
                 Mail::to(['smontenegrot@ransa.net'])->cc(['stevenmontorres96@gmail.com', 'stevemontenegro_9@hotmail.com'])->send(new NotificacionInforme($this->Muestreos));
                 break;
      
             default:
             Mail::to(['stevenmontorres96@gmail.com'])->cc(['smontenegrot@ransa.net', 'stevemontenegro_9@hotmail.com'])->send(new NotificacionInforme($this->Muestreos));
                 break;
         }
           return redirect()->route('muestreo.cliente');
    }

    public function mount()
    {
        $this->cliente = Client::whereIn('id',[1,2])->get();
        $this->data_logis = Data_logistica::all();
        $this->Niveles = Niveles_estandar::all();

        $this->Matrices_defectos = Matriz_defecto::where('Marca', 'Saviloe')->get();
        $this->Unilever_defectos = Matriz_defecto::where('Marca', 'UNILEVER')->get();
        $this->Quipitos_defectos = Matriz_defecto::where('Marca', 'QUIPITOS')->get();
        $this->Nutribela_defectos = Matriz_defecto::where('Marca', 'NUTRIBELA')->get();
    }

    public function updatednivelesestandars($niveles_estandar_id)
      {
         $this->Letras = Tamano_muestra::where('niveles_estandar_id', $niveles_estandar_id)->get();
      }
      public function updatedletratamano($niveles_estandar_id)
      {
        $this->Muestras = Tamano_muestra::where('id', $niveles_estandar_id)->get();

        $this->Aqls = Aql_defecto::where('tamano_muestra_id', $niveles_estandar_id)->get();
      }

      public function updatedacrec($id)
       {
        $this->Aceptaciones = Aql_defecto::where('id', $id)->get();
      }

      public function updateddefectoProducto($matriz_defecto_id)
      {
        $this->Defectos = Defecto::where('matriz_defecto_id', $matriz_defecto_id)->get();
      }

      public function updatedmatrizdefecto($id)
      {
        $this->descrip = Defecto::where('id', $id)->get();
       }

        // public function updateddefectoProducto($matriz_defecto_id)
        // {
        //   //dd($matriz_defecto_id);
        //   $this->Matrices = Aql_defecto::where('id', $matriz_defecto_id)->get();
        //   // dd($this->Matrices);
        // }

    public function render()
    {
          
        if (empty($this->sku)) {
            $this->datas = Data_logistica::where('id', $this->sku)->get();
       }else{
          $this->datas = Data_logistica::where('id', $this->sku)->get();
          //   $this->datas = Data_logistica::where('id', 'like', '%'.$this->sku.'%')->get();  
       };

       if(empty($this->sku)) {
        $this->logis = Data_logistica::find($this->sku);
       }if($this->sku){ 
         $this->logis = Data_logistica::find($this->sku);
       if(today()->diffInDays($this->fecha_elaboracion) + today()->diffInDays($this->fecha_vencimiento) == $this->logis->vida_util) {
          $this->vida_logistica = "Si";

       }if(today()->diffInDays($this->fecha_elaboracion) + today()->diffInDays($this->fecha_vencimiento) <> $this->logis->vida_util) {
            $this->vida_logistica = "No";
          } else {
            // $this->vida_logistica = "No aplica";
    }
  }
    $this->Evidencia_muestreos = Evidencia_muestreo::where('estado', 1)->get();
        //  }if([empty($this->logis->vida_util) <= "N/A"]) {

        //     $this->vida_logistica = "No aplica";
        //  }

        return view('livewire.guest.muestreos')->layout('layouts.guest2');
    }
}
