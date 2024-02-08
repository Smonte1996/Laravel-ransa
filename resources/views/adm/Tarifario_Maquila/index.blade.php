<x-app-layout>
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>Listado de la Actividades</h3>
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

            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Actividades - Tarifario</h2>

                            <div class="clearfix"></div>
                        </div>
                        <div class="">
                            <a class="btn-green-500 btn text-white btn-sm" href="{{ route('adm.Tarifa.Maquila.create') }}">Registrar</a>

                        </div>
                        <div class="x_content">
                            <table id="reclamos" class="table text-green-500 align-middle table-hover" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>id</th>
                                        <th data-priority="1">cliente</th>
                                        <th>Servicio</th>
                                        <th>Actividadees</th>
                                        {{-- <th>Factor de conversión</th> --}}
                                        <th data-priority="1">Tarifa Serypro</th>
                                        <th>Tarifa Dprissa</th>
                                        <th>Tarifa Cliente</th>
                                        <th>Observación</th>
                                        <th>Accion</th>
                                    </tr>
                                </thead>
                                <tbody>
                                   @foreach ( $Activi as $Acti )
                                    <tr>
                                        <td>{{ $Acti->id }}</td>
                                        <td>{{ $Acti->clientes->social_reason }}</td>
                                        <td>{{ $Acti->Servicios->name }}</td>
                                         <td>{{ $Acti->actividad }}</td>
                                         {{-- <td>{{ $Acti->factor_conversion }}</td> --}}
                                         <td>{{ $Acti->tarifa_serypro }}</td>
                                         <td>{{ $Acti->tarifa_dprissa }}</td>
                                         <td>{{ $Acti->tarifa_cliente }}</td>
                                         <td>{{ $Acti->observacion }}</td>
                                        <td>
                                            <div class="btn-group btn-group-sm" role="group">
                                            <a href="{{ route('adm.Tarifa.Maquila.edit', encrypt($Acti->id)) }}" class="btn btn-orange-500 text-white border" >
                                                <i class="fa-solid fa-pen"></i>
                                            </a>

                                            <a href="{{ route('adm.Actividad.eliminar', encrypt($Acti->id)) }}" class="btn btn-danger text-white border" >
                                                <i class="fa fa-trash-can"></i>
                                            </a>
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
