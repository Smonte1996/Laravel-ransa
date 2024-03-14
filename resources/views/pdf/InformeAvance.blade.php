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
            margin: 0.60cm 0cm 0cm;
        }

        body {
            margin: 2cm 1cm 1cm;
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
            top: 0cm;
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
        background-color: orange;
     }

      hr, .grosor{
          height: 2px;
          background-color: black;
     }
     .cabecera{
        background-color: #a6e7a9;
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

    <title>Informe de Avances</title>
  </head>
  <body>
    <header>
        <table>
            <td>
                <img src="img/logo.png" width="250">
            </td>
            <td>
            <h1 class="mt-2" style="color: #333">Informe de Avances Diario</h1>
            </td>
            </table>
    </header>

    <h2 class="text-center mt-3"><strong> Datos Generales </strong></h2>
    <hr class="grosor"/>


<table width="100%" class="pt-3" cellspacing="0" cellpadding="3" style="font-size: 13px">
        <tr>
            <th class="border-2 border-dark text-center">
                Fecha
            </th>
            <th class="border-2 border-dark text-center">
                Ot
            </th>
            <th class="border-2 border-dark text-center">
                Guia#
            </th>
            <th class="border-2 border-dark text-center">
                Proveedor
            </th>
        </tr>
      <tr>
        <td class="border-2 border-dark text-center">
            {{ $ia->fecha }}
        </td>
        <td class="border-2 border-dark text-center">
            {{ $ia->codigo }}
        </td>
        <td class="border-2 border-dark text-center">
            {{ $ia->GuiaMaquilas->n_guia }}
        </td>
        <td class="border-2 border-dark text-center">
            {{ $ia->Proveedores->social_reason }}
        </td>
      </tr>
      <tr>
        <th class="border-2 border-dark text-center">
            Cliente
        </th>
        <th class="border-2 border-dark text-center">
            Actividad
        </th>
        <th class="border-2 border-dark text-center">
            Codigo
        </th>
        <th class="border-2 border-dark text-center">
            Cantidad
        </th>
      </tr>
      <tr>

        <td class="border-2 border-dark text-center">
            {{ $ia->Clientes->social_reason }}
        </td>
        <td class="border-2 border-dark text-center">
            {{--  style="white-space: pre-line;"  --}}
            @foreach ( $ia->Tarifarios as $Activid )
                {{ $Activid->actividad }}
            @endforeach
        </td>
        <td class="border-2 border-dark text-center">
            {{ $ia->CodigoF->codigo }}
        </td>
        <td class="border-2 border-dark text-center" style="background-color: #fff316">
           {{ $ia->cantidad }} {{ $ia->cj_un }}
        </td>
      </tr>
      <tr>
        <th class="border-2 border-dark text-center">
            Ean 13
        </th>
        <th colspan="2" class="border-2 border-dark text-center">
            Ean 14
        </th>
        <th class="border-2 border-dark text-center">
            Cantidad de Avances
          </th>
        {{--  <td colspan="2" class="border-2 border-dark text-center" style="background-color: #fff316">
        {{ $ia->CodigoF->codigo }}
        </td>  --}}
      </tr>
      <tr>
        <td class="border-2 border-dark text-center">
            {{ $ia->ean13 }}
         </td>
         <td colspan="2" class="border-2 border-dark text-center">
            {{ $ia->ean14 }}
           </td>
           <td class="border-2 border-dark text-center" style="background-color: #fff316">
             @php
                 foreach($ia->AvancesMaquila as $avance){
                   $cantidad[] = $avance->Cantidad_avance;
                   $cajas = $avance->unidades_caja;
                 }
                 echo array_sum($cantidad). " " .$cajas;
             @endphp
           </td>
      </tr>

</table>

{{--  @php
$hola2 = App\Models\Programacione::where('cabecera_id', $ia->id)->get();
foreach($hola2 as $hola1){
  $holas[] = $hola1->fecha;
}
$string = implode(",",$holas);
$todos = App\Models\Avance_produccione::whereDate('created_at', '=', $string)->get();
echo $todos;
$hola = APP\Models\Avance_produccione::where('created_at', 'like', '%'.$holas[0].'%')->get();
echo $hola;

@endphp  --}}

{{--  <h2 class="text-center mt-5"><strong> Reporte de Avances</strong></h2>
    <hr class="grosor"/>  --}}
{{--
    <table width="100%" class="pt-3" cellspacing="0" cellpadding="3" style="font-size: 13px">

    <tr>
        <th class="border-2 border-dark text-center">

        </th>
    @foreach ($ia->AvancesMaquila as $Programa )
        <th class="border-2 border-dark text-center">
         {{ $Programa->Avanceactividad->dia }}
        </th>
   @endforeach
    </tr>
    <tr>
    <th class="border-2 border-dark text-center">
     Fecha
    </th>
    @foreach ($ia->AvancesMaquila as $Programa )
    <td class="border-2 border-dark text-center">
     {{ $Programa->Avanceactividad->fecha }}
    </td>
    @endforeach
    </tr>
    <tr>
    <th class="border-2 border-dark text-center">
       Cantidad Programada
    </th>
    @foreach ( $ia->AvancesMaquila as $Programa )
     <td class="border-2 border-dark text-center">
        {{ $Programa->Avanceactividad->cantidad }}
     </td>
    @endforeach
    </tr>
    <tr>
    <th class="border-2 border-dark text-center">
       Avance
    </th>
    @foreach ($ia->AvancesMaquila as $Avances )
    <td class="border-2 border-dark text-center">
        {{ $Avances->Cantidad_avance }} {{ $Avances->unidades_caja }}
    </td>
    @endforeach
    </tr>
    <tr>
    <th class="border-2 border-dark text-center">
       Fecha de vecimiento
    </th>
    @foreach ($ia->AvancesMaquila as $Avances )
    <td class="border-2 border-dark text-center">
        {{ $Avances->fecha_vencimiento }}
    </td>
    @endforeach
       </tr>
    </table>  --}}

    <h2 class="text-center mt-5"><strong> Reporte de Avances</strong></h2>
    <hr class="grosor"/>

    {{--  <table width="100%" class="pt-3" cellspacing="0" cellpadding="0" style="font-size: 13px">
     <tr>
        <th class="border-2 border-dark text-center">
            Dias Programado
        </th>
        <th class="border-2 border-dark text-center">
            Fecha Programada
        </th>
        <th class="border-2 border-dark text-center">
            Cantidad Programada
        </th>
     </tr>
     @foreach ($ia->Programacion as $Programa )
    <tr>
        <th class="border-2 border-dark text-center">
         {{ $Programa->dia }}
        </th>
        <td class="border-2 border-dark text-center">
            {{ $Programa->fecha }}
           </td>
           <td class="border-2 border-dark text-center">
            {{ $Programa->cantidad }}
         </td>
        </tr>
    @endforeach
    </table>  --}}
 <table width="100%" class="pt-3" cellspacing="0" cellpadding="0" style="font-size: 13px">
    <tr>
    <th class="border-2 border-dark text-center">
        Dias
    </th>
    <th class="border-2 border-dark text-center">
        Avance
    </th>
    <th class="border-2 border-dark text-center">
        Fecha de Vencimiento
    </th>
    <th class="border-2 border-dark text-center">
     Fecha del Avance
    </th>
    </tr>
     @foreach ($ia->AvancesMaquila as $Avances )
    <tr>
     @if (now()->format('Y-m-d') == $Avances->created_at->format('Y-m-d'))
    <th class="border-2 border-dark text-center" style="background-color: #fff316">
        {{ $Avances->Avanceactividad->dia }}
    </th>
     <td class="border-2 border-dark text-center" style="background-color: #fff316">
        {{ $Avances->Cantidad_avance }} {{ $Avances->unidades_caja }}
    </td>
    <td class="border-2 border-dark text-center" style="background-color: #fff316">
        {{ $Avances->fecha_vencimiento }}
    </td>
    <td class="border-2 border-dark text-center" style="background-color: #fff316">
        {{ $Avances->created_at->format('Y-m-d') }}
    </td>

    @else

    <th class="border-2 border-dark text-center">
        {{ $Avances->Avanceactividad->dia }}
    </th>
     <td class="border-2 border-dark text-center">
        {{ $Avances->Cantidad_avance }} {{ $Avances->unidades_caja }}
    </td>
    <td class="border-2 border-dark text-center">
        {{ $Avances->fecha_vencimiento }}
    </td>
    <td class="border-2 border-dark text-center">
        {{ $Avances->created_at->format('Y-m-d') }}
    </td>
    @endif
    </tr>
    @endforeach
   </table>



    {{--  <tr>  --}}
    {{--  <th class="border-2 border-dark text-center">
       Cantidad Programada
    </th>  --}}
    {{--  @foreach ( $ia->Programacion as $Programa )

    @endforeach
    </tr>  --}}
    {{--  <tr>

    </td>
    </tr>  --}}
    {{--  @foreach ($ia->AvancesMaquila as $Avances )

    <tr>
    <th class="border-2 border-dark text-center">
       Avance
    </th>
    <td class="border-2 border-dark text-center">
        {{ $Avances->Cantidad_avance }} {{ $Avances->unidades_caja }}
    </td>
    </tr>
    <tr>
    <th class="border-2 border-dark text-center">
       Fecha de vecimiento
    </th>
    <td class="border-2 border-dark text-center">
        {{ $Avances->fecha_vencimiento }}
    </td>
    </tr>
    @endforeach  --}}
    </table>

    <h2 class="text-center mt-5"><strong> Productividad </strong></h2>
    <hr class="grosor"/>

    <table width="100%" class="pt-3" cellspacing="0" cellpadding="3" style="font-size: 13px">
     <tr>
        <th class="border-2 border-dark text-center">
         Dias
        </th>
        <th class="border-2 border-dark text-center">
            Hora de Inicio
        </th>
        <th class="border-2 border-dark text-center">
            Cantidad Personal
        </th>
        <th class="border-2 border-dark text-center">
            Hora Pausa
        </th>
        <th class="border-2 border-dark text-center">
            Hora de Reinicio
         </th>
         <th class="border-2 border-dark text-center">
            cantidad Personal
        </th>
        <th class="border-2 border-dark text-center">
            Hora Fin
        </th>
        <th class="border-2 border-dark text-center">
            Fecha de registro
        </th>
     </tr>

        @foreach ($ia->MaquilaProductividad as $Programa )
        <tr>
        <th class="border-2 border-dark text-center">
         {{ $Programa->DiasProgramacion->dia }}
        </th>
        <td class="border-2 border-dark text-center">
            {{ $Programa->hora_inicio }}
        </td>
        <td class="border-2 border-dark text-center">
            {{ $Programa->n_persona_1 }}
        </td>
        <td class="border-2 border-dark text-center">
            {{ $Programa->hora_pausa}}
        </td>
        <td class="border-2 border-dark text-center">
            {{ $Programa->hora_reinicio }}
        </td>
        <td class="border-2 border-dark text-center">
            {{ $Programa->n_persona_2 }}
        </td>
        <td class="border-2 border-dark text-center">
            {{ $Programa->hora_fin }}
        </td>
        <td class="border-2 border-dark text-center">
            {{ $Programa->created_at->format('Y-m-d') }}
        </td>
      </tr>
       @endforeach
    </table>


    <h2 class="text-center mt-3"><strong> Muestreo </strong></h2>
    <hr class="grosor"/>

    <table width="100%" class="pt-3" cellspacing="0" cellpadding="3" style="font-size: 13px">
      <tr>
        <th class="border-2 border-dark text-center">
        Dias
        </th>
        <th class="border-2 border-dark text-center">
            Muestra
        </th>
        <th class="border-2 border-dark text-center">
            Aceptadas
        </th>
        <th class="border-2 border-dark text-center">
            Rechazadas
        </th>
        <th class="border-2 border-dark text-center">
            Observación Rechazo
        </th>
        <th class="border-2 border-dark text-center">
            Reprocesadas
        </th>
        <th class="border-2 border-dark text-center">
            Fecha de registro
        </th>
      </tr>

        @foreach ($ia->MuestreoMaquila as $Programas )
        <tr>
        <th class="border-2 border-dark text-center">
         {{ $Programas->ProgramcionMuestreo->dia }}
        </th>
        <td class="border-2 border-dark text-center">
            {{ $Programas->cantidad_muestra }}  {{ $Programas->cj_un_muestra }}
        </td>
        <td class="border-2 border-dark text-center">
            {{ $Programas->cantidad_aceptado }}  {{ $Programas->cj_un_aceptado }}
        </td>
        <td class="border-2 border-dark text-center">
            @if (!is_null($Programas->cantidad_rechazado))
            {{ $Programas->cantidad_rechazado }}  {{ $Programas->cj_un_rechazado }}
            @else
               -
            @endif

        </td>
        <td class="border-2 border-dark text-center">
            @if (!is_null($Programas->observacion_rechazado))
            {{ $Programas->observacion_rechazado }}
            @else
               -
            @endif

        </td>
        <td class="border-2 border-dark text-center">
            @if (!is_null($Programas->cantidad_reprocesado))
            {{ $Programas->cantidad_reprocesado }} {{ $Programas->cj_un_reprocesado }}
            @else
               -
            @endif

        </td>
        <td class="border-2 border-dark text-center">
            {{ $Programas->created_at->format('Y-m-d') }}
        </td>
    </tr>
       @endforeach

    </table>

    <h2 class="text-center mt-3"><strong> Novedades </strong></h2>
    <hr class="grosor"/>
    <table width="100%" class="pt-3" cellspacing="0" cellpadding="3" style="font-size: 13px">
        <tr>
        <th class="border-2 border-dark text-center">
         Dias
        </th>
        <th class="border-2 border-dark text-center">
            Sku
        </th>
        <th class="border-2 border-dark text-center">
            Cantidad
        </th>
        <th class="border-2 border-dark text-center">
            Estado
        </th>
        <th class="border-2 border-dark text-center">
            Detalle
        </th>
        <th class="border-2 border-dark text-center">
            Imagen
        </th>
    </tr>
        @forelse ($ia->NovedadMaquila as $Novedades )
    <tr>
        <th class="border-2 border-dark text-center">
        {{ $Novedades->ProgramacionNovedades->dia }}
        </th>
        <td class="border-2 border-dark text-center">
            {{ $Novedades->sku }}
        </td>
        <td class="border-2 border-dark text-center">
            {{ $Novedades->cantidad }} {{ $Novedades->caj_uni }}
        </td>
        <td class="border-2 border-dark text-center">
         {{ $Novedades->estado }}
        </td>
        <td class="border-2 border-dark text-center">
            {{ $Novedades->observacion }}
        </td>
        <td class="border-2 border-dark text-center">
            <img src="{{ public_path('storage/NovedadMaquila/').trim($Novedades->imagen) }}" width="200" alt=" Imagen Novedad">
        </td>
    </tr>
    @empty
         <tr>
         <th colspan="6" class="border-2 border-dark text-center">
          No hay datos
        </th>
        </tr>
    @endforelse
</table>




       {{-- <footer>
        <p class="fw-bold">FCME-0174
            Rev. 02 </p>
       </footer> --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
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
