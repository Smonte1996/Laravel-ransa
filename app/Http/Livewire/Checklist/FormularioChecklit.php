<?php

namespace App\Http\Livewire\Checklist;

use App\Models\Chcklt_andene;
use App\Models\Pasillo;
use Livewire\Component;
use App\Models\Seco_frio;
use App\Models\chcklt_fria;
use App\Models\Chcklt_liri;
use App\Models\chcklt_seco;
use App\Models\chcklt_reefer;
use App\Models\Info_checklist;
use Illuminate\Support\Facades\DB;


class FormularioChecklit extends Component
{
     public $seco_frios;
     public $secofrio;
     public $Pasillos;
     public $almacen;
     public $evaluador;
     public $fecha;
     public $pasillo;
     public $Infor_checklist;
     public $bso1;
     public $bso2;
     public $bso3;
     public $bso4;
     public $bso5;
     public $bso6;
     public $bso7;
     public $bso8;
     public $bso9;
     public $bfo1;
     public $bfo2;
     public $bfo3;
     public $bfo4;
     public $bfo5;
     public $bfo6;
     public $bfo7;
     public $bfo8;
     public $bfo9;
     public $bao1; 
     public $bao2; 
     public $bao3; 
     public $bao4; 
     public $bao5; 
     public $bao6; 
     public $bao7;
     public $bro1; 
     public $bro2; 
     public $bro3; 
     public $bro4; 
     public $bro5; 
     public $bro6;
     public $bamo1;
     public $bamo2;
     public $bamo3;
     public $bamo4;
     public $bamo5;
     public $bamo6;
     public $bamo7;
     public $seco_checklist;
     public $consulta;
     public $frio_checklist;
     public $reefer_check;
     public $Puertas_Andenes;
     public $consultaPs;
     public $consultar;
     public $consultaA;
     public $consultam;
     public $Ampliacion_checklist;
    

    public $selectedOptions, $selectedOptions1, $selectedOptions3, $selectedOptions4, $selectedOptions5, $selectedOptions6, $selectedOptions7, $selectedOptions8, $selectedOptions9 = null;
    public $bf1, $bf2, $bf3, $bf4, $bf5, $bf6, $bf7, $bf8, $bf9 = null;
    public $br1, $br2, $br3, $br4, $br5, $br6 = null; 
    public $ba1, $ba2, $ba3, $ba4, $ba5, $ba6, $ba7 = null;
    public $bam1, $bam2, $bam3, $bam4, $bam5, $bam6, $bam7 = null;

    protected $rules = [
     'fecha' => ['required','date'],
     'evaluador' => 'required',
     'almacen' => 'required',
    ];

    function selectAll() 
    {
        $this->selectedOptions = 2;
        $this->selectedOptions1 = 2;
        $this->selectedOptions3 = 2; 
        $this->selectedOptions4 = 2; 
        $this->selectedOptions5 = 2; 
        $this->selectedOptions6 = 2; 
        $this->selectedOptions7 = 2; 
        // $this->selectedOptions8 = 2; 
        // $this->selectedOptions9 = 2;  
     }

     function SelectAmpliacion()
     {
      $this->bam1=2; 
      $this->bam2=2; 
      $this->bam3=2; 
      $this->bam4=2; 
      $this->bam5=2; 
      $this->bam6=2; 
      $this->bam7=2;
     }

     function selectReefer() 
     {
        $this->br1=2; 
        $this->br2=2; 
        $this->br3=2; 
        $this->br4=2; 
        $this->br5=2; 
        $this->br6=2;    
     }

     function SelectAndenes()
     {
           $this->ba1=2; 
           $this->ba2=2; 
           $this->ba3=2; 
           $this->ba4=2; 
           $this->ba5=2; 
          //  $this->ba6=2; 
          //  $this->ba7=2;
     }
     
     function SelectFria() 
     {
        $this->bf1=2; 
        $this->bf2=2; 
        $this->bf3=2; 
        $this->bf4=2; 
        $this->bf5=2; 
        $this->bf6=2; 
        $this->bf7=2; 
        // $this->bf8=2; 
        // $this->bf9=2;   
      }

     function Checklist() 
     {
        $Validarinfor = $this->validate();
        
        $this->Infor_checklist = Info_checklist::create([
         'fecha' => $Validarinfor['fecha'],
         'almacen' => $Validarinfor['almacen'],
         'evaluador' => $Validarinfor['evaluador'],
         'estado' => 1,
        ]);

     }

     function Checklist_seco() 
      {
        //  $ValidarSeco = $this->validate([
          $ValidarSeco = $this->validate(['secofrio'=>'required', 'pasillo'=>'required', 'selectedOptions'=> 'required',  'selectedOptions1'=> 'required', 'selectedOptions3'=> 'required', 'selectedOptions4'=> 'required', 'selectedOptions5'=> 'required', 'selectedOptions6'=> 'required', 'selectedOptions7'=> 'required']);
     if ($ValidarSeco == null) {
        $this->emit('show-sweetalert',[
            'type' => 'warning',
            'title' => 'Todos los campos son obligatorio',
            'message' => 'Por favor, llenar todo los campos.'
        ]);

        return;

       }
    
    
        $this->seco_checklist = chcklt_seco::create([
        'info_checklist_id'=> $this->Infor_checklist->id,
        'seco_frio_id'=> $ValidarSeco['secofrio'],
        'pasillo_id'=> $ValidarSeco['pasillo'],
        'bs1'=> $ValidarSeco['selectedOptions'],
        'bso1'=> $this->bso1,
        'bs2'=> $ValidarSeco['selectedOptions1'],
        'bso2'=> $this->bso2,
        'bs3'=> $ValidarSeco['selectedOptions3'],
        'bso3'=> $this->bso3,
        'bs4'=> $ValidarSeco['selectedOptions4'],
        'bso4'=> $this->bso4,
        'bs5'=> $ValidarSeco['selectedOptions5'],
        'bso5'=> $this->bso5,
        'bs6'=> $ValidarSeco['selectedOptions6'],
        'bso6'=> $this->bso6,
        'bs7'=> $ValidarSeco['selectedOptions7'],
        'bso7'=> $this->bso7,
       
        ]);

        $this->reset('pasillo', 'selectedOptions', 'bso1',  'selectedOptions1','bso2', 'selectedOptions3','bso3',  'selectedOptions4','bso4',  'selectedOptions5','bso5',  'selectedOptions6','bso6',  'selectedOptions7','bso7');
      }

      function Checklist_Ampliacion()
      {
        $validarAmpliacion = $this->validate(['secofrio'=>'required', 'pasillo'=>'required', 'bam1'=>'required', 'bam2'=>'required', 'bam3'=>'required', 'bam4'=>'required', 'bam5'=>'required', 'bam6'=>'required', 'bam7'=>'required']);
        if ($validarAmpliacion == null) {
            $this->emit('show-sweetalert',[
                'type' => 'warning',
                'title' => 'Todos los campos son obligatorio',
                'message' => 'Por favor, llenar todo los campos.'
            ]);

            return;
          }

          $this->Ampliacion_checklist = Chcklt_liri::create([
            'info_checklist_id'=> $this->Infor_checklist->id,
            'seco_frio_id'=> $validarAmpliacion['secofrio'],
            'pasillo_id'=> $validarAmpliacion['pasillo'],
            'bam1' => $validarAmpliacion['bam1'], 
            'bamo1' => $this->bamo1,
            'bam2' => $validarAmpliacion['bam2'], 
            'bamo2' => $this->bamo2,
            'bam3' => $validarAmpliacion['bam3'], 
            'bamo3' => $this->bamo3,
            'bam4' => $validarAmpliacion['bam4'], 
            'bamo4' => $this->bamo4,
            'bam5' => $validarAmpliacion['bam5'], 
            'bamo5' => $this->bamo5,
            'bam6' => $validarAmpliacion['bam6'],
            'bamo6' => $this->bamo6,
            'bam7' => $validarAmpliacion['bam7'],
            'bamo7' => $this->bamo7,
          ]);

          $this->reset('pasillo', 'bam1', 'bam2', 'bam3', 'bam4', 'bam5', 'bam6', 'bam7', 'bamo1', 'bamo2', 'bamo3', 'bamo4', 'bamo5', 'bamo6', 'bamo7');

      }
 

      function Checklist_frio() 
       {
        $ValidarFrio = $this->validate(['secofrio'=>'required', 'pasillo'=>'required', 'bf1'=>'required', 'bf2'=>'required', 'bf3'=>'required', 'bf4'=>'required', 'bf5'=>'required', 'bf6'=>'required', 'bf7'=>'required']);
        if ($ValidarFrio == null) {
            $this->emit('show-sweetalert',[
                'type' => 'warning',
                'title' => 'Todos los campos son obligatorio',
                'message' => 'Por favor, llenar todo los campos.'
            ]);
    
            return;
    
           }  

           $this->frio_checklist = chcklt_fria::create([
            'info_checklist_id'=> $this->Infor_checklist->id,
            'seco_frio_id'=> $ValidarFrio['secofrio'],
            'pasillo_id'=> $ValidarFrio['pasillo'],
            'bf1'=> $ValidarFrio['bf1'],
            'bfo1'=> $this->bfo1,
            'bf2'=> $ValidarFrio['bf2'],
            'bfo2'=> $this->bfo2,
            'bf3'=> $ValidarFrio['bf3'],
            'bfo3'=> $this->bfo3,
            'bf4'=> $ValidarFrio['bf4'],
            'bfo4'=> $this->bfo4,
            'bf5'=> $ValidarFrio['bf5'],
            'bfo5'=> $this->bfo5,
            'bf6'=> $ValidarFrio['bf6'],
            'bfo6'=> $this->bfo6,
            'bf7'=> $ValidarFrio['bf7'],
            'bfo7'=> $this->bfo7, 
           ]);

           $this->reset('pasillo', 'bf1', 'bf2', 'bf3', 'bf4', 'bf5', 'bf6', 'bf7', 'bfo1', 'bfo2', 'bfo3', 'bfo4', 'bfo5', 'bfo6', 'bfo7');
       }

       function Checklist_reefer()
       {
        $ValidarReefer = $this->validate(['secofrio'=>'required', 'pasillo'=>'required','br1'=>'required', 'br2'=>'required', 'br3'=>'required', 'br4'=>'required', 'br5'=>'required', 'br6'=>'required']);
          if ($ValidarReefer == null) {
            $this->emit('show-sweetalert',[
                'type' => 'warning',
                'title' => 'Todos los campos son obligatorio',
                'message' => 'Por favor, llenar todo los campos.'
            ]);
    
            return;
          }

          $this->reefer_check = chcklt_reefer::create([
            'info_checklist_id'=> $this->Infor_checklist->id,
            'seco_frio_id'=> $ValidarReefer['secofrio'],
            'pasillo_id'=> $ValidarReefer['pasillo'],
            'br1' => $ValidarReefer['br1'], 
            'bro1' => $this->bro1,
            'br2' => $ValidarReefer['br2'], 
            'bro2' => $this->bro2,
            'br3' => $ValidarReefer['br3'], 
            'bro3' => $this->bro3,
            'br4' => $ValidarReefer['br4'], 
            'bro4' => $this->bro4,
            'br5' => $ValidarReefer['br5'], 
            'bro5' => $this->bro5,
            'br6' => $ValidarReefer['br6'], 
            'bro6' => $this->bro6,
          ]);

          $this->reset('pasillo', 'br1', 'br2', 'br3', 'br4', 'br5', 'br6',  'bro1', 'bro2', 'bro3', 'bro4', 'bro5', 'bro6');
       }

       function checklsit_andene()
       {
        $ValidarAnden = $this->validate(['secofrio'=>'required', 'pasillo'=>'required', 'ba1'=>'required', 'ba2'=>'required', 'ba3'=>'required', 'ba4'=>'required', 'ba5'=>'required']);
        if ($ValidarAnden == null) {
          $this->emit('show-sweetalert',[
              'type' => 'warning',
              'title' => 'Todos los campos son obligatorio',
              'message' => 'Por favor, llenar todo los campos.'
          ]);
  
          return;
        }

        $this->Puertas_Andenes = Chcklt_andene::create([
          'info_checklist_id'=> $this->Infor_checklist->id,
          'seco_frio_id'=> $ValidarAnden['secofrio'],
          'pasillo_id'=> $ValidarAnden['pasillo'],
          'ba1' => $ValidarAnden['ba1'], 
          'bao1' => $this->bao1,
          'ba2' => $ValidarAnden['ba2'], 
          'bao2' => $this->bao2,
          'ba3' => $ValidarAnden['ba3'], 
          'bao3' => $this->bao3,
          'ba4' => $ValidarAnden['ba4'], 
          'bao4' => $this->bao4,
          'ba5' => $ValidarAnden['ba5'], 
          'bao5' => $this->bao5,
        ]);

        $this->reset('pasillo', 'ba1', 'ba2', 'ba3', 'ba4', 'ba5',  'bao1', 'bao2', 'bao3', 'bao4', 'bao5');
        
       }

       function Enviar() 
       {
        $affected = DB::table('info_checklists')
        ->where('id', $this->Infor_checklist->id)
        ->update(['estado' => 2]);

         return redirect()->route('adm.Check.list');
       }

    function updatedsecofrio($seco_frio_id)
    {
      $this->Pasillos = Pasillo::where('seco_frio_id', $seco_frio_id)->get();
    }

     
    public function render() {
      switch ($this->almacen) {
        case 'Bodega Uio':
          $this->seco_frios = Seco_frio::whereIn('id', [1,2,3,4])->get();
          break;
   
        default:
        $this->seco_frios = Seco_frio::all();
          break;
      } 

        if (isset($this->seco_checklist->id)){
         $excepto = chcklt_seco::where('info_checklist_id', $this->Infor_checklist->id)->get();
        foreach ($excepto as $exceptos) {
          $consultaP[] = $exceptos->pasillo_id;
        }
        $consulta = $consultaP;
        //  dd($this->consulta);
        $this->Pasillos = DB::table('pasillos')->where('seco_frio_id', $this->secofrio)->whereNotIn('id', $consulta)->get(); 
      }elseif(isset($this->frio_checklist->id)){
        $excepto = chcklt_fria::where('info_checklist_id', $this->Infor_checklist->id)->get();
         foreach ($excepto as $exceptos) {
          $consultaPf[] = $exceptos->pasillo_id;
        }
        $consultaPs = $consultaPf;
        //  dd($this->consultaPs);
        $this->Pasillos = DB::table('pasillos')->where('seco_frio_id', $this->secofrio)->whereNotIn('id', $consultaPs)->get();
      }elseif (isset($this->reefer_check->id)) {
         $excepto = chcklt_reefer::where('info_checklist_id', $this->Infor_checklist->id)->get();
         foreach ($excepto as $exceptos) {
          $consultaPr[] = $exceptos->pasillo_id;
        }
        $consultar = $consultaPr;
        //  dd($this->consulta);
        $this->Pasillos = DB::table('pasillos')->where('seco_frio_id', $this->secofrio)->whereNotIn('id', $consultar)->get();
      }elseif (isset($this->Ampliacion_checklist->id)) {
        $excepto = Chcklt_liri::where('info_checklist_id', $this->Infor_checklist->id)->get();
         foreach ($excepto as $exceptos) {
          $consultaPam[] = $exceptos->pasillo_id;
        }
        $consultam = $consultaPam;
        $this->Pasillos = DB::table('pasillos')->where('seco_frio_id', $this->secofrio)->whereNotIn('id', $consultam)->get();
      }elseif (isset($this->Puertas_Andenes->id)) {
       $excepto = Chcklt_andene::where('info_checklist_id', $this->Infor_checklist->id)->get();
         foreach ($excepto as $exceptos) {
          $consultaPa[] = $exceptos->pasillo_id;
        }
        $consultaA = $consultaPa;
        //  dd($this->consulta);
        $this->Pasillos = DB::table('pasillos')->where('seco_frio_id', $this->secofrio)->whereNotIn('id', $consultaA)->get();
      }
   
      // dd($this->Infor_checklist->check_seco->pasillo_id);
        return view('livewire.checklist.formulario-checklit');
    }
}
