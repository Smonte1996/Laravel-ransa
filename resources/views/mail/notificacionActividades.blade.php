<style>
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

        .ma {
            margin-right: 2px;
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
<td> Comunicado de <span class="text-titulo">{{$solicitud->tipo_reclamo->name}}</span></td>
</tr>
</table> 
<table class="cuerpo mt" width="100%">
<tr>
<td class="color-lead">
Hola,
</td>
</tr>
<tr>   
<td class="color-lead">
Se te asignado las siguentes actividades que debes cumplir segun la fecha programada. 
</td>
</tr>
<tr>
<td class="color-lead">
     El ticket de atención es: {{$solicitud->codigo_generado}} 
</td>
</tr>
<table width="100%" class="cuerpo" >
<tr>
<thead>
<tr>
<th class="color-lead">
Accion
</th>
<th class="color-lead">
 Responsable   
</th>
<th class="color-lead">
 fecha Programada   
</th>
</tr>
</thead>    
<tbody>
<tr>
<td>
@foreach ($solicitud->acciones as $action)
<li class="color-lead">
    {{ $action->name }}
</li>  
@endforeach
</td>
<td>
@foreach ($solicitud->acciones as $actions)    
<li class="color-lead">
    {{ $actions->Empleado->name .' '. $actions->Empleado->lastname }}   
</li> 
@endforeach
</td>
<td>
@foreach ($solicitud->acciones as $actiones)    
<li class="color-lead">
    {{ $actiones->fecha_programacion }}   
</li>
@endforeach  
</td>   
</tr> 
</tbody>
</tr>
</table>
</table>
@endcomponent
