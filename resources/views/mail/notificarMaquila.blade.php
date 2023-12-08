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
     .tamaño_letra{
        font-size: 12px;
     }
    </style>
</head>
<body>
<p class="negro">Estimado/a,</p>

<p class="negro">En el documento adjunto podrás encontrar el informe del checklist de prácticas de higiene del proveedor correspondiente al día {{$PracticaMaquila->fecha}}.</p>

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
