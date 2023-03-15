 @push('styles')
    <link rel="stylesheet" href="{{ asset('css/rqr.css') }}">
    @endpush
<div>
    <div class="right_col" role="main">
            <div class="page-title">
                <div class="title_left">
                    <h3>Listado de Reclamos</h3>
                </div>
                <div class="title_right">
                    <div class="col-md-5 col-sm-5   form-group pull-right top_search">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Search for...">
                            <span class="input-group-btn">
                                <button class="btn btn-default" type="button">Go!</button>
                            </span>
                        </div>
                    </div>
                </div>
            </div>

            <div id="cuadroItem" class="cuadroItem">
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
            </div>
         <div class="row">
            <table id="reclamos" class="text-green-500 table table-striped dt-responsive nowrap" style="width:100%">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th data-priority="1">Codigo</th>
                        <th >Nombre</th>
                        <th>Correo</th>
                        <th>Celular</th>
                        <th data-priority="1">Cliente</th>
                        <th data-priority="1">sede</th>
                        <th>Tipo Notificación</th>
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
                        <td>{{$solicitud->id}}</td>
                        <td>{{$solicitud->codigo_generado}}</td>
                        <td>{{$solicitud->nombre}}</td>
                        <td>{{$solicitud->correo}}</td>
                        <td>{{$solicitud->celular}}</td>
                        <td>{{$solicitud->cliente}}</td>
                        <td>{{$solicitud->sede->name}}</td>
                        <td>{{$solicitud->tipo_reclamo->name}}</td>
                        <td>{{$solicitud->servicio_ransa->name}}</td>
                        <td>{{$solicitud->fecha_registro}}</td>
                        <td>{{$solicitud->Descripcion}}</td>
                        <td>

                            @switch($solicitud->estado)

                            @case(2)
                            <span class="bg-green-500 p-1 rounded text-white">Investigacion</span>
                            @break
                            @case(3)
                            <span class="bg-lead-500 p-1 rounded text-white">Proceso</span>
                            @break
                            @case(4)
                            <span class="bg-green-500 p-1 rounded text-white">Cierre</span>
                            @break
                            @case(5)
                            <span class="bg-orange-500 p-1 rounded text-white">Cerrado</span>
                            @break
                            @default
                            <span class="bg-green-500 p-1 rounded text-white">Clasificacion</span>
                            @endswitch
                        </td>
                        <td>
                            @switch($solicitud->estado)
                            @case(2)
                            <div class="btn-group btn-group-sm " role="group" aria-label="">
                                <span class="bg-lead-500 p-1 rounded text-white">Responsable Asignado</span>
                            </div>
                            @break

                            @case(3)
                            <div class="btn-group btn-group-sm " role="group" aria-label="">
                               
                                <a href="{{asset('storage/Reclamos/Analisis/'.trim($solicitud->investigacion->archivo))}}" target="_blank" rel="noreferrer noopener" class="border btn btn-orange-500 text-white"
                                    >
                                    <i class="fa fa-download"></i>
                                </a>
                                <a href="{{ route('adm.Infor.reclamo', $solicitud->id) }}" class="btn btn-orange-500 text-white border" >
                                    <i class="fa fa-info"></i>
                                </a>
                            </div>
                            @break

                            @case(4)
                            <div class="btn-group btn-group-sm " role="group" aria-label="">
                              
                                <a href="{{asset('storage/Reclamos/Analisis/'.trim($solicitud->investigacion->archivo))}}" target="_blank" rel="noreferrer noopener" class="border btn btn-orange-500 text-white"
                                    >
                                    <i class="fa fa-download"></i>
                                </a>
                                <a href="{{ route('adm.Infor.reclamo', $solicitud->id) }}" class="btn btn-orange-500 text-white border" >
                                    <i class="fa fa-info"></i>
                                </a>
                            </div> 
                            @break
                             
                            @case(5)
                            <div class="btn-group btn-group-sm " role="group" aria-label="">
                               @isset($solicitud->investigacion->argumento)
                                <a href="{{asset('storage/Reclamos/Analisis/'.trim($solicitud->investigacion->archivo))}}" target="_blank" rel="noreferrer noopener" class="border btn btn-orange-500 text-white"
                                    >
                                    <i class="fa fa-download"></i>
                                </a>
                                @endisset 
                                <a href="{{route('adm.inf.no-procede', $solicitud->id)}}" class="btn btn-orange-500 text-white border" >
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

                                <a href="{{ route('adm.Clasificacion', $solicitud->id) }}" class="btn btn-orange-500 text-white border">
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
 

