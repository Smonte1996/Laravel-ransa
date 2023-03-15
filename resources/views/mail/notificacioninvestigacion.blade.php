<style>
    .view-horizontal ul.view-steps {
    display: table;
    list-style: none;
    position: relative;
    width: 100%;
    margin: 0 0 20px;
     }
.view-horizontal ul.view-steps li a, .view-horizontal ul.view-steps li:hover {
    display: block;
    position: relative;
    -moz-opacity: 1;
    filter: alpha(opacity=100);
    opacity: 1;
    color: #666;
     }
.view-horizontal ul.view-steps li {
    display: table-cell;
    text-align: center;
      }
.view-horizontal ul.view-steps li:first-child a:before {
    left: 45%;
      }
.view-horizontal ul.view-steps li a.selectedd:before, .itemno {
    background: #f39200;
    color: #fff;
     }
.view-horizontal ul.view-steps li a:before {
    content: "";
    position: absolute;
    height: 4px;
    background: #009B3A;
    top: 20px;
    width: 100%;
    z-index: 4;
    left: 0;
       }
.view-horizontal ul.view-steps li a .itemno {
    width: 40px;
    height: 40px;
    line-height: 40px;
    border-radius: 100px;
    display: block;
    margin: 0 auto 5px;
    font-size: 13px;
    text-align: center;
    position: relative;
    z-index: 5;
      }
.view-horizontal ul.view-steps li:last-child a:before {
    right: 50%;
    width: 51%;
    left: auto;
      }
.sticky {
  position: fixed;
  top: 0;
  width: 80%;
  z-index: 1;
      }
.valoritem:hover .popover{
    width: 250px;
    } 
/*.sticky + .contenidoCuadro {
  padding-top: 102px;
}*/
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

    .cuerpos {
        font-size: 15px;
        font-weight: bold;
        font: verdana;
        text-align: center;
    }

    .nombre{
        font-size: 15px;
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
<table>
<tr align="center">
<td>
 <img width="400" src="{{asset('img/Proceso.png')}}">   
</td>
</tr>
</table>
<table class="cuerpo mt" width="100%">
<tr>
<td class="color-green nombre">
Hola, {{$solicitud->nombre}}
</td>
</tr>
<td class="color-lead">
Queremos informarte que tu caso se encuentra en investigación. La fecha estimada de respuesta es: {{$solicitud->investigacion->fecha_programada}}
</td>
<tr> 
<td class="color-lead me">
Plan de acciones 
</td>
</tr>   
<tr>
<td>
<ul class="color-lead me">
 @foreach ($solicitud->acciones as $action)
<li>{{ $action->name }}</li>
@endforeach 
</ul>
</td>
</tr>
<tr>
<td class="colir-lead">
Queremos saber tu opinión es muy importante para nosotros hasta la siguiente encuesta <a href="{{url('Encuesta/cliente', [ 'solicitude' => $solicitud->id])}}">Aquí.</a>   
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
Queremos informarte que tu caso ha sido registrado.
</td>
</tr>

<table width="100%" class="cuerpo mt">
<tr>
<td class="color-lead me">N° de caso:</td>
<td class="color-lead me"> {{$solicitud->codigo_generado}}</td>
</tr>
<tr>
<td class="color-lead me">Cliente:</td>
 <td class="color-lead me">{{ $solicitud->cliente }}</td> 
</tr>
<tr>
<td class="color-lead me">Servicio Brindado por Ransa:</td>
<td class="color-lead me">{{ $solicitud->servicio_ransa->name }}</td> 
</tr>
<tr>
<td class="color-lead me">Sub servicio:</td>
<td class="color-lead me">{{ $solicitud->adicional->name }}</td>
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
<td class="color-lead me">Titulo del caso:</td>
<td class="color-lead me">{{ $solicitud->titulo}}</td>
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
<td class="color-green cuerpos mt">
    ¡Hacemos de la logística una ventaja completitiva!
</td>
</tr>
</table>

</table>
</table>
@endcomponent
