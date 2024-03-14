<x-app-layout>
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>Listado de Guias de remicion</h3>
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
                            <h2>listado Guias</h2>
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
                                   @foreach ($listado as $listados )
                                       <tr>
                                        <td>{{ $listados->id }}</td>
                                        <td> <strong>{{ $listados->Cabecera->codigo }}</strong></td>
                                        <td> <strong>{{ $listados->n_guia }}</strong></td>
                                        <td>{{ $listados->Cabecera->Proveedores->social_reason }}</td>
                                        <td>{{ $listados->Cabecera->fecha }}</td>
                                        <td>

                                           @switch($listados->estado)
                                                    @case(3)
                                                    <span class="bg-green-500 p-1 rounded text-white">Cerrado Operación - Maquila</span>
                                                    @break
                                                    @case(5)
                                                    <span class="bg-orange-500 p-1 rounded text-white">Cerrado Maquila - Operación</span>
                                                    @break
                                                @default

                                            @endswitch
                                        </td>
                                        <td>
                                            <div class="btn-group btn-group-sm" role="group">

                                                @switch($listados->estado)
                                                    @case(3)
                                                    <a href="{{ route('adm.pdf.guia.operacion', encrypt($listados->cabecera_id)) }}" target="_blank" class="btn btn-green-500 text-white border"><i class="fa fa-file-pdf"></i></a>
                                                        @break
                                                        @case(5)
                                                        <a href="{{ route('adm.Guia.confirmacion.maquila', encrypt($listados->id)) }}" target="_blank" class="btn btn-orange-500 text-white border"><i class="fa fa-file-pdf"></i></a>
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
