<x-app-layout>
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
                                <h2>Guia de Remisión Confirmación Operación a Maquila</h2>
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
                                              {{ $Maquila->codigo }}
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-12 col-md-3">
                                        <div class="mb-3">
                                            <label for="exampleFormControlInput1"
                                                class="form-label text-lead-500">N° de Guia</label>
                                            <div class="text-orange-500 fw-bold fs-6">
                                              {{ $Maquila->GuiaMaquilas->n_guia }}
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-12 col-md-3">
                                        <div class="mb-3">
                                            <label for="exampleFormControlInput1"
                                                class="form-label text-lead-500">Cantidad</label>
                                            <div class="text-orange-500 fw-bold fs-6">
                                               {{ $Maquila->cantidad }} {{ $Maquila->cj_un }}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-3">
                                        <div class="mb-3">
                                            <label for="exampleFormControlInput1"
                                                class="form-label text-lead-500">Proveedor</label>
                                            <div class="text-orange-500 fw-bold fs-6">
                                                 {{ $Maquila->proveedores->social_reason }}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-3">
                                        <div class="mb-3">
                                            <label for="exampleFormControlInput1"
                                                class="form-label text-lead-500">Fechas de la Actividad</label>
                                            <div class="text-orange-500 fw-bold fs-6">
                                                    {{ $Maquila->fecha }}
                                                </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-3">
                                        <div class="mb-3">
                                            <label for="exampleFormControlInput1"
                                                class="form-label text-lead-500"> Cliente</label>
                                            <div class="text-orange-500 fw-bold fs-6">
                                                {{ $Maquila->Clientes->social_reason }}
                                               </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-12 col-md-3">
                                        <div class="mb-3">
                                            <label for="exampleFormControlInput1"
                                                class="form-label text-lead-500">Actividad</label>
                                            <div class="text-orange-500 fw-bold fs-6">
                                                @foreach ( $Maquila->Tarifarios as $activid )
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
                                                {{ $Maquila->CodigoF->codigo }}
                                                </div>
                                        </div>
                                    </div>

                                    @isset($Maquila->otcliente)
                                    <div class="col-sm-12 col-md-3">
                                        <div class="mb-3">
                                            <label for="exampleFormControlInput1"
                                                class="form-label text-lead-500">OT-Cliente</label>
                                            <div class="text-orange-500 fw-bold fs-6">
                                                {{ $Maquila->otcliente }}
                                                </div>
                                        </div>
                                    </div>
                                    @endisset

                                    <div class="col-sm-12 col-md-3">
                                        <div class="mb-3">
                                            <label for="exampleFormControlInput1"
                                                class="form-label text-lead-500">Ean 13</label>
                                            <div class="text-orange-500 fw-bold fs-6">
                                                {{ $Maquila->ean13 }}
                                                </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-12 col-md-3">
                                        <div class="mb-3">
                                            <label for="exampleFormControlInput1"
                                                class="form-label text-lead-500">Ean 14</label>
                                            <div class="text-orange-500 fw-bold fs-6">
                                                {{ $Maquila->ean14 }}
                                                </div>
                                        </div>
                                    </div>
                                </div>
                            </fieldset>
                            <form action="{{ route('adm.Guias.Maquila.update', $Maquila->Guias->id) }}" method="POST">
                                @method('PUT')
                                @csrf
                                <fieldset class="border border-2 mt-3">
                                    <legend class="rounded w-50 d-none d-sm-block float-none bg-lead-500 text-white ps-5 ms-4">Detalles de compomentes</legend>
                                        <legend class="rounded float-none d-sm-none bg-lead-500 text-white fs-6 p-1">Detalles de compomentes</legend>
                                    <div class="ms-4">

                                        <table class="table w-100 text-green-400">
                                            <thead>
                                                <th>Cantidad</th>
                                                <th>Empaque</th>
                                                <th>Fecha de vencimiento</th>
                                            </thead>
                                            <tbody>
                                             @foreach ($Maquila->Guias->Avances_Maquila as $Maquilas)
                                                <tr>
                                                    <td style="color: black">
                                                     {{ $Maquilas->Cantidad_avance }}
                                                    </td>
                                                    <td style="color: black">
                                                        {{ $Maquilas->unidades_caja }}
                                                       </td>
                                                    <td style="color: black">
                                                        {{ $Maquilas->fecha_vencimiento }}
                                                    </td>

                                                </tr>
                                            @endforeach
                                        </tbody>
                                        </table>
                                        <div class="col-sm-12 col-md-12 pb-2">
                                            <label class="form-label text-orange-500">Observaciones:</label>
                                            <textarea name="Observacion" id="" class="form-control"></textarea>
                                        </div>

                                    </div>
                                </fieldset>
                                <div class="text-center">
                                    <x-jet-button id="confirmaction" type="submit" class="mt-4">Confirmar Acciones
                                    </x-jet-button>
                                </div>
                            </form>
                            </div>
        </div>
    </div>
    </div>
    </div>
    </div>
</x-app-layout>
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

