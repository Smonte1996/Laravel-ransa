<div>
    <fieldset class="border border-2 mb-3">
        <legend class="rounded w-50 d-none d-sm-block float-none bg-green-500 text-white ps-5 ms-4">Información general</legend>
         <legend class="rounded float-none d-sm-none bg-green-500 text-white fs-6 p-1">Información general</legend>
    <div class="row m-0">
        <div class="col-sm-12 col-md-3">
            <div class="mb-3">
                <label for="exampleFormControlInput1"
                    class="form-label text-lead-900">N° de ticket
                </label>
                <div class="text-lead-500 fw-bold fs-6">
                    {{$solicitude->clasificacion->codigo_generado}}
                </div>
            </div>
        </div>
        <div class="col-sm-12 col-md-3">
            <div class="mb-3">
                <label for="exampleFormControlInput1"
                    class="form-label text-lead-900">Causal General</label>
                <div class="text-lead-500 fs-6">
                    {{$solicitude->clasificacion->causal_general->name}} 
                </div>
            </div>
        </div>
        <div class="col-sm-12 col-md-3">
            <div class="mb-3">
                <label for="exampleFormControlInput1"
                    class="form-label text-lead-900">Tipo</label>
                <div class="text-lead-500 fw-bold fs-6">
                    {{$solicitude->tipo_reclamo->name}}
                </div>
            </div>
        </div>
        <div class="col-sm-12 col-md-3">
            <div class="mb-3">
                <label for="exampleFormControlInput1"
                    class="form-label text-lead-900">Cliente</label>
                <div class="text-lead-500 fw-bold fs-6">
                    {{$solicitude->cliente}}
            </div>
        </div>
        </div>
        <div class="col-sm-6 col-md-3">
            <div class="mb-3">
                <label for="exampleFormControlInput1"
                    class="form-label text-lead-900">Detalle Causal</label>
                <div class="text-lead-500 fs-6">
                    {{$solicitude->clasificacion->detalle_causal->name}} 
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-md-3">
            <div class="mb-3">
                <label for="exampleFormControlInput1"
                    class="form-label text-lead-900">Sede</label>
                <div class="text-lead-500 fs-6">
                    {{$solicitude->sede->name}}
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-md-3">
            <div class="mb-3">
                <label for="exampleFormControlInput1"
                    class="form-label text-lead-900">Servicio Contratado</label>
                <div class="text-lead-500 fs-6">
                    {{$solicitude->servicio_ransa->name}}
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-md-3">
            <div class="mb-3">
                <label for="exampleFormControlInput1"
                    class="form-label text-lead-900">Sub Servicio</label>
                <div class="text-lead-500 fs-6">
                    {{$solicitude->adicional->name}}
                </div>
            </div>
        </div>
        <div class="col-sm-12 col-md-6">
            <div class="mb-3">
                <label for="exampleFormControlInput1"
                    class="form-label text-lead-900">Descripcion</label>
                <div class="text-lead-500 fs-6">
                    {{$solicitude->Descripcion}}
                </div>
            </div>
        </div>
         
    </div>
    </fieldset>
</div>
