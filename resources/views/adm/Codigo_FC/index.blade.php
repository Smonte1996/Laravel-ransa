<x-app-layout>
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>Codigos</h3>
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
                            <h2>Listado de Codigos</h2>

                            <div class="clearfix"></div>
                        </div>
                        <div class="">
                            <a class="btn-green-500 btn text-white btn-sm" href="{{ route('adm.codigo.fc.create') }}">Registrar</a>
                        </div>

                        <div class="x_content">
                            <table id="reclamos" class="table align-middle table-hover" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>id</th>
                                        <th>Cliente</th>
                                        <th>Codigo</th>
                                        <th>Descripción</th>
                                        <th>FC</th>
                                        <th>Acción</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ( $Codigos as $Codi )
                                    <tr>
                                     <td> {{ $Codi->id }} </td>
                                     <td>{{ $Codi->Cliente->social_reason }}</td>
                                     <td>{{ $Codi->codigo }}</td>
                                     <td>{{ $Codi->descripcion }}</td>
                                     <td>{{ $Codi->fc }}</td>
                                     <td>
                                        <div class="btn-group btn-group-sm" role="group">
                                            <a href="" class="btn btn-orange-500 text-white border" >
                                                <i class="fa-solid fa-pen"></i>
                                            </a>

                                            <a href="" class="btn btn-danger text-white border" >
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
