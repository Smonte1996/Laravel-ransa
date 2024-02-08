<x-app-layout>
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>Actividades Maquila</h3>
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
                            <h2>Editar Actividad</h2>

                            <div class="clearfix"></div>
                        </div>
                        <div class="">
                            <a class="btn-orange-500 btn text-white btn-sm" href="{{ route('adm.Tarifa.Maquila.index') }}"><i
                                    class="fa fa-solid fa-arrow-left"></i>
                                Regresar</a>
                        </div>
                        <div class="x_content">
                            <form action="{{route('adm.Tarifa.Maquila.update', $Tarifas)}}" method="post">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="mb-3 col-sm-12 col-md-4">
                                        <label for="" class="form-label fs-6 text-lead-500">Cliente</label>
                                        <select  class="form-control @error('cliente') is-invalid @enderror"
                                            name="cliente" id="cliente" aria-describedby="clientehelpId"
                                            placeholder="Cliente">
                                            <option value="">Seleccionar</option>
                                         @foreach ($clientes as $client)
                                             <option @selected($client->social_reason == $Tarifas->clientes->social_reason) value="{{ $client->id }}">{{ $client->social_reason }}</option>
                                         @endforeach
                                         </select>
                                            @error('cliente')
                                                <small id="clientehelpId"
                                                    class="form-text text-muted invalid-feedback">{{ $message }}</small>
                                            @enderror
                                        </div>

                                        <div class="mb-3 col-sm-12 col-md-4">
                                            <label for="" class="form-label fs-6 text-lead-500">Servicio</label>
                                           <select class="form-control @error('Factor') is-invalid @enderror"
                                            name="Servicio" id="Factor" placeholder="Nuevo Factor de conversión">
                                            @foreach ( $servicio as $Servit )
                                            <option @selected($Servit->name == $Tarifas->Servicios->name) value="{{ $Servit->id}}">{{ $Servit->name }}</option>
                                            @endforeach
                                           </select>
                                            @error('Factor')
                                                <small id="FactorhelpId"
                                                    class="form-text text-muted invalid-feedback">{{ $message }}</small>
                                            @enderror
                                        </div>

                                        <div class="mb-3 col-sm-12 col-md-4">
                                            <label for="" class="form-label fs-6 text-lead-500">Actividad</label>
                                           <input type="text" class="form-control @error('actividad') is-invalid @enderror"
                                            name="actividad" id="actividad"  aria-describedby="actividadhelpId"
                                            placeholder="Nuevo Actividad" value="{{ old('actividad', $Tarifas->actividad) }}">
                                            @error('actividad')
                                                <small id="actividadhelpId"
                                                    class="form-text text-muted invalid-feedback">{{ $message }}</small>
                                            @enderror
                                        </div>



                                        <div class="mb-3 col-sm-12 col-md-4">
                                            <label for="" class="form-label fs-6 text-lead-500">Tarifa Serypro</label>
                                           <input type="text" class="form-control @error('Tarifa') is-invalid @enderror"
                                            name="Tarifa_serypro" id="Tarifa"  aria-describedby="TarifahelpId"
                                            placeholder="Nueva Tarifa" value="{{ old('Tarifa', $Tarifas->tarifa_serypro) }}">
                                            @error('Tarifa')
                                                <small id="TarifahelpId"
                                                    class="form-text text-muted invalid-feedback">{{ $message }}</small>
                                            @enderror
                                        </div>

                                        <div class="mb-3 col-sm-12 col-md-4">
                                            <label for="" class="form-label fs-6 text-lead-500">Tarifa Dprissa</label>
                                           <input type="text" class="form-control @error('Tarifa') is-invalid @enderror"
                                            name="Tarifa_dprissa" id="Tarifa"  aria-describedby="TarifahelpId"
                                            placeholder="Nueva Tarifa" value="{{ old('Tarifa', $Tarifas->tarifa_dprissa) }}">
                                            @error('Tarifa')
                                                <small id="TarifahelpId"
                                                    class="form-text text-muted invalid-feedback">{{ $message }}</small>
                                            @enderror
                                        </div>

                                        <div class="mb-3 col-sm-12 col-md-4">
                                            <label for="" class="form-label fs-6 text-lead-500">Tarifa Cliente</label>
                                           <input type="text" class="form-control @error('Tarifa') is-invalid @enderror"
                                            name="Tarifa_cliente" id="Tarifa"  aria-describedby="TarifahelpId"
                                            placeholder="Nueva Tarifa" value="{{ old('Tarifa', $Tarifas->tarifa_cliente) }}">
                                            @error('Tarifa')
                                                <small id="TarifahelpId"
                                                    class="form-text text-muted invalid-feedback">{{ $message }}</small>
                                            @enderror
                                        </div>

                                        <div class="mb-3 col-sm-12 col-md-4">
                                            <label for="" class="form-label fs-6 text-lead-500">Observación</label>
                                           <input type="text" class="form-control @error('Observacion') is-invalid @enderror"
                                            name="Observacion" id="Observacion"  aria-describedby="ObservacionhelpId"
                                            placeholder="Nueva Observación" value="{{ old('Observacion', $Tarifas->observacion) }}">
                                            @error('Observacion')
                                                <small id="ObservacionhelpId"
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
