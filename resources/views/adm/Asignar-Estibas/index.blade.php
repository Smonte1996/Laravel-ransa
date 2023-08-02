<x-app-layout>
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>Listado de Programación</h3>
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
                            <h2>Programación</h2>

                            <div class="clearfix"></div>
                        </div>
                        <div class="">
                            <a class="btn-green-500 btn text-white btn-sm" href="#">EXCEL</a>

                        </div>
                        <div class="x_content">
                            <table id="Asignacion-estibas" class="table text-green-500 align-middle table-hover" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th data-priority="1">Solicitado</th>
                                        <th>fecha de Prog.</th>
                                        <th>Hora</th>
                                        <th>Cliente</th>
                                        <th>Actividad</th>
                                        <th>Comentario</th>
                                        <th>Hora de Registro</th>
                                        <th>Acción</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    {{-- @foreach ( $Niveles as $Nivel )  --}}
                                    <tr>
                                        
                                         <td>
                                           {{-- {{$Nivel->id}} --}}
                                        </td>

                                        <td>
                                            {{-- {{$Nivel->name}} --}}
                                        </td>
                                            
                                        <td>
                                            {{-- {{$Nivel->created_at}} --}}
                                        </td>

                                        <td>

                                        </td>

                                        <td>

                                        </td>

                                        <td>

                                        </td>

                                        <td>

                                        </td>

                                        <td>

                                        </td>

                                         <td>
                                            <a href="#" class="btn btn-orange-500 text-white border" >
                                                <i class="fa-solid fa-pen"></i>
                                            </a>
                                        </td> 
       
                                    </tr>
                                     {{-- @endforeach  --}}
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
