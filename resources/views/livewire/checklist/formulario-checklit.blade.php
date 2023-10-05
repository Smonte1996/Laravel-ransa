<div>
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>Check list de Pasillo</h3>
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
                            <h2>Formulario Check list de pasillo</h2>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <div class="row">
                                    <div class="col-sm-12 col-md-4">
                                    <div class="mb-3">
                                    <label for="fecha" class="form-label fs-6 text-lead-500">Fecha:</label>
                                    <input type="date" class="form-control rounded @error('fecha') is-invalid @enderror" wire:model.defer="fecha" name="fecha" id="fecha">                               
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

                              @if (!is_null($Infor_checklist))
                            <div class="col-sm-12 col-md-4 mt-3">
                                <div class="mb-1">
                            <select class="form-control rounded @error('secofrio') is-invalid @enderror" wire:model='secofrio' name="secofrio" id="secofrio">                               
                               <option value="">Seleccionar una opción </option>
                               @foreach ($seco_frios as $seco_frio)
                                   <option value="{{$seco_frio->id}}">{{$seco_frio->name}}</option>
                               @endforeach
                            </select>
                                @error('secofrio')
                                    <small id="secofriohelpId"
                                        class="form-text text-muted invalid-feedback">{{ $message }}</small>
                                @enderror
                            </div>
                            </div>
                            <div class="col-sm-12 col-md-4 mt-3">
                                <div class="mb-1">
                            
                            <select class="form-control rounded @error('pasillo') is-invalid @enderror" wire:model="pasillo" name="pasillo" id="pasillo">                               
                               <option value="">Seleccionar una opción </option>
                                 @if (!is_null($Pasillos))
                                   @foreach ($Pasillos as $Pasillo)
                                       <option value="{{$Pasillo->id}}">{{$Pasillo->name}}</option>
                                   @endforeach
                                   @endif 
                            </select>
                                @error('pasillo')
                                    <small id="pasillohelpId"
                                        class="form-text text-muted invalid-feedback">{{ $message }}</small>
                                @enderror
                            </div>
                            </div>
                              @else
                            <div class="col-sm-12 col-md-4 mt-3 text-center">
                                <div class="mb-1">
                                <button class="btn-sm btn-primary rounded" wire:click="Checklist">Checklist</button>
                            </div>
                            </div>
                             @endif 

                            </div>

                            <div class="clearfix"></div>

                            
                            <div class="row">
                              @if (!is_null($secofrio))
                                @switch($secofrio)
                                @case(1)
                                <div class="mt-3 d-flex justify-content-end">
                                    <button class="btn-sm btn-green-500 text-center text-white rounded" wire:click="selectAll">Cumple todo</button>
                                  </div>
                            <div class="table-responsive col-sm-12 col-md-12 d-flex">
                            <table class="border border-dark col-sm-12 col-md-12" width="100%">
                            <tr align="center">
                                <td colspan="3" class="border border-dark bg-green-500 text-white">
                                    Bodega seca (Aplica para Quito y Guayaquil).
                                </td>
                            </tr>
                            <tr align="left">
                            <td class="border border-start-0" style="width: 350px;">
                                1. Los suelos están limpios, secos, sin desperdicios ni material innecesario.
                            </td>
                            <td style="width: 150px;">
                
                                <select class="form-control rounded @error('selectedOptions') is-invalid @enderror" wire:model="selectedOptions" name="selectedOptions" id="selectedOptions">                               
                                    <option value="">Seleccionar</option>
                                    <option value="2">Cumple</option>
                                    <option value="1">Cumple parcialmente</option>
                                    <option value="0">No cumple</option>
                                 </select>
                            </td>
                            
                            <td>
                                <textarea name="" id="" class="form-control rounded" wire:model.defer="bso1" cols="6" rows="1"></textarea>
                            </td>
                            </tr>
                            
                            <tr align="left">
                                <td class="border border-start-0" style="width: 350px;">
                                    2. Pallets limpios y en buen estado. 					 
                               </td>
                               <td>
                                <select class="form-control rounded @error('selectedOptions1') is-invalid @enderror" wire:model="selectedOptions1" name="selectedOptions1" id="selectedOptions1">                               
                                    <option value="">Seleccionar</option>
                                    <option value="2">Cumple</option>
                                    <option value="1">Cumple parcialmente</option>
                                    <option value="0">No cumple</option>
                                 </select>
                            </td>

                            <td>
                                <textarea name="" id="" class="form-control rounded" wire:model.defer="bso2" cols="6" rows="1"></textarea>
                            </td>
                            </tr>

                            <tr align="left">
                            <td class="border border-start-0">
                                3. Producto Almacenado se encuentra buen estado.
                            </td>
                            <td>
                                <select class="form-control rounded @error('selectedOptions3') is-invalid @enderror" wire:model="selectedOptions3" name="selectedOptions3" id="selectedOptions3">                               
                                    <option value="">Seleccionar</option>
                                    <option value="2">Cumple</option>
                                    <option value="1">Cumple parcialmente</option>
                                    <option value="0">No cumple</option>
                                 </select>
                            </td>
                           
                            <td>
                                <textarea name="" id="" class="form-control rounded" wire:model.defer="bso3" cols="6" rows="1"></textarea>
                            </td>
                            </tr>

                            <tr>
                            <td class="border border-start-0">
                                4. Las cajas se apilan de manera ordenada y no hay producto expuesto o derramado.					
                            </td>
                            <td>
                                <select class="form-control rounded @error('selectedOptions4') is-invalid @enderror" wire:model="selectedOptions4" name="selectedOptions4" id="selectedOptions4">                               
                                    <option value="">Seleccionar</option>
                                    <option value="2">Cumple</option>
                                    <option value="1">Cumple parcialmente</option>
                                    <option value="0">No cumple</option>
                                 </select>
                            </td>
                            
                            <td>
                                <textarea name="" id="" class="form-control rounded" wire:model.defer="bso4" cols="6" rows="1"></textarea>
                            </td>
                             </tr>

                             <tr>
                            <td class="border border-start-0">
                                5. No existe Film colgado.
                            </td>
                            <td>
                                <select class="form-control rounded @error('selectedOptions5') is-invalid @enderror" wire:model="selectedOptions5" name="selectedOptions5" id="selectedOptions5">                               
                                    <option value="">Seleccionar</option>
                                    <option value="2">Cumple</option>
                                    <option value="1">Cumple parcialmente</option>
                                    <option value="0">No cumple</option>
                                 </select>
                            </td>
                            
                            <td>
                                <textarea name="" id="" class="form-control rounded" wire:model.defer="bso5" cols="6" rows="1"></textarea>
                            </td>
                            </tr>

                            <tr>
                                <td class="border border-start-0">
                                    6. El pasillo cumple en orden y limpieza.
                                </td>
                                <td>
                                    <select class="form-control rounded @error('selectedOptions6') is-invalid @enderror" wire:model="selectedOptions6" name="selectedOptions6" id="selectedOptions6">                               
                                        <option value="">Seleccionar</option>
                                        <option value="2">Cumple</option>
                                        <option value="1">Cumple parcialmente</option>
                                        <option value="0">No cumple</option>
                                     </select>
                                </td>
                               
                                <td>
                                    <textarea name="" id="" class="form-control rounded" wire:model.defer="bso6" cols="6" rows="1"></textarea>
                                </td>
                                </tr>

                             <tr>
                            <td class="border-end">
                                7. Los pasillos, zonas de transito y vías de evacuación están libres de obstáculos.
                            </td>
                            <td>
                                <select class="form-control rounded @error('selectedOptions7') is-invalid @enderror" wire:model="selectedOptions7" name="selectedOptions7" id="selectedOptions7">                               
                                    <option value="">Seleccionar</option>
                                    <option value="2">Cumple</option>
                                    <option value="1">Cumple parcialmente</option>
                                    <option value="0">No cumple</option>
                                 </select>
                            </td>
                            
                            <td>
                                <textarea name="" id="" class="form-control rounded" wire:model.defer="bso7" cols="6" rows="1"></textarea>
                            </td>
                            </tr>

                            {{-- <tr>
                            <td class="border border-start-0">
                                8. Saldos en caja y caja cruzada.
                            </td>
                            <td>
                                <select class="form-control rounded @error('bs8') is-invalid @enderror" wire:model="selectedOptions8" name="bs8" id="bs8">                               
                                    <option value="">Seleccionar</option>
                                    <option value="2">Cumple</option>
                                    <option value="1">Cumple parcialmente</option>
                                    <option value="0">No cumple</option>
                                 </select>
                            </td>
                            
                            <td>
                                <textarea name="" id="" class="form-control rounded" wire:model.defer="bso8" cols="6" rows="1"></textarea>
                            </td>
                            </tr>

                            <tr>
                            <td class="border-end">
                                9. Los pasillos  de tránsito están libres de obstáculos.
                            </td>
                            <td>
                                <select class="form-control rounded @error('bs9') is-invalid @enderror" wire:model="selectedOptions9" name="bs9" id="bs9">                               
                                    <option value="">Seleccionar</option>
                                    <option value="2">Cumple</option>
                                    <option value="1">Cumple parcialmente</option>
                                    <option value="0">No cumple</option>
                                 </select>
                            </td>
                           
                            <td>
                                <textarea name="" id="" class="form-control rounded" wire:model="bso9" cols="6" rows="1"></textarea>
                            </td>
                            </tr> --}}

                            </table>
                           </div>
                           <div class="mt-4">
                            <button class="btn-sm btn btn-outline-success" wire:click="Checklist_seco">Guardar</button>
                           </div>
                                    @break

                                    @case(2)
                                    <div class="clearfix"></div>

                                    <div class="mt-3 d-flex justify-content-end">
                                     <button class="btn-sm btn-green-500 text-center text-white" wire:click='SelectFria'>Cumple todo</button>
                                   </div>
                                    <div class="table-responsive col-sm-12 col-md-12 d-flex">
                                     <table class="border border-dark col-sm-12 col-md-12 " width="100%">
                                     <tr align="center">
                                         <td colspan="3" class="border border-dark bg-green-500 text-white">
                                             Bodega fría (Aplica para Quito y Guayaquil).
                                         </td>
                                     </tr>
                                     <tr align="left">
                                     <td class="border border-start-0" style="width: 350px;">
                                         1. Los suelos están limpios, secos, sin desperdicios ni material innecesario.
                                     </td>
                                     <td style="width: 145px;">
                                        <select class="form-control rounded @error('bf1') is-invalid @enderror" wire:model="bf1" name="bf1" id="bf1">                               
                                            <option value="">Seleccionar</option>
                                            <option value="2">Cumple</option>
                                            <option value="1">Cumple parcialmente</option>
                                            <option value="0">No cumple</option>
                                         </select>
                                     </td>
                                     
                                     <td>
                                         <textarea name="" id="" class="form-control rounded" wire:model.defer="bfo1" cols="6" rows="1"></textarea>
                                     </td>
                                     </tr>
                                     
                                     <tr align="left">
                                         <td class="border border-start-0" style="width: 350px;">
                                             2. Los Pallets se encuentran limpios y en buen estado. 					 
                                        </td>
                                        <td>
                                            <select class="form-control rounded @error('bf2') is-invalid @enderror" wire:model="bf2" name="bf2" id="bf2">                               
                                                <option value="">Seleccionar</option>
                                                <option value="2">Cumple</option>
                                                <option value="1">Cumple parcialmente</option>
                                                <option value="0">No cumple</option>
                                             </select>
                                     </td>
                                    
                                     <td>
                                         <textarea name="" id="" class="form-control rounded" wire:model.defer="bfo2" cols="6" rows="1"></textarea>
                                     </td>
                                     </tr>
         
                                     <tr align="left">
                                     <td class="border border-start-0">
                                         3. Producto Almacenado en buen estado (cajas en B/E).
                                     </td>
                                     <td>
                                        <select class="form-control rounded @error('bf3') is-invalid @enderror" wire:model="bf3" name="bf3" id="bf3">                               
                                            <option value="">Seleccionar</option>
                                            <option value="2">Cumple</option>
                                            <option value="1">Cumple parcialmente</option>
                                            <option value="0">No cumple</option>
                                         </select>
                                     </td>
                                    
                                     <td>
                                         <textarea name="" id="" class="form-control rounded" wire:model.defer="bfo3" cols="6" rows="1"></textarea>
                                     </td>
                                     </tr>
         
                                     <tr>
                                     <td class="border border-start-0">
                                         4. Las cajas se apilan de manera ordenada y no hay producto expuesto o derramado.					
                                     </td>
                                     <td>
                                        <select class="form-control rounded @error('bf4') is-invalid @enderror" wire:model="bf4" name="bf4" id="bf4">                               
                                            <option value="">Seleccionar</option>
                                            <option value="2">Cumple</option>
                                            <option value="1">Cumple parcialmente</option>
                                            <option value="0">No cumple</option>
                                         </select>
                                     </td>
                                     
                                     <td>
                                         <textarea name="" id="" class="form-control rounded" wire:model.defer="bfo4" cols="6" rows="1"></textarea>
                                     </td>
                                      </tr>
         
                                      <tr>
                                     <td class="border border-start-0">
                                         5. No existe Film colgado.
                                     </td>
                                     <td>
                                        <select class="form-control rounded @error('bf5') is-invalid @enderror" wire:model="bf5" name="bf5" id="bf5">                               
                                            <option value="">Seleccionar</option>
                                            <option value="2">Cumple</option>
                                            <option value="1">Cumple parcialmente</option>
                                            <option value="0">No cumple</option>
                                         </select>
                                     </td>
                                     
                                     <td>
                                         <textarea name="" id="" class="form-control rounded" wire:model.defer="bfo5" cols="6" rows="1"></textarea>
                                     </td>
                                     </tr>
         
                                     <tr>
                                         <td class="border border-start-0">
                                             6. El pasillo cumple en orden y limpieza.
                                         </td>
                                         <td>
                                             <select class="form-control rounded @error('bf6') is-invalid @enderror" wire:model="bf6" name="bf6" id="bf6">                               
                                                <option value="">Seleccionar</option>
                                                <option value="2">Cumple</option>
                                                <option value="1">Cumple parcialmente</option>
                                                <option value="0">No cumple</option>
                                             </select>
                                         </td>
                                      
                                         <td>
                                             <textarea name="" id="" class="form-control rounded" wire:model.defer="bfo6" cols="6" rows="1"></textarea>
                                         </td>
                                         </tr>
         
                                      <tr>
                                     <td class="border-end">
                                         7. Los pasillos, zonas de transito y vías de evacuación están libres de obstáculos .
                                     </td>
                                     <td>
                                        <select class="form-control rounded @error('bf7') is-invalid @enderror" wire:model="bf7" name="bf7" id="bf7">                               
                                            <option value="">Seleccionar</option>
                                            <option value="2">Cumple</option>
                                            <option value="1">Cumple parcialmente</option>
                                            <option value="0">No cumple</option>
                                         </select>
                                     </td>
                                     
                                     <td>
                                         <textarea name="" id="" class="form-control rounded" wire:model.defer="bfo7" cols="6" rows="1"></textarea>
                                     </td>
                                     </tr>
         
                                     {{-- <tr>
                                     <td class="border border-start-0">
                                         8. Saldos en caja y caja cruzada.
                                     </td>
                                     <td>
                                        <select class="form-control rounded @error('bf8') is-invalid @enderror" wire:model="bf8" name="bf8" id="bf8">                               
                                            <option value="">Seleccionar</option>
                                            <option value="2">Cumple</option>
                                            <option value="1">Cumple parcialmente</option>
                                            <option value="0">No cumple</option>
                                         </select>
                                     </td>
                                     
                                     <td>
                                         <textarea name="" id="" class="form-control rounded" wire:model.defer="bfo8" cols="6" rows="1"></textarea>
                                     </td>
                                     </tr>
         
                                     <tr>
                                     <td class="border-end">
                                         9. Los pasillos  de tránsito están libres de obstáculos.
                                     </td>
                                     <td>
                                        <select class="form-control rounded @error('bf9') is-invalid @enderror" wire:model="bf9" name="bf9" id="bf9">                               
                                            <option value="">Seleccionar</option>
                                            <option value="2">Cumple</option>
                                            <option value="1">Cumple parcialmente</option>
                                            <option value="0">No cumple</option>
                                         </select>
                                     </td>
                                     
                                     <td>
                                         <textarea name="" id="" class="form-control rounded" wire:model.defer="bfo9" cols="6" rows="1"></textarea>
                                     </td>
                                     </tr> --}}
         
                                     </table>
                                    </div>
                                    <div class="mt-4">
                                        <button class="btn-sm btn btn-outline-success" wire:click="Checklist_frio">Guardar</button>
                                    </div>
                                    @break
 
                                    @case(3)
                                    <div class="clearfix"></div>
                                    <div class="mt-3 d-flex justify-content-end">
                                     <button class="btn-sm btn-green-500 text-center text-white" wire:click='selectReefer'>Cumple todo</button>
                                   </div>
                                    <div class="table-responsive col-sm-12 col-md-12 d-flex">
                                     <table class="border border-dark col-sm-12 col-md-12" width="100%">
                                     <tr align="center">
                                         <td colspan="3" class="border border-dark bg-green-500 text-white">
                                             Reefer (Aplica para Quito y Guayaquil).
                                         </td>
                                     </tr>
                                     <tr align="left">
                                     <td class="border border-start-0" style="width: 350px;">
                                         1. Los suelos están limpios, secos, sin desperdicios ni material innecesario.
                                     </td>
                                     <td style="width: 145px;">
                                        <select class="form-control rounded @error('br1') is-invalid @enderror" wire:model="br1" name="br1" id="br1">                               
                                            <option value="">Seleccionar</option>
                                            <option value="2">Cumple</option>
                                            <option value="1">Cumple parcialmente</option>
                                            <option value="0">No cumple</option>
                                         </select>
                                     </td>
                                     {{-- <td>
                                         <input type="text" class="form-control rounded" disabled style="width: 50px;">
                                     </td> --}}
                                     <td>
                                         <textarea name="" id="" class="form-control rounded" wire:modal.defer='bro1' cols="6" rows="1" ></textarea>
                                     </td>
                                     </tr>
                                     
                                     <tr align="left">
                                         <td class="border border-start-0" style="width: 350px;">
                                             2. Ausencia de pallets/cajas vacías y madera. 					 
                                        </td>
                                        <td>
                                            <select class="form-control rounded @error('br2') is-invalid @enderror" wire:model="br2" name="br2" id="br2">                               
                                                <option value="">Seleccionar</option>
                                                <option value="2">Cumple</option>
                                                <option value="1">Cumple parcialmente</option>
                                                <option value="0">No cumple</option>
                                             </select>
                                     </td>
                                     {{-- <td>
                                         <input type="text" class="form-control rounded" disabled style="width: 50px;">
                                     </td> --}}
                                     <td>
                                         <textarea name="" id="" class="form-control rounded" wire:modal.defer='bro2' cols="6" rows="1"></textarea>
                                     </td>
                                     </tr>
         
                                     <tr align="left">
                                     <td class="border border-start-0">
                                         3. No hay producto expuesto o derramado.
                                     </td>
                                     <td>
                                        <select class="form-control rounded @error('br3') is-invalid @enderror" wire:model="br3" name="br3" id="br3">                               
                                            <option value="">Seleccionar</option>
                                            <option value="2">Cumple</option>
                                            <option value="1">Cumple parcialmente</option>
                                            <option value="0">No cumple</option>
                                         </select>
                                     </td>
                                     {{-- <td>
                                         <input type="text" class="form-control rounded" disabled style="width: 50px;">
                                     </td> --}}
                                     <td>
                                         <textarea name="" id="" class="form-control rounded" wire:modal.defer='bro3' cols="6" rows="1"></textarea>
                                     </td>
                                     </tr>
         
                                     <tr>
                                     <td class="border border-start-0">
                                         4. Las cajas se apilan de manera ordenada, segura y sin invadir zonas de paso.					
                                     </td>
                                     <td>
                                        <select class="form-control rounded @error('br4') is-invalid @enderror" wire:model="br4" name="br4" id="br4">                               
                                            <option value="">Seleccionar</option>
                                            <option value="2">Cumple</option>
                                            <option value="1">Cumple parcialmente</option>
                                            <option value="0">No cumple</option>
                                         </select>
                                     </td>
                                     {{-- <td>
                                         <input type="text" class="form-control rounded" disabled style="width: 50px;">
                                     </td> --}}
                                     <td>
                                         <textarea name="" id="" class="form-control rounded" wire:modal.defer='bro4' cols="6" rows="1"></textarea>
                                     </td>
                                      </tr>
         
                                      <tr>
                                     <td class="border border-start-0">
                                         5. El reefer se encuentra libre mal olores.
                                     </td>
                                     <td>
                                        <select class="form-control rounded @error('br5') is-invalid @enderror" wire:model="br5" name="br5" id="br5">                               
                                            <option value="">Seleccionar</option>
                                            <option value="2">Cumple</option>
                                            <option value="1">Cumple parcialmente</option>
                                            <option value="0">No cumple</option>
                                         </select>
                                     </td>
                                     {{-- <td>
                                         <input type="text" class="form-control rounded" disabled style="width: 50px;">
                                     </td> --}}
                                     <td>
                                         <textarea name="" id="" class="form-control rounded" wire:modal.defer='bro5' cols="6" rows="1"></textarea>
                                     </td>
                                     </tr>
         
                                     <tr>
                                         <td class="border-end">
                                             6. Los productos almacenados se encuentra dentro de rango de temperatura solicitado por el cliente.
                                         </td>
                                         <td>
                                            <select class="form-control rounded @error('br6') is-invalid @enderror" wire:model="br6" name="br6" id="br6">                               
                                                <option value="">Seleccionar</option>
                                                <option value="2">Cumple</option>
                                                <option value="1">Cumple parcialmente</option>
                                                <option value="0">No cumple</option>
                                             </select>
                                         </td>
                                         {{-- <td>
                                             <input type="text" class="form-control rounded" disabled style="width: 50px;">
                                         </td> --}}
                                         <td>
                                             <textarea name="" id="" class="form-control rounded" wire:modal.defer='bro6' cols="6" rows="1"></textarea>
                                         </td>
                                         </tr>
                                     </table>
                                    </div>
                                    <div class="mt-4">
                                        <button class="btn-sm btn btn-outline-success" wire:click='Checklist_reefer'>Guardar</button>
                                       </div>
                                    @break

                                    @case(4)
                                    <div class="clearfix"></div>
                                    <div class="mt-3 d-flex justify-content-end">
                                     <button class="btn-sm btn-green-500 text-center text-white" wire:click='SelectAndenes'>Cumple todo</button>
                                   </div>
                                    <div class="table-responsive col-sm-12 col-md-12 d-flex">
                                     <table class="border border-dark col-sm-12 col-md-12" width="100%">
                                     <tr align="center">
                                         <td colspan="3" class="border border-dark bg-green-500 text-white">
                                            Puerta  Y Andenes (Aplica para Quito y Guayaquil).
                                         </td>
                                     </tr>
                                     <tr align="left">
                                     <td class="border border-start-0" style="width: 350px;">
                                         1. Las puertas estan limpios de basura o material reciclaje.
                                     </td>
                                     <td style="width: 145px;">
                                        <select class="form-control rounded @error('ba1') is-invalid @enderror" wire:model="ba1" name="ba1" id="ba1">                               
                                            <option value="">Seleccionar</option>
                                            <option value="2">Cumple</option>
                                            <option value="1">Cumple parcialmente</option>
                                            <option value="0">No cumple</option>
                                         </select>
                                     </td>
                                     {{-- <td>
                                         <input type="text" class="form-control rounded" disabled style="width: 50px;">
                                     </td> --}}
                                     <td>
                                         <textarea name="" id="" class="form-control rounded" wire:modal.defer='bao1' cols="6" rows="1" ></textarea>
                                     </td>
                                     </tr>
                                     
                                     <tr align="left">
                                         <td class="border border-start-0" style="width: 350px;">
                                             2. La zona externa se encuentra limpia y sin evidencia de basura o restos de pallets. 					 
                                        </td>
                                        <td>
                                            <select class="form-control rounded @error('br2') is-invalid @enderror" wire:model="ba2" name="ba2" id="ba2">                               
                                                <option value="">Seleccionar</option>
                                                <option value="2">Cumple</option>
                                                <option value="1">Cumple parcialmente</option>
                                                <option value="0">No cumple</option>
                                             </select>
                                     </td>
                                     {{-- <td>
                                         <input type="text" class="form-control rounded" disabled style="width: 50px;">
                                     </td> --}}
                                     <td>
                                         <textarea name="" id="" class="form-control rounded" wire:modal.defer='bao2' cols="6" rows="1"></textarea>
                                     </td>
                                     </tr>
         
                                     <tr align="left">
                                     <td class="border border-start-0">
                                         3. Se mantiene las herramientas para descarga de vehiculo en buen estado.
                                     </td>
                                     <td>
                                        <select class="form-control rounded @error('ba3') is-invalid @enderror" wire:model="ba3" name="ba3" id="ba3">                               
                                            <option value="">Seleccionar</option>
                                            <option value="2">Cumple</option>
                                            <option value="1">Cumple parcialmente</option>
                                            <option value="0">No cumple</option>
                                         </select>
                                     </td>
                                     {{-- <td>
                                         <input type="text" class="form-control rounded" disabled style="width: 50px;">
                                     </td> --}}
                                     <td>
                                         <textarea name="" id="" class="form-control rounded" wire:modal.defer='bao3' cols="6" rows="1"></textarea>
                                     </td>
                                     </tr>
         
                                     <tr>
                                     <td class="border border-start-0">
                                         4. La zona de andenes esta limpia y no existe obstaculacion de paso peatonal.					
                                     </td>
                                     <td>
                                        <select class="form-control rounded @error('ba4') is-invalid @enderror" wire:model="ba4" name="ba4" id="ba4">                               
                                            <option value="">Seleccionar</option>
                                            <option value="2">Cumple</option>
                                            <option value="1">Cumple parcialmente</option>
                                            <option value="0">No cumple</option>
                                         </select>
                                     </td>
                                     {{-- <td>
                                         <input type="text" class="form-control rounded" disabled style="width: 50px;">
                                     </td> --}}
                                     <td>
                                         <textarea name="" id="" class="form-control rounded" wire:modal.defer='bao4' cols="6" rows="1"></textarea>
                                     </td>
                                      </tr>
         
                                      <tr>
                                     <td class="border-end">
                                         5. Se mantiene las puertas cerrada cuando no hay vehiculo en las puertas.
                                     </td>
                                     <td>
                                        <select class="form-control rounded @error('ba5') is-invalid @enderror" wire:model="ba5" name="ba5" id="ba5">                               
                                            <option value="">Seleccionar</option>
                                            <option value="2">Cumple</option>
                                            <option value="1">Cumple parcialmente</option>
                                            <option value="0">No cumple</option>
                                         </select>
                                     </td>
    
                                     <td>
                                         <textarea name="" id="" class="form-control rounded" wire:modal.defer='bao5' cols="6" rows="1"></textarea>
                                     </td>
                                     </tr>
                                     </table>
                                    </div>
                                    <div class="mt-4 col-md-6">
                                        <button class="btn-sm btn btn-outline-success" wire:click="checklsit_andene">Guardar</button>
                                    </div>
                                    <div class=" col-md-6 mt-4 d-flex justify-content-end">
                                        <button class="btn-sn btn btn-primary" wire:click='Enviar'>
                                        Enviar
                                        </button>
                                    </div>
                                    @break
                                    @case(5)
                                    <div class="mt-3 d-flex justify-content-end">
                                        <button class="btn-sm btn-green-500 text-center text-white rounded" wire:click='SelectAmpliacion'>Cumple todo</button>
                                      </div>
                                <div class="table-responsive col-sm-12 col-md-12 d-flex">
                                <table class="border border-dark col-sm-12 col-md-12" width="100%">
                                <tr align="center">
                                    <td colspan="3" class="border border-dark bg-green-500 text-white">
                                        Bodega Ampleacion Liris (Aplica para Guayaquil).
                                    </td>
                                </tr>
                                <tr align="left">
                                <td class="border border-start-0" style="width: 350px;">
                                    1. Los suelos están limpios, sin desperdicios ni material innecesario.
                                </td>
                                <td style="width: 150px;">
                    
                                    <select class="form-control rounded @error('bam1') is-invalid @enderror" wire:model="bam1" name="bam1" id="bam1">                               
                                        <option value="">Seleccionar</option>
                                        <option value="2">Cumple</option>
                                        <option value="1">Cumple parcialmente</option>
                                        <option value="0">No cumple</option>
                                     </select>
                                </td>
                                
                                <td>
                                    <textarea name="" id="" class="form-control rounded" wire:model.defer="bamo1" cols="6" rows="1"></textarea>
                                </td>
                                </tr>
                                
                                <tr align="left">
                                    <td class="border border-start-0" style="width: 350px;">
                                        2. Los Pallets se encuentran limpios y en buen estado. 					 
                                   </td>
                                   <td>
                                    <select class="form-control rounded @error('bam2') is-invalid @enderror" wire:model="bam2" name="bam2" id="bam2">                               
                                        <option value="">Seleccionar</option>
                                        <option value="2">Cumple</option>
                                        <option value="1">Cumple parcialmente</option>
                                        <option value="0">No cumple</option>
                                     </select>
                                </td>
    
                                <td>
                                    <textarea name="" id="" class="form-control rounded" wire:model.defer="bamo2" cols="6" rows="1"></textarea>
                                </td>
                                </tr>
    
                                <tr align="left">
                                <td class="border border-start-0">
                                    3. Producto en buen estado y presencia de producto derramado o en el piso.
                                </td>
                                <td>
                                    <select class="form-control rounded @error('bam3') is-invalid @enderror" wire:model="bam3" name="bam3" id="bam3">                               
                                        <option value="">Seleccionar</option>
                                        <option value="2">Cumple</option>
                                        <option value="1">Cumple parcialmente</option>
                                        <option value="0">No cumple</option>
                                     </select>
                                </td>
                               
                                <td>
                                    <textarea name="" id="" class="form-control rounded" wire:model.defer="bamo3" cols="6" rows="1"></textarea>
                                </td>
                                </tr>
    
                                <tr>
                                <td class="border border-start-0">
                                    4. Las cajas se apilan de manera ordenada (Articulos con volumen alto).					
                                </td>
                                <td>
                                    <select class="form-control rounded @error('bam4') is-invalid @enderror" wire:model="bam4" name="bam4" id="bam4">                               
                                        <option value="">Seleccionar</option>
                                        <option value="2">Cumple</option>
                                        <option value="1">Cumple parcialmente</option>
                                        <option value="0">No cumple</option>
                                     </select>
                                </td>
                                
                                <td>
                                    <textarea name="" id="" class="form-control rounded" wire:model.defer="bamo4" cols="6" rows="1"></textarea>
                                </td>
                                 </tr>
    
                                 <tr>
                                <td class="border border-start-0">
                                    5. Cajas vacias, gavetas y madera en el piso.
                                </td>
                                <td>
                                    <select class="form-control rounded @error('bam5') is-invalid @enderror" wire:model="bam5" name="bam5" id="bam5">                               
                                        <option value="">Seleccionar</option>
                                        <option value="2">Cumple</option>
                                        <option value="1">Cumple parcialmente</option>
                                        <option value="0">No cumple</option>
                                     </select>
                                </td>
                                
                                <td>
                                    <textarea name="" id="" class="form-control rounded" wire:model.defer="bamo5" cols="6" rows="1"></textarea>
                                </td>
                                </tr>
    
                                <tr>
                                    <td class="border border-start-0">
                                        6. No existe evidencia de contaminación cruzada.
                                    </td>
                                    <td>
                                        <select class="form-control rounded @error('bam6') is-invalid @enderror" wire:model="bam6" name="bam6" id="bam6">                               
                                            <option value="">Seleccionar</option>
                                            <option value="2">Cumple</option>
                                            <option value="1">Cumple parcialmente</option>
                                            <option value="0">No cumple</option>
                                         </select>
                                    </td>
                                   
                                    <td>
                                        <textarea name="" id="" class="form-control rounded" wire:model.defer="bamo6" cols="6" rows="1"></textarea>
                                    </td>
                                    </tr>
    
                                 <tr>
                                <td class="border-end">
                                    7. Los pasillos, zonas de transito y puertas de emergencia están libres de obstáculos.
                                </td>
                                <td>
                                    <select class="form-control rounded @error('bam7') is-invalid @enderror" wire:model="bam7" name="bam7" id="bam7">                               
                                        <option value="">Seleccionar</option>
                                        <option value="2">Cumple</option>
                                        <option value="1">Cumple parcialmente</option>
                                        <option value="0">No cumple</option>
                                     </select>
                                </td>
                                
                                <td>
                                    <textarea name="" id="" class="form-control rounded" wire:model.defer="bamo7" cols="6" rows="1"></textarea>
                                </td>
                                </tr>
    
                                {{-- <tr>
                                <td class="border border-start-0">
                                    8. Saldos en caja y caja cruzada.
                                </td>
                                <td>
                                    <select class="form-control rounded @error('bs8') is-invalid @enderror" wire:model="selectedOptions8" name="bs8" id="bs8">                               
                                        <option value="">Seleccionar</option>
                                        <option value="2">Cumple</option>
                                        <option value="1">Cumple parcialmente</option>
                                        <option value="0">No cumple</option>
                                     </select>
                                </td>
                                
                                <td>
                                    <textarea name="" id="" class="form-control rounded" wire:model.defer="bso8" cols="6" rows="1"></textarea>
                                </td>
                                </tr>
    
                                <tr>
                                <td class="border-end">
                                    9. Los pasillos  de tránsito están libres de obstáculos.
                                </td>
                                <td>
                                    <select class="form-control rounded @error('bs9') is-invalid @enderror" wire:model="selectedOptions9" name="bs9" id="bs9">                               
                                        <option value="">Seleccionar</option>
                                        <option value="2">Cumple</option>
                                        <option value="1">Cumple parcialmente</option>
                                        <option value="0">No cumple</option>
                                     </select>
                                </td>
                               
                                <td>
                                    <textarea name="" id="" class="form-control rounded" wire:model="bso9" cols="6" rows="1"></textarea>
                                </td>
                                </tr> --}}
    
                                </table>
                               </div>
                               <div class="mt-4">
                                <button class="btn-sm btn btn-outline-success" wire:click="Checklist_Ampliacion">Guardar</button>
                               </div>
                                    @break
                                @default
                                    
                            @endswitch
                            @endif
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@push('scripts')
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
@endpush
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

