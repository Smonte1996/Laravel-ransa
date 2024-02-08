@push('styles')
    <link rel="stylesheet" href="{{ asset('css/Firma.css') }}">
    @endpush
<x-app-layout>
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>Orden de Trabajo</h3>
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
            <form action="" method="post"
                id="imgcorrection">
                @csrf
                {{-- @method('PUT') --}}
                <div class="row">
                    <div class="col-md-12 col-sm-12">
                        <div class="x_panel">
                            <div class="x_title">
                                <h2>Actividad pendiente</h2>
                                <ul class="nav navbar-right panel_toolbox">
                                    {{-- @if ($notification_service->dissatisfaction_service->notification_type == 'NO CONFORMIDAD')
                                        <x-jet-button type="button" id=""><i
                                                class="fa fa-solid fa-upload"></i>
                                            Análisis
                                        </x-jet-button>
                                    @endif --}}
                                    <li>
                                        <x-jet-button type="button" data-bs-toggle="modal"
                                            data-bs-target="#exampleModal"><i class="fa fa-solid fa-eye"></i> Evidencia
                                        </x-jet-button>
                                    </li>
                                    <li>
                                        <x-jet-button type="button" id="imgcorreccion"><i
                                                class="fa fa-solid fa-upload"></i>
                                            Adjuntar
                                        </x-jet-button>
                                    </li>
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
                                                {{ $Inf->cliente }}
                                               </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-12 col-md-3">
                                        <div class="mb-3">
                                            <label for="exampleFormControlInput1"
                                                class="form-label text-lead-500">Actividad</label>
                                            <div class="text-orange-500 fw-bold fs-6">
                                                {{ $Inf->Tarifario->actividad }}
                                               </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-12 col-md-3">
                                        <div class="mb-3">
                                            <label for="exampleFormControlInput1"
                                                class="form-label text-lead-500">Codigo a crear</label>
                                            <div class="text-orange-500 fw-bold fs-6">
                                                {{ $Inf->codigo_final }}
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
                                              <img src="{{ asset('storage/Pasoapaso/'.trim($Inf->Pasoapaso->imagen)) }}" class="card-img-top"  style="width: 25%; height:25%;" alt="imagen paso a paso">
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
                                                <th class="text-center">Check</th>
                                                {{-- <th class="text-center">Avances</th>
                                                <th class="text-center">Personal</th> --}}
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
                                                    <td class="text-center">
                                                        <div class="form-check">
                                                            <input type="checkbox" name="Programacion_id[]"
                                                                class="form-check-input text-green-500" value="{{ $Programacion->observacion }}">
                                                        </div>

                                                    </td>
                                                    {{-- <td class="text-center">
                                                        <div class="form-floating">
                                                            <input class="form-control rounded @error('codigo') is-invalid @enderror" name="avance" placeholder="Cantidad de avances" type="number" id="floatingInput">
                                                           <label for="floatingInput" class="text-lead-500">Cantidad de avances</label>
                                                        </div>
                                                    </td>
                                                    <td class="text-center">
                                                        <div class="form-floating">
                                                            <input class="form-control rounded @error('codigo') is-invalid @enderror" name="personal" placeholder="Personal utilizado" type="text" id="floatingInput">
                                                           <label for="floatingInput" class="text-lead-500">Personal utilizado</label>
                                                        </div>
                                                    </td> --}}
                                                </tr>
                                             @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                    </div>
                                    {{-- @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach --}}
                                </fieldset>

                                <fieldset class="border border-2 mt-3">
                                    <legend class="rounded w-50 d-none d-sm-block float-none bg-green-500 text-white ps-5 ms-4">Reporte de Avance</legend>
                                        <legend class="rounded float-none d-sm-none bg-green-500 text-white fs-6 p-1">Reporte de Avance</legend>
                             <div class="ms-4">
                             <div class="table-responsive">
                            <table class="table w-100">
                             <tbody>
                                <tr>
                                    <td class="text-center">
                                        <div class="form-floating">
                                            <input class="form-control rounded @error('codigo') is-invalid @enderror" style="width: 180px" name="avance" placeholder="Cantidad de avances" type="number" id="floatingInput">
                                           <label for="floatingInput" class="text-lead-500">Cantidad de avances</label>
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <div class="form-floating">
                                            <select class="form-select input @error('cliente') is-invalid @enderror" style="width: 230px" id="floatingSelect">
                                                <option selected>Seleccionar una opcion</option>
                                                <option value="Caja">Caja</option>
                                                <option value="Unidad">Unidad</option>
                                                <option value="Display">Display</option>
                                              </select>
                                              <label for="floatingSelect" class="text-lead-900">cajas o unidades</label>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-floating">
                                            <input class="form-control rounded @error('fecha') is-invalid @enderror" name="fecha" placeholder="Fecha de Vencimiento" type="date" id="floatingInput">
                                           <label for="floatingInput" class="text-lead-500">Fecha de Vencimiento</label>
                                        </div>
                                    </td>
                                    <td>
                                        <button class="btn btn-sm btn-danger">Eliminar</button>
                                    </td>
                                </tr>
                             </tbody>
                            </table>
                             </div>
                             </div>
                             <div class="col-md-6">
                                <button class="btn btn-sm"><i class="fa-solid fa-plus" style="color: #27b050;"></i> Agregar campos</button>
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
                                            <input class="form-control rounded @error('codigo') is-invalid @enderror" name="" placeholder="Hora de Inicio" type="date" id="floatingInput">
                                           <label for="floatingInput" class="text-lead-500">Hora de Inicio</label>
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <div class="form-floating">
                                            <input class="form-control rounded @error('codigo') is-invalid @enderror" name="" placeholder="Hora Fin" type="date" id="floatingInput">
                                              <label for="floatingSelect" class="text-lead-900">Hora Fin</label>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-floating">
                                            <input class="form-control rounded @error('fecha') is-invalid @enderror" name="" style="width: 400px" placeholder="N° de Persona" type="text" id="floatingInput">
                                           <label for="floatingInput" class="text-lead-500">N° de Persona</label>
                                        </div>
                                    </td>
                                    {{-- <td>
                                        <button class="btn btn-sm btn-danger">Eliminar</button>
                                    </td> --}}
                                </tr>
                                <tr>
                                    <td class="text-center">
                                        <div class="form-floating">
                                            <input class="form-control rounded @error('codigo') is-invalid @enderror" name="" placeholder="Hora Pausa" type="date" id="floatingInput">
                                           <label for="floatingInput" class="text-lead-500">Hora Pausa</label>
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <div class="form-floating">
                                            <input class="form-control rounded @error('codigo') is-invalid @enderror" name="" placeholder="Hora inicio" type="date" id="floatingInput">
                                              <label for="floatingSelect" class="text-lead-900">Hora inicio</label>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-floating">
                                            <input class="form-control rounded @error('fecha') is-invalid @enderror" name="" style="width: 400px" placeholder="N° de Persona" type="text" id="floatingInput">
                                           <label for="floatingInput" class="text-lead-500">N° de Persona</label>
                                        </div>
                                    </td>
                                    {{-- <td>
                                        <button class="btn btn-sm btn-danger">Eliminar</button>
                                    </td> --}}
                                </tr>
                                <tr>
                                    <td class="text-center">
                                        <div class="form-floating">
                                            <input class="form-control rounded @error('codigo') is-invalid @enderror" name="" placeholder="Hora Pausa" type="date" id="floatingInput">
                                           <label for="floatingInput" class="text-lead-500">Hora Pausa</label>
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <div class="form-floating">
                                            <input class="form-control rounded @error('codigo') is-invalid @enderror" name="" placeholder="Hora Fin" type="date" id="floatingInput">
                                              <label for="floatingSelect" class="text-lead-900">Hora Fin</label>
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <div class="form-floating">
                                            <input class="form-control rounded @error('fecha') is-invalid @enderror" style="width: 400px" name="" placeholder="N° de Persona" type="text" id="floatingInput">
                                           <label for="floatingInput" class="text-lead-500">N° de Persona</label>
                                        </div>
                                    </td>
                                    {{-- <td>
                                        <button class="btn btn-sm btn-danger">Eliminar</button>
                                    </td> --}}
                                </tr>
                             </tbody>
                            </table>
                             </div>
                             </div>
                             {{-- <div class="col-md-6">
                                <button class="btn btn-sm"><i class="fa-solid fa-plus" style="color: #27b050;"></i> Agregar campos</button>
                             </div> --}}
                                </fieldset>

                                <fieldset class="border border-2 mt-3">
                                    <legend class="rounded w-50 d-none d-sm-block float-none bg-green-500 text-white ps-5 ms-4">Reporte de Muestreo</legend>
                                        <legend class="rounded float-none d-sm-none bg-green-500 text-white fs-6 p-1">Reporte de Muestreo</legend>
                             <div class="ms-4">
                                <div class="table-responsive">
                                <table class="table w-100">
                                 <tbody>
                                    <tr>
                                        <td>
                                            <div class="mt-3 text-center">
                                            <label class="label-control text-center">Muestra</label>
                                           </div>
                                        </td>
                                        <td>
                                            <div class="form-floating">
                                                <input class="form-control rounded @error('cantidad') is-invalid @enderror" name="" placeholder="Cantidad" type="number" id="floatingInput">
                                               <label for="floatingInput" class="text-lead-500">Cantidad</label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-floating">
                                                <select class="form-select input @error('cliente') is-invalid @enderror" id="floatingSelect">
                                                    <option selected>Seleccionar una opcion</option>
                                                    <option value="Caja">Caja</option>
                                                    <option value="Unidad">Unidad</option>
                                                    <option value="Display">Display</option>
                                                  </select>
                                                  <label for="floatingSelect" class="text-lead-900">cajas o unidades</label>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="mt-3 text-center">
                                            <label class="label-control text-center">Aceptados</label>
                                           </div>
                                        </td>
                                        <td>
                                            <div class="form-floating">
                                                <input class="form-control rounded @error('cantidad') is-invalid @enderror" name="" placeholder="Cantidad" type="number" id="floatingInput">
                                               <label for="floatingInput" class="text-lead-500">Cantidad</label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-floating">
                                                <select class="form-select input @error('cliente') is-invalid @enderror" id="floatingSelect">
                                                    <option selected>Seleccionar una opcion</option>
                                                    <option value="Caja">Caja</option>
                                                    <option value="Unidad">Unidad</option>
                                                    <option value="Display">Display</option>
                                                  </select>
                                                  <label for="floatingSelect" class="text-lead-900">cajas o unidades</label>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="mt-3 text-center">
                                            <label class="label-control text-center">Rechazados</label>
                                           </div>
                                        </td>
                                        <td>
                                            <div class="form-floating">
                                                <input class="form-control rounded @error('cantidad') is-invalid @enderror" name="" placeholder="Cantidad" type="number" id="floatingInput">
                                               <label for="floatingInput" class="text-lead-500">Cantidad</label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-floating">
                                                <select class="form-select input @error('cliente') is-invalid @enderror" id="floatingSelect">
                                                    <option selected>Seleccionar</option>
                                                    <option value="Caja">Caja</option>
                                                    <option value="Unidad">Unidad</option>
                                                    <option value="Display">Display</option>
                                                  </select>
                                                  <label for="floatingSelect" class="text-lead-900">cajas o unidades</label>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="mt-3 text-center">
                                            <label class="label-control">Reprocesados</label>
                                           </div>
                                        </td>
                                        <td>
                                            <div class="form-floating">
                                                <input class="form-control rounded @error('cantidad') is-invalid @enderror" name="" placeholder="Cantidad" type="number" id="floatingInput">
                                               <label for="floatingInput" class="text-lead-500">Cantidad</label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-floating">
                                                <select class="form-select input @error('cliente') is-invalid @enderror" id="floatingSelect">
                                                    <option selected>Seleccionar</option>
                                                    <option value="Caja">Caja</option>
                                                    <option value="Unidad">Unidad</option>
                                                    <option value="Display">Display</option>
                                                  </select>
                                                  <label for="floatingSelect" class="text-lead-900">cajas o unidades</label>
                                            </div>
                                        </td>
                                    </tr>
                                 </tbody>
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
                                <tr>
                                    <td>
                                        <div class="form-floating">
                                            <input class="form-control rounded @error('cantidad') is-invalid @enderror" style="width: 100px" name="" placeholder="Cantidad" type="number" id="floatingInput">
                                           <label for="floatingInput" class="text-lead-500">Cantidad</label>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-floating">
                                            <select class="form-select input @error('cliente') is-invalid @enderror" style="width: 150px" id="floatingSelect">
                                                <option selected>Seleccionar</option>
                                                <option value="Caja">Caja</option>
                                                <option value="Unidad">Unidad</option>
                                                <option value="Display">Display</option>
                                              </select>
                                              <label for="floatingSelect" class="text-lead-900">cajas o unidades</label>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-floating">
                                            <select class="form-select input @error('cliente') is-invalid @enderror" style="width: 150px" id="floatingSelect">
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
                                            <textarea class="form-control rounded" style="width: 320px" placeholder="Observación" id="floatingTextarea"></textarea>
                                            <label for="floatingTextarea" class="text-lead-500">Observación</label>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-floating">
                                            <input class="form-control rounded @error('cantidad') is-invalid @enderror" style="width: 300px" name="" placeholder="Cantidad" type="file" id="floatingInput">
                                           <label for="floatingInput" class="text-lead-500">Imagen</label>
                                        </div>
                                    </td>
                                </tr>
                                </table>
                                </div>
                               </div>
                               <div class="col-md-6">
                                <button class="btn btn-sm"><i class="fa-solid fa-plus" style="color: #27b050;"></i> Agregar campos</button>
                             </div>
                                </fieldset>

                                <div id="firma-electronica" class="col-sm-12 col-md-12 text-center mt-3">
                                    <canvas id="canvas" onchange="handleCanvasChange()"></canvas><br>
                                    <button class="btn btn-sm bg-orange-500 text-white" id="limpiar">Limpiar</button>
                                    <button class="btn btn-sm bg-green-500 text-white" id="guardar">Guardar</button>
                                </div>
                                {{-- <div class="col-12">
                                    <label class="form-label text-orange-500">Observaciones:</label>
                                    <textarea name="endobservations" id="" class="form-control"></textarea>
                                </div> --}}
                                <div class="text-center">
                                    <x-jet-button id="confirmaction" class="mt-4">Confirmar Acciones
                                    </x-jet-button>
                                </div>
                            </div>
            </form>
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
                    <div class="overflow-scroll d-block">
                      <img class="rounded img-thumbnail" width="250" src="" alt="">
                    </div>

                </div>
                <div class="modal-footer">
                    {{-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> --}}
                    {{-- <button type="button" class="btn btn-primary">Save changes</button> --}}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
@section('scripts')
<script>
const canvas = document.getElementById('canvas');
const ctx = canvas.getContext('2d');

let isDrawing = false;
let lastX;
let lastY;

// Función para iniciar el dibujo
function startDrawing(e) {
  isDrawing = true;
  lastX = e.offsetX;
  lastY = e.offsetY;
}

// Función para dibujar
function draw(e) {
  if (!isDrawing) return;

  const currentX = e.offsetX;
  const currentY = e.offsetY;

  ctx.beginPath();
  ctx.moveTo(lastX, lastY);
  ctx.lineTo(currentX, currentY);
  ctx.strokeStyle = 'black';
  ctx.lineWidth = 2;
  ctx.stroke();

  lastX = currentX;
  lastY = currentY;
}

// Función para limpiar el lienzo
function clearCanvas() {
  ctx.clearRect(0, 0, canvas.width, canvas.height);
//   handleCanvasChange(); // Actualiza la página
}

// Función para guardar la firma
function saveSignature() {
  const imageData = canvas.toDataURL('image/png');
  // Aquí deberías enviar la imagen al servidor mediante una petición AJAX
  console.log('Imagen:', imageData);
//   handleCanvasChange(); // Actualiza la página
}

// Función para actualizar la página
function handleCanvasChange() {
  // Envía la imagen al servidor mediante una petición AJAX
  // ...

  // Recarga la página después de recibir la respuesta del servidor
  location.reload();
}

// Eventos
canvas.addEventListener('mousedown', startDrawing);
canvas.addEventListener('mousemove', draw);
document.getElementById('limpiar').addEventListener('click', clearCanvas);
document.getElementById('guardar').addEventListener('click', saveSignature);
</script>

    <script>
        window.addEventListener("load", function(event) {
            var myDropzone = new Dropzone('#imgcorrection', { // Make the whole body a dropzone
                headers: {
                    'X-CSRF-TOKEN': "{{ csrf_token() }}"
                },
                paramName: 'file',
                uploadMultiple: true,
                // acceptedFiles: ['image/*','application/vnd.ms-excel','application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'],
                parallelUploads: 100,
                maxFiles: 4,
                autoProcessQueue: false,
                previewTemplate: '<div class="p-1"><table class="text-center w-100 align-middle table-striped"><tr><td><p data-dz-name></p><strong class="text-danger"data-dz-errormessage></strong></td><td><span data-dz-size></span></td><td> <button data-dz-remove class="btn btn-sm btn-danger"><i class="fas fa-trash-alt"></i></button></td></tr></table></div>',
                previewsContainer: "#previewsimg", // Define the container to display the previews
                clickable: "#imgcorreccion", // Define the element that should be used as click trigger to select files.
                // The setting up of the dropzone
                init: function() {
                    var myDropzone = this;
                    // First change the button to actually tell Dropzone to process the queue.
                    this.element.querySelector("button[type=submit]").addEventListener("click",
                        function(
                            e) {
                            // Make sure that the form isn't actually being sent.
                            e.preventDefault();
                            e.stopPropagation();
                            var count = myDropzone.getAcceptedFiles().length;
                            var inputcheck = $("input[type=checkbox]").length;
                            var countcheck = $("input:checked").length;
                            if (inputcheck != countcheck) {
                                Swal.fire({
                                    title: 'Error!',
                                    text: 'Debe Completar todas las acciones para continuar..',
                                    icon: 'error',
                                    confirmButtonText: 'OK'
                                })
                            } else {
                                if (count > 0) {
                                    myDropzone.processQueue();
                                } else {
                                    $("#imgcorrection").submit();
                                }
                            }
                        });

                    // Listen to the sendingmultiple event. In this case, it's the sendingmultiple event instead
                    // of the sending event because uploadMultiple is set to true.
                    this.on("sendingmultiple", function() {

                        // Gets triggered when the form is actually being sent.
                        // Hide the success button or the complete form.
                    });
                    this.on("successmultiple", function(files, response) {
                        // Gets triggered when the files have successfully been sent.
                        // Redirect user or notify of success.
                        // console.log(response);
                        // console.log(files);
                        window.location = response
                    });
                    this.on("errormultiple", function(files, response) {
                        // Gets triggered when there was an error sending the files.
                        // Maybe show form again, and notify user of error
                        // console.log(files);
                        // console.log(response);
                    });
                }
            });


        })
    </script>
@show
