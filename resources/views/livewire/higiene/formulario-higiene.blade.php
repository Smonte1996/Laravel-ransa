<div>
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>Practicas de Higienes</h3>
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
                                </select>
                                    @error('almacen')
                                        <small id="almacenhelpId"
                                            class="form-text text-muted invalid-feedback">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-sm-12 col-md-4">
                                <div class="mb-3">
                                <label for="almacen" class="form-label fs-6 text-lead-500">Supervisor:</label>
                                <select class="form-control rounded @error('almacen') is-invalid @enderror" wire:model.defer="almacen" name="almacen" id="almacen">                               
                                   <option value="">Seleccionar una opción </option>
                                   @foreach ($supervisores as $supervisor )
                                       <option value="{{$supervisor->id}}">{{$supervisor->name}} {{$supervisor->lastname}}</option>
                                   @endforeach
                                </select>
                                    @error('almacen')
                                        <small id="almacenhelpId"
                                            class="form-text text-muted invalid-feedback">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-sm-12 col-md-4">
                                <div class="mb-3">
                                <label for="almacen" class="form-label fs-6 text-lead-500">Personal Operativo:</label>
                                <select class="form-control rounded @error('almacen') is-invalid @enderror" wire:model.defer="almacen" name="almacen" id="almacen">                               
                                   <option value="">Seleccionar una opción </option>
                                   @foreach ($personal as $persona )
                                       <option value="{{$persona->id}}">{{$persona->name}} {{$persona->lastname}}</option>
                                   @endforeach
                                </select>
                                    @error('almacen')
                                        <small id="almacenhelpId"
                                            class="form-text text-muted invalid-feedback">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-sm-12 col-md-4">
                                <div class="mb-3">
                                <label for="almacen" class="form-label fs-6 text-lead-500">Provedores:</label>
                                <select class="form-control rounded @error('almacen') is-invalid @enderror" wire:model.defer="almacen" name="almacen" id="almacen">                               
                                   <option value="">Seleccionar una opción </option>
                                   <option value="Bodega Gye">Bodega Gye</option>
                                   <option value="Bodega Uio">Bodega Uio</option>
                                   <option value="">Provedor</option>
                                </select>
                                    @error('almacen')
                                        <small id="almacenhelpId"
                                            class="form-text text-muted invalid-feedback">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        
                        <div class="row pt-4">

                            <div x-data="{
                                textselect: ''
                                }">
                            <div class="col-sm-12 col-md-3">
                                <div class="mb-3">
                                <label for="almacen" class="form-label text-dark">Uniforme completo y limpio (ambiente seco, refrigerado o congelado).</label>
                            </div>
                               </div>
                               
                               <div class="col-sm-12 col-md-3">
                                <div class="mb-3">
                                    <select class="form-control" name="" id="" x-model="textselect">
                                        <option value="">Seleccionar una opción</option>
                                        <option value="2">Cumple</option>
                                        <option value="1">Cumple Parcialmente</option>
                                        <option value="0">No cumple</option>
                                    </select>
                            </div>
                               </div>

                               <div class="col-sm-12 col-md-2" x-show="textselect == 1" x-show="textselect == 0">
                                <div class="mb-3">
                                    <input type="text" class="form-control rounded">
                               </div>
                                </div>

                                <div class="col-sm-12 col-md-2" x-show="textselect == 1" x-show="textselect == 0">
                                    <div class="mb-3">
                                        <input type="text" class="form-control rounded">
                                   </div>
                                    </div>

                                    <div class="col-sm-12 col-md-2" x-show="textselect == 1" x-show="textselect == 0">
                                        <div class="mb-3">
                                            <input type="date" class="form-control rounded">
                                       </div>
                                        </div>
                               </div>

                               <div x-data="{
                                textselect: ''
                                }">
                            <div class="col-sm-12 col-md-3">
                                <div class="mb-3">
                                <label for="almacen" class="form-label text-dark">Botas limpias, en buen estado y cordones atados.</label>
                            </div>
                               </div>
                               
                               <div class="col-sm-12 col-md-3">
                                <div class="mb-3">
                                    <select class="form-control" name="" id="" x-model="textselect">
                                        <option value="">Seleccionar una opción</option>
                                        <option value="2">Cumple</option>
                                        <option value="1">Cumple Parcialmente</option>
                                        <option value="0">No cumple</option>
                                    </select>
                            </div>
                               </div>

                               <div class="col-sm-12 col-md-2" x-show="textselect == 1" x-show="textselect == 0">
                                <div class="mb-3">
                                    <input type="text" class="form-control rounded">
                               </div>
                                </div>

                                <div class="col-sm-12 col-md-2" x-show="textselect == 1" x-show="textselect == 0">
                                    <div class="mb-3">
                                        <input type="text" class="form-control rounded">
                                   </div>
                                    </div>

                                    <div class="col-sm-12 col-md-2" x-show="textselect == 1" x-show="textselect == 0">
                                        <div class="mb-3">
                                            <input type="date" class="form-control rounded">
                                       </div>
                                        </div>
                               </div>

                               <div x-data="{
                                textselect: ''
                                }">
                            <div class="col-sm-12 col-md-3">
                                <div class="mb-3">
                                <label for="almacen" class="form-label text-dark">Casco limpio, en buen estado y con nombre y apellido.</label>
                            </div>
                               </div>
                               
                               <div class="col-sm-12 col-md-3">
                                <div class="mb-3">
                                    <select class="form-control" name="" id="" x-model="textselect">
                                        <option value="">Seleccionar una opción</option>
                                        <option value="2">Cumple</option>
                                        <option value="1">Cumple Parcialmente</option>
                                        <option value="0">No cumple</option>
                                    </select>
                            </div>
                               </div>

                               <div class="col-sm-12 col-md-2" x-show="textselect == 1" x-show="textselect == 0">
                                <div class="mb-3">
                                    <input type="text" class="form-control rounded">
                               </div>
                                </div>

                                <div class="col-sm-12 col-md-2" x-show="textselect == 1" x-show="textselect == 0">
                                    <div class="mb-3">
                                        <input type="text" class="form-control rounded">
                                   </div>
                                    </div>

                                    <div class="col-sm-12 col-md-2" x-show="textselect == 1" x-show="textselect == 0">
                                        <div class="mb-3">
                                            <input type="date" class="form-control rounded">
                                       </div>
                                        </div>
                               </div>

                               <div x-data="{
                                textselect: ''
                                }">
                            <div class="col-sm-12 col-md-3">
                                <div class="mb-3">
                                <label for="almacen" class="form-label text-dark">No usa accesorios (reloj, cadena, anillo, pulsera, etc.).</label>
                            </div>
                               </div>
                               
                               <div class="col-sm-12 col-md-3">
                                <div class="mb-3">
                                    <select class="form-control" name="" id="" x-model="textselect">
                                        <option value="">Seleccionar una opción</option>
                                        <option value="2">Cumple</option>
                                        <option value="1">Cumple Parcialmente</option>
                                        <option value="0">No cumple</option>
                                    </select>
                            </div>
                               </div>

                               <div class="col-sm-12 col-md-2" x-show="textselect == 1" x-show="textselect == 0">
                                <div class="mb-3">
                                    <input type="text" class="form-control rounded">
                               </div>
                                </div>

                                <div class="col-sm-12 col-md-2" x-show="textselect == 1" x-show="textselect == 0">
                                    <div class="mb-3">
                                        <input type="text" class="form-control rounded">
                                   </div>
                                    </div>

                                    <div class="col-sm-12 col-md-2" x-show="textselect == 1" x-show="textselect == 0">
                                        <div class="mb-3">
                                            <input type="date" class="form-control rounded">
                                       </div>
                                        </div>
                               </div>

                               <div x-data="{
                                textselect: ''
                                }">
                            <div class="col-sm-12 col-md-3">
                                <div class="mb-3">
                                <label for="almacen" class="form-label text-dark">Cabello Correctamente peinado (mantiene buen aspecto).</label>
                            </div>
                               </div>
                               
                               <div class="col-sm-12 col-md-3">
                                <div class="mb-3">
                                    <select class="form-control" name="" id="" x-model="textselect">
                                        <option value="">Seleccionar una opción</option>
                                        <option value="2">Cumple</option>
                                        <option value="1">Cumple Parcialmente</option>
                                        <option value="0">No cumple</option>
                                    </select>
                            </div>
                               </div>

                               <div class="col-sm-12 col-md-2" x-show="textselect == 1" x-show="textselect == 0">
                                <div class="mb-3">
                                    <input type="text" class="form-control rounded">
                               </div>
                                </div>

                                <div class="col-sm-12 col-md-2" x-show="textselect == 1" x-show="textselect == 0">
                                    <div class="mb-3">
                                        <input type="text" class="form-control rounded">
                                   </div>
                                    </div>

                                    <div class="col-sm-12 col-md-2" x-show="textselect == 1" x-show="textselect == 0">
                                        <div class="mb-3">
                                            <input type="date" class="form-control rounded">
                                       </div>
                                        </div>
                               </div>

                               <div x-data="{
                                textselect: ''
                                }">
                            <div class="col-sm-12 col-md-3">
                                <div class="mb-3">
                                <label for="almacen" class="form-label text-dark">Uñas cortas y limpias (aplica para personal operativo).</label>
                            </div>
                               </div>
                               
                               <div class="col-sm-12 col-md-3">
                                <div class="mb-3">
                                    <select class="form-control" name="" id="" x-model="textselect">
                                        <option value="">Seleccionar una opción</option>
                                        <option value="2">Cumple</option>
                                        <option value="1">Cumple Parcialmente</option>
                                        <option value="0">No cumple</option>
                                    </select>
                            </div>
                               </div>

                               <div class="col-sm-12 col-md-2" x-show="textselect == 1" x-show="textselect == 0">
                                <div class="mb-3">
                                    <input type="text" class="form-control rounded">
                               </div>
                                </div>

                                <div class="col-sm-12 col-md-2" x-show="textselect == 1" x-show="textselect == 0">
                                    <div class="mb-3">
                                        <input type="text" class="form-control rounded">
                                   </div>
                                    </div>

                                    <div class="col-sm-12 col-md-2" x-show="textselect == 1" x-show="textselect == 0">
                                        <div class="mb-3">
                                            <input type="date" class="form-control rounded">
                                       </div>
                                        </div>
                               </div>
                            <div class="pt-4 text-center">
                                 <button class="btn btn-primary">Guardar</button>

                                 <button class="btn btn-danger">Enviar</button>
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
                    <h5 class="modal-title" id="exampleModalLabel">Tabla de Valorización</h5>
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
                            
                            {{-- <tr>
                                <td class="text-center border border-dark">
                                El items evaluado se cumple en su totalidad. No se evidencia incumplimiento alguno (0 hallazgos).
                                </td>
                                <td class="text-center border border-dark">
                                    El items evaluado se cumple de forma parcial y se evidencia un bajo número de incumplimientos (1-3 hallazgos).
                                </td> 
                                <td class="text-center border border-dark">
                                    El items evaluado se cumple de forma parcial y se evidencia un número significativo de incumplimientos (más de 4 hallazgos).
                                </td>
                            </tr> --}}
                        </table>
                        <table class="table">
                            <tr>
                                <p align="center" class="text-center bg-lead-500 border border-dark text-white"><b><span> CALIFICACIÓN</span></b></p>
                                <tr>
                                    <td class="text-center border border-dark">
                                        Deficiente ≤ 70
                                    </td>
                                    <td class="text-center border border-dark">
                                        Aceptable 70 - 85 %
                                    </td>
                                    <td class="text-center border border-dark">
                                        Bueno 85 - 95 %
                                    </td>
                                    <td class="text-center border border-dark">
                                        Muy bueno ≥ 95 - 100 %
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


