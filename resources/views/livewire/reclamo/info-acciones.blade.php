<div>
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

            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Información</h2>
                            <ul class="nav navbar-right panel_toolbox">
                                <li>
                                    <x-jet-button type="button" data-bs-toggle="modal"
                                        data-bs-target="#exampleModal"><i class="fa fa-solid fa-eye"></i> Evidencia Cliente
                                    </x-jet-button>
                                </li>
                                <li>
                                    <x-jet-button type="button" data-bs-toggle="modal"
                                    data-bs-target="#exampleModal1"><i class="fa fa-solid fa-eye"></i> Evidencia Acciones
                                </x-jet-button>
                                </li>
                            </ul>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <div class="">
                                <a href="{{ route('adm.reclamo') }}"
                                    class="btn btn-sm btn-orange-500">Regresar</a>
                            </div>
                            <div class="row">
                                <div class="col-sm-12 col-md-2">
                                    <div class="mb-3">
                                        <label for="exampleFormControlInput1"
                                            class="form-label text-lead-500">N° de ticket
                                        </label>
                                        <div class="text-orange-500 fw-bold fs-6">
                                             {{$solicitude->codigo_generado}}
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-3">
                                    <div class="mb-3">
                                        <label for="exampleFormControlInput1"
                                            class="form-label text-lead-500">Causal General</label>
                                        <div class="text-orange-500 fs-6">
                                             {{$solicitude->clasificacion->causal_general->name}} 
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-2">
                                    <div class="mb-3">
                                        <label for="exampleFormControlInput1"
                                            class="form-label text-lead-500">Tipo</label>
                                        <div class="text-orange-500 fw-bold fs-6">
                                              {{$solicitude->tipo_reclamo->name}} 
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-2">
                                    <div class="mb-3">
                                        <label for="exampleFormControlInput1"
                                            class="form-label text-lead-500">Cliente</label>
                                        <div class="text-orange-500 fw-bold fs-6">
                                             {{$solicitude->cliente}} 
                                    </div>
                                </div>
                                </div>
                                <div class="col-sm-12 col-md-3">
                                    <div class="mb-3">
                                        <label for="exampleFormControlInput1"
                                            class="form-label text-lead-500">Detalle Causal</label>
                                        <div class="text-orange-500 fs-6">
                                            {{$solicitude->clasificacion->detalle_causal->name}} 
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-6">
                                    <div class="mb-3">
                                        <label for="exampleFormControlInput1"
                                            class="form-label text-lead-500">Descripcion</label>
                                        <div class="text-orange-500 fs-6">
                                              {{$solicitude->Descripcion}} 
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-6">
                                    <div class="mb-3">
                                        <label for="exampleFormControlInput1"
                                            class="form-label text-lead-500">Titulo de caso</label>
                                        <div class="text-orange-500 fs-6">
                                              {{$solicitude->titulo}} 
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-6">
                                    <div class="mb-3">
                                        <label for="exampleFormControlInput1"
                                            class="form-label text-lead-500">Sede</label>
                                        <div class="text-orange-500 fs-6">
                                              {{$solicitude->sede->name}} 
                                        </div>
                                    </div>
                                </div>
                            <div class="col-sm-12 col-md-6">
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1"
                                        class="form-label text-lead-500">Coordinador Responsable</label>
                                    <div class="text-orange-500 fs-6">
                                         {{$solicitude->investigacion->Empleados->name.' '.$solicitude->investigacion->Empleados->lastname}} 
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
                                        class="form-label text-lead-500">Causa Raiz</label>
                                    <div class="text-orange-500 fs-6">
                                        {{$solicitude->investigacion->causa_raiz}}
                                    </div>
                                </div>
                            </div> 
                           
                            <div class="col-sm-12 col-md-4">
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1"
                                        class="form-label text-lead-500">Planes de acciones</label>
                                    <div class="text-orange-500 fs-6">
                                        <ul>
                                          @foreach ($solicitude->acciones as $accion) 
                                        <li>{{$accion->name}}</li>
                                        @endforeach  
                                        </ul>
                                    </div>
                                </div>
                            </div> 
                            <div class="col-sm-12 col-md-4">
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1"
                                        class="form-label text-lead-500">Responsables</label>
                                    <div class="text-orange-500 fs-6">
                                        <ul>
                                          @foreach ($solicitude->acciones as $accion) 
                                        <li>{{$accion->Empleado->name.' '.$accion->Empleado->lastname}}</li>
                                        @endforeach  
                                        </ul>
                                    </div>
                                </div>
                            </div> 
                            <div class="col-sm-12 col-md-4">
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1"
                                        class="form-label text-lead-500">Fecha Programada</label>
                                    <div class="text-orange-500 fs-6">
                                        <ul>
                                          @foreach ($solicitude->acciones as $accion) 
                                        <li>{{$accion->fecha_programacion->format('d/m/y')}}</li>
                                        @endforeach  
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-4">
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1"
                                        class="form-label text-lead-500">Evaluacion de Eficacia</label>
                                    <div class="text-orange-500 fs-6">
                                        {{$solicitude->investigacion->evaluacion_eficacia}}
                                    </div>
                                </div>
                            </div> 
                            
                            <div class="col-sm-6 col-md-4">
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1"
                                        class="form-label text-lead-500">Supervisor Responsable</label>
                                    <div class="text-orange-500 fs-6">
                                        {{$solicitude->investigacion->Empleados->name.' '.$solicitude->investigacion->Empleados->lastname}}
                                    </div>
                                </div>
                            </div>  
                            <div class="col-sm-6 col-md-4">
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1"
                                        class="form-label text-lead-500">Fecha Propuesta</label>
                                    <div class="text-orange-500 fs-6">
                                        {{$solicitude->investigacion->fecha_programada->format('d/m/y')}}
                                    </div>
                                </div>
                            </div> 
                            @isset($solicitude->investigacion->cumplimiento)
                            <div class="col-sm-6 col-md-6">
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1"
                                        class="form-label text-lead-500">Resultado Obtenido</label>
                                    <div class="text-orange-500 fs-6">
                                        {{$solicitude->investigacion->observacion}}
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-3">
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1"
                                        class="form-label text-lead-500">Fecha de Cierre</label>
                                    <div class="text-orange-500 fs-6">
                                        {{$solicitude->investigacion->date_check}}
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-3">
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1"
                                        class="form-label text-lead-500">Cumplimiento</label>
                                    <div class="text-orange-500 fs-6">
                                        {{$solicitude->investigacion->cumplimiento}}
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-12">
                            <div class="text-center">
                                <x-jet-button class="mt-4" wire:click="$emit('MostarAlerta', {{$solicitude->id}})">Reapertura
                                </x-jet-button>
                            </div>
                        </div>
                        @endisset
                        </div> 
                    </div>
                         @isset($solicitude->encuesta->p1) 
                         <div class="col-sm-12 col-md-12">
                            <div class="mb-4">
                                <div class="text-green-500 fs-6 text-center">
                                    <h1>Calificacion Cliente</h1>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6">
                            <div class="mb-3">
                                 <label for="exampleFormControlInput1"
                                    class="form-label text-lead-500">1. ¿En términos generales qué tan satisfecho te encuentras con el proceso de tu reclamo?</label> 
                                <div class="text-orange-500 fs-6">
                                    {{$solicitude->encuesta->p1}}
                                    <br>
                                    <label for="exampleFormControlInput1"
                                    class="form-label text-lead-500">Observacion:</label>
                                      {{$solicitude->encuesta->ob1}}
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6">
                            <div class="mb-3">
                                 <label for="exampleFormControlInput1"
                                    class="form-label text-lead-500">2. En términos generales, califique del 1 al 10 la gestión de su reclamo en cuanto a:<br>
                                    2.1. Atención (calificar del 1 al 10)</label> 
                                <div class="text-orange-500 fs-6">
                                    {{$solicitude->encuesta->p2}}
                                    <br>
                                    <label for="exampleFormControlInput1"
                                    class="form-label text-lead-500">Observacion:</label>
                                      {{$solicitude->encuesta->o2}}
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6">
                            <div class="mb-3">
                                 <label for="exampleFormControlInput1"
                                    class="form-label text-lead-500">2.2. Rapidez (calificar del 1 al 10)</label> 
                                <div class="text-orange-500 fs-6">
                                    {{$solicitude->encuesta->p3}}
                                    <br>
                                    <label for="exampleFormControlInput1"
                                    class="form-label text-lead-500">Observacion:</label>
                                      {{$solicitude->encuesta->ob3}}
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6">
                            <div class="mb-3">
                                 <label for="exampleFormControlInput1"
                                    class="form-label text-lead-500">2.3. Solución final (calificar del 1 al 10)</label> 
                                <div class="text-orange-500 fs-6">
                                    {{$solicitude->encuesta->p4}}
                                    <br> 
                                    <label for="exampleFormControlInput1"
                                    class="form-label text-lead-500">Observacion:</label>
                                      {{$solicitude->encuesta->ob4}}
                                </div>
                            </div>
                        </div>
                        
                         @endisset 
            

                            </div>
                        </div>
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
                    <div class="overflow-scroll d-block card">
                        @isset($solicitude->imagen)
                        <img src="{{asset('storage/Reclamos/'.trim($solicitude->imagen))}}" rel="noreferrer noopener" class="card-img-top"> 
                        @endisset
                    </div>

                </div>
            </div>
        </div>
    </div>
    {{-- Modal para Visualizar las imagenes --}}
    <div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel1" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel1">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="overflow-scroll dt-block card">
                        <div class="row">
                         @foreach ($solicitude->Evidencia as $solicitud )                        
                         <div class="col-md-4 col-sm-4 mb-3">          
                        <a href="{{asset('storage/Evidencia/'.trim($solicitud->name))}}" target="_blank" rel="noreferrer noopener"><img src="{{asset('storage/Evidencia/'.trim($solicitud->name))}}" rel="noreferrer noopener" width="250" class="img-thumbnail img-fluid"></a>  
                        </div>
                       @endforeach
                    </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
Livewire.on('MostarAlerta', solicitudeid =>{   
        Swal.fire({
        title: 'Reapertura Reclamo?',
        text: "Esta segura/o que desea reapertura el caso!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si, notificar!'
        }).then((result) => {
        if (result.isConfirmed) {
            livewire.emit('Reapertura', solicitudeid)
            Swal.fire(
            'Reaterturado!',
            'Se notifico al resonsable de la reapertura.',
            'success'
            )
        }
        })
    })
</script>
@endpush
