<style> 
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
    <td align="right"><img width="100" src="{{asset('img/LOGO_RANSA_2.png')}}"></td>
    </tr>
</table>
<table width="100%">
<tr class="color-green titulo mb">
<td> Comunicado de <span class="text-titulo">RECLAMO </span></td>
</tr>
<table class="cuerpo mt" width="100%">
<tr>
<td class="color-lead">
Hola,
</td>
</tr>
<tr>
<td class="color-lead">
El reclamo ya a sido asignado responsable para su respectiva investigacion y analisis con los planes de acciones  definido. 
</td>
</tr>
<tr>
<td class="color-lead">
    El ticket de atención es: {{$solicitud->codigo_generado}}
</td>
</tr>

<table width="100%" class="cuerpo mt">
<tr>
    <td color-lead>
    Recuerda que tienes un maximo 120 horas como maximo para la revision y investigacion.
    </td>
</tr>
</table>

<table width="100%" class="cuerpo" cellpadding="0" cellspacing="0">

<tr>
<td class="color-orange cuerpo mt">
    Tu atención oportuna es importante mejorara la experiencia de servicio de nuestros clientes.
</td>
</tr>
<tr>
<br>
@switch($solicitud->clasificacion->causal_general_id)
    @case(1)
    @component('mail::button', ['url' => route('adm.Investigacion.correccion', ['solicitud' =>$notificacionCR->solicitude_id]), 'color' => 'green'])
    Cumplimiento de acciones
    @endcomponent   
        @break
    @case(5)
    @component('mail::button', ['url' => route('adm.Investigacion.correccion', ['solicitud' =>$notificacionCR->solicitude_id]), 'color' => 'green'])
    Cumplimiento de acciones
    @endcomponent    
        @break
    @default
@component('mail::button', ['url' => route('adm.Investigador', ['solicitud'=>$notificacionCR->solicitude_id]), 'color' => 'green'])
Cumplimiento de acciones
@endcomponent      
@endswitch

</tr>
<tr>
<td>
<table>
<tr>
{{-- <td align="left"><img src="{{ asset('img/Llave_Somos-un-solo-equipo_verde.png') }}" width="200" alt=""></td> --}}
{{-- <td></td> --}}
{{-- <td align="rigth"><img width="200" src="{{ asset('img/logo-ransa.png') }}"></td> --}}
</tr>
</table>
</td>
</tr>
</table>

</table>
</table>
@endcomponent
