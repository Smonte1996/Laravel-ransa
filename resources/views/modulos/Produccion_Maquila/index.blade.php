<x-app-layout>
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>Trabajos Maquila Abiertos</h3>
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
                            <h2>Solicitudes Trabajo Maquila</h2>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            </div>

                            <table id="reclamos"
                                class="text-green-500 table align-middle table-hover dt-responsive" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Orden de Trabajo</th>
                                        <th>Cantidad</th>
                                        <th data-priority="1">Proveedor</th>
                                        <th>Fecha de la Solicitud</th>
                                        <th>Actividad</th>
                                        <th>Cliente</th>
                                        <th data-priority="2">Codigo a crear</th>
                                        <th>Solicitud</th>
                                        <th>Estado</th>
                                        <th>Acción</th>
                                    </tr>
                                </thead>
                                <tbody>
                                   @foreach ($Cabeceras as $Cabecera )
                                       <tr>
                                        <td>{{ $Cabecera->id }}</td>
                                        <td> <strong>{{ $Cabecera->codigo }}</strong></td>
                                        <td>{{ $Cabecera->cantidad }} {{ $Cabecera->cj_un }}</td>
                                        <td>{{ $Cabecera->Proveedores->social_reason }}</td>
                                        <td>{{ $Cabecera->fecha }}</td>
                                        <td style="white-space: pre-line;">@foreach ($Cabecera->Tarifarios as $activid )
                                            {{ $activid->actividad }}
                                        @endforeach</td>
                                        <td>{{ $Cabecera->Clientes->social_reason }}</td>
                                        <td>{{ $Cabecera->CodigoF->codigo }}</td>
                                        <td>{{ $Cabecera->solicitud }}</td>
                                        <td>
                                            @switch($Cabecera->estado)
                                                @case(4)
                                                <span class="bg-green-500 p-1 rounded btn-group btn-group-sm text-white" style="font-size: 11px">En Proceso</span>
                                                    @break
                                                  @case(3)
                                                  <span class="bg-orange-500 p-1 rounded btn-group text-white">En espera</span>
                                                  @break
                                                   @case(5)
                                                  <span class="bg-orange-500 p-1 rounded text-white">Cerrado</span>
                                                  @break
                                                  @case(2)
                                                  <span class="bg-green-500 p-1 rounded btn-group btn-group-sm text-white" style="font-size: 11px">Espera de confirmación</span>
                                                  @break
                                                @default

                                            @endswitch
                                        </td>
                                        <td>
                                            <div class="btn-group btn-group-sm" role="group">
                                                {{--  <a href="{{ route('adm.Reporte.muestreo.maquila', encrypt($Cabecera->id)) }}" class="btn btn-green-500 text-white border" target="_blank" style="font-size:11px"><i class="fa fa-file-pdf"></i> Reporte de Muestreo</a>  --}}

                                                @switch($Cabecera->estado)
                                                    @case(3)
                                                    <a href="{{ route('adm.Maquila.Actividad', encrypt($Cabecera->id)) }}" class="btn btn-orange-500 text-white border" style="font-size:11px"><i class="fa fa-info"></i> Guias Maquila </a>
                                                    <a href="{{ route('adm.Informe.avances.maquila', encrypt($Cabecera->id)) }}" class="btn btn-lead-500 text-white border" target="_blank" style="font-size:11px"><i class="fa fa-file-pdf"></i> Informe de Avances</a>
                                                        @break

                                                    @default

                                                @endswitch

                                            </div>
                                        </td>
                                       </tr>
                                   @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
