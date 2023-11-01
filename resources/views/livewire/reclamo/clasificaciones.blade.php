<div>
    <div class="right_col" role="main">

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

                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                                <div class="row m-0 mb-3">
                                    <fieldset class="border border-2 rounded">
                                        <legend class="rounded w-50 d-none d-sm-block float-none bg-green-500 text-white ps-5 ms-4">Información general</legend>
                                        <legend class="rounded float-none d-sm-none bg-green-500 text-white fs-6 p-1">Información general</legend>
                                    <div class="col-sm-12 col-md-3">
                                        <div class="mb-3">
                                            <label for="exampleFormControlInput1"
                                                class="form-label text-lead-900">N° de ticket
                                            </label>
                                            <div class="text-lead-500 fw-bold fs-6">
                                                {{$solicitude->codigo_generado}}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-3">
                                        <div class="mb-3">
                                            <label for="exampleFormControlInput1"
                                                class="form-label text-lead-900">Sede</label>
                                            <div class="text-lead-500 fs-6">
                                                {{$solicitude->sede->name}}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-3">
                                        <div class="mb-3">
                                            <label for="exampleFormControlInput1"
                                                class="form-label text-lead-900">Tipo</label>
                                            <div class="text-lead-500 fw-bold fs-6">
                                                {{$solicitude->tipo_reclamo->name}}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-3" >
                                        <div class="mb-3">
                                            <label for="exampleFormControlInput1"
                                                class="form-label text-lead-900">Cliente</label>

                                        @if ($mostrarSelect)
                                        <div style="width: 130px">
                                            <select class="form-control rounded Selector" wire:model='clientes'>
                                               <option value="">selecionar</option>
                                               @foreach ($Cliente as $client)
                                                   <option value="{{$client->social_reason}}">{{$client->social_reason}}</option>
                                               @endforeach
                                            </select>
                                            <button class="btn btn-primary" style="font-size: 10px; width:70px" wire:click.prevent='ActualizacionCliente'>Actualizar</button>
                                           </div>
                                        @else
                                        <div class="text-lead-500 fw-bold fs-6">
                                            {{$solicitude->cliente}}

                                            <button class="btn btn-dark" style="font-size: 12px" wire:click.prevent="mostrarSelect"><i class="fa-solid fa-pen"></i></button>
                                        </div>
                                        @endif


                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-4">
                                    <div class="mb-3">
                                        <label for="exampleFormControlInput1"
                                            class="form-label text-lead-900">Servicio Contratado</label>
                                        <div class="text-lead-500 fs-6">
                                            {{$solicitude->servicio_ransa->name}}
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-4">
                                    <div class="mb-3">
                                        <label for="exampleFormControlInput1"
                                            class="form-label text-lead-900">Sub servicio</label>
                                        <div class="text-lead-500 fs-6">
                                            {{$solicitude->adicional->name}}
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-4">
                                    <div class="mb-3">
                                        <label for="exampleFormControlInput1"
                                            class="form-label text-lead-900">Titulo</label>
                                        <div class="text-lead-500 fw-bold fs-6">
                                            {{$solicitude->titulo}}
                                    </div>
                                </div>
                            </div>
                                    <div class="col-sm-12 col-md-6">
                                        <div class="mb-3">
                                            <label for="exampleFormControlInput1"
                                                class="form-label text-lead-900">Descripcion</label>
                                            <div class="text-lead-500 fs-6">
                                                {{$solicitude->Descripcion}}
                                            </div>
                                        </div>
                                    </div>
                                </fieldset>
                             </div>

                                <fieldset class="border border-2">
                                    <legend class="rounded w-50 d-none d-sm-block float-none bg-lead-500 text-white ps-5 ms-4">Asignar Responsable</legend>
                                        <legend class="rounded float-none d-sm-none bg-lead-500 text-white fs-6 p-1">Asignar Responsable</legend>
                                    <div class="ms-4">
                                        <div align="center">
                                            <h2>Selecciona al Investigador Responsable</h2>
                                                <select class="form-control @error('Investigador') is-invalid @enderror"
                                                    id="Investigador" wire:model="Investigador">
                                                    <option value="">Selecciona una opción</option>
                                                    @foreach ($empleado as $emplead)
                                                    <option value="{{ $emplead->id }}">{{ $emplead->name .' '. $emplead->lastname }}</option>
                                                    @endforeach
                                                </select>
                                                @error('Investigador')
                                                <small id="InvestigadorhelpId"
                                                    class="form-text text-muted invalid-feedback">{{ $message }}</small>
                                                @enderror
                                            </div>
                                         @switch($solicitude->tipo_reclamo_id)
                                             @case(2)

                                                 @break
                                               @case(3)

                                               @break
                                               @case(4)

                                               @break
                                             @default
                                             <div  align="center">
                                                <h2>Causal General</h2>
                                                <select class="form-control @error('causalgeneral') is-invalid @enderror"
                                                    id="causalgeneral" wire:model="causalgeneral">
                                                    <option value="">Selecciona una opción</option>
                                                    @foreach ($Generals as $General)
                                                    <option value="{{ $General->id }}">{{ $General->name }}</option>
                                                    @endforeach
                                                </select>
                                                @error('causalgeneral')
                                                <small id="causalgeneralhelpId"
                                                    class="form-text text-muted invalid-feedback">{{ $message }}</small>
                                                @enderror
                                            </div>

                                            <div  align="center">
                                                <h2>Detalle de Causal</h2>
                                                <select class="form-control @error('detallegeneral') is-invalid @enderror"
                                                    wire:model="detallegeneral" id="detallegeneral">
                                                    <option value="">Selecciona una opción</option>
                                                    @if(!is_null($detalles))
                                                    @foreach ($detalles as $detalle)
                                                    <option value="{{ $detalle->id }}">{{ $detalle->name }}</option>
                                                    @endforeach
                                                    @endif
                                                </select>
                                                @error('detallegeneral')
                                                <small id="detallegeneralhelpId"
                                                    class="form-text text-muted invalid-feedback">{{ $message }}</small>
                                                @enderror
                                            </div>
                                         @endswitch
                                    </div>
                                </fieldset>
                                @switch($solicitude->tipo_reclamo_id)
                                @case(2)
                                <div class="text-center">
                                    <x-jet-button id="confirmaction" wire:click='felicitacion'  wire:loading.attr='disabled' wire:target='felicitacion' class="disabled:opacity-60" class="mt-4">
                                        Asignar
                                    </x-jet-button>
                                </div>
                                @break
                              @case(3)

                              @break
                              @case(4)

                              @break

                                    @default
                                    <div class="text-center">
                                        <x-jet-button id="confirmaction" wire:click='registroclasificacion'  wire:loading.attr='disabled' wire:target='registroclasificacion' class="disabled:opacity-60" class="mt-4">Notificar
                                        </x-jet-button>
                                    </div>
                                @endswitch

                        </div>
                 </div>
            </div>
    </div>
  </div>
</div>
@push('scripts')
<script>
    Livewire.on('select2', function() {
        $('.Selector').on('change', function(e){
            @this.set('clientes', e.target.value);
        });
        $(".Selector").select2();
       });
</script>
@endpush

