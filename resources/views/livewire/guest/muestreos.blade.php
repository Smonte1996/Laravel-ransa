<div>
        <div class="container pt-5 d-flex justify-content-center mb-5">
          <div class="border rounded shadow p-5 col-sm-10 col-md-10">
            <div class="rounded float-star pb-3 col-sm-12">
                    <img src="{{asset('img/logo.png')}}" width="200" alt="{{'Imagen del logo'}}">
                      <img src="{{asset('img/logo2.png')}}" width="300" alt="{{'imagen de logo centro'}}">
            </div>
              <div class="row">
              <div class="col-sm-12 col-md-4">
                <div class="mb-3">
                    <label 
                        class="form-label text-lead-500 fw-bold" for="bodega" class="text-center" style="font-size:14px;">Almacen:
                    </label>
                        <select class="form-control @error('bodega') is-invalid @enderror" wire:model.defer="bodega" id="bodega" :value="old('bodega')">
                           <option value="">Seleccionar una opción</option>
                           <option value="BODEGA GYE">BODEGA GYE</option>
                           <option value="BODEGA UIO">BODEGA UIO</option> 
                        </select>
                        @error('bodega')
                        <small id="bodegahelpId" class="form-text text-muted invalid-feedback">{{ $message }}</small>
                        @enderror
                </div>
            </div>
            <div class="col-sm-12 col-md-4">
                <div class="mb-3">
                    <label 
                        class="form-label text-lead-500 fw-bold" for="clientes" style="font-size:14px;">Cliente:
                    </label>
                        <select class="form-control @error('clientes') is-invalid @enderror" wire:model.defer="clientes" id="clientes" :value="old('clientes')">
                            <option value="">Seleccionar una opción</option>
                            @foreach ( $cliente as $clientes )
                            <option value="{{$clientes->id}}">{{$clientes->social_reason}}</option>
                            @endforeach
                         </select>
                         @error('clientes')
                        <small id="clienteshelpId" class="form-text text-muted invalid-feedback">{{ $message }}</small>
                        @enderror
                </div>
            </div>
            <div class="col-sm-12 col-md-4">
                <div class="mb-3">
                    <label 
                        class="form-label text-lead-500 fw-bold" for="contenedor" style="font-size:14px;">Contenedor/placa:
                    </label>
                       <input type="text" class="form-control uppercase @error('contenedor') is-invalid @enderror" id="contenedor" wire:model.defer='contenedor' :value="old('contenedor')">
                       @error('contenedor')
                        <small id="contenedorhelpId" class="form-text text-muted invalid-feedback">{{ $message }}</small>
                        @enderror
                </div>
            </div>
            <div class="col-sm-12 col-md-4">
                <div class="mb-3">
                    <label 
                        class="form-label text-lead-500 fw-bold" for="Guia" style="font-size:14px;">Guia de remisión:
                    </label>
                       <input type="text" class="form-control @error('Guia') is-invalid @enderror" wire:model.defer='Guia' id="Guia" :value="old('Guia')">
                         @error('Guia')
                         <small id="GuiarhelpId" class="form-text text-muted invalid-feedback">{{ $message }}</small> 
                         @enderror                  
                </div>
            </div>
            <div class="col-sm-12 col-md-4">
                <div class="mb-3">
                    <label
                        class="form-label text-lead-500 fw-bold" for="fecha_recepcion" style="font-size:14px;">Fecha de recepción:
                    </label>
                       <input type="date" class="form-control @error('fecha_recepcion') is-invalid @enderror" wire:model.defer="fecha_recepcion" id="fecha_recepcion" :value="old('fecha_recepcion')">
                       @error('fecha_recepcion')
                       <small id="fecha_recepcionrhelpId" class="form-text text-muted invalid-feedback">{{ $message }}</small> 
                       @enderror 
                </div>
            </div>
            <div class="col-sm-12 col-md-4">
                <div class="mb-3">
                    <label 
                        class="form-label text-lead-500 fw-bold" for="hora_recepcion" style="font-size:14px;">Hora de recepción:
                    </label>
                       <input type="time" class="form-control @error('hora_recepcion') is-invalid @enderror" wire:model.defer='hora_recepcion' id="hora_recepcion" :value="old('hora_recepcion')">
                       @error('hora_recepcion')
                       <small id="hora_recepcionrhelpId" class="form-text text-muted invalid-feedback">{{ $message }}</small> 
                       @enderror 
                </div>
            </div>
            <div class="col-sm-12 col-md-6">
                <div class="mb-3">
                    <label
                        class="form-label text-lead-500 fw-bold" for="pedido" style="font-size:14px;">N° pedido (según aplique):
                    </label>
                       <input type="text" class="form-control @error('pedido') is-invalid @enderror" wire:model.defer="pedido" id="pedido" :value="old('pedido')">
                       @error('pedido')
                       <small id="pedidorhelpId" class="form-text text-muted invalid-feedback">{{ $message }}</small> 
                       @enderror
                </div>
            </div>
            <div class="col-sm-12 col-md-6">
                <div class="mb-5">
                    <label 
                        class="form-label text-lead-500 fw-bold" for="responsable" style="font-size:14px;">Responsable de validación:
                    </label>
                       <input type="text" class="form-control @error('responsable') is-invalid @enderror" placeholder="TU NOMBRE" wire:model.defer="responsable" id="responsable" :value="old('responsable')">
                       @error('responsable')
                       <small id="responsablerhelpId" class="form-text text-muted invalid-feedback">{{ $message }}</small> 
                       @enderror
                </div>
            </div>
        </div>
        <div class="text-center mb-3">
            @if (!is_null($Muestreos))
                <span class="text-center">Hacer el respectivo Muestreo</span>
            @else
            <button type="button" class="btn bg-green-600 text-white" wire:click.prevent="RegistrarInfor"> Muestrear</button>
            @endif
        </div>
        
          <div class="text-end mb-4">
            <button class="btn bg-orange-600 text-white" data-bs-toggle="modal"
            data-bs-target="#exampleModal">Tabla Militar Estandar</button>
        </div>
        
     <div class="row">
        <div class="border table-responsive col-sm-12 col-md-12 justify-content-center mb-3" >
            <table class="table-striped table-bordered border" >
                <thead>
                    <tr>
                        <th class="bg-secondary text-white text-center" style="font-size:12px;">
                            SKU
                        </th>
                        <th class="bg-secondary text-white text-center" style="font-size:12px;">
                            Cantidad recibida
                        </th>
                        <th class="bg-secondary text-white text-center" style="font-size:12px;">
                            Nivel de muestreo <br>aplicado
                        </th>
                        <th class="bg-secondary text-white text-center" style="font-size:12px;">
                            Letra de tamaño <br> Muestra
                        </th>
                        <th class="text-center" style="font-size:12px;">
                            Tamaño de la<br> muestra
                        </th>
                        <th class="bg-secondary text-white text-center" style="font-size:12px;">
                            Registro <br> sanitario
                        </th>
                        <th class="text-center" style="font-size:12px;">
                            Vida util acorde<br> a la data logistica
                        </th>
                        <th class="bg-secondary text-white text-center" style="font-size:12px;">
                            Fecha de Elaboración
                        </th>
                        <th class="bg-secondary text-white text-center" style="font-size:12px;">
                            Fecha de Vencimiento
                        </th>
                        <th class="bg-secondary text-white text-center" style="font-size:12px;">
                            Pvp correcto
                        </th>
                        <th class="bg-secondary text-white text-center" style="font-size:12px;">
                            Lote, fecha de elaboración y/o<br> expiración ilegible o borrable
                        </th>
                        <th class="bg-secondary text-white text-center" style="font-size:12px;">
                            Etiqueta diferente <br>al producto
                        </th>
                        {{-- <th>
                            Tipo de defecto
                        </th>
                        <th>
                            Estatus del producto
                        </th>
                        <th>
                            Comentario u observación
                        </th> --}}
                        <th>
                            ACCIÓN
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
    
                      <td>
                        <div wire:ignore>
                        <select class="form-control Selector @error('sku') is-invalid @enderror" wire:model='sku' id="sku" style="width: 200px"> 
                        <option>Seleccione una opción</option>
                        @foreach ( $data_logis as $data_logi )
                            <option value="{{$data_logi->id}}">{{$data_logi->sku_quala}}</option>
                        @endforeach
                      </select>
                    </div> 
                    </td>
                
                    <td>
                        <input type="number" class="form-control @error('cantidad') is-invalid @enderror" wire:model.lazy="cantidad" id="cantidad" style="width: 150px" >
                    </td>
                    <td>
                        <div>
                        <select class="form-control @error('nivelesestandars') is-invalid @enderror" wire:model="nivelesestandars" id="nivelesestandars" style="width: 200px">
                        <option selected>Seleccionar un opcion</option>
                        @foreach ($Niveles as $Nivele)
                            <option value="{{$Nivele->id}}">{{$Nivele->name}}</option>
                        @endforeach      
                        </select>
                       </div>    
                    </td>
                    <td>
                        <div>
                        <select class="form-control @error('letratamano') is-invalid @enderror" wire:model="letratamano" id="letratamano" style="width: 200px">
                            <option selected>Seleccionar un opcion</option>
                             @if (!is_null($Letras))  
                            @foreach ($Letras as $Letra)
                                <option value="{{$Letra->id}}">{{$Letra->nivel}}</option>
                            @endforeach 
                             @endif
                            </select>
                        </div> 
                    </td>
                    <td>
                        <div>
                         <label class="form-label text-center  @error('tamaño_muestreo') is-invalid @enderror" wire:model="tamaño_muestreo" style="width: 150px">
                             @if (!is_null($Muestras))
                             @forelse ($Muestras as $Muestra )
                             {{$Muestra->muestra}}
                             @empty
                             <p>No hay datos</p> 
                             @endforelse
                          @endif 
                         </label>
                            </div> 
                    </td>

                    <td>
                        <div>
                            <select class="form-control"  wire:model.defer="registro_sanitario" id="registro_sanitario" style="width: 180px">
                                <option value="">Seleccionar una opcion</option>
                                <option value="Si">Si</option>
                                <option value="No">No</option>  
                            </select>
                               </div> 
                    </td>

                    <td>
                        <div wire:ignore>
                        <input type="text" class="form-control" wire:model="vida_logistica" id="vida_logistica" disabled style="width: 200px" 
                        :value="{{$vida_logistica}}">
                         </div>
                    </td>
                    <td>
                        <input type="date" class="form-control  @error('fecha_elaboracion') is-invalid @enderror" id="fecha_elaboracion" wire:model="fecha_elaboracion" style="width: 150px">
                    </td>
                    <td>
                        <input type="date" class="form-control  @error('fecha_vencimiento') is-invalid @enderror" id="fecha_vencimiento" wire:model="fecha_vencimiento" style="width: 150px">
                    </td>
                    <td>
                        <select class="form-control" id="pvp" wire:model="pvp" style="width: 180px">
                            <option value="">Seleccionar una opcion</option>
                            <option value="Si">Si</option>
                            <option value="No">No</option>
                            <option value="No Aplica">No Aplica</option>  
                        </select>
                    </td>
                    <td>
                         <select name="" class="form-control @error('lote') is-invalid @enderror" id="lote" wire:model="lote" style="width: 200px">
                            <option value="">Seleccionar una opcion</option>
                            <option value="Si">Si</option>  
                            <option value="No">No</option>  
                        </select>
                    </td>
                    <td>
                        <select name="" class="form-control @error('etiqueta') is-invalid @enderror" id="etiqueta" wire:model="etiqueta" style="width: 200px">
                            <option value="">Seleccionar una opcion</option>
                            <option value="Si">Si</option>
                            <option value="No">No</option>
                        </select>
                    </td>
                    {{-- <td>
                        <select name="" class="form-control" id="" wire:model="defecto" style="width: 200px">
                            <option value="">Seleccionar una opcion</option>
                            <option value="Crítico">Crítico</option>
                            <option value="Mayor">Mayor</option>
                            <option value="Menor">Menor</option>
                            <option value="No aplica">No aplica</option>
                        </select>
                    </td>
                    <td>
                        <select name="" class="form-control" id="" wire:model="estatus" style="width: 200px">
                            <option value="">Seleccionar una opcion</option>
                            <option value="Aprobado">Aprobado</option>
                            <option value="Cuarentena">Cuarentena</option>
                            <option value="Rechazado">Rechazado</option>
                        </select> 
                    </td>
                    <td>
                        <textarea name="" id="" class="form-control"  rows="2" wire:model="obsrva" style="width: 250px">
    
                        </textarea>
                    </td> --}}
                    <td>
                        <div class="text-center">
                            
                            {{-- <button type="button" class="btn bg-orange-600 text-white"  style="font-size: 23px;" wire:click.prevent="validarCampos"><i class="fa-solid fa-square-plus"></i></button> --}}
                            
                            <a class="btn bg-green-600 text-white" style="font-size: 22px;" wire:click="$set('open', true)"><i class="fa-solid fa-square-plus"></i></a>
                        </div>
                    </td>
                    </tr>
                    
                </tbody>
                @if (!is_null($sku))
                <thead>
                    <tr>
                        <th class="text-center" style="font-size:12px;">
                            Sku Unilever
                        </th>
                        <th class="text-center" style="font-size:12px;">
                            Descripción del <br> Producto
                        </th>
                        <th class="text-center" style="font-size:12px;">
                            Ean 13
                        </th>
                        <th class="text-center" style="font-size:12px;">
                            Ean 14
                        </th>
                        <th class="text-center" style="font-size:12px;">
                            Marca
                        </th>
                        <th class="text-center" style="font-size:12px;">
                           Registro Sanitario
                        </th>
                        <th class="text-center" style="font-size:12px;">
                            Vida Util
                        </th>
                        <th class="text-center" style="font-size:12px;">
                            Pvp
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            <label class="form-label text-center" style="width: 180px">
                                @if (!is_null($sku))
                                    @foreach ( $datas as $data )
                                        {{$data->sku_unilever}}
                                    @endforeach
                                @endif
                              </label> 
                        </td>
                        <td>
                            <label class="form-label text-center" style="width: 200px">
                                @if (!is_null($sku))
                                    @foreach ( $datas as $data )
                                        {{$data->descripcion}}
                                    @endforeach
                                @endif
                              </label>
                        </td>
                        <td>
                            <label class="form-label text-center" style="width: 200px">
                                @if (!is_null($sku))
                                    @foreach ( $datas as $data )
                                        {{$data->ean13}}
                                    @endforeach
                                @endif
                              </label> 
                        </td>
                        <td>
                            <label class="form-label text-center" style="width: 200px">
                                @if (!is_null($sku))
                                    @foreach ( $datas as $data )
                                        {{$data->ean14}}
                                    @endforeach
                                @endif
                              </label>
                        </td>
                        <td>
                            <label class="form-label text-center" style="width: 200px">
                                @if (!is_null($sku))
                                    @foreach ( $datas as $data )
                                        {{$data->marca}}
                                    @endforeach
                                @endif
                              </label>
                        </td>
                        <td>
                            <label class="form-label text-center" style="width: 180px">
                                @if (!is_null($sku))
                                @foreach ( $datas as $data )
                                    {{$data->registro_sanitario}}
                                @endforeach
                            @endif
                            </label>
                        </td>
                        <td>
                            <label class="form-label text-center" style="width: 180px">
                                @if (!is_null($sku))
                                @foreach ( $datas as $data )
                                    {{$data->vida_util}}
                                @endforeach
                            @endif
                            </label>
                        </td>
                        <td>
                            <label class="form-label text-center" style="width: 180px">
                                @if (!is_null($sku))
                                @foreach ( $datas as $data )
                                    {{$data->pvp}}
                                @endforeach
                            @endif
                            </label>
                        </td>
                    </tr>
                </tbody>
                @endif
            </table>
          </div>
        </div>
          <x-jet-dialog-modal wire:model.prevent="open">
            <x-slot name='title'>
                <label class="form label">
                    <span>Sku</span>
                    @if (!is_null($sku))
                    @foreach ( $datas as $data )
                        {{$data->sku_quala}}
                    @endforeach
                @endif
                </label>
                @if (!is_null($sku))
                @switch($data->marca)
                    @case('QUIPITOS')
                    <a  class="btn btn-orange-500 text-white border" href="{{asset('Pdf/C284 Matriz defectos QUIPITOS.pdf')}}" target="_blank" >
                        <i class="fa-solid fa-file-pdf"></i>     
                            PDF QUIPITOS
                        </a>
                        @break
                        @case('SAVILOE')
                        <a  class="btn btn-orange-500 text-white border" href="{{asset('Pdf/C284 Matriz defectos SAVILOE.pdf')}}" target="_blank" >
                            <i class="fa-solid fa-file-pdf"></i>
                                    PDF SAVILOE
                        </a>
                        @break
                         
                    @default
                    <a  class="btn btn-orange-500 text-white border" href="{{asset('Pdf/C284 Matriz defectos UNILEVER.pdf')}}" target="_blank" >
                        <i class="fa-solid fa-file-pdf"></i>
                            PDF UNILEVER
                    </a>
                @endswitch
                @endif
            </x-slot>
            <x-slot name='content'>
                <div class="mt-2 mb-2">
                <select class="form-control @error('defectoProducto') is-invalid @enderror" id="defectoProducto" wire:model='defectoProducto'>
                  <option value="">Seleccionar un opción</option>
                     @if (!is_null($sku))
                     @switch($data->marca)
                         @case('QUIPITOS')
                         @foreach ($Quipitos_defectos as $Quipitos_defecto)
                         <option value="{{$Quipitos_defecto->id}}">{{$Quipitos_defecto->name}} - {{$Quipitos_defecto->marca}}</option>
                          @endforeach 
                             @break
                             @case('SAVILOE')
                             @foreach ($Matrices_defectos as $Matrices_defecto)
                             <option value="{{$Matrices_defecto->id}}">{{$Matrices_defecto->name}} - {{$Matrices_defecto->marca}}</option>
                            @endforeach 
                             @break
                             @case('NUTRIBELA')
                             @foreach ($Nutribela_defectos as $Nutribela_defecto)
                             <option value="{{$Nutribela_defecto->id}}">{{$Nutribela_defecto->name}} - {{$Nutribela_defecto->marca}}</option>
                              @endforeach  
                             @break
                     
                         @default
                         @foreach ($Unilever_defectos as $Unilever_defecto)
                         <option value="{{$Unilever_defecto->id}}">{{$Unilever_defecto->name}} - {{$Unilever_defecto->marca}}</option>
                          @endforeach  
                     @endswitch
                  
                  @endif 
                </select>
              </div> 
              <div class=" mt-2 mb-2">
                  <select class="form-control @error('matriz_defecto') is-invalid @enderror" id="matrizdefecto" wire:model='matrizdefecto'>
                    <option value="">Seleccionar un opción</option>
                    @if (!is_null($Defectos))
                        @foreach ($Defectos as $Defecto)
                            <option value="{{$Defecto->id}}">{{$Defecto->defectos}}</option>
                        @endforeach
                    @endif
                  </select>
              </div>

              <div class="row">
              <div class="col-sm-4 col-md-6 mt-2 mb-2 text-center">
               <label class="form-label" id="descripcion">
                @if (!is_null($descrip))
                    @foreach ($descrip as $descri)
                        {{$descri->descripcion}}
                    @endforeach
                @endif
               </label>
              </div>
                <div class="col-sm-4 col-md-6 mt-2 mb-2 text-center">
                <label class="form-label" id="clasificacion">
                    @if (!is_null($descrip))
                    @foreach ($descrip as $descri)
                        {{$descri->clasificacion}}
                    @endforeach
                @endif
                </label>
                </div>
            {{-- </div>

              <div class="row"> --}}
               <div class="col-sm-4 col-md-4 mt-2 text-center">
                    <label class="form-label" style="width: 90px" for="acrec">Aql</label>
                <select class="form-control" wire:model="acrec" id="acrec">
                  <option value=""></option>
                  @if (!is_null($Aqls))
                      @foreach ($Aqls as $Aql)
                      <option value="{{$Aql->id}}">{{$Aql->Aql}}</option>
                      @endforeach 
                      @endif
                </select>
               </div>
                <div class="col-sm-4 col-md-4 mt-2 text-center">
                  <div class="mb-3">
                    <label class="form-label" id="aceptacion" style="width: 90px">Aceptación</label>
                    {{-- <input type="text" class="form-control" disabled style="width: 100px"> --}}
                    <label class="form-label" id="aceptaci" style="width: 90px">
                        @if (!is_null($Aceptaciones))
                        @foreach ($Aceptaciones as $Aceptacione )
                        {{$Aceptacione->Ac}}  
                        @endforeach
                        @endif
                    </label>
                </div> 
                </div>
                <div class="col-sm-4 col-md-4 mt-2 text-center">
                    <div class="mb-3">
                      <label class="form-label" id="rechazo" style="width: 90px">Rechazo</label>
                      <label class="form-label" id="recha" style="width: 90px">
                        @if (!is_null($Aceptaciones))
                        @foreach ($Aceptaciones as $Aceptacione )
                        {{$Aceptacione->rec}}  
                        @endforeach
                        @endif
                    </label>
                  </div> 
                  </div>
                
                  
                <div class="col-sm-4 col-md-4 mt-2 mb-2">
                 <input type="number" class="form-control" style="width: 100px" placeholder="Cantidad" wire:model.defer="caja_un" id="caja_un">
                </div>
                
                <div class="col-sm-4 col-md-6 mb-2 mt-2">
                    <select class="form-control" wire:model.defer="cantidad_caja" id="cantidad_caja">
                        <option value="">Selecciona una opción</option>
                        <option value="Cajas">Cajas</option>
                        <option value="Unidades">Unidades</option>
                    </select>
                </div>
                </div>

                <div class="mb-2">
                    <select class="form-control @error('estatus') is-invalid @enderror" id="estatus" wire:model.defer="estatus">
                      <option value="">Seleccionar un opción</option>
                      <option value="Aprobado">Aprobado</option>
                      <option value="Cuarentena">Cuarentena</option>
                      <option value="Rechazado">Rechazado</option>
                    </select>
                  </div>
                  
                <div class=" mt-2 mb-2">
                  <textarea class="form-control" wire:model.defer="obsrva" cols="" rows=""></textarea>
                </div>
                
                <div class="mt-2 mb-2">
                 {{-- <input type="file" wire:model="imagen" class="form-control" multiple>
                 @if ($imagen)
                 Preview Imagen:
                 @foreach ($imagen as $images )
                 <img src="{{ $images->temporaryUrl() }}" width="80px" height="80px">    
                 @endforeach
                @endif --}}
                <div class="col-md-12 mt-2 mb-2">
                    <div wire:ignore>
                        <form class="dropzone" method="GET">
                        </form>
                    </div>
                </div>
                </div>
            </x-slot>
            <x-slot name='footer'>
                <x-jet-secondary-button wire:click.prevent="$set('open', false)">
                    Cancelar
                </x-jet-secondary-button>
                <x-jet-danger-button wire:click.prevent="validarCampos()">
                    Guardar
                </x-jet-danger-button>
            </x-slot>
          </x-jet-dialog-modal>
           
          @php
              echo today()->diffInDays($fecha_elaboracion) + today()->diffInDays($fecha_vencimiento);
          @endphp

          <div class="border table-responsive col-sm-12 col-md-12 justify-content-center mb-3 mt-5" >
            <table class="table-striped table-bordered border">
                <thead>
                    <tr>
                      <th class="text-center" style="font-size:13px;">
                        sku
                      </th>
                      <th class="text-center" style="font-size:13px;">
                        Cliente
                      </th>
                      <th class="text-center" style="font-size:13px;">
                        Cantidad
                      </th>
                      <th class="text-center" style="font-size:13px;">
                        Nivel de muestreo
                      </th>
                      <th class="text-center" style="font-size:13px;">
                        Letra de tamaño muestra
                      </th>
                      <th class="text-center" style="font-size:13px;">
                        Tamaño de muestra
                      </th>
                      <th class="text-center" style="font-size:13px;">
                        Vida Util
                      </th>
                      <th class="text-center" style="font-size:13px;">
                        Pvp
                      </th>
                      <th class="text-center" style="font-size:13px;">
                        Etiqueta diferente
                      </th>
                      <th class="text-center" style="font-size:13px;">
                        Estatus del Producto
                      </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($Evidencia_muestreos as $Evidencia_muestreo)
                    <tr>
                      <td>
                         {{$Evidencia_muestreo->Data_logistica->sku_quala}}
                      </td>
                      <td>
                        {{$Evidencia_muestreo->Data_logistica->cliente}}
                      </td>
                      <td>
                        {{$Evidencia_muestreo->cantidad}}
                      </td>
                      <td>
                        {{$Evidencia_muestreo->Tamaño_muestra->Niveles_estandar->name}}
                      </td>
                      <td class="text-center">
                        {{$Evidencia_muestreo->Tamaño_muestra->nivel}}
                      </td>
                      <td class="text-center">
                        {{$Evidencia_muestreo->Tamaño_muestra->muestra}}
                      </td>
                      <td>
                        {{$Evidencia_muestreo->vida_util}}
                      </td>
                      <td>
                        {{$Evidencia_muestreo->pvp}}
                      </td>
                      <td>
                        {{$Evidencia_muestreo->etiqueta_producto}}
                      </td>
                      <td>
                        @switch($Evidencia_muestreo->estatu_producto)
                            @case('Aprobado')
                                <label class="bg-green-500 p-1 btn-group btn-group-sm rounded text-white text-center" style="font-size:11px;">Aprobado</label>
                                @break
                            @case('Rechazado')
                                <label class="bg-orange-500 p-1 btn-group btn-group-sm rounded text-white text-center" style="font-size:11px;">Rechazado</label>
                            @break
                            @case('Cuarentena')
                            <label class="bg-lead-500 p-1 btn-group btn-group-sm rounded text-white text-center" style="font-size:11px;">Cuarentena</label>
                            @break
                            @default
                                
                        @endswitch
                      </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
          </div>
          
          @if (!is_null($Evidencias))
          <div class="row">
            <div class="col-md-12 mt-3 text-center">
            <button type="button" class="btn bg-green-600 text-white" wire:click.prevent="EnviosCorreo()" wire:loading.attr="disabled" wire:target='EnviosCorreo' class="disabled:opacity-60">ENVIAR</button>
          </div>
         </div>
           @else
           
          @endif
          
          </div>
        </div>
    </div>  

<!--Imgen de la tabla -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tabla Militar Estandar</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="card bg-dark d-block">
                    <img class="card-img" src="{{asset('img/tabla militar estandar.png')}}" alt="Militar-estandar">
                </div>
            </div>
            <div class="modal-footer">
                {{-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> --}}
                {{-- <button type="button" class="btn btn-primary">Save changes</button> --}}
            </div>
        </div>
    </div>
</div>


 @push('scripts') 
 <script>
    document.addEventListener('livewire:load', function() {
        $('.Selector').on('change', function(e){
            @this.set('sku', e.target.value);
        });
        $(".Selector").select2();
       });
     </script>
 <script>
    document.addEventListener('livewire:load', function() {
        var arrayFiles = [];
        let myDropzone = new Dropzone(".dropzone", {
            url: "/Muestreo-cliente",
            acceptedFiles: "image/*",
            method: "GET",
            paramName: "imagen_muestreo",
            maxFilesize: 5,
            addRemoveLinks: true,
            dictRemoveFile: "Eliminar Imagen",
            dictInvalidFileType: "No se puede cargar este tipo de archivo",
            init: function() {

                this.on("addedfile", function(file) {

                    arrayFiles.push(file);
                    
                    @this.uploadMultiple('imagen_muestreo', arrayFiles)

                })

                this.on("removedfile", function(file) {

                    var index = arrayFiles.indexOf(file);

                    arrayFiles.splice(index, 1);

                    @this.imagen_muestreo = arrayFiles;
                })

            }
        })
      
    });
      
</script>
 @endpush 

