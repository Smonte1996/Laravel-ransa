<x-app-layout>
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>Gestion de Reclamos</h3>
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

            <div class="clearfix"></div>
            <form action="{{ route('adm.solicitud.update', $solicitude)}}" method="post"
                id="imgcorrection">
                @csrf
                 {{-- @method('PUT')  --}}
                <div class="row">
                    <div class="col-md-12 col-sm-12">
                        <div class="x_panel">
                            <div class="x_title">
                                <h2>Confirmación de Acciones</h2>
                                <ul class="nav navbar-right panel_toolbox">
                                    {{-- @if ($notification_service->dissatisfaction_service->notification_type == 'NO CONFORMIDAD')
                                        <x-jet-button type="button" id=""><i
                                                class="fa fa-solid fa-upload"></i>
                                            Análisis
                                        </x-jet-button>
                                    @endif --}}
                                    <li>
                                        <x-jet-button type="button" data-bs-toggle="modal"
                                            data-bs-target="#exampleModal"><i class="fa fa-solid fa-eye"></i> Evidencia
                                        </x-jet-button>
                                    </li>
                                    <li>
                                        <x-jet-button type="button" ><i
                                                class="fa fa-solid fa-upload"></i>
                                            Adjuntar
                                        </x-jet-button>
                                    </li>
                                </ul>
                                <div class="clearfix"></div>
                            </div>
                            <div id="previewsimg">
                            </div>
                            <div class="x_content">
                                <div class="row">
                                    <div class="col-sm-12 col-md-3">
                                        <div class="mb-3">
                                            <label for="exampleFormControlInput1"
                                                class="form-label text-lead-500">N° de ticket
                                            </label>
                                            <div class="text-orange-500 fs-6">
                                                  {{$solicitude->codigo_generado}}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-3">
                                        <div class="mb-3">
                                            <label for="exampleFormControlInput1"
                                                class="form-label text-lead-500">Tipo</label>
                                            <div class="text-orange-500 fs-6">
                                                    {{$solicitude->tipo_reclamo->name}} 
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-3">
                                        <div class="mb-3">
                                            <label for="exampleFormControlInput1"
                                                class="form-label text-lead-500">Sede</label>
                                            <div class="text-orange-500 fw-bold fs-6">
                                                {{$solicitude->sede->name}} 
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-3">
                                        <div class="mb-3">
                                            <label for="exampleFormControlInput1"
                                                class="form-label text-lead-500">Cliente</label>
                                            <div class="text-orange-500 fw-bold fs-6">
                                                 {{$solicitude->cliente}}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-6">
                                        <div class="mb-3">
                                            <label for="exampleFormControlInput1"
                                                class="form-label text-lead-500">Causal general</label>
                                            <div class="text-orange-500 fs-6">
                                                {{$solicitude->clasificacion->causal_general->name}} 
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-6">
                                        <div class="mb-3">
                                            <label for="exampleFormControlInput1"
                                                class="form-label text-lead-500">Detalle causal</label>
                                            <div class="text-orange-500 fs-6">
                                                {{$solicitude->clasificacion->detalle_causal->name}} 
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-6">
                                        <div class="mb-3">
                                            <label for="exampleFormControlInput1"
                                                class="form-label text-lead-500">Causa raiz</label>
                                            <div class="text-orange-500 fs-6">
                                                  {{$solicitude->investigacion->causa_raiz}} 
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-6">
                                        <div class="mb-3">
                                            <label for="exampleFormControlInput1"
                                                class="form-label text-lead-500">Correcion</label>
                                            <div class="text-orange-500 fs-6">
                                                {{$solicitude->investigacion->correccion}} 
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-6">
                                        <div class="mb-3">
                                            <label for="exampleFormControlInput1"
                                                class="form-label text-lead-500">Observaciones</label>
                                            <div class="text-orange-500 fs-6">
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <fieldset class="border border-2">
                                    <legend class="rounded w-50 d-none d-sm-block float-none bg-lead-500 text-white ps-5 ms-4">Da check a
                                        las
                                        acciones cumplidas</legend>
                                        <legend class="rounded float-none d-sm-none bg-lead-500 text-white fs-6 p-1">Da check a
                                            las
                                            acciones cumplidas</legend>                                        
                                    <div class="ms-4">
                                        <table class="table w-100 text-green-400">
                                              @foreach ($solicitude->acciones as $accion)  
                                                <tr>
                                                     <td class="">
                                                         {{$accion->name}} 
                                                    </td> 
                                                    <td class="ps-5">
                                                        <div class="">
                                                           {{$accion->fecha_programacion->format('d/m/y')}} 
                                                        </div>
                                                    </td>
                                                    <td class="ps-5">
                                                        <div class="form-check">
                                                            <input type="checkbox" name="accion_check" 
                                                                class="form-check-input text-green-500">
                                                        </div>
                                                    </td>
                                                </tr>
                                             @endforeach 

                                        </table>
                                        <div class="col-sm-12 col-md-6">
                                            <div class="mb-3">
                                                <label for="exampleFormControlInput1"
                                                    class="form-label text-lead-500">Evaluacion de eficacia</label>
                                                <div class="text-orange-500 fs-6">
                                                   {{$solicitude->investigacion->evaluacion_eficacia}} 
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-3">
                                            <div class="mb-3">
                                                <label for="exampleFormControlInput1"
                                                    class="form-label text-lead-500">Fecha Programada</label>
                                                <div class="text-orange-500 fs-6">
                                                    {{$solicitude->investigacion->fecha_programada->format('d/m/y')}} 
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-3">
                                        <div class="form-check mb-6">
                                            <input type="checkbox" name="evaluacion_check" 
                                                class="form-check-input text-green-500">
                                        </div>
                                        </div>
                                      
                                    </div>
                                    {{-- @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach --}}
                                </fieldset>
                                <div class="col-12">
                                    <label class="form-label text-orange-500">Observaciones:</label>
                                    <textarea name="endobservations" id="" class="form-control"></textarea>
                                </div>
                                <div class="text-center">
                                    <x-jet-button  class="mt-4">Confirmar Acciones
                                    </x-jet-button>
                                </div>
                            </div>
            </form>
        </div>
    </div>
    </div>
    </div>
    </div>
    {{-- Modal para Visualizar las imagenes --}}
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="overflow-scroll d-block">
                        {{-- @foreach ($notification_service->attached_files as $files)
                            <img class="rounded img-thumbnail" width="250" src="{{ asset($files->path) }}" alt="">
                        @endforeach --}}
                    </div>

                </div>
                <div class="modal-footer">
                    {{-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> --}}
                    {{-- <button type="button" class="btn btn-primary">Save changes</button> --}}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>


