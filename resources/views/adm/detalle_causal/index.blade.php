<x-app-layout>
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>Listado de Detalle Causal</h3>
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
                            <h2>Listado de Detalle Causal </h2>
                            {{-- <ul class="nav navbar-right panel_toolbox">
                                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                </li>
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-bs-toggle="dropdown" role="button"
                                        aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <a class="dropdown-item" href="#">Settings 1</a>
                                        <a class="dropdown-item" href="#">Settings 2</a>
                                    </div>
                                </li>
                                <li><a class="close-link"><i class="fa fa-close"></i></a>
                                </li>
                            </ul> --}}

                            <div class="clearfix"></div>
                        </div>
                        <div class="">
                            <a class="btn-green-500 btn text-white btn-sm" href="{{ route('adm.Detalle.create') }}">Registrar</a>

                        </div>
                        <div class="x_content">
                            <table id="reclamos" class="table text-green-500 align-middle table-hover" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>id</th>
                                        <th>name</th>
                                        <th>Causal General</th>
                                        <th>F. Creado</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ( $detalles as $detalle )
                                    <tr>
                                        
                                        <td>
                                           {{$detalle->id}}
                                        </td>

                                        <td>
                                            {{$detalle->name}}
                                        </td>

                                        <td>
                                             {{$detalle->causal_general->name}} 
                                        </td>

                                        <td>
                                            {{$detalle->created_at}}
                                        </td>

                                        <td>
                                            Eliminar
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
