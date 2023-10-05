<div>
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>Practicas sde Higienes</h3>
                </div>

                <div class="title_right">
                    <div class="col-md-5 col-sm-5 form-group pull-right top_search">
                        <div class="input-group">
                                <button class="btn btn-green-500 text-white rounded" type="button" data-bs-toggle="modal"
                                data-bs-target="#exampleModal">Tabla de valorización</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Formulario Practicas de higienes</h2>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <div class="row">
                                    <div class="col-sm-12 col-md-4">
                                    <div class="mb-3">
                                    <label for="fecha" class="form-label fs-6 text-lead-500">Fecha:</label>
                                    <input type="date" class="form-control rounded @error('fecha') is-invalid @enderror" wire:model.defer="Fecha" name="fecha" id="fecha">                               
                                        @error('fecha')
                                            <small id="fechahelpId"
                                                class="form-text text-muted invalid-feedback">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                
                                    <div class="col-sm-12 col-md-4">
                                        <div class="mb-3">
                                    <label for="evaluador" class="form-label fs-6 text-lead-500">Evaluador:</label>
                                    <select class="form-control rounded @error('evaluador') is-invalid @enderror" wire:model.defer="evaluador" name="evaluador" id="evaluador">                               
                                       <option value="">Seleccionar una opción </option>
                                       <option value="Walter Fuentes">Walter Fuentes</option>
                                       <option value="Charly Bozada">Charly Bozada</option>
                                       <option value="Evelyn Ganan">Evelyn Ganan</option>
                                    </select>
                                        @error('evaluador')
                                            <small id="evaluadorhelpId"
                                                class="form-text text-muted invalid-feedback">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-sm-12 col-md-4">
                                <div class="mb-3">
                                <label for="almacen" class="form-label fs-6 text-lead-500">Almacén:</label>
                                <select class="form-control rounded @error('almacen') is-invalid @enderror" wire:model.defer="almacen" name="almacen" id="almacen">                               
                                   <option value="">Seleccionar una opción </option>
                                   <option value="Bodega Gye">Bodega Gye</option>
                                   <option value="Bodega Uio">Bodega Uio</option>
                                   <option value="">Provvedor</option>
                                </select>
                                    @error('almacen')
                                        <small id="almacenhelpId"
                                            class="form-text text-muted invalid-feedback">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                      </div>        
                   </div>        
                </div>
            </div>
        </div>
    </div>
   </div>
{{-- @push('scripts')
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    Livewire.on('show-sweetalert', function(data){
        Swal.fire({
            icon: data.type,
            title: data.title,
            text: data.message
        });
    });
</script>    
@endpush --}}
</div>

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header" style="background-color: #4d6a88; color: white;">
                    <h5 class="modal-title" id="exampleModalLabel">Tabla de Valorización Check List</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="table-responsive-md">
                        <table class="table">
                            <tr>
                            <p align="center" class="text-center bg-lead-500 border border-dark text-white"><b><span> CRITERIOS DE CALIFICACIÓN</span> </b></p>
                            <tr>
                                <td class="text-center border border-dark">
                                    CUMPLE (2)
                                </td>
                                <td class="text-center border border-dark">
                                    CUMPLE PARCIALMENTE (1)
                                </td>
                                <td class="text-center border border-dark">
                                    NO CUMPLE (0)
                                </td>
                            </tr>
                            </tr>
                            
                            <tr>
                                <td class="text-center border border-dark">
                                El items evaluado se cumple en su totalidad. No se evidencia incumplimiento alguno (0 hallazgos).
                                </td>
                                <td class="text-center border border-dark">
                                    El items evaluado se cumple de forma parcial y se evidencia un bajo número de incumplimientos (1-3 hallazgos).
                                </td> 
                                <td class="text-center border border-dark">
                                    El items evaluado se cumple de forma parcial y se evidencia un número significativo de incumplimientos (más de 4 hallazgos).
                                </td>
                            </tr>
                        </table>
                        <table class="table">
                            <tr>
                                <p align="center" class="text-center bg-lead-500 border border-dark text-white"><b><span> CALIFICACIÓN</span></b></p>
                                <tr>
                                    <td class="text-center border border-dark">
                                        Requiere mejora ≤ 74
                                    </td>
                                    <td class="text-center border border-dark">
                                        Regular 75 - 84 %
                                    </td>
                                    <td class="text-center border border-dark">
                                        Bueno 85 - 90 %
                                    </td>
                                    <td class="text-center border border-dark">
                                        Excelente ≥ 91 %
                                    </td>
                                </tr>
                            </tr>
                        </table>
                      </div>
                    </div>
                  </div>    
                <div class="modal-footer">
                    {{-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> --}}
                    {{-- <button type="button" class="btn btn-primary">Save changes</button> --}}
                </div>
            </div>
        </div>


