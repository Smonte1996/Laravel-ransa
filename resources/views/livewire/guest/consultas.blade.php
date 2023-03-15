<div>
      
    <div class="text-center">
    <img style="width: 350px;" src="{{asset('img/logo.png')}}">
      <div class="titulos">
        <h1>Consulta de Solicitudes</h1>
      </div>
      
      <div class="input-group-addon">
        <form wire:submit.prevent='Buscardatos' class="justify-center">
        <div class="">  
        <input class="form-control-sm me-3 col-2 @error('buscar') is-invalid @enderror" id="buscar" wire:model='buscar' type="search" placeholder="Buscar">
        @error('buscar')
        <small id="buscarhelpId" class="form-text text-muted invalid-feedback">{{ $message }}</small>
      @enderror  
        <button type="submit" class="btn btn-info btn-sm col-2">Buscar <i class="fas fa-search"></i></button>
        <!-- <button type="button" id="redireccionar">Redireccionar</button> -->
    </div>
    </form>
      </div>
   
    </div>
    <br>
    @if (!is_null($buscar))
    <div class="row">
        <div class="container pt-3 d-flex justify-content-center mb-5">  
            <div class="border rounded shadow p-3 col-md-10"> 

    <div class="col-sm-3 col-md-2">
        <div class="mb-3">
            <label for="exampleFormControlInput1"
                class="form-label text-green-500 fw-bold">N° de ticket
            </label>
            <div class="text-orange-500 fw-bold fs-6">
                 @foreach ($solicitudes as $solicitud )
                 {{$solicitud->codigo_generado}}
                 @endforeach
            </div>
        </div>
    </div>
    
    <div class="col-sm-6 col-md-2">
        <div class="mb-3">
            <label for="exampleFormControlInput1"
                class="form-label text-green-500 fw-bold">Tipo</label>
            <div class="text-orange-500 fw-bold fs-6">
                @foreach ($solicitudes as $solicitud )
                {{$solicitud->tipo_reclamo->name}}  
                @endforeach
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-md-2">
        <div class="mb-3">
            <label for="exampleFormControlInput1"
                class="form-label text-green-500 fw-bold">Cliente</label>
            <div class="text-orange-500 fw-bold fs-6">
                @foreach ($solicitudes as $solicitud)
                {{$solicitud->cliente}}   
                @endforeach
        </div>
    </div>
    </div>
    <div class="col-sm-6 col-md-3">
        <div class="mb-3">
            <label for="exampleFormControlInput1"
                class="form-label text-green-500 fw-bold">Causal General</label>
            <div class="text-orange-500 fw-bold fs-6">
                @foreach ($solicitudes as $solicitud )
                 {{$solicitud->clasificacion->causal_general->name}} 
                 @endforeach
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-md-3">
        <div class="mb-3">
            <label for="exampleFormControlInput1"
                class="form-label text-green-500 fw-bold">Detalle Causal</label>
            <div class="text-orange-500 fw-bold fs-6">
                @foreach ($solicitudes as $solicitud )
                {{$solicitud->clasificacion->detalle_causal->name}}
                @endforeach
                 
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-md-2">
        <div class="mb-3">
            <label for="exampleFormControlInput1"
                class="form-label text-green-500 fw-bold">Sede</label>
            <div class="text-orange-500 fw-bold fs-6">
                @foreach ($solicitudes as $solicitud )
                {{$solicitud->sede->name}}  
                @endforeach
                   
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-md-4">
        <div class="mb-3">
            <label for="exampleFormControlInput1"
                class="form-label text-green-500 fw-bold">Titulo de caso</label>
            <div class="text-orange-500 fw-bold fs-6">
                  @foreach ($solicitudes as $solicitud )
                  {{$solicitud->titulo}} 
                  @endforeach
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-md-4">
        <div class="mb-3">
            <label for="exampleFormControlInput1"
                class="form-label text-green-500 fw-bold">Descripcion</label>
            <div class="text-orange-500 fw-bold fs-6">
                @foreach ($solicitudes as $solicitud )
                {{$solicitud->Descripcion}} 
                @endforeach
                  
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-md-2">
        <div class="mb-3">
            <label for="exampleFormControlInput1"
                class="form-label text-green-500 fw-bold">Estado del Reclamo</label>
            <div class="text-orange-500 fs-6">
                @foreach ($solicitudes as $solicitud )
                @switch($solicitud->estado)
                @case(2)
                <span class="bg-green-500 p-1 rounded fw-bold text-white">Investigacion</span>
                @break
                @case(3)
                <span class="bg-lead-500 p-1 rounded fw-bold text-white">Proceso</span>
                @break
                @case(4)
                <span class="bg-green-500 p-1 rounded fw-bold text-white">Cierre</span>
                @break
                @case(5)
                <span class="bg-orange-500 p-1 rounded fw-bold text-white">Cerrado</span>
                @break
                @default
                <span class="bg-green-500 p-1 rounded fw-bold text-white">Clasificacion</span>
                @endswitch
                @endforeach
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-md-6">
        <div class="mb-3">
            <label for="exampleFormControlInput1"
                class="form-label text-green-500 fw-bold">Correcion</label>
            <div class="text-orange-500 fw-bold fs-6">
                @foreach ($solicitudes as $solicitud )
                {{$solicitud->investigacion->correccion}}
                @endforeach
            </div>
        </div>
    </div> 
    <div class="col-sm-6 col-md-6">
        <div class="mb-3">
            <label for="exampleFormControlInput1"
                class="form-label text-green-500 fw-bold">Causa Raiz</label>
                <div class="text-orange-500 fw-bold fs-6">
                    @foreach ($solicitudes as $solicitud )
                    {{$solicitud->investigacion->causa_raiz}}
                    @endforeach
                </div>
            </div>
        </div> 
        <div class="col-sm-6 col-md-5">
            <div class="mb-3">
                <label for="exampleFormControlInput1"
                    class="form-label text-green-500 fw-bold">Evaluacion de Eficacia</label>
                <div class="text-orange-500 fw-bold fs-6">
                    @foreach ($solicitudes as $solicitud)
                    {{$solicitud->investigacion->evaluacion_eficacia}}
                    @endforeach
                </div>
            </div>
        </div> 
        <div class="col-sm-6 col-md-5">
            <div class="mb-3">
                <label for="exampleFormControlInput1"
                    class="form-label text-green-500 fw-bold">Coordinador Responsables</label>
                <div class="text-orange-500 fw-bold fs-6">
                    <ul>
                      @foreach ($solicitudes as $Solicitud) 
                       {{$solicitud->investigacion->Empleados->name .' '. $solicitud->investigacion->Empleados->lastname}}
                    @endforeach  
                    </ul>
                </div>
            </div>
        </div> 
        <div class="col-sm-6 col-md-2">
            <div class="mb-3">
                <label for="exampleFormControlInput1"
                    class="form-label text-green-500 fw-bold">Fecha Propuesta</label>
                <div class="text-orange-500 fw-bold fs-6">
                    @foreach ($solicitudes as $solicitud)
                    {{$solicitud->investigacion->fecha_programada->format('d/m/y')}}   
                    @endforeach
                </div>
            </div>
        </div> 
        <div class="col-sm-6 col-md-4">
            <div class="mb-3">
                <label for="exampleFormControlInput1"
                    class="form-label text-green-500 fw-bold">Planes de acciones</label>
                <div class="text-orange-500 fw-bold fs-6">
                    <ul>
                    @foreach ($solicitudes as $solicitud )   
                    @foreach ($solicitud->acciones as $accion) 
                    <li>{{$accion->name}}</li>
                    @endforeach
                    @endforeach  
                    </ul>
                </div>
            </div>
        </div> 
        <div class="col-sm-12 col-md-3">
            <div class="mb-3">
                <label for="exampleFormControlInput1"
                    class="form-label text-green-500 fw-bold">Fecha Programada</label>
                <div class="text-orange-500 fw-bold fs-6">
                    <ul>
                     @foreach ($solicitudes as $solicitud ) 
                      @foreach ($solicitud->acciones as $accion) 
                    <li>{{$accion->fecha_programacion->format('d/m/y')}}</li>
                    @endforeach  
                    @endforeach  
                    </ul>
                </div>
            </div>
        </div>
       
    </div>
        </div>
        </div>
    @endif
   


                            
                            {{-- 
                            
                           
                            
                            
                           
                            
                         
                        
                        
                           
                            
                            
                            
                            
                            
                            <div class="col-sm-6 col-md-4">
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1"
                                        class="form-label text-lead-500">Supervisor Responsable</label>
                                    <div class="text-orange-500 fs-6">
                                        {{$solicitudes->investigacion->user->name}}
                                    </div>
                                </div>
                            </div>  
                            
                            @isset($solicitudes->investigacion->cumplimiento)
                            <div class="col-sm-6 col-md-6">
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1"
                                        class="form-label text-lead-500">Resultado Obtenido</label>
                                    <div class="text-orange-500 fs-6">
                                        {{$solicitudes->investigacion->observacion}}
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-3">
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1"
                                        class="form-label text-lead-500">Fecha de Cierre</label>
                                    <div class="text-orange-500 fs-6">
                                        {{$solicitudes->investigacion->date_check}}
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-3">
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1"
                                        class="form-label text-lead-500">Cumplimiento</label>
                                    <div class="text-orange-500 fs-6">
                                        {{$solicitudes->investigacion->cumplimiento}}
                                    </div>
                                </div>
                            </div>    --}}

</div>
@push('scripts')
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    Livewire.on('show-sweetalert', function (data) {
        Swal.fire({
            icon: data.type,
            title: data.title,
            text: data.message
        });
    });
</script>
@endpush