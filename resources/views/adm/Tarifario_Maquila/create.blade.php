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
                            <h2>Registro de Nueva Actividad</h2>

                            <div class="clearfix"></div>
                        </div>
                        <div class="">
                            <a class="btn-orange-500 btn text-white btn-sm" href="{{ route('adm.Tarifa.Maquila.index') }}"><i
                                    class="fa fa-solid fa-arrow-left"></i>
                                Regresar</a>
                        </div>
                        <div class="x_content">
                            <form action="{{route('adm.Tarifa.Maquila.store')}}" method="post">
                                @csrf
                                <div class="row">
                                    <div class="mb-3 col-sm-12 col-md-4">
                                        <label for="" class="form-label fs-6 text-lead-500">Cliente</label>
                                        <select class="form-select @error('cliente') is-invalid @enderror"
                                            name="cliente" id="cliente" placeholder="Cliente" value="{{ old('cliente') }}">
                                            <option value="">Seleccionar una opcción </option>
                                            @foreach ($cliente as $Client )
                                                <option value="{{ $Client->id }}">{{ $Client->social_reason }}</option>
                                            @endforeach
                                        </select>
                                            @error('cliente')
                                                <small id="clientehelpId"
                                                    class="form-text text-muted invalid-feedback">{{ $message }}</small>
                                            @enderror
                                        </div>

                                        <div class="mb-3 col-sm-12 col-md-4">
                                            <label for="" class="form-label fs-6 text-lead-500">Servicio</label>
                                            <select class="form-select @error('serivicio') is-invalid @enderror"
                                                name="servicio" id="serivicio" placeholder="serivicio" value="{{ old('serivicio') }}">
                                                <option value="">Seleccionar una opcción</option>
                                                @foreach ($servicio as $service)
                                                    <option value="{{ $service->id }}">{{ $service->name }}</option>
                                                @endforeach
                                            </select>
                                                @error('serivicio')
                                                    <small id="seriviciohelpId"
                                                        class="form-text text-muted invalid-feedback">{{ $message }}</small>
                                                @enderror
                                        </div>

                                        <div class="mb-3 col-sm-12 col-md-4">
                                            <label for="" class="form-label fs-6 text-lead-500">Actividad</label>
                                           <input type="text" class="form-control @error('actividad') is-invalid @enderror"
                                            name="actividad" id="actividad"  aria-describedby="actividadhelpId"
                                            placeholder="Nuevo Actividad" value="{{ old('actividad') }}">
                                            @error('actividad')
                                                <small id="actividadhelpId"
                                                    class="form-text text-muted invalid-feedback">{{ $message }}</small>
                                            @enderror
                                        </div>

                                        {{-- <div class="mb-3 col-sm-12 col-md-4">
                                            <label for="" class="form-label fs-6 text-lead-500">Factor de conversión</label>
                                           <input type="number" class="form-control @error('Factor') is-invalid @enderror"
                                            name="Factor" id="Factor"  aria-describedby="FactorhelpId"
                                            placeholder="Nuevo Factor de conversión" value="{{ old('Factor') }}">
                                            @error('Factor')
                                                <small id="FactorhelpId"
                                                    class="form-text text-muted invalid-feedback">{{ $message }}</small>
                                            @enderror
                                        </div> --}}

                                        <div class="mb-3 col-sm-12 col-md-4">
                                            <label for="" class="form-label fs-6 text-lead-500">Tarifa Serypro</label>
                                           <input type="text" class="form-control @error('Tarifa_serypro') is-invalid @enderror"
                                            name="Tarifa_serypro" id="Tarifa_serypro"  aria-describedby="Tarifa_seryprohelpId"
                                            placeholder="Nueva Tarifa serypro" value="{{ old('Tarifa_serypro') }}">
                                            @error('Tarifa_serypro')
                                                <small id="Tarifa_seryprohelpId"
                                                    class="form-text text-muted invalid-feedback">{{ $message }}</small>
                                            @enderror
                                        </div>

                                        <div class="mb-3 col-sm-12 col-md-4">
                                            <label for="" class="form-label fs-6 text-lead-500">Tarifa Dprissa</label>
                                           <input type="text" class="form-control @error('Tarifa_dprissa') is-invalid @enderror"
                                            name="Tarifa_dprissa" id="Tarifa dprissa"  aria-describedby="Tarifa_dprissahelpId"
                                            placeholder="Nueva Tarifa_dprissa" value="{{ old('Tarifa_dprissa') }}">
                                            @error('Tarifa_dprissa')
                                                <small id="Tarifa_dprissahelpId"
                                                    class="form-text text-muted invalid-feedback">{{ $message }}</small>
                                            @enderror
                                        </div>

                                        <div class="mb-3 col-sm-12 col-md-4">
                                            <label for="" class="form-label fs-6 text-lead-500">Tarifa Cliente</label>
                                           <input type="text" class="form-control @error('Tarifa_cliente') is-invalid @enderror"
                                            name="Tarifa_cliente" id="Tarifa_cliente"  aria-describedby="Tarifa_clientehelpId"
                                            placeholder="Nueva Tarifa cliente" value="{{ old('Tarifa_cliente') }}">
                                            @error('Tarifa_cliente')
                                                <small id="Tarifa_clientehelpId"
                                                    class="form-text text-muted invalid-feedback">{{ $message }}</small>
                                            @enderror
                                        </div>

                                        <div class="mb-3 col-sm-12 col-md-4">
                                            <label for="" class="form-label fs-6 text-lead-500">Observación</label>
                                           <input type="text" class="form-control @error('Observacion') is-invalid @enderror"
                                            name="Observacion" id="Observacion"  aria-describedby="ObservacionhelpId"
                                            placeholder="Nueva Observación" value="{{ old('Observacion') }}">
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
