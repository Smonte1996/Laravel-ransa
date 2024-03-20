@push('styles')
<link rel="stylesheet" href="{{ asset('css/Animacion-maquila.css') }}">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/habibmhamadi/multi-select-tag@2.0.1/dist/css/multi-select-tag.css">
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
                                @if (!is_null($GuardarCabecera))

                            @else
                                <div class="col-md-10">
                            <div class="form-floating">
                                <select class="form-select input " wire:model.enter='GuardarCabecera' id="floatingSelect" wire:ignore>
                                  <option selected>Seleccionar una opcion</option>
                                    @foreach ($foreot as $Guardar )
                                        <option value="{{ $Guardar->id }}">{{ $Guardar->codigo }}</option>
                                    @endforeach
                                </select>
                                <label for="floatingSelect" class="text-lead-900">Codigo unico</label>
                          </div>
                        </div>
                        @endif
                        {{--  <div class="col-md-5">
                            <a href="{{ asset('Doc_Excel/Produccion.xlsx') }}" class="btn btn-green-500 btn-md text-white rounded" target="_blank"><i class="fa-solid fa-file-excel"></i> Descargar excel</a>
                        </div>  --}}
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
                                    {{-- <div  x-data = "{cliente:'null'}"> --}}
                                  <div class="row">



                            @if (!is_null($GuardarCabecera))
                            <div class="col-sm-12 col-md-2">
                                <div class="mb-3">
                                    {{-- <input class="form-control rounded input @error('Ordent') is-invalid @enderror" placeholder="Orden de trabajo" type="text" id="floatingInput" disabled value="{{$code}}"> --}}
                                    <label for="floatingInput" class="text-lead-500">Orden de trabajo:</label>
                                    <p style="color: black">{{ $GuardarCabecera->codigo }}</p>
                                </div>
                            </div>

                            <div class="col-sm-12 col-md-3">
                                <div class="mb-3">
                                    <label for="floatingInput" class="text-lead-500">Cantidad:</label>
                                   <p style="color: black">{{ $GuardarCabecera->cantidad }}</p>
                                </div>
                            </div>

                            <div class="col-sm-12 col-md-3">
                                <div class="mb-3">
                                      <label for="floatingSelect" class="text-lead-900">Empaque</label>
                                      <p style="color: black">{{ $GuardarCabecera->cj_un }}</p>
                                </div>
                            </div>


                            <div class="col-sm-12 col-md-3">
                                <div class="mb-3">
                                    <label for="floatingInput" class="text-lead-500">Fecha</label>
                                  <p style="color: black">{{ $GuardarCabecera->fecha }}</p>
                                </div>
                            </div>

                            <div class="col-sm-12 col-md-6">
                                <div class="mb-3">
                                    <label for="floatingInput" class="text-lead-500">Ean13</label>
                                     <p style="color: black">{{ $GuardarCabecera->ean13 }}</p>
                                </div>
                            </div>

                            <div class="col-sm-12 col-md-6">
                                <div class="mb-3">
                                    <label for="floatingInput" class="text-lead-500">Ean14</label>
                                    <p style="color: black">{{ $GuardarCabecera->ean14 }}</p>
                                </div>
                            </div>

                            <div class="col-sm-12 col-md-3">
                                <div class="mb-3" >
                                      <label for="floatingSelect" class="text-lead-900">Cliente</label>
                                     <p style="color: black"> {{ $GuardarCabecera->Clientes->social_reason }}</p>
                                </div>
                            </div>

                            <div class="col-sm-12 col-md-3">
                                <div class="mb-3">
                                       <label for="floatingSelect" class="text-lead-500">Codigo</label>
                                       <p style="color: black">{{ $GuardarCabecera->CodigoF->codigo }}</p>
                                </div>
                            </div>


                            <div class="col-sm-12 col-md-3">
                                <div class="mb-3">
                                    <label for="descripcion" class="form-label fs-6 text-lead-500">Descripción:</label>
                                     <p style="color: black">{{ $GuardarCabecera->CodigoF->descripcion }}</p>
                                </div>
                            </div>

                            <div class="col-sm-12 col-md-3">
                                <div class="mb-3">
                                        <label for="floatingSelect" class="text-lead-900">Actividad:</label>
                                        @foreach ($GuardarCabecera->Tarifarios as $Activid )
                                        <li style="color: black">{{ $Activid->actividad }}</li>
                                        @endforeach
                                </div>
                            </div>

                         @switch($GuardarCabecera->supplier_id)
                             @case(1)
                             <div class="col-sm-12 col-md-3">
                                <div class="mb-3">
                                    <label for="descripcion" class="form-label fs-6 text-lead-500">Tarifa Dprissa:</label>
                                    @foreach ($GuardarCabecera->Tarifarios as $Activid )
                                    <li style="color: black">{{ $Activid->tarifa_dprissa }}</li>
                                @endforeach
                                </div>
                            </div>
                                 @break

                        @case(2)
                        <div class="col-sm-12 col-md-3">
                            <div class="mb-3">
                                <label for="descripcion" class="form-label fs-6 text-lead-500">Tarifa Serypro:</label>
                                @foreach ($GuardarCabecera->Tarifarios as $Activid )
                                    <li style="color: black">{{ $Activid->tarifa_serypro }}</li>
                                @endforeach
                            </div>
                        </div>
                        @break

                        @default

                         @endswitch

                            <div class="col-sm-12 col-md-3">
                                <div class="mb-3">

                                        <label for="floatingSelect" class="text-lead-900">Proveedor</label>
                                       <p style="color: black">{{ $GuardarCabecera->Proveedores->social_reason}}</p>
                                </div>
                            </div>

                            <div class="col-sm-12 col-md-3">
                                <div class="mb-3">
                                    <label for="floatingInput" class="text-lead-500">Ot del cliente</label>
                                    <p style="color: black">{{ $GuardarCabecera->otcliente }}</p>
                                </div>
                            </div>

                            @else


                            <div class="col-sm-12 col-md-2" >
                                <div class="mb-3">
                                <div class="form-floating">
                                    <input class="form-control rounded input @error('Ordent') is-invalid @enderror" placeholder="Orden de trabajo" type="text" id="floatingInput" disabled value="{{$code}}" wire:ignore>
                                    <label for="floatingInput" class="text-lead-500">Orden de trabajo</label>
                                     @error('Ordent')
                                    <small id="OrdenthelpId"
                                        class="form-text text-muted invalid-feedback">{{ $message }}</small>
                                    @enderror
                                  </div>
                                </div>
                            </div>

                            <div class="col-sm-12 col-md-3">
                                <div class="mb-3">
                                    <label for="" class="text-lead-500">Cantidad</label>
                                    <input class="form-control rounded input @error('Cantidad') is-invalid @enderror" wire:model.defer='cantidad' placeholder="Cantidad" type="number">
                                     @error('Cantidad')
                                    <small id="CantidadhelpId"
                                        class="form-text text-muted invalid-feedback">{{ $message }}</small>
                                    @enderror
                                  </div>
                            </div>

                            <div class="col-sm-12 col-md-3">
                                <div class="mb-3">
                                    <label for="floatingSelect" class="text-lead-900">Empaque</label>
                                    <select class="form-select input @error('cjun') is-invalid @enderror" wire:model.defer='cjun'>
                                        <option >Seleccionar</option>
                                        <option value="Cajas">Cajas</option>
                                        <option value="Unidades">Unidades</option>
                                      </select>
                                     @error('cjun')
                                    <small id="cjunhelpId"
                                        class="form-text text-muted invalid-feedback">{{ $message }}</small>
                                    @enderror
                                  </div>
                            </div>


                            <div class="col-sm-12 col-md-3">
                                <div class="mb-3">
                                    <label for="" class="text-lead-500">Fecha</label>
                                    <input class="form-control rounded input @error('fecha') is-invalid @enderror" wire:model.defer='fecha' placeholder="Fecha" type="date" >
                                     @error('fecha')
                                    <small id="fechahelpId"
                                        class="form-text text-muted invalid-feedback">{{ $message }}</small>
                                    @enderror
                                  </div>
                            </div>

                            <div class="col-sm-12 col-md-6">
                                <div class="mb-3">
                                    <label for="" class="text-lead-500">Ean13</label>
                                    <input class="form-control rounded input @error('ean13') is-invalid @enderror" wire:model.defer='ean13' placeholder="Ean13" type="number">
                                     @error('ean13')
                                    <small id="ean13helpId"
                                        class="form-text text-muted invalid-feedback">{{ $message }}</small>
                                    @enderror
                                  </div>
                            </div>

                            <div class="col-sm-12 col-md-6">
                                <div class="mb-3">
                                    <label for="" class="text-lead-500">Ean14</label>
                                    <input class="form-control rounded input @error('ean14') is-invalid @enderror" wire:model.defer='ean14' placeholder="Ean14" type="number">
                                     @error('ean14')
                                    <small id="ean14helpId"
                                        class="form-text text-muted invalid-feedback">{{ $message }}</small>
                                    @enderror
                                  </div>
                            </div>

                            <div class="col-sm-12 col-md-3">
                                <div class="mb-3" >
                                    <label for="" class="text-lead-900">Cliente</label>
                                    <select class="form-select input  @error('cliente') is-invalid @enderror" wire:model='cliente' x-model ="cliente">
                                        <option selected>Seleccionar una opcion</option>
                                        @foreach ($Clientes as $Client )
                                            <option value="{{ $Client->id }}">{{ $Client->social_reason }}</option>
                                        @endforeach
                                      </select>

                                     @error('Cliente')
                                    <small id="ClientehelpId"
                                        class="form-text text-muted invalid-feedback">{{ $message }}</small>
                                    @enderror
                                  </div>
                            </div>

                            <div class="col-sm-12 col-md-3">
                                <div class="mb-3">
                                    <label for="" class="text-lead-500">Codigo</label>
                                        <select class="form-select input select2 @error('codigo') is-invalid @enderror" wire:model='codigo' placeholder="Codigo">
                                            <option value="">Seleccionar</option>
                                            @if (!is_null($cliente))
                                            @foreach ( $Codigos as $Codi )
                                            <option value="{{ $Codi->id }}">{{ $Codi->codigo }}</option>
                                            @endforeach
                                            @else

                                            @endif
                                        </select>
                                     @error('codigo')
                                    <small id="codigohelpId"
                                        class="form-text text-muted invalid-feedback">{{ $message }}</small>
                                    @enderror
                                  </div>
                            </div>


                            <div class="col-sm-12 col-md-3">
                                <div class="mb-3">
                                    <label for="descripcion" class="form-label fs-6 text-lead-500">Descripción:</label>
                                    @if (!is_null($codigo))
                                    @foreach ( $descrip_codigo as $descrip_cod )
                                      <p style="color: black"> {{ $descrip_cod->descripcion }} </p>
                                    @endforeach
                                    @else

                                    @endif
                                </div>
                            </div>


                            <div class="col-sm-12 col-md-3" >
                                <div class="mb-3" wire:ignore>
                                    <label for="" class="text-lead-900">Actividad</label>
                                        <select id="select-multiple" wire:model='Actividad' multiple>
                                          <option >Seleccionar una opcion</option>
                                          @foreach ($actividad as $activida )
                                          <option value="{{ $activida->id }}">{{ $activida->actividad }}</option>
                                         @endforeach
                                        </select>
                                  </div>
                            </div>

                            @if (!is_null($Actividad))
                            <div class="col-sm-12 col-md-3">
                                <div class="mb-3">
                                    <label for="descripcion" class="form-label fs-6 text-lead-500">Tarifa Serypro:</label>
                                    @foreach ( $Tarifas as $Tarif )
                                      <p style="color: black">${{ $Tarif->tarifa_serypro }} </p>
                                    @endforeach
                                </div>
                            </div>

                            <div class="col-sm-12 col-md-3">
                                <div class="mb-3">
                                    <label for="descripcion" class="form-label fs-6 text-lead-500">Tarifa Dprissa:</label>
                                    @foreach ( $Tarifas as $Tarif )
                                      <p style="color: black">${{ $Tarif->tarifa_dprissa }} </p>
                                    @endforeach
                                </div>
                            </div>
                            @else

                            @endif

                            <div class="col-sm-12 col-md-3">
                                <div class="mb-3">
                                    <label for="Select" class="text-lead-900">Proveedor</label>
                                        <select class="form-select input @error('proveedor') is-invalid @enderror" wire:model.defer='proveedor' id="Select">
                                          <option selected>Seleccionar una opcion</option>
                                          @foreach ($Proveedores as $Proveedor )
                                            <option value="{{ $Proveedor->id }}">{{ $Proveedor->social_reason }}</option>
                                          @endforeach
                                        </select>
                                     @error('proveedor')
                                    <small id="proveedorhelpId"
                                        class="form-text text-muted invalid-feedback">{{ $message }}</small>
                                    @enderror
                                  </div>
                            </div>


                            <div class="col-sm-12 col-md-3">
                                <div class="mb-3">
                                    <label for="" class="text-lead-500">Pvp</label>
                                    <input class="form-control rounded input @error('Pvp') is-invalid @enderror" wire:model.defer='pvp' placeholder="Pvp" type="number">
                                </div>
                            </div>

                            <div class="col-sm-12 col-md-3">
                                <div class="mb-3">
                                    <label for="" class="text-lead-500">Ot del cliente</label>
                                    <input class="form-control rounded input @error('otcliente') is-invalid @enderror" wire:model.defer='otcliente' placeholder="Orden de trabajo" type="text">
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6">
                                <div class="mb-3 mt-3">
                                <button class="btm" wire:click.prevent='Encabezado'> Empezar
                                </button>
                              </div>
                            </div>
                            @endif
                            </div>

                            {{-- </div> --}}

                            </fieldset>

                            <div class="clearfix border border-1 mt-3"></div>

                            <fieldset class="border border-0 mt-4">

                                {{--  <div class="btn-group btn-group-sm" role="group" aria-label="Basic mixed styles example">  --}}
                                    {{--  <div class="col-sm-12 col-md-6">  --}}
                                <legend class="rounded w-50 d-none d-sm-block float-none bg-green-500 text-white ps-5 ms-4">Compomentes</legend>
                                <legend class="rounded float-none d-sm-none bg-green-500 text-white fs-6 p-1">Compomentes</legend>
                                {{--  </div>  --}}

                                    {{--  <div class="col-sm-12 col-md-6">
                                        <div class="btn-group btn-group-sm" role="group" aria-label="Basic mixed styles example">
                                        <input type="file" class="form-control form-control-sm" id="filexlsx"
                                            name="filexlsx" wire:model.defer="filexlsx" accept=".xlsx">
                                        <button class="btn btn-green-500 text-white" wire:click.prevent='importExcel'>Importar</button>
                                        </div>
                                        </div>  --}}
                                {{--  </div>  --}}
                                <div class="table-responsive">
                                    @if (!is_null($sku))
                                            @foreach ( $descripciones as $descrip )
                                            <label class="form-label" style="color: black">{{ $descrip->descripcion }}</label>
                                            @endforeach
                                            @else

                                            @endif
                                <table class="table table-striped">
                                 <tbody>
                                    @foreach ($actividades as $index => $actividad )
                                   <tr>
                                    <td>
                                       <div class="form-floating">
                                           <select class="form-select rounded input @error('sku') is-invalid @enderror" style="width: 180px" wire:model.defer='actividades.{{ $index }}.sku' wire:model='sku.{{ $index }}'  placeholder="Sku" igd="floatingSelect">
                                            <option value="">Seleccionar</option>
                                            @if(!is_null($GuardarCabecera))
                                            @foreach ($codigoComp as $codi )
                                                <option value="{{ $codi->id }}">{{ $codi->codigo }}</option>
                                            @endforeach
                                                @else
                                            @endif
                                           </select>
                                           <label for="floatingSelect" class="text-lead-500">sku</label>
                                       </div>
                                    </td>
                                    <td>
                                        {{--  <div class="form-floating">  --}}
                                            {{--  <label for="floatingInput" class="text-lead-500" style="width: 180px" wire:model.defer='actividades.{{ $index }}.descripcion'>Descripción</label>  --}}


                                            {{--  <input class="form-control rounded input @error('descripcion') is-invalid @enderror" style="width: 180px" wire:model.defer='actividades.{{ $index }}.descripcion' placeholder="Descripción" type="text" igd="floatingInput">  --}}
                                            {{--  <label for="floatingInput" class="text-lead-500">Descripción</label>  --}}
                                        {{--  </div>  --}}
                                    </td>
                                    <td>
                                        <div class="form-floating">
                                            <input class="form-control rounded input @error('cantidades') is-invalid @enderror" style="width: 180px" wire:model.defer='actividades.{{ $index }}.cantidades' placeholder="cantidad" type="number" igd="floatingInput">
                                            <label for="floatingInput" class="text-lead-500">Cantidad</label>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-floating">
                                            <select class="form-select input @error('empa') is-invalid @enderror" wire:model.defer='actividades.{{ $index }}.empa' style="width:150px" igd="floatingSelect">
                                                <option selected>Seleccionar</option>
                                                <option value="CJ">Caja</option>
                                                <option value="UN">Unidad</option>
                                                <option value="Display">Display</option>
                                              </select>
                                              <label for="floatingSelect" class="text-lead-900">Empaque</label>
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
                                    <button class="btn btn-sm bg-green-500 text-white" wire:click='GuardarDatos' wire:loading.attr='disabled' wire:target='GuardarDatos' class="disabled:opacity-60">Guardar</button>
                                    </div>
                               </div>
                            </fieldset>

                            <div class="clearfix border border-1 mt-5"></div>

                            @if (!is_null($skus))
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
                                      <td>{{ $Sku->Codigos->codigo }}</td>
                                      <td>{{ $Sku->Codigos->descripcion }}</td>
                                      <td>{{ $Sku->cantidad }}</td>
                                      <td>{{ $Sku->fecha }}</td>
                                      <td>{{ $Sku->precio }}</td>
                                      <td>
                                        <div class="btn-group btn-group-sm " role="group" aria-label="">
                                            <button class="btn btn-md bg-orange-500 text-white" wire:click.prevent="$set('open', true)"><i class="fa-solid fa-pen"></i></button>
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
                            @if (!is_null($guardarproceso))

                            @else
                            <div class="mt-3">
                                <button class="btn btn-sm bg-green-500 text-white" wire:click.prevent='Pasos'>Guardar</button>
                             </div>
                            @endif


                             <div class="clearfix border border-1 mt-5"></div>

                             <fieldset class="border border-0 mt-3">
                                <legend class="rounded w-50 d-none d-sm-block float-none bg-green-500 text-white ps-5 ms-4">Programación</legend>
                                <legend class="rounded float-none d-sm-none bg-green-500 text-white fs-6 p-1">Programación</legend>
                                <div class="table-responsive">
                                 <table class="table table-striped">
                                    <tbody>
                                    @foreach ( $ProgramaDias as $index =>$Dias )
                                   <tr>
                                    <td>
                                        <div class="form-floating">
                                            <input class="form-control rounded input @error('dia') is-invalid @enderror" style="width: 180px" wire:model.defer='ProgramaDias.{{ $index }}.dia' placeholder="Dias" type="number" igd="floatingInput">
                                            <label for="floatingInput" class="text-lead-500">Dias</label>
                                        </div>
                                       </td>
                                        <td>
                                            <div class="form-floating">
                                                <input class="form-control rounded input @error('cantidades') is-invalid @enderror" style="width: 180px" wire:model.defer='ProgramaDias.{{ $index }}.cantidades' placeholder="Cantidades" type="number" igd="floatingInput">
                                                <label for="floatingInput" class="text-lead-500">Cantidades</label>
                                            </div>
                                       </td>
                                       <td>
                                        <div class="form-floating">
                                            <input class="form-control rounded input @error('fechaPs') is-invalid @enderror" style="width: 180px" wire:model.defer='ProgramaDias.{{ $index }}.fechaP' placeholder="Fechas" type="date" igd="floatingInput">
                                            <label for="floatingInput" class="text-lead-500">Fechas</label>
                                        </div>
                                       </td>
                                       <td>
                                        <div class="form-floating">
                                            <textarea class="form-control rounded input" wire:model.defer='ProgramaDias.{{ $index }}.observa' style="width: 320px" placeholder="Observación" id="floatingTextarea"></textarea>
                                            <label for="floatingTextarea" class="text-lead-500">Observación</label>
                                        </div>
                                       </td>
                                       <td>
                                        <button class="btn btn-sm btn-danger" wire:click.prevent='QuitarDias({{ $index }})'>Eliminar</button>
                                       </td>
                                   </tr>
                                   @endforeach
                                </tbody>
                                 </table>
                                 <div class="col-md-6">
                                    <button class="btn btn-sm" wire:click='AgregarDias()'><i class="fa-solid fa-plus" style="color: #27b050;"></i> Agregar campos</button>
                                </div>
                                <div class="col-md-6 d-flex justify-content-end">
                                    <button class="btn btn-sm bg-green-500 text-white" wire:click='Programacion' wire:loading.attr='disabled' wire:target='Programacion' class="disabled:opacity-60">Guardar</button>
                                </div>
                                </div>
                            </fieldset>
                            @if (!is_null($GuardarProgramcion) || !is_null($GuardarCabecera))
                            <div class="mt-3">
                                <button class="btm" wire:click='Enviar' wire:loading.attr='disabled' wire:target='Enviar' class="disabled:opacity-60"> Enviar </button>
                            </div>
                            @else

                            @endif

                        </div>
                    </div>
                  </div>
                </div>
            </div>
          </div>
    <x-jet-dialog-modal wire:model.prevent="open">
        <x-slot name='title'>
        <h2>Editar Codigo </h2>
        </x-slot>
        <x-slot name='content'>
            <div class="row">
                <div class="col-sm-12 col-md-3">
                <input type="text" class="form-control rounded">
                </div>
                 <div class="col-sm-12 col-md-3">
                    <input type="text" class="form-control rounded">
                </div>
            </div>
        </x-slot>
        <x-slot name='footer'>
        </x-slot>
    </x-jet-dialog-modal>

</div>
@push('scripts')
<script src="https://cdn.jsdelivr.net/gh/habibmhamadi/multi-select-tag@2.0.1/dist/js/multi-select-tag.js"></script>
 <script>
    new MultiSelectTag('select-multiple',{
    onChange: function(values) {
        // console.log(values.length);
  var element = [];
for (let index = 0; index < values.length; index++) {
    element = element.concat(values[index].value);
}
// console.log(element);
 @this.set('Actividad', element);

    }
});

document.addEventListener('initSelect1',  function() {
$('.select2').select2();
$('.select2').on('change', function(e){
@this.set('codigo', e.target.value);
});
});
</script>
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
