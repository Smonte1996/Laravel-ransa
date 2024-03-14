<x-app-layout>
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>Guia de remicion de Maquila a Operación</h3>
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
                            <h2>listado Guia de remición de Maquila a Operación</h2>
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
                                        <th>N° Guia</th>
                                        <th data-priority="1">Proveedor</th>
                                        <th>Fecha de la Solicitud</th>
                                        <th>Estado</th>
                                        <th>Acción</th>
                                    </tr>
                                </thead>
                                <tbody>
                                   @foreach ($Cabecera as $Cabeceras )
                                       <tr>
                                        <td>{{ $Cabeceras->id }}</td>
                                        <td> <strong>{{ $Cabeceras->Cabecera->codigo }}</strong></td>
                                        <td> <strong>{{ $Cabeceras->n_guia }}</strong></td>
                                        <td>{{ $Cabeceras->Cabecera->Proveedores->social_reason }}</td>
                                        <td>{{ $Cabeceras->Cabecera->fecha }}</td>
                                        <td>
                                            @switch($Cabeceras->estado)
                                                @case(2)
                                                <span class="bg-lead-500 p-1 rounded text-white">En confirmación</span>
                                                    @break
                                                    @case(1)
                                                 <span class="bg-orange-500 p-1 rounded text-white">Abierta</span>
                                                    @break
                                                    <!-- @case(3)
                                                    <span class="bg-green-500 p-1 rounded text-white">Cerrado</span>
                                                    @break -->
                                                    @case(4)
                                                    <span class="bg-green-500 p-1 rounded text-white">Recibir</span>
                                                    @break
                                                @default

                                            @endswitch
                                        </td>
                                        <td>
                                            <div class="btn-group btn-group-sm" role="group">
                                                <a href="{{ route('adm.pdf.guia.operacion', encrypt($Cabeceras->cabecera_id)) }}" target="_blank" class="btn btn-green-500 text-white border"><i class="fa fa-file-pdf"></i></a>

                                                <a href="{{ route('adm.Confirmar.Maquila', encrypt($Cabeceras->cabecera_id)) }}" class="btn btn-orange-500 text-white border"><i class="fa fa-info"></i></a>
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
