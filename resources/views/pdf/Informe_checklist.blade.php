<!doctype html>
<html lang="es">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <style>
         @page {
            margin: 0cm 0cm 0cm;
        }

        body {
            margin: 2.5cm 1cm 1cm;
            font-family: Verdana, Geneva, Tahoma, sans-serif;
        }

        /* table{
            margin: 0cm 0cm 0cm;
        } */

        .page-break {
	    page-break-after: always;
      	}

     header {
            position: fixed;
            top: 0.50cm;
            bottom: 0cm;
            left: 0cm;
            right: 0cm;
            height: 5cm;
            color: #05941d;
            line-height: 50px;
        }

     .color{
        background-color: black;
     }
     .naranja{
        color: #F29104;
        margin-left: 0.90cm;
        margin-bottom: 0.60cm;
     }
     
      .container {
        display: flex;
      }

      .columns {
        display: inline-block;
        box-sizing: border-box;
        margin: 5px;
        padding: 5px;
        -webkit-columns: 150px 3;
        -moz-columns: 150px 3;
        columns: 150px 3;
        column-fill: auto;
        column-gap: 10px;
        border-radius: 5px;
        font-size: 16px;
        margin-top: 50px;
        }
    
      hr, .grosor{
          height: 2px;
          background-color: black;
     }
     .cabecera{
        background-color: #b9b9b9;
     }
     .verde{
        background-color: #05941d;
     }
     .gris{
        background-color: gray;
     }
     .grisclaro{
        background-color: #E8E8E8;
     }
     .tamaño_letra{
        font-size: 10px;
     }
     .verticalText {
        writing-mode: vertical-lr;
        transform: rotate(90deg);
        }

        footer {
            position: fixed;
            bottom: 0cm;
            left: 0cm;
            right: 0cm;
            /* height: 1cm; */
            text-align: left;
            line-height: 10px;
        }
    </style>

    <title>Checklist de Pasillo</title>
  </head>
  <body>
    <header>
        <img src="img/logo.png" width="200">
         <img src="img/Pasillo.png" width="340">

         {{-- <div class="naranja pb-4"> 
            <label><strong>Verificar el cumplimiento de criterios de orden y limpieza en almacén</strong></label>
          </div>  --}}
    </header>
    {{-- <h1 class="text-center">1. Datos Generales</h1>
    <hr class="grosor"/> --}}
    
    <div class="text-center pt-2 m-2">   
    <table width="100%" class="pt-3" cellspacing="0" cellpadding="3" >
        <tr class="cabecera " align="center">
            <td colspan="6" class="border border-dark" style="font-size:13px;"><strong>Datos Generales</strong></td>
        </tr>
            <tr>
                <td align="left" class="border border-dark" style="font-size:12px;">
                    <strong>
                    Fecha:
                    </strong>
                </td>
                <td colspan="" class="border border-dark text-center" style="font-size:12px;">
                    {{$pdf->fecha}} 
                </td>

                <td align="left" class="border border-dark" style="font-size:12px;">
                    <strong>
                   Almacén:
                </strong>
                </td>
                <td colspan="" class="border border-dark text-center" style="font-size:12px;">
                    {{$pdf->almacen}} 
                </td>
            
                <td align="left" class="border border-dark" style="font-size:12px;">
                    <strong>
                   Auidor:
                    </strong>
                </td>
                <td colspan="" class="border border-dark text-center" style="font-size:12px;">
                    {{$pdf->evaluador}}
                </td>
            </tr>
    </table>
  </div>

  <table width="100%" class="pt-1" cellspacing="0" cellpadding="3">
    <tr class="cabecera " align="center">
        <td colspan="4" class="border border-dark" style="font-size:13px;"><strong>Criterio de calificación</strong></td>
    </tr>
    <tr>
        <td class="border border-dark" align="center" style="font-size:12px;">
            Cumple(2)
        </td>
        <td colspan="2" align="center" class="border border-dark" style="font-size:12px;">
            Cumple parcialmente(1)
        </td>
        <td align="center" class="border border-dark" style="font-size:12px;">
            No cumple(0)
        </td>
        
    </tr>
    <tr>
        <td class="border border-dark" style="font-size:12px;" align="center">
            El items evaluado se cumple en su totalidad. No se evidencia incumplimiento alguno (0 hallazgos).
        </td>
        <td colspan="2" class="border border-dark" style="font-size:12px;" align="center">
            El items evaluado se cumple de forma parcial y se evidencia un bajo número de incumplimientos (1-2 hallazgos).
        </td>
        <td class="border border-dark" style="font-size:12px;" align="center">
            El items evaluado se cumple de forma parcial y se evidencia un número significativo de incumplimientos (3 hallazgos o más).
        </td>
    </tr>
    <tr class="cabecera " align="center">
        <td colspan="4" class="border border-dark" style="font-size:14px;"><strong>Calificación</strong></td>
    </tr>
    <tr>
        <td class="border border-dark" style="font-size:12px;" align="center">
        Regular =< 74
        </td>
        <td class="border border-dark" style="font-size:12px;" align="center">
            Bueno 75 - 84 %
        </td>
        <td class="border border-dark" style="font-size:12px;" align="center">
            Muy Bueno 85 - 94 %
        </td>
        <td class="border border-dark" style="font-size:12px;" align="center">
            Excelente => 95 %
        </td>
    </tr>
  </table>

  <table width="100%" class="pt-3 border border-dark" cellspacing="0" cellpadding="3">
    <tr class="cabecera " align="center">
        <td colspan="3" class="border border-dark" style="font-size:13px;"><strong>Bodega Seca(Aplica para Quito y Guayaquil)</strong></td>
    </tr>
    <tr>
        <td class="border border-start-0" style="font-size:12px;">
            1. Los suelos están limpios, secos, sin desperdicios ni material innecesario.
        </td>
        <td class="border border-start-0" style="font-size:12px;">
            4. Las cajas se apilan de manera ordenada y no hay producto expuesto o derramado.
        </td>
        <td class="border border-end-0" style="font-size:12px;">
            6. El pasillo cumple en orden y limpieza.
        </td>
    </tr>
    <tr>
        <td class="border border-start-0" style="font-size:12px;">
            2. Los Pallets se encuentran limpios y en buen estado.
        </td>
        <td class="border border-start-0" style="font-size:12px;">
            5. No existe Film colgado.
        </td>
        <td class="border border-end-0" style="font-size:12px;">
            7. Los pasillos, zonas de transito y vías de evacuación están libres de obstáculos.
        </td>
    </tr>
    <tr>
        <td colspan="3" class="border-0" style="font-size:12px;" align="center">3. Producto Almacenado se encuentra buen estado.</td> 
    </tr>
  </table>
  <table width="100%" class="border border-dark" cellspacing="0" cellpadding="3">
    <thead>
    <tr class="cabecera" align="center">
        <td></td>
        <td colspan="8" class="border border-dark" style="font-size:13px;"><strong>Puntuación por items evaluados</strong></td>
        <td></td>
        <td></td>
        <td></td>
    </tr>
    <tr>
        <td class="border border-dark cabecera" style="font-size:12px;" align="center"><strong> Pasillos </strong></td>
        <td class="border border-dark cabecera" style="font-size:12px;" align="center"><strong> 1 </strong></td>
        <td class="border border-dark cabecera" style="font-size:12px;" align="center"><strong> 2 </strong></td>
        <td class="border border-dark cabecera" style="font-size:12px;" align="center"><strong> 3 </strong></td>
        <td class="border border-dark cabecera" style="font-size:12px;" align="center"><strong> 4 </strong></td>
        <td class="border border-dark cabecera" style="font-size:12px;" align="center"><strong> 5 </strong></td>
        <td class="border border-dark cabecera" style="font-size:12px;" align="center"><strong> 6 </strong></td>
        <td class="border border-dark cabecera" style="font-size:12px;" align="center"><strong> 7 </strong></td>
        <td class="border border-dark cabecera" style="font-size:11px;" align="center"><strong> Responsable </strong></td>
        <td class="border border-dark cabecera" style="font-size:11px;" align="center"><strong> Puntaje obtenido</strong> </td>
        <td class="border border-dark cabecera" style="font-size:11px;" align="center"><strong> Porcentaje % </strong></td>
        <td class="border border-dark cabecera" style="font-size:11px;" align="center"><strong> Ubicaciones observadas </strong></td>
    </tr>
 </thead>
 <tbody>
    @foreach ($pdf->check_seco as $Seco)
        <tr>
            <td class="border border-dark" style="font-size:12px;">
             {{$Seco->Pasillos->name}}
            </td>
            <td align="center" class="border border-dark" style="font-size:12px;">
                {{$Seco->bs1}}
            </td>
            <td align="center" class="border border-dark" style="font-size:12px;">
                {{$Seco->bs2}}
            </td>
            <td align="center" class="border border-dark" style="font-size:12px;">
                {{$Seco->bs3}}
            </td>
            <td align="center" class="border border-dark" style="font-size:12px;">
                {{$Seco->bs4}}
            </td>
            <td align="center" class="border border-dark" style="font-size:12px;">
                {{$Seco->bs5}}
            </td>
            <td align="center" class="border border-dark" style="font-size:12px;">
                {{$Seco->bs6}}
            </td>
            <td align="center" class="border border-dark" style="font-size:12px;">
                {{$Seco->bs7}}
            </td>
            <td align="center" class="border border-dark" style="font-size:10px;">
                {{$Seco->Pasillos->supervisor->name}}
            </td>
            <td align="center" class="border border-dark" style="font-size:12px;">
               @php
                echo ($Seco->bs1 + $Seco->bs2 + $Seco->bs3 + $Seco->bs4 + $Seco->bs5 + $Seco->bs6 + $Seco->bs7)   
               @endphp 
            </td>
            <td align="center" class="border border-dark" style="font-size:12px;">
                @php
                $Porcentaje = $Seco->bs1 + $Seco->bs2 + $Seco->bs3 + $Seco->bs4 + $Seco->bs5 + $Seco->bs6 + $Seco->bs7;
                 echo (round($Porcentaje*100/14))   
                @endphp %
             </td>  
             <td align="center" class="border border-dark" style="font-size:12px;">
               
                   {{$Seco->bso1}} {{$Seco->bso2}} {{$Seco->bso3}}  {{$Seco->bso4}} {{$Seco->bso5}} {{$Seco->bso6}} {{$Seco->bso7}}
              
            </td>
        </tr>
    @endforeach
 </tbody>
  </table>

  @switch($pdf->almacen)
      @case('Bodega Gye')    
  <div class="page-break"></div>

  <table width="100%" class="pt-3 border border-dark" cellspacing="0" cellpadding="3">
    <tr class="cabecera " align="center">
        <td colspan="3" class="border border-dark" style="font-size:13px;"><strong>Bodega Amplianción Liris(Aplica para Guayaquil)</strong></td>
    </tr>
    <tr>
        <td class="border border-start-0" style="font-size:12px;">
            1. Los suelos están limpios, sin desperdicios ni material innecesario.
        </td>
        <td class="border border-start-0" style="font-size:12px;">
            4. Las cajas se apilan de manera ordenada (Articulos con volumen alto).
        </td>
        <td class="border border-end-0" style="font-size:12px;">
            6. No existe evidencia de contaminación cruzada.
        </td>
    </tr>
    <tr>
        <td class="border border-start-0" style="font-size:12px;">
            2. Los Pallets se encuentran limpios y en buen estado.
        </td>
        <td class="border border-start-0" style="font-size:12px;">
            5. Cajas vacias, gavetas y madera en el piso.
        </td>
        <td class="border border-end-0" style="font-size:12px;">
            7. Los pasillos, zonas de transito y puertas de emergencia están libres de obstáculos.
        </td>
    </tr>
    <tr>
        <td colspan="3" class="border-0" style="font-size:12px;" align="center">3. Producto en buen estado y presencia de producto derramado o en el piso.</td> 
    </tr>
  </table>
  <table width="100%" class="border border-dark" cellspacing="0" cellpadding="3">
    <thead>
    <tr class="cabecera" align="center">
        <td></td>
        <td colspan="8" class="border border-dark" style="font-size:13px;"><strong>Puntuación por items evaluados</strong></td>
        <td></td>
        <td></td>
        <td></td>
    </tr>
    <tr>
        <td class="border border-dark cabecera" style="font-size:12px;" align="center"><strong> Pasillos </strong></td>
        <td class="border border-dark cabecera" style="font-size:12px;" align="center"><strong> 1 </strong></td>
        <td class="border border-dark cabecera" style="font-size:12px;" align="center"><strong> 2 </strong></td>
        <td class="border border-dark cabecera" style="font-size:12px;" align="center"><strong> 3 </strong></td>
        <td class="border border-dark cabecera" style="font-size:12px;" align="center"><strong> 4 </strong></td>
        <td class="border border-dark cabecera" style="font-size:12px;" align="center"><strong> 5 </strong></td>
        <td class="border border-dark cabecera" style="font-size:12px;" align="center"><strong> 6 </strong></td>
        <td class="border border-dark cabecera" style="font-size:12px;" align="center"><strong> 7 </strong></td>
        <td class="border border-dark cabecera" style="font-size:11px;" align="center"><strong> Responsable </strong></td>
        <td class="border border-dark cabecera" style="font-size:11px;" align="center"><strong> Puntaje obtenido</strong> </td>
        <td class="border border-dark cabecera" style="font-size:11px;" align="center"><strong> Porcentaje % </strong></td>
        <td class="border border-dark cabecera" style="font-size:11px;" align="center"><strong> Ubicaciones observadas </strong></td>
    </tr>
 </thead>
 <tbody>
    @foreach ($pdf->check_Ampliacion as $Ampliacion)
        <tr>
            <td class="border border-dark" style="font-size:12px;">
             {{$Ampliacion->Pasillos->name}}
            </td>
            <td align="center" class="border border-dark" style="font-size:12px;">
                {{$Ampliacion->bam1}}
            </td>
            <td align="center" class="border border-dark" style="font-size:12px;">
                {{$Ampliacion->bam2}}
            </td>
            <td align="center" class="border border-dark" style="font-size:12px;">
                {{$Ampliacion->bam3}}
            </td>
            <td align="center" class="border border-dark" style="font-size:12px;">
                {{$Ampliacion->bam4}}
            </td>
            <td align="center" class="border border-dark" style="font-size:12px;">
                {{$Ampliacion->bam5}}
            </td>
            <td align="center" class="border border-dark" style="font-size:12px;">
                {{$Ampliacion->bam6}}
            </td>
            <td align="center" class="border border-dark" style="font-size:12px;">
                {{$Ampliacion->bam7}}
            </td>
            <td align="center" class="border border-dark" style="font-size:10px;">
                {{$Ampliacion->Pasillos->supervisor->name}}
            </td>
            <td align="center" class="border border-dark" style="font-size:12px;">
               @php
                echo ($Ampliacion->bam1 + $Ampliacion->bam2 + $Ampliacion->bam3 + $Ampliacion->bam4 + $Ampliacion->bam5 + $Ampliacion->bam6 + $Ampliacion->bam7)   
               @endphp 
            </td>
            <td align="center" class="border border-dark" style="font-size:12px;">
                @php
                $Porcentaje = $Ampliacion->bam1 + $Ampliacion->bam2 + $Ampliacion->bam3 + $Ampliacion->bam4 + $Ampliacion->bam5 + $Ampliacion->bam6 + $Ampliacion->bam7;
                 echo (round($Porcentaje*100/14))   
                @endphp %
             </td>  
             <td align="center" class="border border-dark" style="font-size:12px;">
               
                   {{$Ampliacion->bamo1}} {{$Ampliacion->bamo2}} {{$Ampliacion->bamo3}}  {{$Ampliacion->bamo4}} {{$Ampliacion->bamo5}} {{$Ampliacion->bamo6}} {{$Ampliacion->bamo7}}
              
            </td>
        </tr>
    @endforeach
 </tbody>
  </table>
  @break
  
  @default
      
@endswitch

  <div class="page-break"></div>

  <table width="100%" class="pt-4 border border-dark" cellspacing="0" cellpadding="3">
    <tr class="cabecera " align="center">
        <td colspan="3" class="border border-dark" style="font-size:13px;"><strong>Bodega Fria(Aplica para Quito y Guayaquil)</strong></td>
    </tr>
    <tr>
        <td class="border border-start-0" style="font-size:12px;">
            1. Los suelos están limpios, secos, sin desperdicios ni material innecesario.
        </td>
        <td class="border border-start-0" style="font-size:12px;">
            4. Las cajas se apilan de manera ordenada y no hay producto expuesto o derramado.
        </td>
        <td class="border border-end-0" style="font-size:12px;">
            6. El pasillo cumple en orden y limpieza.
        </td>
    </tr>
    <tr>
        <td class="border border-start-0" style="font-size:12px;">
            2. Los Pallets se encuentran limpios y en buen estado.
        </td>
        <td class="border border-start-0" style="font-size:12px;">
            5. No existe Film colgado.
        </td>
        <td class="border border-end-0" style="font-size:12px;">
            7. Los pasillos, zonas de transito y vías de evacuación están libres de obstáculos.
        </td>
    </tr>
    <tr>
        <td colspan="3" class="border-0" style="font-size:12px;" align="center">3. Producto Almacenado se encuentra buen estado.</td> 
    </tr>
  </table>
  <table width="100%" class="border border-dark" cellspacing="0" cellpadding="3">
    <thead>
    <tr class="cabecera" align="center">
        <td></td>
        <td colspan="8" class="border border-dark" style="font-size:13px;"><strong>Puntuación por items evaluados</strong></td>
        <td></td>
        <td></td>
        <td></td>
    </tr>
    <tr>
        <td class="border border-dark cabecera" style="font-size:12px;" align="center"><strong> Pasillos </strong></td>
        <td class="border border-dark cabecera" style="font-size:12px;" align="center"><strong> 1 </strong></td>
        <td class="border border-dark cabecera" style="font-size:12px;" align="center"><strong> 2 </strong></td>
        <td class="border border-dark cabecera" style="font-size:12px;" align="center"><strong> 3 </strong></td>
        <td class="border border-dark cabecera" style="font-size:12px;" align="center"><strong> 4 </strong></td>
        <td class="border border-dark cabecera" style="font-size:12px;" align="center"><strong> 5 </strong></td>
        <td class="border border-dark cabecera" style="font-size:12px;" align="center"><strong> 6 </strong></td>
        <td class="border border-dark cabecera" style="font-size:12px;" align="center"><strong> 7 </strong></td>
        <td class="border border-dark cabecera" style="font-size:12px;" align="center"><strong> Responsable </strong></td>
        <td class="border border-dark cabecera" style="font-size:12px;" align="center"><strong> Puntaje obtenido </strong> </td>
        <td class="border border-dark cabecera" style="font-size:12px;" align="center"><strong> Porcentaje % </strong></td>
        <td class="border border-dark cabecera" style="font-size:12px;" align="center"><strong> Ubicaciones observadas </strong></td>
    </tr>
 </thead>
 <tbody>
    @foreach ($pdf->check_frio as $Fria)
        <tr>
            <td class="border border-dark" style="font-size:12px;">
             {{$Fria->Pasillos->name}}
            </td>
            <td align="center" class="border border-dark" style="font-size:12px;">
                {{$Fria->bf1}}
            </td>
            <td align="center" class="border border-dark" style="font-size:12px;">
                {{$Fria->bf2}}
            </td>
            <td align="center" class="border border-dark" style="font-size:12px;">
                {{$Fria->bf3}}
            </td>
            <td align="center" class="border border-dark" style="font-size:12px;">
                {{$Fria->bf4}}
            </td>
            <td align="center" class="border border-dark" style="font-size:12px;">
                {{$Fria->bf5}}
            </td>
            <td align="center" class="border border-dark" style="font-size:12px;">
                {{$Fria->bf6}}
            </td>
            <td align="center" class="border border-dark" style="font-size:12px;">
                {{$Fria->bf7}}
            </td> 
            <td align="center" class="border border-dark" style="font-size:10px;">
                {{$Fria->Pasillos->supervisor->name}}
            </td>
            <td align="center" class="border border-dark" style="font-size:12px;">
               @php
                echo ($Fria->bf1 + $Fria->bf2 + $Fria->bf3 + $Fria->bf4 + $Fria->bf5 + $Fria->bf6 + $Fria->bf7)   
               @endphp 
            </td>
            <td align="center" class="border border-dark" style="font-size:12px;">
                @php
                $Porcentaje = $Fria->bf1 + $Fria->bf2 + $Fria->bf3 + $Fria->bf4 + $Fria->bf5 + $Fria->bf6 + $Fria->bf7;
                 echo (round($Porcentaje*100/14))
                @endphp %
             </td>  
             <td align="center" class="border border-dark" style="font-size:12px;">
               
                   {{$Fria->bfo1}} {{$Fria->bfo2}} {{$Fria->bfo3}}  {{$Fria->bfo4}} {{$Fria->bfo5}} {{$Fria->bfo6}} {{$Fria->bfo7}}
              
            </td>
        </tr>
    @endforeach
 </tbody>
  </table>

  <div class="page-break"></div>

  <table width="100%" class="pt-4 border border-dark" cellspacing="0" cellpadding="3">
    <tr class="cabecera " align="center">
        <td colspan="3" class="border border-dark" style="font-size:13px;"><strong>Reefer (Aplica para Quito y Guayaquil)</strong></td>
    </tr>
    <tr>
        <td class="border border-start-0" style="font-size:12px;">
            1. Los suelos están limpios, secos, sin desperdicios ni material innecesario.
        </td>
        <td class="border border-start-0" style="font-size:12px;">
            3. No hay producto expuesto o derramado.
        </td>
        <td class="border border-end-0" style="font-size:12px;">
            5. El reefer se encuentra libre mal olores.
        </td>
    </tr>
    <tr>
        <td class="border-end" style="font-size:12px;">
            2. Ausencia de pallets/cajas vacías y madera.
        </td>
        <td class="border-end" style="font-size:12px;">
            4. Las cajas se apilan de manera ordenada, segura y sin invadir zonas de paso.
        </td>
        <td class="border-0" style="font-size:12px;">
            6. Los productos almacenados se encuentra dentro de rango de temperatura solicitado por el cliente.
        </td>
    </tr>
  </table>
 <table width="100%" class="border border-dark" cellspacing="0" cellpadding="3">
    <thead>
    <tr class="cabecera" align="center">
        <td></td>
        <td colspan="7" class="border border-dark" style="font-size:13px;"><strong>Puntuación por items evaluados</strong></td>
        <td></td>
        <td></td>
        <td></td>
    </tr>
    <tr>
        <td class="border border-dark cabecera" style="font-size:12px;" align="center"><strong> Pasillos </strong></td>
        <td class="border border-dark cabecera" style="font-size:12px;" align="center"><strong> 1 </strong></td>
        <td class="border border-dark cabecera" style="font-size:12px;" align="center"><strong> 2 </strong></td>
        <td class="border border-dark cabecera" style="font-size:12px;" align="center"><strong> 3 </strong></td>
        <td class="border border-dark cabecera" style="font-size:12px;" align="center"><strong> 4 </strong></td>
        <td class="border border-dark cabecera" style="font-size:12px;" align="center"><strong> 5 </strong></td>
        <td class="border border-dark cabecera" style="font-size:12px;" align="center"><strong> 6 </strong></td>
        <td class="border border-dark cabecera" style="font-size:11px;" align="center"><strong> Responsable </strong></td>
        <td class="border border-dark cabecera" style="font-size:11px;" align="center"><strong> Puntaje obtenido</strong> </td>
        <td class="border border-dark cabecera" style="font-size:11px;" align="center"><strong> Porcentaje % </strong></td>
        <td class="border border-dark cabecera" style="font-size:11px;" align="center"><strong> Ubicaciones observadas </strong></td>
    </tr>
 </thead>
 <tbody>
    @foreach ($pdf->check_reefer as $Reefer)
        <tr>
            <td class="border border-dark" style="font-size:12px;">
             {{$Reefer->Pasillos->name}}
            </td>
            <td align="center" class="border border-dark" style="font-size:12px;">
                {{$Reefer->br1}}
            </td>
            <td align="center" class="border border-dark" style="font-size:12px;">
                {{$Reefer->br2}}
            </td>
            <td align="center" class="border border-dark" style="font-size:12px;">
                {{$Reefer->br3}}
            </td>
            <td align="center" class="border border-dark" style="font-size:12px;">
                {{$Reefer->br4}}
            </td>
            <td align="center" class="border border-dark" style="font-size:12px;">
                {{$Reefer->br5}}
            </td>
            <td align="center" class="border border-dark" style="font-size:12px;">
                {{$Reefer->br6}}
            </td>
            <td align="center" class="border border-dark" style="font-size:10px;">
                {{$Reefer->Pasillos->supervisor->name}}
            </td>
            <td align="center" class="border border-dark" style="font-size:12px;">
               @php
                echo ($Reefer->br1 + $Reefer->br2 + $Reefer->br3 + $Reefer->br4 + $Reefer->br5 + $Reefer->br6 )   
               @endphp 
            </td>
            <td align="center" class="border border-dark" style="font-size:12px;">
                @php
                $Porcentaje = $Reefer->br1 + $Reefer->br2 + $Reefer->br3 + $Reefer->br4 + $Reefer->br5 + $Reefer->br6;
                 echo (round($Porcentaje*100/12))
                @endphp %
             </td>  
             <td align="center" class="border border-dark" style="font-size:12px;">
               
                   {{$Reefer->bro1}} {{$Reefer->bro2}} {{$Reefer->bro3}}  {{$Reefer->bro4}} {{$Reefer->bro5}} {{$Reefer->bro6}} 
              
            </td>
        </tr>
    @endforeach
 </tbody>
  </table>

  <table width="100%" class="pt-4 border border-dark" cellspacing="0" cellpadding="3">
    <tr class="cabecera " align="center">
        <td colspan="3" class="border border-dark" style="font-size:13px;"><strong>Puertas y Andenes (Aplica para Quito y Guayaquil)</strong></td>
    </tr>
    <tr>
        <td class="border border-start-0" style="font-size:12px;">
            1. Las puertas estan limpios de basura o material reciclaje.
        </td>
        <td class="border border-start-0" style="font-size:12px;">
            3. Se mantiene las herramientas para descarga de vehiculo en buen estado.
        </td>
        <td class="border border-end-0" style="font-size:12px;">
            5. Se mantiene las puertas cerrada cuando no hay vehiculo en las puertas.
        </td>
    </tr>
    <tr>
        <td class="border-end" style="font-size:12px;">
            2. La zona externa se encuentra limpia y sin evidencia de basura o restos de pallets.
        </td>
        <td class="border-end" style="font-size:12px;">
            4. La zona de andenes esta limpia y no existe obstaculacion de paso peatonal.
        </td>
        <td class="border-0" style="font-size:12px;">
            
        </td>
    </tr>
  </table>
 <table width="100%" class="border border-dark" cellspacing="0" cellpadding="3">
    <thead>
    <tr class="cabecera" align="center">
        <td></td>
        <td colspan="6" class="border border-dark" style="font-size:13px;"><strong>Puntuación por items evaluados</strong></td>
        <td></td>
        <td></td>
        <td></td>
    </tr>
    <tr>
        <td class="border border-dark cabecera" style="font-size:12px; width:20px;" align="center"><strong> Pasillos </strong></td>
        <td class="border border-dark cabecera" style="font-size:12px;" align="center"><strong> 1 </strong></td>
        <td class="border border-dark cabecera" style="font-size:12px;" align="center"><strong> 2 </strong></td>
        <td class="border border-dark cabecera" style="font-size:12px;" align="center"><strong> 3 </strong></td>
        <td class="border border-dark cabecera" style="font-size:12px;" align="center"><strong> 4 </strong></td>
        <td class="border border-dark cabecera" style="font-size:12px;" align="center"><strong> 5 </strong></td>
        {{-- <td class="border border-dark cabecera" style="font-size:12px;" align="center"><strong> 6 </strong></td> --}}
        <td class="border border-dark cabecera" style="font-size:11px;" align="center"><strong> Responsable </strong></td> 
        <td class="border border-dark cabecera" style="font-size:11px;" align="center"><strong> Puntaje obtenido</strong> </td>
        <td class="border border-dark cabecera" style="font-size:11px;" align="center"><strong> Porcentaje % </strong></td>
        <td class="border border-dark cabecera" style="font-size:11px;" align="center"><strong> Ubicaciones observadas </strong></td>
    </tr>
 </thead>
 <tbody>
    @foreach ($pdf->check_andenes as $Andene)
        <tr>
            <td class="border border-dark" style="font-size:12px;">
             {{$Andene->Pasillos->name}}
            </td>
            <td align="center" class="border border-dark" style="font-size:12px;">
                {{$Andene->ba1}}
            </td>
            <td align="center" class="border border-dark" style="font-size:12px;">
                {{$Andene->ba2}}
            </td>
            <td align="center" class="border border-dark" style="font-size:12px;">
                {{$Andene->ba3}}
            </td>
            <td align="center" class="border border-dark" style="font-size:12px;">
                {{$Andene->ba4}}
            </td>
            <td align="center" class="border border-dark" style="font-size:12px;">
                {{$Andene->ba5}}
            </td>
            <td align="center" class="border border-dark" style="font-size:10px;">
                {{$Andene->Pasillos->supervisor->name}}
            </td>
            <td align="center" class="border border-dark" style="font-size:12px;">
               @php
                echo ($Andene->ba1 + $Andene->ba2 + $Andene->ba3 + $Andene->ba4 + $Andene->ba5)   
               @endphp 
            </td>
            <td align="center" class="border border-dark" style="font-size:12px;">
                @php
                $Porcentaje = $Andene->ba1 + $Andene->ba2 + $Andene->ba3 + $Andene->ba4 + $Andene->ba5 ;
                 echo (round($Porcentaje*100/10))
                @endphp %
             </td>  
             <td align="center" class="border border-dark" style="font-size:12px;">
               
                   {{$Andene->bao1}} {{$Andene->bao2}} {{$Andene->bao3}}  {{$Andene->bao4}} {{$Andene->bao5}} 
              
            </td>
        </tr>
    @endforeach
 </tbody>
  </table>
 
  <div class="page-break"></div>

  <p class="text-center" style="font-size:20px;"><strong>Resultado de la inspección Bodega Seca</strong></p>


  <table align="center" class="text-center border border-dark">
                 @foreach ($total as $totales) 
                <tr>
                <td class="border border-dark" style="font-size:11px; width: 250px"> 
                       {{$totales[1]}}
                </td>
                  <td class="border border-dark" style="width: 250px">
                     <div class="progress">
                        <div class="progress-bar progress-bar-striped" role="progressbar" style="width: {{round($totales[0])}}%;" aria-valuenow="35" aria-valuemin="0" aria-valuemax="100">
                          {{round($totales[0])}} %</div>
                      </div> 
                </td> 
            </tr>
            @endforeach
            {{-- <tr>
                <td class="border border-dark" style="font-size:11px;">
                 {{$total1[1]}}
                </td>
                <td class="border border-dark" style="width: 300px">
                    <div class="progress">
                       <div class="progress-bar progress-bar-striped" role="progressbar" style="width: {{round($total[1])}}%;" aria-valuenow="35" aria-valuemin="0" aria-valuemax="100">
                         {{round($total[1])}} %</div>
                     </div> 
               </td>
            </tr>
            <tr>
                <td class="border border-dark" style="font-size:11px;">
                 {{$total1[2]}}
                </td>
                <td class="border border-dark" style="width: 300px">
                    <div class="progress">
                       <div class="progress-bar progress-bar-striped" role="progressbar" style="width: {{round($total[2])}}%;" aria-valuenow="35" aria-valuemin="0" aria-valuemax="100">
                         {{round($total[2])}} %</div>
                     </div> 
               </td>
            </tr>
            <tr>
                <td class="border border-dark" style="font-size:11px;">
                 {{$total1[3]}}
                </td>
                <td class="border border-dark" style="width: 300px">
                    <div class="progress">
                       <div class="progress-bar progress-bar-striped" role="progressbar" style="width: {{round($total[3])}}%;" aria-valuenow="35" aria-valuemin="0" aria-valuemax="100">
                         {{round($total[3])}} %</div>
                     </div> 
               </td>
            </tr>
            <tr>
                <td class="border border-dark" style="font-size:11px;">
                 {{$total1[4]}}
                </td>
                <td class="border border-dark" style="width: 300px">
                    <div class="progress">
                       <div class="progress-bar progress-bar-striped" role="progressbar" style="width: {{round($total[4])}}%;" aria-valuenow="35" aria-valuemin="0" aria-valuemax="100">
                         {{round($total[4])}} %</div>
                     </div> 
               </td>
            </tr>
            <tr>
                <td class="border border-dark" style="font-size:11px;">
                 {{$total1[5]}}
                </td>
                <td class="border border-dark" style="width: 300px">
                    <div class="progress">
                       <div class="progress-bar progress-bar-striped" role="progressbar" style="width: {{round($total[5])}}%;" aria-valuenow="35" aria-valuemin="0" aria-valuemax="100">
                         {{round($total[5])}} %</div>
                     </div> 
               </td>
            </tr>
            <tr>
                <td class="border border-dark" style="font-size:11px;">
                 {{$total1[6]}}
                </td>
                <td class="border border-dark" style="width: 300px">
                    <div class="progress">
                       <div class="progress-bar progress-bar-striped" role="progressbar" style="width: {{round($total[6])}}%;" aria-valuenow="35" aria-valuemin="0" aria-valuemax="100">
                         {{round($total[6])}} %</div>
                     </div> 
               </td>
            </tr> --}}
                   
</table>

<p class="text-center pt-3" style="font-size:20px;"><strong>Resultado de la inspección Bodega Fria</strong></p>


  <table align="center" class="text-center border border-dark">
                 @foreach ($total1 as $totale) 
                <tr>
                <td class="border border-dark" style="font-size:11px; width: 230px"> 
                       {{$totale[1]}}
                </td>
                  <td class="border border-dark" style="width: 250px">
                     <div class="progress">
                        <div class="progress-bar progress-bar-striped" role="progressbar" style="width: {{round($totale[0])}}%;" aria-valuenow="35" aria-valuemin="0" aria-valuemax="100">
                          {{round($totale[0])}} %</div>
                      </div> 
                </td> 
            </tr>
                 @endforeach 
</table>

<p class="text-center pt-3" style="font-size:20px;"><strong>Resultado de la inspección Bodega Reefer</strong></p>


  <table align="center" class="text-center border border-dark">
                 @foreach ($total2 as $totals) 
                <tr>
                <td class="border border-dark" style="font-size:11px; width: 230px"> 
                       {{$totals[1]}}
                </td>
                  <td class="border border-dark" style="width: 250px">
                     <div class="progress">
                        <div class="progress-bar progress-bar-striped" role="progressbar" style="width: {{round($totals[0])}}%;" aria-valuenow="35" aria-valuemin="0" aria-valuemax="100">
                          {{round($totals[0])}} %</div>
                      </div> 
                </td> 
            </tr>
                 @endforeach 
</table>


@switch($pdf->almacen)
    @case('Bodega Gye')
    <p class="text-center pt-3" style="font-size:20px;"><strong>Resultado de la inspección Bodega Ampliacion Liris</strong></p>


    <table align="center" class="text-center border border-dark" >
                   @foreach ($total3 as $totals) 
                  <tr>
                  <td class="border border-dark" style="font-size:11px; width: 230px"> 
                         {{$totals[1]}}
                  </td>
                    <td class="border border-dark" style="width: 250px">
                       <div class="progress">
                          <div class="progress-bar progress-bar-striped" role="progressbar" style="width: {{round($totals[0])}}%;" aria-valuenow="35" aria-valuemin="0" aria-valuemax="100">
                            {{round($totals[0])}} %</div>
                        </div> 
                  </td> 
              </tr>
                   @endforeach 
  </table>
        @break

    @default
        
@endswitch
    {{-- <div class="page-break"></div>
    <h1 class="text-center pt-3">3. Registro Fotográfico</h1>
       <hr class="grosor"/>
       <div class="container pt-5">
        <div class="row">
            <div class="col-md-12 mb-2"> --}}
       {{-- @foreach ($pdf->imagenes as $imagen )
            <img src="{{public_path('storage/evidencia_muestreo/').trim($imagen->name)}}" width="200" height="200" class="img-thumbnail "> 
       @endforeach --}}
    {{-- </div>
    </div>
   </div> --}}



       {{-- <footer>
        <p class="fw-bold">FCME-0174
            Rev. 02 </p>
       </footer> --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.0/dist/chart.umd.min.js"></script>

    <script type="text/php">
        if ( isset($pdf) ) {
            $pdf->page_script('
                $font = $fontMetrics->get_font("Arial, Helvetica, sans-serif", "normal");
                $pdf->text(270, 820, "Pág $PAGE_NUM de $PAGE_COUNT", $font, 10);
            ');
        }
	</script>
  </body>
</html>
