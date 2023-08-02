<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Informe de Muestreo {{$Mustreo->contenedor}}</title>
    <style>
     body{
        font-family: Verdana, Geneva, Tahoma, sans-serif;
        font-size: 12px;
     }
     .naranja{
        color: orange;
        font-size: 12px;
     }
     .cuerpo{
        color: green;
        font-size: 12px;
     }
     .negrita{
        font-weight: bold;
        font: verdana;
     }
     .negro{
        color: black;
        font-size: 12px;
     }
     .tamaño_letra{
        font-size: 12px;
     }
    </style>
</head>
<body>
<label class="negro">Buenas estimados adjunto el Reporte de {{$Mustreo->clientes->social_reason}} recibidas el día de hoy {{$Mustreo->fecha_recepcion}}.</label><br>

<label class="negro">Cualquier duda, quedo atento.</label>
<br>
<br>
<label class="tamaño_letra">Ahora puedes ingresar tus reclamos en nuestro Portal de Clientes o ingresando <a class="naranja" href="https://ransa-reclamo.com/Reclamo">Aquí</a></label><br>
<label class="cuerpo negrita">Ransa Ecuador</label><br>
<label class="cuerpo">Vicepresidencia de Ransa Andina</label>
<br>
<br>
<label class="cuerpo">Ecuador | Km. 22 Vía a Daule - Guayaquil</label><br>
<label class="cuerpo"><a href="#" class="cuerpo">www.ransa.net</a></label>
<table>
<tr>
<td align="left">
  <img width="150" src="{{asset('img/logo.png')}}">
</td>
</tr>  
</table>
</body>
</html>