<div>
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>Orden de Trabajo hola</h3>
                </div>

                <div class="title_right">
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
                                <h2>Actividad pendiente</h2>
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
                                                     {{ $Component->sku }}
                                                    </td>
                                                    <td style="color: black">
                                                        {{ $Component->descripcion }}
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
                                    {{-- @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach --}}
                                </fieldset>

                                <fieldset class="border border-2 mt-3">
                                    <legend class="rounded w-50 d-none d-sm-block float-none bg-lead-500 text-white ps-5 ms-4">Pasos a Seguir</legend>
                                        <legend class="rounded float-none d-sm-none bg-lead-500 text-white fs-6 p-1">Pasos a Seguir</legend>
                                    <div class="ms-4">
                                        <table class="table w-100 text-green-400">
                                           <div class="row">
                                            <div class="col-sm-12 col-md-6">
                                               <p style="white-space: pre-line; color:black; font-size: 15px">{{ $Inf->Pasoapaso->descripcion }}</p>
                                            </div>
                                            <div class="col-sm-12 col-md-6">
                                            <div class="text-center rounded">
                                              <img src="{{ asset('storage/Pasoapaso/'.trim($Inf->Pasoapaso->imagen)) }}" class="card-img-top"  style="width: 60%; height:60%;" alt="imagen paso a paso">
                                            </div>
                                        </div>
                                    </div>
                                        </table>
                                    </div>
                                    {{-- @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach --}}
                                </fieldset>

                                <fieldset class="border border-2 mt-3">
                                    <legend class="rounded w-50 d-none d-sm-block float-none bg-lead-500 text-white ps-5 ms-4">Programación del Supervisor</legend>
                                        <legend class="rounded float-none d-sm-none bg-lead-500 text-white fs-6 p-1">Programación del Supervisor</legend>
                                    <div class="ms-4">
                                        <div class="table-responsive">
                                        <table class="table w-100 text-green-400">
                                            <thead>
                                            <tr>
                                                <th class="text-center">Dias</th>
                                                <th class="text-center">Cantidad programada</th>
                                                <th class="text-center">Fecha</th>
                                                <th class="text-center">Observación</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                          @foreach ($Inf->Programa as $Programacion)
                                                <tr>
                                                    <td class="text-center" style="color: black">
                                                         {{ $Programacion->dia }}
                                                    </td>
                                                    <td class="text-center" style="color: black">
                                                        {{ $Programacion->cantidad }}
                                                    </td>
                                                    <td class="text-center" style="color: black">
                                                        {{ $Programacion->fecha }}
                                                    </td>
                                                    <td class="text-center">
                                                        <p style="white-space: pre-line; color:black;">{{ $Programacion->observacion }}</p>
                                                    </td>
                                                </tr>
                                             @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                    </div>
                                </fieldset>

                                <fieldset class="border border-2 mt-3">
                                    <legend class="rounded w-50 d-none d-sm-block float-none bg-green-500 text-white ps-5 ms-4">Reporte de Avance</legend>
                                        <legend class="rounded float-none d-sm-none bg-green-500 text-white fs-6 p-1">Reporte de Avance</legend>
                             <div class="ms-4">
                             <div class="table-responsive">
                            <table class="table w-100">
                             <tbody>
                                @foreach ( $Avances as $index => $Avance )
                                <tr>
                                    <td class="text-center">
                                        <div class="form-floating">
                                            <input class="form-control rounded @error('codigo') is-invalid @enderror" style="width: 180px" wire:model='Avances.{{ $index }}.cantidades' placeholder="Cantidad de avances" type="number" id="floatingInput">
                                           <label for="floatingInput" class="text-lead-500">Cantidad de avances</label>
                                        </div>
                                    </td>

                                    <td class="text-center">
                                        <div class="form-floating">
                                            <select class="form-select input @error('Empaque') is-invalid @enderror" wire:model='Avances.{{ $index }}.cjun' style="width: 230px" id="floatingSelect">
                                                <option selected>Seleccionar una opcion</option>
                                                <option value="Caja">Caja</option>
                                                <option value="Unidad">Unidad</option>
                                                <option value="Display">Display</option>
                                              </select>
                                              <label for="floatingSelect" class="text-lead-900">Empaque</label>
                                        </div>
                                    </td>

                                    <td class="text-center">
                                        <div class="form-floating">
                                            <input class="form-control rounded @error('lotes') is-invalid @enderror" style="width: 180px" wire:model='Avances.{{ $index }}.lotes' placeholder="Lote" type="text" id="floatingInput">
                                           <label for="floatingInput" class="text-lead-500">Lote</label>
                                        </div>
                                    </td>

                                    <td>
                                        <div class="form-floating">
                                            <input class="form-control rounded @error('fecha') is-invalid @enderror" wire:model='Avances.{{ $index }}.fecha' placeholder="Fecha de Vencimiento" type="date" id="floatingInput">
                                           <label for="floatingInput" class="text-lead-500">Fecha de Vencimiento</label>
                                        </div>
                                    </td>
                                    <td>
                                        <button class="btn btn-sm btn-danger mt-3" wire:click.prevent='QuitarCampos({{ $index }})'>Eliminar</button>
                                    </td>
                                </tr>
                                @endforeach
                             </tbody>
                             <div>
                             </div>
                            </table>
                             </div>
                             </div>
                             <div class="col-md-6 col-sm-6">
                                <button class="btn btn-sm" wire:click.prevent='CamposAvances'><i class="fa-solid fa-plus" style="color: #27b050;"></i> Agregar campos</button>
                             </div>
                             <div class="col-md-6 col-sm-6 d-flex justify-content-end">
                                <button class="btn btn-sm bg-green-500 text-white" wire:click='GuardarAvance' wire:loading.attr='disabled' wire:target='GuardarAvance' class="disabled:opacity-60">Guardar</button>
                                </div>
                                </fieldset>

                                <fieldset class="border border-2 mt-3">
                                    <legend class="rounded w-50 d-none d-sm-block float-none bg-green-500 text-white ps-5 ms-4">Reporte de Producctividad</legend>
                                        <legend class="rounded float-none d-sm-none bg-green-500 text-white fs-6 p-1">Reporte de Producctividad</legend>
                             <div class="ms-4">
                             <div class="table-responsive">
                            <table class="table w-100">
                             <tbody>
                                <tr>
                                    <td class="text-center">
                                        <div class="form-floating">
                                            <input class="form-control rounded @error('hora_Inicio') is-invalid @enderror" wire:model.defer="hora_Inicio" placeholder="Hora de Inicio" type="time" id="floatingInput">
                                           <label for="floatingInput" class="text-lead-500">Hora de Inicio</label>
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <div class="form-floating">
                                            <input class="form-control rounded @error('hora_pausa') is-invalid @enderror" wire:model.defer="hora_pausa" placeholder="Hora Pausa" type="time" id="floatingInput">
                                              <label for="floatingSelect" class="text-lead-900">Hora Pausa</label>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-floating">
                                            <input class="form-control rounded @error('personas1') is-invalid @enderror" wire:model.defer="personas1" style="width: 400px" placeholder="N° de Persona" type="number" id="floatingInput">
                                           <label for="floatingInput" class="text-lead-500">N° de Persona</label>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-center">
                                        <div class="form-floating">
                                            <input class="form-control rounded @error('codigo') is-invalid @enderror" wire:model.defer="hora_reinicio" placeholder="Hora Reinicio" type="time" id="floatingInput">
                                           <label for="floatingInput" class="text-lead-500">Hora reinicio</label>
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <div class="form-floating">
                                            <input class="form-control rounded @error('codigo') is-invalid @enderror" wire:model.defer="Hora_fin" placeholder="Hora Fin" type="time" id="floatingInput">
                                              <label for="floatingSelect" class="text-lead-900">Hora fin</label>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-floating">
                                            <input class="form-control rounded @error('personal2') is-invalid @enderror" wire:model.defer="personal2" style="width: 400px" placeholder="N° de Persona" type="number" id="floatingInput">
                                           <label for="floatingInput" class="text-lead-500">N° de Persona</label>
                                        </div>
                                    </td>
                                </tr>
                             </tbody>
                            </table>
                             </div>
                             </div>
                             <div class="col-md-12 col-sm-12 d-flex justify-content-end mt-3">
                                <button class="btn btn-sm bg-green-500 text-white" wire:click='GuardarProductividad' wire:loading.attr='disabled' wire:target='GuardarProductividad' class="disabled:opacity-60">Guardar</button>
                              </div>
                                </fieldset>

                                <fieldset class="border border-2 mt-3">
                                    <legend class="rounded w-50 d-none d-sm-block float-none bg-green-500 text-white ps-5 ms-4">Reporte de Muestreo</legend>
                                        <legend class="rounded float-none d-sm-none bg-green-500 text-white fs-6 p-1">Reporte de Muestreo</legend>
                             <div class="ms-4">
                                <div class="table-responsive">
                                <table class="table w-100">
                                    <div class="row">
                                    <tr>
                                        <div class="col-sm-4 col-md-4">
                                        <td>
                                            <div class="mt-3 text-center">
                                            <label class="label-control text-center">Muestra</label>
                                           </div>
                                        </td>
                                    </div>
                                        <div class="col-sm-6 col-md-6">
                                        <td>
                                            <div class="form-floating">
                                                <input class="form-control rounded @error('cantidad') is-invalid @enderror" wire:model.defer="" placeholder="Cantidad" type="number" id="floatingInput">
                                               <label for="floatingInput" class="text-lead-500">Cantidad</label>
                                            </div>
                                        </td>
                                    </div>
                                        <div class="col-sm-6 col-md-6">
                                        <td>
                                            <div class="form-floating">
                                                <select class="form-select input @error('cliente') is-invalid @enderror" id="floatingSelect">
                                                    <option selected>Seleccionar una opcion</option>
                                                    <option value="Caja">Caja</option>
                                                    <option value="Unidad">Unidad</option>
                                                    <option value="Display">Display</option>
                                                  </select>
                                                  <label for="floatingSelect" class="text-lead-900">Empaque</label>
                                            </div>
                                        </td>
                                    </div>
                                    </tr>
                                    <tr>
                                        <div class="col-sm-6 col-md-6">
                                        <td>
                                            <div class="mt-3 text-center">
                                            <label class="label-control text-center">Aceptados</label>
                                           </div>
                                        </td>
                                    </div>
                                        <div class="col-sm-6 col-md-6">
                                        <td>
                                            <div class="form-floating">
                                                <input class="form-control rounded @error('cantidad') is-invalid @enderror" name="" placeholder="Cantidad" type="number" id="floatingInput">
                                               <label for="floatingInput" class="text-lead-500">Cantidad</label>
                                            </div>
                                        </td>
                                       </div>
                                        <div class="col-sm-6 col-md-6">
                                        <td>
                                            <div class="form-floating">
                                                <select class="form-select input @error('cliente') is-invalid @enderror" id="floatingSelect">
                                                    <option selected>Seleccionar una opcion</option>
                                                    <option value="Caja">Caja</option>
                                                    <option value="Unidad">Unidad</option>
                                                    <option value="Display">Display</option>
                                                  </select>
                                                  <label for="floatingSelect" class="text-lead-900">Empaque</label>
                                            </div>
                                        </td>
                                    </div>
                                    </tr>
                                    <tr>
                                        <div class="col-sm-6 col-md-6">
                                        <td>
                                            <div class="mt-3 text-center">
                                            <label class="label-control text-center">Rechazados</label>
                                           </div>
                                        </td>
                                    </div>
                                        <div class="col-sm-12 col-md-6">
                                        <td>
                                            <div class="form-floating">
                                                <input class="form-control rounded @error('cantidad') is-invalid @enderror" placeholder="Cantidad" type="number" id="floatingInput">
                                               <label for="floatingInput" class="text-lead-500">Cantidad</label>
                                            </div>
                                        </td>
                                    </div>
                                        <div class="col-sm-12 col-md-6">
                                        <td>
                                            <div class="form-floating">
                                                <select class="form-select input @error('cliente') is-invalid @enderror" id="floatingSelect">
                                                    <option selected>Seleccionar</option>
                                                    <option value="Caja">Caja</option>
                                                    <option value="Unidad">Unidad</option>
                                                    <option value="Display">Display</option>
                                                  </select>
                                                  <label for="floatingSelect" class="text-lead-900">Empaque</label>
                                            </div>
                                        </td>
                                    </div>
                                        <div class="col-sm-12 col-md-6">
                                        <td>
                                            <div class="form-floating">
                                                <textarea class="form-control rounded" style="width: 250px" placeholder="Observación" wire:model='ObserRechazo' id="floatingTextarea"></textarea>
                                                <label for="floatingTextarea" class="text-lead-500">Observación</label>
                                            </div>
                                        </td>
                                    </div>
                                    </tr>
                                    <tr>
                                        <div class="col-sm-12 col-md-6">
                                        <td>
                                            <div class="mt-3 text-center">
                                            <label class="label-control">Reprocesados</label>
                                           </div>
                                        </td>
                                    </div>
                                        <div class="col-sm-12 col-md-6">
                                        <td>
                                            <div class="form-floating">
                                                <input class="form-control rounded @error('cantidad') is-invalid @enderror" name="" placeholder="Cantidad" type="number" id="floatingInput">
                                               <label for="floatingInput" class="text-lead-500">Cantidad</label>
                                            </div>
                                        </td>
                                    </div>
                                        <div class="col-sm-12 col-md-6">
                                        <td>
                                            <div class="form-floating">
                                                <select class="form-select input @error('cliente') is-invalid @enderror" id="floatingSelect">
                                                    <option selected>Seleccionar</option>
                                                    <option value="Caja">Caja</option>
                                                    <option value="Unidad">Unidad</option>
                                                    <option value="Display">Display</option>
                                                  </select>
                                                  <label for="floatingSelect" class="text-lead-900">Empaque</label>
                                            </div>

                                        </td>
                                        </div>
                                    </tr>
                                </div>
                                </table>
                              </div>
                             </div>
                                </fieldset>

                                <fieldset class="border border-2 mt-3">
                                    <legend class="rounded w-50 d-none d-sm-block float-none bg-green-500 text-white ps-5 ms-4">Reporte de Novedades</legend>
                                        <legend class="rounded float-none d-sm-none bg-green-500 text-white fs-6 p-1">Reporte de Novedades</legend>
                             <div class="ms-4">
                                <div class="table-responsive">
                                <table class="table w-100">
                                    @foreach ( $Novedades as $index=>$Novedad )
                                <tr>
                                  <td>
                                    <div class="form-floating">
                                        <select class="form-select input @error('Sku') is-invalid @enderror" wire:model='Novedades.{{ $index }}.Sku' style="width: 150px" id="floatingSelect">
                                            <option selected>Seleccionar</option>
                                            @foreach ($Inf->Componentes as $skus )
                                                <option value="{{ $skus->id }}">{{ $skus->sku }}</option>
                                            @endforeach
                                          </select>
                                          <label for="floatingSelect" class="text-lead-900">Sku</label>
                                    </div>
                                  </td>
                                    <td>
                                        <div class="form-floating">
                                            <input class="form-control rounded @error('cantidad') is-invalid @enderror" style="width: 120px" name="" wire:model='Novedades.{{ $index }}.canti' placeholder="Cantidad" type="number" id="floatingInput">
                                           <label for="floatingInput" class="text-lead-500">Cantidad</label>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-floating">
                                            <select class="form-select input @error('Empaque') is-invalid @enderror" wire:model='Novedades.{{ $index }}.empaque' style="width: 150px" id="floatingSelect">
                                                <option selected>Seleccionar</option>
                                                <option value="Caja">Caja</option>
                                                <option value="Unidad">Unidad</option>
                                                <option value="Display">Display</option>
                                              </select>
                                              <label for="floatingSelect" class="text-lead-900">Empaque</label>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-floating">
                                            <select class="form-select input @error('estado') is-invalid @enderror" wire:model='Novedades.{{ $index }}.estado' style="width: 150px" id="floatingSelect">
                                                <option selected>Seleccionar</option>
                                                <option value="Mal estado">Mal estado</option>
                                                <option value="Reprocesados">Reprocesados</option>
                                                <option value="Rechazado">Rechazado</option>
                                              </select>
                                              <label for="floatingSelect" class="text-lead-900">Estado</label>
                                        </div>
                                    </td>

                                    <td>
                                        <div class="form-floating">
                                            <textarea class="form-control rounded" style="width: 320px" placeholder="Observación" wire:model='Novedades.{{ $index }}.observacion' id="floatingTextarea"></textarea>
                                            <label for="floatingTextarea" class="text-lead-500">Observación</label>
                                        </div>
                                    </td>

                                    <td>
                                        <input class="form-control rounded @error('imagen') is-invalid @enderror" style="width: 300px" name="" wire:model='Novedades.{{ $index }}.imagenes' type="file">
                                    </td>

                                    <td>
                                        <button class="btn btn-sm btn-danger mt-3" wire:click.prevent='EliminarCampo({{ $index }})'>Eliminar</button>
                                    </td>
                                </tr>
                                @endforeach
                                </table>
                                </div>
                               </div>
                               <div class="col-md-6">
                                <button class="btn btn-sm" wire:click.prevent='CamposNovedad'><i class="fa-solid fa-plus" style="color: #27b050;"></i> Agregar campos</button>
                             </div>
                                </fieldset>
                                <div class="text-center">
                                    <x-jet-button id="confirmaction" class="mt-4">Confirmar Acciones
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



