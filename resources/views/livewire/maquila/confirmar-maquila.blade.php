<div>
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>Plataforma de Maquila</h3>
                </div>

                <div class="title_right">
                    <div class="col-md-5 col-sm-5 form-group pull-right top_search">
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
                                <h2>Guia de Remisión Confirmación de Maquila a Operación</h2>
                                <div class="clearfix"></div>
                            </div>

                            <div class="x_content">
                                <fieldset class="border border-2 mt-3">
                                    <legend class="rounded w-50 d-none d-sm-block float-none bg-lead-500 text-white ps-5 ms-4">Datos Generales</legend>
                                        <legend class="rounded float-none d-sm-none bg-lead-500 text-white fs-6 p-1">Datos Generales</legend>
                                    <div class="ms-4">
                                <div class="row">
                                    <div class="col-sm-12 col-md-3">
                                        <div class="mb-3">
                                            <label for="exampleFormControlInput1"
                                                class="form-label text-lead-500">Orden de trabajo</label>
                                            <div class="text-orange-500 fw-bold fs-6">
                                              {{ $Inf->codigo }}
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-12 col-md-3">
                                        <div class="mb-3">
                                            <label for="exampleFormControlInput1"
                                                class="form-label text-lead-500">N° de Guia</label>
                                            <div class="text-orange-500 fw-bold fs-6">
                                              {{ $Inf->GuiaMaquilas->n_guia }}
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-12 col-md-3">
                                        <div class="mb-3">
                                            <label for="exampleFormControlInput1"
                                                class="form-label text-lead-500">Cantidad</label>
                                            <div class="text-orange-500 fw-bold fs-6">
                                               {{ $Inf->cantidad }} {{ $Inf->cj_un }}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-3">
                                        <div class="mb-3">
                                            <label for="exampleFormControlInput1"
                                                class="form-label text-lead-500">Proveedor</label>
                                            <div class="text-orange-500 fw-bold fs-6">
                                                 {{ $Inf->proveedores->social_reason }}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-3">
                                        <div class="mb-3">
                                            <label for="exampleFormControlInput1"
                                                class="form-label text-lead-500">Fechas de la Actividad</label>
                                            <div class="text-orange-500 fw-bold fs-6">
                                                    {{ $Inf->fecha }}
                                                </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-3">
                                        <div class="mb-3">
                                            <label for="exampleFormControlInput1"
                                                class="form-label text-lead-500"> Cliente</label>
                                            <div class="text-orange-500 fw-bold fs-6">
                                                {{ $Inf->Clientes->social_reason }}
                                               </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-12 col-md-3">
                                        <div class="mb-3">
                                            <label for="exampleFormControlInput1"
                                                class="form-label text-lead-500">Actividad</label>
                                            <div class="text-orange-500 fw-bold fs-6">
                                                @foreach ( $Inf->Tarifarios as $activid )
                                                    <li>{{ $activid->actividad }}</li>
                                                @endforeach
                                               </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-12 col-md-3">
                                        <div class="mb-3">
                                            <label for="exampleFormControlInput1"
                                                class="form-label text-lead-500">Codigo a crear</label>
                                            <div class="text-orange-500 fw-bold fs-6">
                                                {{ $Inf->CodigoF->codigo }}
                                                </div>
                                        </div>
                                    </div>

                                    @isset($Inf->otcliente)
                                    <div class="col-sm-12 col-md-3">
                                        <div class="mb-3">
                                            <label for="exampleFormControlInput1"
                                                class="form-label text-lead-500">OT-Cliente</label>
                                            <div class="text-orange-500 fw-bold fs-6">
                                                {{ $Inf->otcliente }}
                                                </div>
                                        </div>
                                    </div>
                                    @endisset

                                    <div class="col-sm-12 col-md-3">
                                        <div class="mb-3">
                                            <label for="exampleFormControlInput1"
                                                class="form-label text-lead-500">Ean 13</label>
                                            <div class="text-orange-500 fw-bold fs-6">
                                                {{ $Inf->ean13 }}
                                                </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-12 col-md-3">
                                        <div class="mb-3">
                                            <label for="exampleFormControlInput1"
                                                class="form-label text-lead-500">Ean 14</label>
                                            <div class="text-orange-500 fw-bold fs-6">
                                                {{ $Inf->ean14 }}
                                                </div>
                                        </div>
                                    </div>
                                </div>
                            </fieldset>
                                <fieldset class="border border-2 mt-3">
                                    <legend class="rounded w-50 d-none d-sm-block float-none bg-lead-500 text-white ps-5 ms-4">Detalles de compomentes</legend>
                                        <legend class="rounded float-none d-sm-none bg-lead-500 text-white fs-6 p-1">Detalles de compomentes</legend>
                                    <div class="ms-4">
                                        @if (!is_null($validar))
                                        <table class="table w-100 text-green-400">
                                            <thead>
                                                <th>Sku</th>
                                                <th>Descripción</th>
                                                <th>Cantidad</th>
                                                <th>Cantidad Recibida</th>
                                            </thead>
                                            <tbody>
                                             @foreach ($Inf->Componentes as $Component)
                                                <tr>
                                                    <td style="color: black">
                                                     {{ $Component->sku }}
                                                    </td>
                                                    <td style="color: black">
                                                        {{ $Component->descripcion }}
                                                       </td>
                                                     @if ($Component->cantidad <> $Component->Recibido->cantidad_confirmada)
                                                     <td style="color: black">
                                                        {{ $Component->cantidad }}
                                                    </td>

                                                    <td>
                                                        <input type="text" class="form-control rounded" wire:model.defer="ActualizarCampo.{{ $Component->id }}"  placeholder="{{ $Component->Recibido->cantidad_confirmada }}">
                                                    </td>
                                                     @else

                                                     @endif

                                                </tr>
                                            @endforeach
                                        </tbody>
                                        </table>


                                        @else

                                        <table class="table w-100 text-green-400">
                                            <thead>
                                                <th>Sku</th>
                                                <th>Descripción</th>
                                                <th>Cantidad</th>
                                                <th>Cantidad Recibida</th>
                                            </thead>
                                            <tbody>
                                             @foreach ($Inf->Componentes as $Component)
                                                <tr>
                                                    <td style="color: black">
                                                     {{ $Component->sku }}
                                                    </td>
                                                    <td style="color: black">
                                                        {{ $Component->descripcion }}
                                                       </td>
                                                    <td style="color: black">
                                                        {{ $Component->cantidad }}
                                                    </td>
                                                    <td>
                                                        <input type="text" class="form-control rounded" wire:model.defer="CantidadRecibida.{{ $Component->id }}">
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                        </table>
                                        <div class="col-sm-12 col-md-12 pb-2">
                                            <label class="form-label text-orange-500">Observaciones:</label>
                                            <textarea name="" wire:model.defer='Observacion' id="" class="form-control"></textarea>
                                        </div>
                                        @endif
                                    </div>
                                </fieldset>
                                @if (!is_null($validar))
                                <div class="text-center">
                                    <x-jet-button id="confirmaction" wire:click.prevent='ActualizacionCampos' class="mt-4">Actualizar acción
                                    </x-jet-button>
                                </div>
                                @else
                                <div class="text-center">
                                    <x-jet-button id="confirmaction" wire:click='GuardarConfirmacion' class="mt-4">Confirmar Acciones
                                    </x-jet-button>
                                </div>
                                @endif

                            </div>
        </div>
    </div>
    </div>
    </div>
    </div>
</div>
@push('scripts')
<script>
   Livewire.on('mensaje', function(message){
   Swal.fire({
   position: "top-end",
   icon: "success",
   title: message,
   showConfirmButton: false,
   timer: 1200
 });
 });
 </script>
@endpush

