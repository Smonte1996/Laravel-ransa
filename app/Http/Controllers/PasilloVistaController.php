<?php

namespace App\Http\Controllers;

use PDF;
use App\Models\Info_checklist;
use App\Models\Pasillo;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Nette\Utils\Arrays;

class PasilloVistaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $Pasillos_vista = Info_checklist::where('estado', 2)->get();
        return view('modulos.Check_pasillo.formulariopasillo', compact('Pasillos_vista'));
    }


     /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function Informepdf($id)
    {
        //
         $pdf = Info_checklist::find($id);
        
        //   $SupervisoreP[];
         foreach ($pdf->check_seco as $pdfs) {
             $SupervisoreP[] = ['name' => $pdfs->Pasillos->supervisor->name];
         }
         $consulta = collect($SupervisoreP);
        //  dd($consulta);
        $resultado = [($consulta->firstWhere('name','MIGUEL ANGEL RONQUILLO FRANCO'))['name'], ($consulta->firstWhere('name','JORGE ANTONIO PIVAQUE RODRIGUEZ'))['name'], ($consulta->firstWhere('name','MARTHA CECILIA BORBOR ALDAZ'))['name'], ($consulta->firstWhere('name','JAIRO JAVIER ESPINOZA MOLINA'))['name'], ($consulta->firstWhere('name','Melissa Lisbeth Baño Vera'))['name'], ($consulta->firstWhere('name','Giancarlo David Barreiro Piloso'))['name']];
        $superisores = $resultado;
        
        foreach ($pdf->check_frio as $frios) {
             $superisoreF[] = ['name' => $frios->Pasillos->supervisor->name];
        }
        $consulta1 = collect($superisoreF);
        $resultado1 = [($consulta1->firstWhere('name','MIGUEL ANGEL RONQUILLO FRANCO'))['name'], ($consulta->firstWhere('name','MARTHA CECILIA BORBOR ALDAZ'))['name']];
        $supervioresF = $resultado1;

        foreach ($pdf->check_reefer as $reefer) {
            $superisoreR[] = ['name' => $reefer->Pasillos->supervisor->name];
        }
        $consultar2 = collect($superisoreR);
        //  dd($consultar2);
        $resultado2 = [($consultar2->firstWhere('name','LUIS VICENTE CARCHIPULLA MOYA'))['name']];
        $supervioresR = $resultado2;
           //dd($supervioresR);
        // $filtro = DB::table('pasillos as p')
        // ->join('chcklt_secos as cs', 'p.id', '=' , 'cs.pasillo_id')
        // ->join('users as u','p.user_id', '=', 'u.id')
        // ->select('cs.id', 'cs.bs1', 'cs.bs2', 'cs.bs3', 'cs.bs4', 'cs.bs5', 'cs.bs6', 'cs.bs7')
        // ->where('cs.info_checklist_id', $id)
        // ->whereIn('u.name', ['STEVEN RONALDO MONTENEGRO TORRES '])->get();
    //   $steven = BodegaSeca($id, 'STEVEN RONALDO MONTENEGRO TORRES ');
    //   $jorge = BodegaSeca($id, 'JORGE MIGUEL MONSERRATTE CONTRERAS');
    //   $cecilia = BodegaSeca($id, 'MARTHA CECILIA BORBOR ALDAZ');
    
        // $jorge = DB::table('pasillos as p')
        // ->join('chcklt_secos as cs', 'p.id', '=' , 'cs.pasillo_id')
        // ->join('users as u','p.user_id', '=', 'u.id')
        // ->select('cs.id', 'cs.bs1', 'cs.bs2', 'cs.bs3', 'cs.bs4', 'cs.bs5', 'cs.bs6', 'cs.bs7')
        // ->where('cs.info_checklist_id', $id)
        // ->whereIn('u.name', ['JORGE MIGUEL MONSERRATTE CONTRERAS'])->get();

        // dd($filtro, $jorge);
        // $filtros = DB::table('pasillos as p')
        // ->join('chcklt_frias as cf', 'p.id', '=' , 'cf.pasillo_id')
        // ->join('users as u','p.user_id', '=', 'u.id')
        // ->select('cf.id', 'cf.bf1', 'cf.bf2', 'cf.bf3', 'cf.bf4', 'cf.bf5', 'cf.bf6', 'cf.bf7')
        // ->where('cf.info_checklist_id', $id)
        // ->whereIn('u.name', ['STEVEN RONALDO MONTENEGRO TORRES '])->get();

        

       // Funcion de para calcular todo los valores de bodega seca
        function BodegaSeca($id, $nombre):float{
        $Porcentaje_total = 0;
        $filtro = DB::table('pasillos as p')
        ->join('chcklt_secos as cs', 'p.id', '=' , 'cs.pasillo_id')
        ->join('users as u','p.user_id', '=', 'u.id')
        ->select('cs.id', 'cs.bs1', 'cs.bs2', 'cs.bs3', 'cs.bs4', 'cs.bs5', 'cs.bs6', 'cs.bs7')
        ->where('cs.info_checklist_id', $id)
        ->whereIn('u.name', [$nombre])->get();

        foreach ($filtro as $total) {
         $porcentaje = $total->bs1 + $total->bs2 + $total->bs3 + $total->bs4 + $total->bs5 + $total->bs6 + $total->bs7;
         $Porcentaje_total += ($porcentaje*100/14);
        }
        if (count($filtro)>0) {          
        $Porcentaje_total/= count($filtro);
        }
        return $Porcentaje_total;
        }

        foreach ($superisores as $superisor ) {
            $bodega_seca[] = BodegaSeca($id, $superisor);
        }
        // dd($steven);

      // Funcion de para calcular todo los valores de bodega fria
        function Bodega_fria($id, $nombre):float{
            $Porcentaje_total = 0;
            $filtros = DB::table('pasillos as p')
        ->join('chcklt_frias as cf', 'p.id', '=' , 'cf.pasillo_id')
        ->join('users as u','p.user_id', '=', 'u.id')
        ->select('cf.id', 'cf.bf1', 'cf.bf2', 'cf.bf3', 'cf.bf4', 'cf.bf5', 'cf.bf6', 'cf.bf7')
        ->where('cf.info_checklist_id', $id)
        ->whereIn('u.name', [$nombre])->get();

            foreach ($filtros as $total) {
             $porcentaje = $total->bf1 + $total->bf2 + $total->bf3 + $total->bf4 + $total->bf5 + $total->bf6 + $total->bf7;
             $Porcentaje_total += ($porcentaje*100/14);
            } 
            if (count($filtros)>0) {      
            $Porcentaje_total/= count($filtros);
            }
            return $Porcentaje_total;
            }

            foreach ($supervioresF as $superisore) {
                $bodegafria[] = Bodega_fria($id, $superisore);
            }
            // dd($bodegafria);
     // Funcion de para calcular todo los valores de bodega reefer
        function Bodegareefer($id, $nombre):float{
            $Porcentaje_total = 0;
            $filtros = DB::table('pasillos as p')
            ->join('chcklt_reefers as cr', 'p.id', '=' , 'cr.pasillo_id')
            ->join('users as u','p.user_id', '=', 'u.id')
            ->select('cr.id', 'cr.br1', 'cr.br2', 'cr.br3', 'cr.br4', 'cr.br5', 'cr.br6')
            ->where('cr.info_checklist_id', $id)
            ->whereIn('u.name', [$nombre])->get();

            foreach ($filtros as $total) {
             $porcentaje = $total->br1 + $total->br2 + $total->br3 + $total->br4 + $total->br5 + $total->br6;
             $Porcentaje_total += ($porcentaje*100/12);
            }  
            if (count($filtros)>0) {     
            $Porcentaje_total/= count($filtros);
            }
            return $Porcentaje_total;
            }
            foreach ($supervioresR as $superisoress ) {
                $bodega_reefer[] = Bodegareefer($id, $superisoress);
            }
           
            
     // Funcion de para calcular todo los valores de bodega reefer
        function Bodegaliris($id, $nombre):float{
            $Porcentaje_total = 0;
            $filtros = DB::table('pasillos as p')
            ->join('chcklt_liris as cl', 'p.id', '=' , 'cl.pasillo_id')
            ->join('users as u','p.user_id', '=', 'u.id')
            ->select('cl.id', 'cl.bam1', 'cl.bam2', 'cl.bam3', 'cl.bam4', 'cl.bam5', 'cl.bam6', 'cl.bam7')
            ->where('cl.info_checklist_id', $id)
            ->whereIn('u.name', [$nombre])->get();

            foreach ($filtros as $total) {
             $porcentaje = $total->bam1 + $total->bam2 + $total->bam3 + $total->bam4 + $total->bam5 + $total->bam6 + $total->bam7;
             $Porcentaje_total += ($porcentaje*100/14);
            }  
            if (count($filtros)>0) {     
            $Porcentaje_total/= count($filtros);
            }
            return $Porcentaje_total;
            }
            foreach ($supervioresR as $superiso ) {
                $bodega_amplicion[] = Bodegaliris($id, $superiso);
            }

         // $Valor_porcentaje = ($bodega_seca + $bodegafria + $bodega_reefer);

          for ($i=0; $i < count($bodega_seca) ; $i++) { 
            $total[]=[$bodega_seca[$i], $superisores[$i]];
            // $total[]=$bodega_seca[$i];
            // $total1[]=$superisores[$i];
          }
          for ($i=0; $i < count($bodegafria) ; $i++) { 
            $total1[]=[$bodegafria[$i], $supervioresF[$i]];
          }

          for ($i=0; $i < count($bodega_reefer) ; $i++) { 
            $total2[]=[$bodega_reefer[$i], $supervioresR[$i]]; 
          }

          for ($i=0; $i < count($bodega_amplicion) ; $i++) { 
            $total3[]=[$bodega_amplicion[$i], $supervioresR[$i]]; 
          }

           //dd($total2);
        //   dd($Valor_porcentaje);
            //  dd(BodegaSeca($id, ''));
            // $BodegaSeca = BodegaSeca($filtro);
            // $BodegaFria = Bodega_fria($filtros);
    //   dd(BodegaSeca($filtro));
        //  $Porcentaje = $filtro->id;
        // $Pasillos = collect($Bodega_seca);
        // $filtered = $Pasillos->filter(function ($value, $key) {
        //     return $value == 1; 
        // });
        // $Porcentajes = $filtered->all();

        //  dd($filtro);
        //  $supervisores = Pasillo::whereIn('user_id',[1,7,8])->get();
        //  foreach ($supervisores as $Supervisor) {
        //     $Responsables[] = ['name' => $Supervisor->supervisor->name];
        //  }
        //   $data = collect($Responsables);
        //   $datas = $data->collapse();
        //  dd($datas);
        //  foreach ($pdf->check_frio as $Frio) {
        //     $Bodega_fria[] = $Frio->Pasillos->supervisor['name'];
        //  }
        //  $Fria = $Bodega_fria;
         //dd($Bodega_fria);

        $pdfs = PDF::loadView('pdf.Informe_checklist', compact('pdf', 'total', 'total1', 'total2', 'total3'));
        
        return $pdfs->stream(strtoupper("Checklist Pasillo.pdf"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
