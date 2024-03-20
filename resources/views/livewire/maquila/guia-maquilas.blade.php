{{-- @push('styles')
    <link rel="stylesheet" href="{{ asset('css/Firma.css') }}">
@endpush --}}
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
                                <h2>Guia de Remisión Operacion a Maquila</h2>
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

                                    <div class="col-sm-12 col-md-3">
                                        <div class="mb-3">
                                            <label for="exampleFormControlInput1"
                                                class="form-label text-lead-500">Pvp</label>
                                            <div class="text-orange-500 fw-bold fs-6">
                                               $ {{ $Inf->pvp }}
                                                </div>
                                        </div>
                                    </div>
                                </div>
                            </fieldset>
                                <fieldset class="border border-2 mt-3">
                                    <legend class="rounded w-50 d-none d-sm-block float-none bg-lead-500 text-white ps-5 ms-4">Detalles de compomentes</legend>
                                        <legend class="rounded float-none d-sm-none bg-lead-500 text-white fs-6 p-1">Detalles de compomentes</legend>
                                    <div class="ms-4">
                                        <table class="table w-100 text-green-400">
                                            <thead>
                                                <th>Sku</th>
                                                <th>Descripción</th>
                                                <th>Cantidad</th>
                                                <th>Fecha de vencimiento</th>
                                            </thead>
                                            <tbody>
                                             @foreach ($Inf->Componentes as $Component)
                                                <tr>
                                                    <td style="color: black">
                                                     {{ $Component->Codigos->codigo }}
                                                    </td>
                                                    <td style="color: black">
                                                        {{ $Component->Codigos->descripcion }}
                                                       </td>
                                                    <td style="color: black">
                                                        {{ $Component->cantidad }}
                                                    </td>
                                                    <td style="color: black">
                                                        {{ $Component->fecha }}
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                        </table>
                                    </div>
                                </fieldset>
                                <div class="text-center">
                                    <x-jet-button id="confirmaction" wire:click='saveSignature' class="mt-4">Confirmar Acciones
                                    </x-jet-button>
                                </div>
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

