<style>
    .color-lead {
        color: #9D9D9C;
    }

    .color-orange {
        color: #F39200;
    }

    .color-green {
        color: #009A3F;
    }

    .titulo {
        font-size: 25px;
        font-weight: bold;
        text-align: center;
        margin-bottom: 10px;
    }

    .cuerpo {
        font-size: 13px;
        font-weight: bold;
    }

    .me {
        margin-right: 4px;
    }

    .mb {
        margin-bottom: 5px;
    }

    .ms {
        margin-left: 5px;
    }
</style>


@component('mail::message')
<table width="100%">
<tr class="color-green titulo">
<td>¡ Notificación de {{ $notification->dissatisfaction_service->notification_type }} !</td>
</tr>
<table class="cuerpo" width="100%">
<tr>
<td class="color-lead">
Estimados,
</td>
</tr>
<tr>
<td class="color-lead">
EL presente es para informar que se ha reportado una alerta,
</td>
</tr>
<tr>
<td class="color-lead">
la cualse debe cumplir las acciones dentro de las 24 horas.
</td>
</tr>
<tr>
<table width="100%" class="cuerpo">
<tr>
<td class="color-lead me">Reportado por:</td>
<td class="color-orange me">
{{ $notification->employee->name . ' ' . $notification->employee->lastname }}</td>
<td class="color-lead me">Imágenes</td>
<td class="color-orange me">{{ count($notification->attached_files) }}</td>
</tr>
<tr>
<td class="color-lead me">Actividad:</td>
<td class="color-orange me">{{ $notification->dissatisfaction_service->activity->name }}</td>
</tr>
<tr>
<td class="color-lead me">Potencial Servicio No Conforme:</td>
<td class="color-orange me">{{ $notification->dissatisfaction_service->name }}</td>
</tr>
<tr>
<td class="color-lead me">Observaciones:</td>
<td class="color-orange me">{{ $notification->observations }}</td>
</tr>
</table>
<table width="100%" class="cuerpo" cellpadding="0" cellspacing="0">
<tr>
<td class="titulo color-green mb">Acciones por Cumplir</td>
</tr>
<tr>
<td>
<ul class="color-lead me">
@foreach ($notification->dissatisfaction_service->actions as $action)
<li>{{ $action->name }}</li>
@endforeach
</ul>
</td>
</tr>
<tr>
<td class="color-green cuerpo mb ms">
Para confirmar las acciones cumplidas y ver a detalle la notificación por favor
ingrese al siguiente link:
</td>
</tr>
<tr>
@component('mail::button', ['url' => route('notifications.edit', ['notification_service' => $notification]), 'color' => 'green'])
Realizar Acciones
@endcomponent
</tr>
<tr>
<td>
<table>
<tr>
<td align="left"><img src="{{ asset('img/Llave_Somos-un-solo-equipo_verde.png') }}" width="200" alt=""></td>
{{-- <td></td> --}}
{{-- <td align="rigth"><img width="200" src="{{ asset('img/logo-ransa.png') }}"></td> --}}
</tr>
</table>
</td>
</tr>
</table>
</tr>
</table>
</table>
@endcomponent
