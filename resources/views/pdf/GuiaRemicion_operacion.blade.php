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

    <title>Guias Operacion A Maquila</title>
  </head>
  <body>
    <header>
        <table>
            <td>
                <img src="img/logo.png" width="250">
            </td>
            <td>
            <h1 class="mt-2" style="color: #333">Guia de Operación a Maquila</h1>
            </td>
            </table>
    </header>

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
        </tr>
      <tr>
        <td class="border-2 border-dark text-center">
            {{ $pdf->fecha }}
        </td>
        <td class="border-2 border-dark text-center">
            {{ $pdf->codigo }}
        </td>
        <td class="border-2 border-dark text-center"    >
            {{ $pdf->GuiaMaquilas->n_guia }}
        </td>
      </tr>
      <tr>
        <th class="border-2 border-dark text-center">
            Proveedor
        </th>
        <th class="border-2 border-dark text-center">
            Cliente
        </th>
        <th class="border-2 border-dark text-center">
            Actividad
        </th>
      </tr>
      <tr>
        <td class="border-2 border-dark text-center">
            {{ $pdf->Proveedores->social_reason }}
        </td>
        <td class="border-2 border-dark text-center">
            {{ $pdf->Clientes->social_reason }}
        </td>
        <td class="border-2 border-dark text-center" style="white-space: pre-line;">
            @foreach ( $pdf->Tarifarios as $Activid )
                {{ $Activid->ServiciosMaquila->name }}
            @endforeach
        </td>
      </tr>
</table>


    <h2 class="text-center mt-5"><strong> Compomentes </strong></h2></td>


<table width="100%" class="pt-3" cellspacing="0" cellpadding="3" style="font-size: 13px">
<tr>
    <th class="border-2 border-dark text-center">
        ID
    </th>
    <th class="border-2 border-dark text-center">
        Código
    </th>
    <th class="border-2 border-dark text-center">
        Descripción
    </th>
    <th class="border-2 border-dark text-center">
        Cantidad
    </th>
    <th class="border-2 border-dark text-center">
        Empaque
    </th>
    <th class="border-2 border-dark text-center">
        Fecha
    </th>
    <th class="border-2 border-dark text-center">
        Precio
    </th>

</tr>
@foreach ($pdf->Componentes as $Codigos )
    <tr>
    <td class="border-2 border-dark text-center">{{ $Codigos->id }}</td>
    <td class="border-2 border-dark text-center">{{ $Codigos->sku }}</td>
    <td class="border-2 border-dark text-center">{{ $Codigos->descripcion }}</td>
    <td class="border-2 border-dark text-center">{{ $Codigos->cantidad }}</td>
    <td class="border-2 border-dark text-center">CJ</td>
    <td class="border-2 border-dark text-center">{{ $Codigos->fecha }}</td>
    <td class="border-2 border-dark text-center">$ {{ $Codigos->precio }}</td>

    </tr>
@endforeach
</table>

<h2 class="text-center mt-5"><strong>Confirmación Maquila</strong></h2></td>


<table width="100%" class="pt-3" cellspacing="0" cellpadding="3" style="font-size: 13px">
<tr>
    <th class="border-2 border-dark text-center">
        ID
    </th>
    <th class="border-2 border-dark text-center">
        Código
    </th>
    <th class="border-2 border-dark text-center">
        Descripción
    </th>
    <th class="border-2 border-dark text-center">
        Cantidad Recibido
    </th>
</tr>
@foreach ($pdf->Componentes as $Codigos )
    <tr>
    <td class="border-2 border-dark text-center">{{ $Codigos->id }}</td>
    <td class="border-2 border-dark text-center">{{ $Codigos->sku }}</td>
    <td class="border-2 border-dark text-center">{{ $Codigos->descripcion }}</td>
    @isset($Codigos->Recibido->cantidad_confirmada)
    <td class="border-2 border-dark text-center">{{ $Codigos->Recibido->cantidad_confirmada }}</td>
    @endisset
    </tr>
@endforeach
@isset($pdf->GuiaMaquilas->observacion)
        <tr>
            <th class="border-2 border-dark text-center">
              Observación
            </th>
            <td colspan="3" class="border-2 border-dark text-center">
                {{ $pdf->GuiaMaquilas->observacion }}
            </td>
        </tr>
@endisset
</table>


<Table width="100%" class="pt-5 text-center" cellspacing="0" cellpadding="3">
<tr>
    <th> <img src="{{ base64_decode($pdf->GuiaMaquilas->UsuarioFirma->firma) }}" alt="Firma"> </th>
    @isset($pdf->GuiaMaquilas->confirmafirma->firma)
    <th> <img src="{{ base64_decode($pdf->GuiaMaquilas->confirmafirma->firma) }}" alt="firma2"></th>
    @endisset

</tr>
<tr>
    <th>Firma Autorizada</th>
    <th>Recibí conforme</th>
</tr>
<tr>
    <th style="font-size: 10px">{{ $pdf->GuiaMaquilas->UsuarioFirma->name }}</th>
    @isset($pdf->GuiaMaquilas->confirmafirma->name)
       <th style="font-size: 10px"> {{ $pdf->GuiaMaquilas->confirmafirma->name }} </th>
    @endisset
</tr>
</Table>
    {{-- <h1 class="text-center">1. Datos Generales</h1>
    <hr class="grosor"/> --}}



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
