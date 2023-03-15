<style>
   
.titulos{
    color: #f39200;
    font-weight: bold;
       }
/*======================================================
=            BOTONES DE NAVAEGACION CLIENTE            =
======================================================*/
#contItem{
    margin-top: 5%;
    /*position: absolute;*/
    }
#contItem h4{
    text-align: center;
    font-weight: bold;
    font-size: 25px;
    color: #f39200;
    text-decoration: underline;
     }
#contItem .item a{
    margin-left: 15px;
    margin-bottom: 10px;
    color: white;
    padding: 12px;
    padding-left: 15px;
    font-size: 15px;
    display: block;

    /*vertical-align: middle;*/
    /*background: #009a3f;*/
    background: #009a3fcf;
    width: 100%;
    font-weight: bold;
    border-radius: 6px;
     }
.cerrado{
    background: #009a3f !important;
     }
#contItem span{
    border: 1px solid #9d9d9c;
    border-radius: 50%;
    padding: 7px;
    margin-right: 5px;
    background: #f39200;
    }


    .color-lead {
        color: rgb(0, 0, 0);
    }

    .color-orange {
        color: #F29104;
    }

    .color-green {
        color: #009B3A;
    }

    .titulo {
        font-size: 12px;
        font-weight: bold;
        text-align: center;
        margin-bottom: 10px;
    }

    .cuerpo {
        font-size: 11px;
        font-weight: bold;
        font: verdana;
    }

    .me {
        margin-right: 4px;
    }

    .mb {
        margin-bottom: 5px;
    }

    .mt
    {
        margin-top: 5px;
    }

    .ms {
        margin-left: 5px;
    }

    .text-titulo
    {
        text-transform: lowercase;
    }
</style>


@component('mail::message')
<table>
<tr>
<td align="rigth"><img width="100" src="{{asset('img/LOGO_RANSA_2.png')}}"></td>
</tr>
</table>
<table width="100%">
<tr class="color-green titulo mb">
<td> Comunicado de <span class="text-titulo">RECLAMO </span></td>
</tr>
</table>
<table>
<tr align="center">
<td >
 <img width="300" src="{{ asset('img/clasificacion.png') }}" >    
</td>   
</tr>
</table>

<table class="cuerpo mt" width="100%">
<td class="color-lead">
El reclamo ya ha sido asignado al responsable para su respectiva investigación y análisis con los planes de acciones definido.
</td>
<tr>
<td class="color-lead">
Se ha tomado en cuenta la observación en la calificación y tomo la decisión de la reapertura del caso para su respectivo análisis y planes de acciones.    
</td>
</tr>
<tr> 
<td>
<hr size="2px" color="black" />
</td>
</tr> 
</table>
<table class="cuerpo mt" width="100%">
<tr>
<td class="color-lead">
Estimados,
</td>
</tr>
<tr>
<td class="color-lead">
    Le informamos que la información proporcionada ha sido ingresada correctamente en nuestro sistema. Estamos trabajando diligentemente en su reclamo y nos comprometemos a mantenerlo informado de los avances en las próximas horas.
</td>
</tr>
<tr>
<td class="color-lead">
 El número de ticket de atención correspondiente a su reclamo es: {{$solicitud->codigo_generado}}
</td>
</tr>
</table>
<table width="100%" class="cuerpo mt">
<tr>
<td class="color-lead me">Cliente:</td>
 <td class="color-lead me">{{ $solicitud->cliente }}</td> 
</tr>
<tr>
<td class="color-lead me">Servicio Brindado por Ransa:</td>
<td class="color-lead me">{{ $solicitud->servicio_ransa->name }}</td> 
</tr>
<tr>
<td class="color-lead me">Sede:</td>
<td class="color-lead me">{{ $solicitud->sede->name}}</td> 
</tr>
<tr>
<td class="color-lead me">Tipo de Novedad:</td>
<td class="color-lead me">{{ $solicitud->tipo_reclamo->name}}</td> 
</tr>
<tr>
<td class="color-lead me">Descripcion:</td>
<td class="color-lead me">{{ $solicitud->Descripcion }}</td> 
</tr>
<tr>
<td class="color-lead me">Reportado por:</td>
<td class="color-lead me">
    {{ $solicitud->nombre }}
</td> 
</tr>
</table>

<table width="100%" class="cuerpo" cellpadding="0" cellspacing="0">
<tr>
<td class="color-orange cuerpo mt">
    Le agradecemos su paciencia y por su confianza en nosotros. Si tiene alguna pregunta o inquietud adicional, no dude en ponerse en contacto con nosotros.
</td>
</tr>
</table>
@endcomponent
