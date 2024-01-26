@push('styles')
<link rel="stylesheet" href="{{ asset('css/Animacion-maquila.css') }}">
@endpush
<div>
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>Trabajo Maquila</h3>
                </div>

                <div class="title_right">
                     <div class=" form-group pull-right">
                        <div class="input-group">
                            <div class="row">
                                <div class="col-md-7">
                            <div class="form-floating">
                                <select class="form-select input " wire:model.enter='GuardarCabecera' id="floatingSelect">
                                  <option selected>Seleccionar una opcion</option>
                                    @foreach ($foreot as $Guardar )
                                        <option value="{{ $Guardar->id }}">{{ $Guardar->codigo }}</option>
                                    @endforeach
                                </select>
                                <label for="floatingSelect" class="text-lead-900">Codigo unico</label>
                          </div>
                        </div>
                        <div class="col-md-5">
                            <a href="{{ asset('Doc_Excel/Produccion.xlsx') }}" class="btn btn-green-500 btn-md text-white rounded" target="_blank"><i class="fa-solid fa-file-excel"></i> Descargar excel</a>
                        </div>
                        </div>
                       </div>
                    </div>
                </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Formulario Maquila</h2>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">

                                <fieldset class="border border-0">

                                    <legend class="rounded w-50 d-none d-sm-block float-none bg-green-500 text-white ps-5 ms-4">Datos Generales</legend>
                                        <legend class="rounded float-none d-sm-none bg-green-500 text-white fs-6 p-1">Datos Generales</legend>
                                    <div  x-data = "{cliente:'null'}">
                                    <div class="row">
                                        {{-- <div class="ms-3"> --}}

                                <div class="col-sm-12 col-md-2" wire:ignore>
                                    <div class="mb-3">
                                    <div class="form-floating">
                                        <input class="form-control rounded input @error('Ordent') is-invalid @enderror" placeholder="Orden de trabajo" type="text" id="floatingInput" disabled value="{{$code}}">
                                        <label for="floatingInput" class="text-lead-500">Orden de trabajo</label>
                                         @error('Ordent')
                                        <small id="OrdenthelpId"
                                            class="form-text text-muted invalid-feedback">{{ $message }}</small>
                                        @enderror
                                      </div>
                                    </div>
                                </div>

                                <div class="col-sm-12 col-md-2">
                                    <div class="mb-3">
                                    <div class="form-floating">
                                        <input class="form-control rounded input @error('Cantidad') is-invalid @enderror" wire:model.defer='cantidad' placeholder="Cantidad" type="number" id="floatingInput">
                                        <label for="floatingInput" class="text-lead-500">Cantidad</label>
                                         @error('Cantidad')
                                        <small id="CantidadhelpId"
                                            class="form-text text-muted invalid-feedback">{{ $message }}</small>
                                        @enderror
                                      </div>
                                    </div>
                                </div>

                                <div class="col-sm-12 col-md-2">
                                    <div class="mb-3">
                                    <div class="form-floating">
                                        <select class="form-select input @error('cjun') is-invalid @enderror" wire:model.defer='cjun' id="floatingSelect" aria-label="Floating label select example">
                                            <option selected>Seleccionar</option>
                                            <option value="Cajas">Cajas</option>
                                            <option value="Unidades">Unidades</option>
                                          </select>
                                          <label for="floatingSelect" class="text-lead-900">Cajas o Unidades</label>
                                         @error('cjun')
                                        <small id="cjunhelpId"
                                            class="form-text text-muted invalid-feedback">{{ $message }}</small>
                                        @enderror
                                      </div>
                                    </div>
                                </div>

                                <div class="col-sm-12 col-md-3">
                                    <div class="mb-3">
                                        <div class="form-floating">
                                            <select class="form-select input @error('proveedor') is-invalid @enderror" wire:model.defer='proveedor' id="floatingSelect" aria-label="Floating label select example">
                                              <option selected>Seleccionar una opcion</option>
                                              <option value="Dprissa">Dprissa</option>
                                              <option value="Seryproc">Seryproc</option>
                                            </select>
                                            <label for="floatingSelect" class="text-lead-900">Proveedor</label>
                                         @error('proveedor')
                                        <small id="proveedorhelpId"
                                            class="form-text text-muted invalid-feedback">{{ $message }}</small>
                                        @enderror
                                      </div>
                                    </div>
                                </div>

                                <div class="col-sm-12 col-md-3">
                                    <div class="mb-3">
                                        <div class="form-floating">
                                            <input class="form-control rounded input @error('codigo') is-invalid @enderror" wire:model.defer='codigo' placeholder="Codigo" type="text" id="floatingInput">
                                           <label for="floatingInput" class="text-lead-500">Codigo</label>
                                         @error('codigo')
                                        <small id="codigohelpId"
                                            class="form-text text-muted invalid-feedback">{{ $message }}</small>
                                        @enderror
                                      </div>
                                    </div>
                                </div>

                                <div class="col-sm-12 col-md-4">
                                    <div class="mb-3">
                                    <div class="form-floating">
                                        <input class="form-control rounded input @error('fecha') is-invalid @enderror" wire:model.defer='fecha' placeholder="Fecha" type="date" id="floatingInput">
                                        <label for="floatingInput" class="text-lead-500">Fecha</label>
                                         @error('fecha')
                                        <small id="fechahelpId"
                                            class="form-text text-muted invalid-feedback">{{ $message }}</small>
                                        @enderror
                                      </div>
                                    </div>
                                </div>


                                <div class="col-sm-12 col-md-4">
                                    <div class="mb-3">
                                    <div class="form-floating">
                                        <select class="form-select input @error('cliente') is-invalid @enderror" id="floatingSelect" wire:model.defer='cliente' aria-label="Floating label select example" x-model ="cliente">
                                            <option selected>Seleccionar una opcion</option>
                                            <option value="Arcor">Arcor</option>
                                            <option value="Alicorp">Alicorp</option>
                                          </select>
                                          <label for="floatingSelect" class="text-lead-900">Cliente</label>
                                         @error('Cliente')
                                        <small id="ClientehelpId"
                                            class="form-text text-muted invalid-feedback">{{ $message }}</small>
                                        @enderror
                                      </div>
                                    </div>
                                </div>

                                <div class="col-sm-12 col-md-4" x-show="cliente == 'Arcor'">
                                    <div class="mb-3">
                                    <div class="form-floating">
                                        <input class="form-control rounded input @error('otcliente') is-invalid @enderror" wire:model.defer='otcliente' placeholder="Orden de trabajo" type="text" id="floatingInput" >
                                        <label for="floatingInput" class="text-lead-500">Ot del cliente</label>
                                      </div>
                                    </div>
                                </div>

                            </div>
                            @if (!is_null($GuardarCabecera))

                            @else
                            <div class="col-sm-12 col-md-6">
                                <div class="mb-3">
                                <button class="btm" wire:click.prevent='Encabezado'> Empezar
                                </button>
                              </div>
                            </div>
                            @endif

                            </div>

                            </fieldset>

                            <div class="clearfix border border-1 mt-3"></div>

                            <fieldset class="border border-0 mt-4">

                                <div class="btn-group btn-group-sm" role="group" aria-label="Basic mixed styles example">
                                    <div class="col-sm-12 col-md-6">
                                <legend class="rounded w-auto d-none d-sm-block float-none bg-green-500 text-white ps-5 ms-4">Información producción</legend>
                                <legend class="rounded float-none d-sm-none bg-green-500 text-white fs-6 p-1">Información producción</legend>
                                </div>

                                <div class="col-sm-12 col-md-6">
                                    <div class="btn-group btn-group-sm" role="group" aria-label="Basic mixed styles example">
                                    <input type="file" class="form-control form-control-sm" id="filexlsx"
                                         name="filexlsx" wire:model.defer="filexlsx" accept=".xlsx">
                                    <button class="btn btn-green-500 text-white" wire:click.prevent='importExcel'>Importar</button>
                                    </div>
                                    </div>
                                </div>
                                <div class="table-responsive">
                                <table class="table table-striped">
                                 {{-- <thead>
                                    <tr>
                                    <td>
                                      Sku
                                    </td>
                                    <td>
                                        Descripción
                                    </td>
                                    <td>
                                        Cantidad
                                    </td>
                                    <td>
                                        Fecha de vencimiento
                                    </td>
                                    <td>
                                        Precio unitario
                                    </td>
                                    </tr>
                                 </thead> --}}
                                 <tbody>
                                    @foreach ($actividades as $index => $actividad )
                                   <tr>
                                    <td>
                                       <div class="form-floating">
                                           <input class="form-control rounded input @error('sku') is-invalid @enderror" style="width: 180px" wire:model.defer='actividades.{{ $index }}.sku' placeholder="Sku" type="text" igd="floatingInput">
                                           <label for="floatingInput" class="text-lead-500">sku</label>
                                       </div>
                                    </td>
                                    <td>
                                        <div class="form-floating">
                                            <input class="form-control rounded input @error('descripcion') is-invalid @enderror" style="width: 180px" wire:model.defer='actividades.{{ $index }}.descripcion' placeholder="Descripción" type="text" igd="floatingInput">
                                            <label for="floatingInput" class="text-lead-500">Descripción</label>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-floating">
                                            <input class="form-control rounded input @error('cantidades') is-invalid @enderror" style="width: 180px" wire:model.defer='actividades.{{ $index }}.cantidades' placeholder="cantidad" type="number" igd="floatingInput">
                                            <label for="floatingInput" class="text-lead-500">Cantidad</label>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-floating">
                                            <input class="form-control rounded input @error('fechas') is-invalid @enderror" style="width: 180px" wire:model.defer='actividades.{{ $index }}.fechas' placeholder="Fecha de vencimiento" type="date" igd="floatingInput">
                                            <label for="floatingInput" class="text-lead-500">Fecha de vencimiento</label>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-floating">
                                            <input class="form-control rounded input @error('precio') is-invalid @enderror" style="width: 180px" wire:model.defer='actividades.{{ $index }}.precio' placeholder="Precio unitario" type="number" igd="floatingInput">
                                            <label for="floatingInput" class="text-lead-500">Precio unitario</label>
                                        </div>
                                    </td>
                                    <td>
                                        <button class="btn btn-sm btn-danger" wire:click.prevent='QuitarCampos({{ $index }})'>Eliminar</button>
                                    </td>
                                   </tr>
                                   @endforeach
                                 </tbody>
                                </table>

                                    <div class="col-md-6">
                                    <button class="btn btn-sm" wire:click='agregarcampo()'><i class="fa-solid fa-plus" style="color: #27b050;"></i> Agregar campos</button>
                                    </div>
                                    <div class="col-md-6 d-flex justify-content-end">
                                    <button class="btn btn-sm bg-green-500 text-white" wire:click.prevent='GuardarDatos'>Guardar</button>
                                    </div>
                               </div>
                            </fieldset>

                            <div class="clearfix border border-1 mt-5"></div>

                            @if (!is_null($Produccion))
                            <fieldset class="border border-0 mt-4">
                                <legend class="rounded w-50 d-none d-sm-block float-none bg-green-500 text-white ps-5 ms-4">Tabla preview</legend>
                                <legend class="rounded float-none d-sm-none bg-green-500 text-white fs-6 p-1">Tabla preview</legend>
                                <div class="table-responsive">
                                 <table class="table table-striped">
                                      <tr>
                                      <td>sku</td>
                                      <td>Descripción</td>
                                      <td>Cantidad</td>
                                      <td>Fecha de Vencimento</td>
                                      <td> Precio Unitario</td>
                                      <td>Accion</td>
                                      </tr>
                                      @foreach ($skus as $Sku )
                                      <tr>
                                      <td>{{ $Sku->sku }}</td>
                                      <td>{{ $Sku->descripcion }}</td>
                                      <td>{{ $Sku->cantidad }}</td>
                                      <td>{{ $Sku->fecha }}</td>
                                      <td>{{ $Sku->precio }}</td>
                                      <td>
                                        <div class="btn-group btn-group-sm " role="group" aria-label="">
                                            <button class="btn btn-md bg-orange-500 text-white"><i class="fa-solid fa-pen"></i></button>
                                            <button class="btn btn-md btn-danger"><i class="fa-solid fa-trash"></i></button>
                                        </div>
                                      </td>
                                      </tr>
                                      @endforeach
                                 </table>
                                </div>

                                <div class="clearfix border border-1 mt-5"></div>
                            </fieldset>
                            @else

                            @endif


                            <fieldset class="border border-0 mt-4">
                                <legend class="rounded w-50 d-none d-sm-block float-none bg-green-500 text-white ps-5 ms-4">Paso a realizar</legend>
                                <legend class="rounded float-none d-sm-none bg-green-500 text-white fs-6 p-1">Paso a realizar</legend>
                                <div class="table-responsive">
                                 <table class="table table-striped">
                                   <tr>
                                   <td>
                                    <div class="form-floating">
                                        <textarea class="form-control rounded input @error('Descripción') is-invalid @enderror" wire:model.defer='descrip' style="width: 700px; height:100px" cols="30" placeholder="Descrpción" igd="floatingInput"></textarea>
                                        <label for="floatingInput" class="text-lead-500"> Desripción</label>
                                    </div>
                                   </td>
                                   {{-- <td>
                                    <div class="form-floating">
                                        <textarea class="form-control rounded @error('paso') is-invalid @enderror" wire:model.defer='proceso' style="width: 320px" cols="30" placeholder="Paso a paso" id="floatingTextarea"></textarea>
                                        <label for="floatingTextarea" class="text-lead-500">Paso a paso</label>
                                    </div>
                                   </td> --}}
                                   {{-- <td>
                                    <div class="form-floating">
                                        <textarea class="form-control rounded @error('definir') is-invalid @enderror" style="width: 320px" cols="30" placeholder="Definir" id="floatingTextarea"></textarea>
                                        <label for="floatingTextarea" class="text-lead-500">Definir</label>
                                    </div>
                                   </td> --}}
                                   <td>
                                    <input type="file" class="form-control btn-file" accept=".png, .jpg, .jpeg" wire:model.defer="Imagenes" style="width: 320px">
                                    <div class="card">
                                        @if ($Imagenes)
                                        Preview Imagen:
                                        <img src="{{ $Imagenes->temporaryUrl() }}" class="card-img-top" width="80px" height="80px">
                                      @else

                                       @endif
                                    </div>
                                   </td>
                                   </tr>
                                 </table>
                                </div>
                            </fieldset>
                            <div class="mt-3">
                                <button class="btm" wire:click.prevent='Pasos'>Guardar</button>
                             </div>
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
   Livewire.on('alert', function(message){
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
