<div>
    <div class="row">
        <div class="col-sm-12 col-md-3">
            <div class="mb-3">
                <label for="exampleFormControlInput1"
                    class="form-label text-lead-500">N° de ticket
                </label>
                <div class="text-orange-500 fw-bold fs-6">
                    {{$solicitude->clasificacion->codigo_generado}}
                </div>
            </div>
        </div>
        <div class="col-sm-12 col-md-3">
            <div class="mb-3">
                <label for="exampleFormControlInput1"
                    class="form-label text-lead-500">Causal General</label>
                <div class="text-orange-500 fs-6">
                    {{$solicitude->clasificacion->causal_general->name}} 
                </div>
            </div>
        </div>
        <div class="col-sm-12 col-md-3">
            <div class="mb-3">
                <label for="exampleFormControlInput1"
                    class="form-label text-lead-500">Tipo</label>
                <div class="text-orange-500 fw-bold fs-6">
                    {{$solicitude->tipo_reclamo->name}}
                </div>
            </div>
        </div>
        <div class="col-sm-12 col-md-3">
            <div class="mb-3">
                <label for="exampleFormControlInput1"
                    class="form-label text-lead-500">Cliente</label>
                <div class="text-orange-500 fw-bold fs-6">
                    {{$solicitude->cliente}}
            </div>
        </div>
        </div>
        <div class="col-sm-6 col-md-3">
            <div class="mb-3">
                <label for="exampleFormControlInput1"
                    class="form-label text-lead-500">Detalle Causal</label>
                <div class="text-orange-500 fs-6">
                    {{$solicitude->clasificacion->detalle_causal->name}} 
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-md-3">
            <div class="mb-3">
                <label for="exampleFormControlInput1"
                    class="form-label text-lead-500">Sede</label>
                <div class="text-orange-500 fs-6">
                    {{$solicitude->sede->name}}
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-md-3">
            <div class="mb-3">
                <label for="exampleFormControlInput1"
                    class="form-label text-lead-500">Servicio Contratado</label>
                <div class="text-orange-500 fs-6">
                    {{$solicitude->servicio_ransa->name}}
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-md-3">
            <div class="mb-3">
                <label for="exampleFormControlInput1"
                    class="form-label text-lead-500">Sub Servicio</label>
                <div class="text-orange-500 fs-6">
                    {{$solicitude->adicional->name}}
                </div>
            </div>
        </div>
        <div class="col-sm-12 col-md-6">
            <div class="mb-3">
                <label for="exampleFormControlInput1"
                    class="form-label text-lead-500">Descripcion</label>
                <div class="text-orange-500 fs-6">
                    {{$solicitude->Descripcion}}
                </div>
            </div>
        </div>
         
    </div>
</div>
