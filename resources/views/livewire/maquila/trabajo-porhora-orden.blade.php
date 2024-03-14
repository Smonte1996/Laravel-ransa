<div>
        <div class="right_col" role="main">
            <div class="">
                <div class="page-title">
                    <div class="title_left">
                        <h3>Orden de Trabajo por hora</h3>
                    </div>

                    <div class="title_right">
                        <div class=" form-group pull-right">
                            <div class="input-group">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-floating">
                                            <select class="form-select input " wire:model.enter='GuardarCabecera' id="floatingSelect" wire:ignore>
                                              <option selected>Seleccionar una opcion</option>
                                                {{--  @foreach ($foreot as $Guardar )
                                                    <option value="{{ $Guardar->id }}">{{ $Guardar->codigo }}</option>
                                                @endforeach  --}}
                                            </select>
                                            <label for="floatingSelect" class="text-lead-900">Codigo unico</label>
                                      </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- <div class="col-md-5 col-sm-5 form-group pull-right top_search">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Search for...">
                                <span class="input-group-btn">
                                    <button class="btn btn-default" type="button">Go!</button>
                                </span>
                            </div>
                        </div> --}}
                    </div>
                </div>

                <div class="clearfix"></div>
                    <div class="row">
                        <div class="col-md-12 col-sm-12">
                            <div class="x_panel">
                                <div class="x_title">
                                    <h2>Formulario de trabajo por hora</h2>
                                    <ul class="nav navbar-right panel_toolbox">
                                        {{-- <li>
                                            <x-jet-button type="button" data-bs-toggle="modal"
                                                data-bs-target="#exampleModal"><i class="fa fa-solid fa-eye"></i> Evidencia
                                            </x-jet-button>
                                        </li> --}}
                                    </ul>
                                    <div class="clearfix"></div>
                                </div>
                                <div id="previewsimg">
                                </div>
                                <div class="x_content">
                                    <fieldset class="border border-0">

                                        <legend class="rounded w-50 d-none d-sm-block float-none bg-green-500 text-white ps-5 ms-4">Datos Generales</legend>
                                            <legend class="rounded float-none d-sm-none bg-green-500 text-white fs-6 p-1">Datos Generales</legend>
                                        {{-- <div  x-data = "{cliente:'null'}"> --}}
                                      <div class="row">



                                {{--  @if (!is_null($GuardarCabecera))
                                <div class="col-sm-12 col-md-2">
                                    <div class="mb-3">
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
      --}}

                                <div class="col-sm-12 col-md-2" >
                                    <div class="mb-3">
                                    <div class="form-floating">
                                        <input class="form-control rounded input @error('Ordent') is-invalid @enderror" placeholder="Orden de trabajo" type="text" id="floatingInput" disabled value="" wire:ignore>
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
                                        <label for="floatingSelect" class="text-lead-900">Cliente</label>
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


                                <div class="col-sm-12 col-md-4">
                                    <div class="mb-3">
                                        <label for="" class="text-lead-500"> N° Picking</label>
                                            <select class="form-select input select2 @error('codigo') is-invalid @enderror" wire:model='codigo'>
                                                <option value="">Seleccionar</option>
                                                {{--  @if (!is_null($cliente))
                                                @foreach ( $Codigos as $Codi )
                                                <option value="{{ $Codi->id }}">{{ $Codi->codigo }}</option>
                                                @endforeach
                                                @else

                                                @endif  --}}
                                            </select>
                                         @error('codigo')
                                        <small id="codigohelpId"
                                            class="form-text text-muted invalid-feedback">{{ $message }}</small>
                                        @enderror
                                      </div>
                                </div>



                                {{--  @if (!is_null($Actividad))  --}}

                                {{--  @else

                                @endif  --}}

                                <div class="col-sm-12 col-md-3">
                                    <div class="mb-3">
                                        <label for="" class="text-lead-500">Ot del cliente</label>
                                        <input class="form-control rounded input @error('otcliente') is-invalid @enderror" wire:model.defer='otcliente' placeholder="Orden de trabajo" type="text">
                                    </div>
                                </div>

                                <div class="col-sm-12 col-md-6">
                                    <div class="mb-3 mt-4">
                                    <button class="btn btn-sm btn-green-500 text-white"> Empezar
                                    </button>
                                  </div>
                                </div>
                                {{--  @endif  --}}
                                </div>

                                {{-- </div> --}}

                                </fieldset>

                                <div class="clearfix border border-1 mt-3"></div>

                                <fieldset class="border border-0 mt-4">
                                <legend class="rounded w-50 d-none d-sm-block float-none bg-green-500 text-white ps-5 ms-4">Datos del Picking</legend>
                                <legend class="rounded float-none d-sm-none bg-green-500 text-white fs-6 p-1">Datos del Picking</legend>

                                <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                        <th>
                                         Id
                                        </th>
                                        <th>
                                            Sku
                                        </th>
                                        <th>
                                            Descripción
                                        </th>
                                        <th>
                                            Cantidad
                                        </th>
                                        <th>
                                            Actividad
                                        </th>
                                        <th>
                                            Proveedor
                                        </th>
                                        <th>
                                            Acción
                                        </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                       <tr>
                                          <td>1</td>
                                          <td>2334546</td>
                                          <td>skjbfkjbvjvfkbfjk</td>
                                          <td>400</td>
                                          <td><select name="" id="" class="form-select" style="width: 250px">
                                            <option value="">Seleccionar</option>
                                            </select></td>
                                          <td><select name="" id="" class="form-select" style="width: 250px">
                                            <option value="">Seleccionar</option>
                                            <option value="1">Dprissa</option>
                                            <option value="2">Serypro</option>
                                            </select></td>
                                          <td><button class="btn btn-sm btn-green-500 text-white">Guardar
                                        </button></td>
                                       </tr>
                                       <tr>
                                        <td>1</td>
                                        <td>2334546</td>
                                        <td>skjbfkjbvjvfkbfjk</td>
                                        <td>400</td>
                                        <td><select name="" id="" class="form-select" style="width: 250px">
                                            <option value="">Seleccionar</option>
                                            </select></td>
                                          <td><select name="" id="" class="form-select" style="width: 250px">
                                            <option value="">Seleccionar</option>
                                            <option value="1">Dprissa</option>
                                            <option value="2">Serypro</option>
                                            </select></td>
                                        <td><button class="btn btn-sm btn-green-500 text-white">Guardar</button></td>
                                     </tr>
                                     <tr>
                                        <td>1</td>
                                        <td>2334546</td>
                                        <td>skjbfkjbvjvfkbfjk</td>
                                        <td>400</td>
                                        <td><select name="" id="" class="form-select" style="width: 250px">
                                            <option value="">Seleccionar</option>
                                            </select></td>
                                          <td><select name="" id="" class="form-select" style="width: 250px">
                                            <option value="">Seleccionar</option>
                                            <option value="1">Dprissa</option>
                                            <option value="2">Serypro</option>
                                            </select></td>
                                        <td><button class="btn btn-sm btn-green-500 text-white">Guardar</button></td>
                                     </tr>
                                     <tr>
                                        <td>1</td>
                                        <td>2334546</td>
                                        <td>skjbfkjbvjvfkbfjk</td>
                                        <td>400</td>
                                        <td><select name="" id="" class="form-select" style="width: 250px">
                                            <option value="">Seleccionar</option>
                                            </select></td>
                                          <td><select name="" id="" class="form-select" style="width: 250px">
                                            <option value="">Seleccionar</option>
                                            <option value="1">Dprissa</option>
                                            <option value="2">Serypro</option>
                                            </select></td>
                                        <td><button class="btn btn-sm btn-green-500 text-white">Guardar</button></td>
                                     </tr>
                                    </tbody>
                                </table>
                            </div>
                                </fieldset>

                                <div class="clearfix border border-1 mt-3"></div>
                            <fieldset class="border border-0 mt-4">
                                <legend class="rounded w-50 d-none d-sm-block float-none bg-green-500 text-white ps-5 ms-4">Paso a paso</legend>
                                <legend class="rounded float-none d-sm-none bg-green-500 text-white fs-6 p-1">Paso a paso</legend>

                                <div class="table-responsive">
                                    <table class="table table-striped">
                                      <tr>
                                      <td>
                                       <div class="form-floating">
                                           <textarea class="form-control rounded input @error('Descripción') is-invalid @enderror" wire:model.defer='descrip' style="width: 700px; height:100px" cols="30" placeholder="Descrpción" igd="floatingInput"></textarea>
                                           <label for="floatingInput" class="text-lead-500"> Desripción</label>
                                       </div>
                                      </td>

                                      <td>
                                       <input type="file" class="form-control btn-file" accept=".png, .jpg, .jpeg" wire:model.defer="Imagenes" style="width: 320px">
                                       <div class="card">
                                           {{--  @if ($Imagenes)
                                           Preview Imagen:
                                           <img src="{{ $Imagenes->temporaryUrl() }}" class="card-img-top" width="80px" height="80px">
                                         @else

                                          @endif  --}}
                                       </div>
                                      </td>
                                      </tr>
                                    </table>
                                   </div>
                            </fieldset>
                            <div class="mt-3">
                                <button class="btn btn-md bg-orange-500 text-white" wire:click='Enviar' wire:loading.attr='disabled' wire:target='Enviar' class="disabled:opacity-60"> Enviar </button>
                            </div>
                    </div>
                 </div>
             </div>
          </div>
            </div>
        </div>
</div>
