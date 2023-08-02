<?php

namespace App\Http\Livewire\Guest;

use App\Models\sede;
use Livewire\Component;
use App\Models\solicitude;
use App\Models\tipo_reclamo;
use Livewire\WithFileUploads;
use App\Models\servicio_ransa;
use App\Mail\notificacionregistro;
use App\Models\Adicional;
use Illuminate\Support\Facades\Mail;

class ReclamoCliente extends Component
{
    use WithFileUploads;

    public $Nombres;
    public $email;
    public $celular;
    public $Empresa;
    public $sede;
    public $tipo;
    public $servicio = null;
    public $fecha;
    public $descripcion;
    public $imagen;
    public $codigo;
    public $estado;
    public $sub_servicio = null;
    public $titulo;
    public $adicionals = null;
    public $tipos;
    public $servicios;

    protected $rules = [
    'Nombres' => ['required', 'max:60', 'regex:/^[\pL\s]+$/u'],
    'email' => ['required', 'email','max:50'],
    'celular' => ['required', 'max:10'],
    'Empresa' => 'required',
    'sede' => 'required',
    'tipo' => 'required',
    'sub_servicio' => 'required',
    'servicio' => 'required',
    'fecha' => 'required',
    'descripcion' => ['required', 'regex:/^(?=.*[a-zA-Z])(?=[^{}[\]+*]+$)/'],
    'titulo' => 'required',
    'imagen' => ['nullable','max:3024','image','mimes:jpeg,png,jpg']
    ];

    // public function updated($propertyName)
    // {
    //     $this->validateOnly($propertyName);
    // }

    public function mount()
    {
          $this->servicios = servicio_ransa::all();
          $this->tipos = tipo_reclamo::all();
    }

    public function updatedservicio($servicio_ransa_id)
    {
       $this->adicionals = Adicional::where('servicio_ransa_id', $servicio_ransa_id)->get();
    }

    public function RegistarReclamo()
    {
          $datos = $this->validate();

      if (!is_null($this->imagen)) {
        $imagen = $this->imagen->store('public/Reclamos');
        $datos['imagen'] = str_replace('public/Reclamos/',' ', $imagen);
        }

         function codigos(){
         $strengt = 4;
         $codigo = '0123456789aqwertyuiopsdfghjklzxcvbnmQWERTYUIOPASDFGHJKLZXCVBNM';
         $input_length = strlen($codigo);
         $random_string = 'Rq';
        for ($i=0; $i < $strengt ; $i++) { 
              $random_character = $codigo[mt_rand(0, $input_length - 1)];
              $random_string .= $random_character;
        }
        return $random_string;
         }

        $codigo = codigos();

      $notificacionregistro = solicitude::create([
            'nombre' => $datos['Nombres'],
            'correo' => $datos['email'],
            'celular' => $datos['celular'],
            'cliente' => $datos['Empresa'],
            'sede_id' => $datos['sede'],
            'tipo_reclamo_id' => $datos['tipo'],
            'servicio_ransa_id' => $datos['servicio'],
            'adicional_id' => $datos['sub_servicio'],
            'codigo_generado' => $codigo,
            'Descripcion' => $datos['descripcion'],
            'titulo' => $datos['titulo'],
            'estado' => 1,
            'fecha_registro' => $datos['fecha'],
            'imagen' => $datos['imagen'],
        ]);

        Mail::to([$this->email ,"stevemontenegro_9@hotmail.com"])->send(new notificacionregistro($notificacionregistro));

        $this->reset(['Nombres','email','celular','Empresa','sede','tipo','servicio','sub_servicio','descripcion','titulo','fecha','imagen']);

        $this->emitTo('Reclamo','render');

        $this->emit('alert','Muchas gracias, nuestro equipo ya recibió tu solicitud. Pronto te enviaremos una respuesta');

        session()->flash('mensaje','');

         redirect()->back();
    } 

    public function render()
    {
       
        $sedes = sede::all();
       
        return view('livewire.guest.reclamo-cliente', compact('sedes'))->layout('layouts.guest2');
    }
}
