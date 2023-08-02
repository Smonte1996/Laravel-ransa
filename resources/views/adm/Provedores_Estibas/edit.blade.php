<x-app-layout>
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>Editar Proveedores de estibas</h3>
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
                            <h2>Editar Proveedores de estibas</h2>
                           
                            <div class="clearfix"></div>
                        </div>
                        <div class="">
                            <a class="btn-orange-500 btn text-white btn-sm" href="{{route('adm.Estibas.index')}}"><i
                                    class="fa fa-solid fa-arrow-left"></i>
                                Regresar</a>
                        </div>
                        <div class="x_content">
                            <form action="#" method="post">
                                @csrf
                                <div class="row">
                                    <div class="mb-3 col-sm-12 col-md-4">
                                        <label for="" class="form-label fs-6 text-lead-500">Ruc:</label>
                                        <input type="text" class="form-control @error('ruc') is-invalid @enderror"
                                            name="ruc" id="ruc" aria-describedby="ruchelpId"
                                            placeholder="Ruc del los estibas" value="{{ old('ruc') }}">
                                            @error('ruc')
                                                <small id="ruchelpId"
                                                    class="form-text text-muted invalid-feedback">{{ $message }}</small>
                                            @enderror
                                        </div>
                                        <div class="mb-3 col-sm-12 col-md-4">
                                            <label for="" class="form-label fs-6 text-lead-500">Nombre:</label>
                                            <input type="text" class="form-control @error('nombre') is-invalid @enderror"
                                                name="nombre" id="nombre" aria-describedby="nombrehelpId"
                                                placeholder="Nombre de los estibas" value="{{ old('nombre') }}">
                                                @error('nombre')
                                                    <small id="nombrehelpId"
                                                        class="form-text text-muted invalid-feedback">{{ $message }}</small>
                                                @enderror
                                            </div>
                                                <div class="mb-3 col-sm-12 col-md-4">
                                                    <label for="" class="form-label fs-6 text-lead-500">Correo:</label>
                                                    <input type="email" class="form-control @error('email') is-invalid @enderror"
                                                        name="email" id="email" aria-describedby="emailhelpId"
                                                        placeholder="Correo de los estibas" value="{{ old('email') }}">
                                                        @error('email')
                                                            <small id="emailhelpId"
                                                                class="form-text text-muted invalid-feedback">{{ $message }}</small>
                                                        @enderror
                                                </div>
                                                <div class="mb-3 col-sm-12 col-md-4">
                                                    <label for="" class="form-label fs-6 text-lead-500">Contraseña:</label>
                                                    <input type="password" class="form-control @error('contraseña') is-invalid @enderror"
                                                        name="contraseña" id="contraseña" aria-describedby="contraseñahelpId"
                                                        placeholder="Contraseña" value="{{ old('contraseña') }}">
                                                        @error('contraseña')
                                                            <small id="contraseñahelpId"
                                                                class="form-text text-muted invalid-feedback">{{ $message }}</small>
                                                        @enderror
                                                </div>
                                                
                                </div>
                                <x-jet-button type="submit">Registrar</x-jet-button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>