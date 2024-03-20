<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Checklist de Practicas de Higienes Proveedor</title>
    <style>
     body{
        font-family: Verdana, Geneva, Tahoma, sans-serif;
        font-size: 12px;
     }
     .naranja{
        color: #ffa500;
        font-size: 12px;
     }
     .cuerpo{
        color: #008000;
        font-size: 12px;
     }
     .negrita{
        font-weight: bold;
        font: verdana;
     }
     .negro{
        color: #000;
        font-size: 12px;
        font: verdana;
     }

     .border{
        border: 1px solid;
        border-color: #000;
        text-align: center;
     }

     .tamaño_letra{
        font-size: 12px;
     }
        </style>
    </head>
    <body>
    <p class="negro">Estimado/a,</p>

    <p class="negro">Se a Generado una Nueva orden de trabajo de {{ $consultas->solicitud }} para entregar las siguientes Componentes.</p>
    <h3 class="negro"> Guia"#"-{{ $consultas->GuiaMaquilas->n_guia }} OT-{{ $consultas->codigo }} cliente-{{ $consultas->Clientes->social_reason }} </h3>

    <table width="100%" class="border">
     <tr>
         <th class="border">
          Codigo
         </th>
         <th class="border">
         Descripción
         </th>
         <th class="border">
         Cantidad
         </th>
         <th class="border">
         Empaque
         </th>
         <th class="border">
        Fecha de Vencimiento
         </th>
         <th class="border">
         Precio
         </th>
     </tr>
    @foreach ( $consultas->Componentes as $componen )
        <tr>
            <td class="border">
                {{ $componen->Codigos->codigo }}
            </td>
            <td class="border">
              {{ $componen->Codigos->descripcion }}
            </td>
            <td class="border">
              {{ $componen->cantidad }}
            </td>
            <td class="border">
              {{ $componen->empaque }}
            </td>
            <td class="border">
            {{ $componen->fecha }}
            </td>
            <td class="border">
              ${{ $componen->precio }}
            </td>
        </tr>
    @endforeach
    </table>

    <p class="negro">Cualquier duda, quedo atento.</p>
    <p class="tamaño_letra">Ahora puedes ingresar tus reclamos en nuestro Portal de Clientes o ingresando <a class="naranja" href="https://ransa-reclamo.com/Reclamo">Aquí</a></p>
    <p class="cuerpo negrita">Ransa Ecuador</p>
    <p class="cuerpo"><a href="#" class="cuerpo">www.ransa.net</a></p>
    <table>
    <tr>
    <td align="left">
      <img width="150" src="{{asset('img/logo.png')}}">
    </td>
    </tr>
    </table>
    </body>
    </html>
