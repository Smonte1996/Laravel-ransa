@push('styles')
    <link rel="stylesheet" href="{{ asset('css/Firma.css') }}">
@endpush
<div>
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>Firma Electronica</h3>
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
                            <h2>Registar firma electronica </h2>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                                <div class="row">
                                    <div class="mb-4 col-sm-12 col-md-4" wire:ignore>
                                        <label for="" class="form-label fs-6 text-lead-500">Usuario</label>
                                        <select class="select-control select2 @error('name') is-invalid @enderror" placeholder="Nombres" wire:model.defer="user">
                                            <option value="">Seleccionar</option>
                                            @foreach ( $usuarios as $usuario)
                                                <option value="{{ $usuario->id }}">{{ $usuario->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>


                                <div id="firma-electronica" class="col-sm-12 col-md-12 text-center mt-3">
                                    <canvas id="canvas" onchange="handleCanvasChange()"></canvas><br>
                                    <button class="btn btn-sm bg-orange-500 text-white" id="limpiar">Limpiar</button>
                                    <button class="btn btn-sm bg-green-500 text-white" id="guardar">Guardar</button>
                                </div>

                            </div>

                                <x-jet-button type="submit" class="mt-3" wire:click='saveSignature'>Registrar</x-jet-button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@push('scripts')
<script>
Livewire.on('select2', function(){
$('.select2').select2();
$('.select2').on('change', function(e){
@this.set('user', e.target.value);
});
});
</script>
<script>
const canvas = document.getElementById('canvas');
const ctx = canvas.getContext('2d');

let isDrawing = false;
let lastX;
let lastY;

// Función para iniciar el dibujo
function startDrawing(e) {
  isDrawing = true;
  lastX = e.offsetX;
  lastY = e.offsetY;
}

// Función para dibujar
function draw(e) {
  if (!isDrawing) return;

  const currentX = e.offsetX;
  const currentY = e.offsetY;

  ctx.beginPath();
  ctx.moveTo(lastX, lastY);
  ctx.lineTo(currentX, currentY);
  ctx.strokeStyle = 'black';
  ctx.lineWidth = 2;
  ctx.stroke();

  lastX = currentX;
  lastY = currentY;
}

// Función para limpiar el lienzo
function clearCanvas() {
  ctx.clearRect(0, 0, canvas.width, canvas.height);
//  handleCanvasChange();  Actualiza la página
}

// Función para guardar la firma
function saveSignature() {
  const imageData = canvas.toDataURL();
  // Aquí deberías enviar la imagen al servidor mediante una petición AJAX
  const encodedImage = imageData.substring(22);
  @this.set('firma', imageData);
  console.log(imageData);
}


// Eventos
canvas.addEventListener('mousedown', startDrawing);
canvas.addEventListener('mousemove', draw);
document.getElementById('limpiar').addEventListener('click', clearCanvas);
document.getElementById('guardar').addEventListener('click', saveSignature);
</script>
<script>
   Livewire.on('mensaje', function(message){
   Swal.fire({
   position: "top-end",
   icon: "success",
   title: message,
   showConfirmButton: false,
   timer: 1200
 });
 });
 </script>
@endpush


