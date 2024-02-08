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
                            <a class="btn-orange-500 btn text-white btn-sm" href="{{ route('adm.codigo.fc.index') }}"><i
                                    class="fa fa-solid fa-arrow-left"></i>
                                Regresar</a>
                        </div>
                        <div class="x_content">
                            <form action="{{route('adm.codigo.fc.store')}}" method="post">
                                @csrf
                                <div class="row">
                                    <div class="mb-3 col-sm-12 col-md-4">
                                        <label for="" class="form-label fs-6 text-lead-500">Cliente</label>
                                        <select class="form-select @error('cliente') is-invalid @enderror"
                                            name="cliente" id="cliente" placeholder="Cliente" value="{{ old('cliente') }}">
                                            <option value="">Seleccionar una opcción </option>
                                            @foreach ($Clientes as $Client )
                                                <option value="{{ $Client->id }}">{{ $Client->social_reason }}</option>
                                            @endforeach
                                        </select>
                                            @error('cliente')
                                                <small id="clientehelpId"
                                                    class="form-text text-muted invalid-feedback">{{ $message }}</small>
                                            @enderror
                                        </div>


                                        <div class="mb-3 col-sm-12 col-md-4">
                                            <label for="" class="form-label fs-6 text-lead-500">Codigo</label>
                                           <input type="text" class="form-control @error('codigo') is-invalid @enderror"
                                            name="codigo" id="codigo"  aria-describedby="codigohelpId"
                                            placeholder="Nuevo codigo" value="{{ old('codigo') }}">
                                            @error('codigo')
                                                <small id="codigohelpId"
                                                    class="form-text text-muted invalid-feedback">{{ $message }}</small>
                                            @enderror
                                        </div>

                                        <div class="mb-3 col-sm-12 col-md-4">
                                            <label for="" class="form-label fs-6 text-lead-500">Descripción</label>
                                           <input type="text" class="form-control @error('descripcion') is-invalid @enderror"
                                            name="descripcion" id="descripcion"  aria-describedby="descripcionhelpId"
                                            placeholder="Nueva Tarifa serypro" value="{{ old('descripcion') }}">
                                            @error('descripcion')
                                                <small id="descripcionhelpId"
                                                    class="form-text text-muted invalid-feedback">{{ $message }}</small>
                                            @enderror
                                        </div>

                                        <div class="mb-3 col-sm-12 col-md-4">
                                            <label for="" class="form-label fs-6 text-lead-500">FC</label>
                                           <input type="text" class="form-control @error('fc') is-invalid @enderror"
                                            name="fc" id="Tarifa dprissa"  aria-describedby="fchelpId"
                                            placeholder="Nueva fc" value="{{ old('fc') }}">
                                            @error('fc')
                                                <small id="fchelpId"
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
