 {{-- @push('styles')
    <link rel="stylesheet" href="{{ asset('css/rqr.css') }}">
    @endpush --}}
<div>
    <div class="right_col" role="main">
            <div class="page-title">
                <div class="title_left">
                    <h3>Listado de Reclamos</h3>
                </div>
                <div class="title_right">
                    <div class="col-md-4 col-sm-5 form-group pull-right top_search">
                        <div class="input-group">
                            {{-- <input type="text" class="form-control" placeholder="Search for...">
                            <span class="input-group-btn">
                                <button class="btn btn-default" type="button">Go!</button>
                            </span> --}}
                            <button class="btn bg-green-500 text-white" wire:click.prevent='DescargarReclamo'>
                                Descargar Excel
                             </button>
                        </div>
                    </div>
                </div>
            </div>

            {{-- <div id="cuadroItem" class="cuadroItem">
                <div class="x_panel">
                    <div class="x_content">
                        <div id="ItemProceso" class="view-horizontal">
                            <ul class="view-steps anchor">
                                <li>
                                    <a class="selview-horizontalectedd" href="#">
                                        <span class="itemno">1</span>
                                        <span>Registro</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <span class="itemno">2</span>
                                        <span class="">Clasificación</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <span class="itemno">3</span>
                                        <span>Investigación</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <span class="itemno">4</span>
                                        <span>Seguimiento</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <span class="itemno">5</span>
                                        <span>Cierre</span>
                                    </a>
                                </li>
                            </ul>

                        </div>

                    </div>

                </div>
            </div> --}}
         <div class="row" wire:ignore>
            <div class="col-sm-12 col-md-12">
            <div class="x_panel">
                <div class="x_title">
                    <div class="clearfix"></div>
                </div>
                 {{-- <div class="mb-2 col-md-3" style="width: 200px">
                    <select name="" wire:model="estado" class="form-control">
                       <option value="">Seleccionar opción</option>
                      <option value="1">Clasificación</option>
                      <option value="2">Investigación</option>
                      <option value="3">En proceso</option>
                      <option value="4">Cerrado</option>
                      <option value="5">No procede</option>
                    </select>
                </div> --}}
            <table id="reclamos" class="text-green-500 table table-striped dt-responsive" style="width:100%">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th data-priority="1">Codigo</th>
                        <th >Nombre</th>
                        <th>Correo</th>
                        <th data-priority="1">Celular</th>
                        <th data-priority="1">Cliente</th>
                        <th data-priority="1">sede</th>
                        <th data-priority="1">Tipo Notificación</th>
                        <th data-priority="2">Servicio</th>
                        <th>F. Registro</th>
                        <th>Descripcion</th>
                        <th data-priority="2"> Estado </th>
                        <th data-priority="2">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($solicitudes as $solicitud)
                    <tr>
                        <td >{{$solicitud->id}}</td>
                        <td>{{$solicitud->codigo_generado}}</td>
                        <td>{{$solicitud->nombre}}</td>
                        <td>{{$solicitud->correo}}</td>
                        <td>{{$solicitud->celular}}</td>
                        <td>{{$solicitud->cliente}}</td>
                        <td>{{$solicitud->sede->name}}</td>
                        <td>{{$solicitud->tipo_reclamo->name}}</td>
                        <td>{{$solicitud->servicio_ransa->name}}</td>
                        <td>{{$solicitud->fecha_registro}} {{$solicitud->created_at->diffForHumans()}}</td>
                        <td>
                            <label>{{$solicitud->Descripcion}}</label>
                        </td>
                        <td>

                            @switch($solicitud->estado)

                            @case(2)
                            {{-- @if (today()->diffInDays($solicitud->clasificacion->created_at) > 5)
                            <label class="bg-orange-500 p-1 btn-group btn-group-sm  rounded text-white text-center" style="font-size:11px;">Investigacion con {{today()->diffInDays($solicitud->clasificacion->created_at)}} dias de atrazo</label>
                            @else --}}
                            <span class="bg-green-500 p-1 rounded text-white">Investigacion</span>
                            {{-- @endif --}}
                            @break
                            @case(3)
                            {{-- @if (today() > $solicitud->investigacion->fecha_programada)
                            <label class="bg-orange-500 p-1 btn-group btn-group-sm rounded text-white text-center" style="font-size:11px;">Proceso con {{today()->diffInDays($solicitud->investigacion->fecha_programada)}} dias de atrazo </label>
                            @else --}}
                            <span class="bg-lead-500 p-1 rounded text-white">Proceso</span>
                            {{-- @endif --}}
                            @break
                            @case(4)
                            <span class="bg-green-500 p-1 rounded text-white">Cierre</span>
                            @break
                            @case(5)
                            <span class="bg-orange-500 p-1 rounded text-white">Cerrado</span>
                            @break
                            @default
                             @if (today()->diffInDays($solicitud->created_at) > 2)
                            <label class="bg-orange-500 p-1 btn-group btn-group-sm rounded text-white text-center" style="font-size:11px;">Clasificacion con {{today()->diffInDays($solicitud->created_at)}} dias de atrazo</label>
                            @else
                            <span class="bg-green-500 p-1 rounded text-white">Clasificacion</span>
                            @endif
                            @endswitch
                        </td>
                        <td>
                            @switch($solicitud->estado)
                            @case(2)
                            <div class="btn-group btn-group-sm " role="group" aria-label="">
                                <label class="bg-lead-500 p-1 text-center    rounded text-white" style="font-size:10px;">Responsable Asignado</label>
                            </div>
                            @break

                            @case(3)
                            <div class="btn-group btn-group-sm " role="group" aria-label="">

                                <a href="{{route('adm.pdf.Reclamo', encrypt($solicitud->id))}}" rel="noreferrer noopener" target="_blank"  class="border btn btn-orange-500 text-white"
                                    >
                                    <i class="fa-solid fa-file-pdf"></i>
                                </a>
                                <a href="{{ route('adm.Infor.reclamo', encrypt($solicitud->id)) }}" class="btn btn-orange-500 text-white border" >
                                    <i class="fa fa-info"></i>
                                </a>
                            </div>
                            @break

                            @case(4)
                            <div class="btn-group btn-group-sm " role="group" aria-label="">

                                <a href="{{route('adm.pdf.Reclamo', encrypt($solicitud->id))}}" rel="noreferrer noopener" target="_blank"  class="border btn btn-orange-500 text-white"
                                    >
                                    <i class="fa-solid fa-file-pdf"></i>
                                </a>
                                <a href="{{ route('adm.Infor.reclamo', encrypt($solicitud->id)) }}" class="btn btn-orange-500 text-white border" >
                                    <i class="fa fa-info"></i>
                                </a>
                            </div>
                            @break

                            @case(5)
                            <div class="btn-group btn-group-sm " role="group" aria-label="">
                               {{-- @isset($solicitud->investigacion->argumento)
                                <a href="{{route('adm.pdf.Reclamo', $solicitud->id)}}"  rel="noreferrer noopener" class="border btn btn-orange-500 text-white"
                                    >
                                    <i class="fa fa-download"></i>
                                </a>
                                @endisset  --}}
                                <a href="{{route('adm.inf.no-procede', encrypt($solicitud->id))}}" class="btn btn-orange-500 text-white border" >
                                    <i class="fa fa-info"></i>
                                </a>
                            </div>
                            @break

                            @default
                            <div class="btn-group btn-group-sm " role="group" aria-label="">

                                <button type="button" class="border btn btn-orange-500 text-white images"
                                    data-bs-toggle="modal" data-bs-target="#exampleModal">
                                    <i class="fa fa-image"></i>
                                </button>

                                <a href="{{ route('adm.Clasificacion', encrypt($solicitud->id)) }}" class="btn btn-orange-500 text-white border">
                                    <i class="fa fa-user"></i>
                                </a>
                            </div>
                            @endswitch

                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
         </div>
    </div>
</div>
<x-jet-dialog-modal wire:model.prevent="open">
    <x-slot name='title'>
    <div class="col-md-12 col-sm-12 text-center">
        <div class="input-group ">
        <img src="{{asset('img/logo.png')}}" alt="logo" width="180">
        <label class="form-label mt-2">
          <strong>  Reclamo Ransa </strong>
        </label>
        </div>
    </div>
    </x-slot>
    <x-slot name='content'>
        <div class="col-sm-12 col-md-12">
        <div class="mt-2 mb-3">
        <label for="form-label fs-6" style="color: #7c7c7c">Estatus</label>
        <select name="" id="" class="form-select rounded" wire:model="valores">
            <option value="">seleccionar</option>
            <option value="2">Investigación</option>
            <option value="3">Proceso</option>
        </select>
        </div>
        </div>
        {{-- <div class="col-sm-12 col-md-6">
            <div class="mt-2 mb-3">
            <label for="form-label fs-6" style="color: #7c7c7c">Fecha</label>
            <input type="date" class="form-control rounded">
            </div>
            </div> --}}
    </x-slot>
    <x-slot name='footer'>
        <x-jet-secondary-button wire:click.prevent="$set('open', false)">
            Cancelar
        </x-jet-secondary-button>
        <x-jet-danger-button wire:click.prevent='DescargarReclamo'>
            Descargar
        </x-jet-danger-button>
    </x-slot>
  </x-jet-dialog-modal>
    </div>
    {{-- @push('scripts')
    <script>
    Livewire.on('select2', function() {
    $("#selectgrup").select2({
    // tags: true,
    theme: "bootstrap-5",
    width: $( this ).data( 'width' ) ? $( this ).data( 'width' ) : $( this ).hasClass( 'w-100' ) ? '100%' : 'style',
    placeholder: $( this ).data( 'placeholder' ),
    closeOnSelect: false,
     });
    });
        </script>
    @endpush --}}
     {{-- Modal para Imagenes --}}
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="overflow-scroll d-block">
                    @isset($solicitud->imagen)
                    <img src="{{asset('storage/Reclamos/'.trim($solicitud->imagen))}}" class="card-img-top">
                    <dd>{{$solicitud->id}}</dd>
                    @endisset
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


