<div>
<div class="row">
    <div class="container pt-5 d-flex justify-content-center mb-5">
      <div class="border rounded shadow p-3 col-md-8">
        <div class="rounded float-end pb-3">
            <img src="{{asset('img/LOGO_RANSA_2.png')}}" width="200" alt="{{'Imagen del logo'}}">
            </div>
      <div class="border-bottom shadow-sm pb-4 pt-3 text-white" style="background:#009A3F">
        <div class=" pt-5 px-5 ">
          <h1><P> Queremos entregarte la mejor experiencia de servicio.
            Déjanos tu reclamo, felicitación.</P></h1>
        </div>
        <div class="text-white px-5">
          <br>
          <h6><p>Recuerda que tu opinión es importante para nosotros.</p></h6>
        </div>
      </div>

      <div class="form-control">
        <ul>
            <li class="fw-bold text-center pt-4">
                <p value="Satisfaccion">¿En términos generales qué tan satisfecho te encuentras con el proceso de tu reclamo? (Lo puede calificar del 1 al 10, si responde entre 0 al 6 se debe preguntar el porqué).</p>
                <div class="pt-3">
                <div class="form-check form-check-inline">
                    <input class="form-check-input ob1" type="radio" wire:model.lazy="General" value="1" onclick='habilita()'>
                    <label class="form-check-label" for="inlineRadio1">1</label>
                  </div>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input ob1" type="radio" wire:model.lazy="General" value="2" onclick='habilita()'>
                    <label class="form-check-label" for="inlineRadio2">2</label>
                  </div>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" wire:model="General"  value="3" onclick='habilita()'>
                    <label class="form-check-label" for="inlineRadio3">3</label>
                  </div>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" wire:model.lazy="General" value="4" onclick='habilita()'>
                    <label class="form-check-label" for="inlineRadio3">4</label>
                  </div>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" wire:model.lazy="General"  value="5" onclick='habilita()'>
                    <label class="form-check-label" for="inlineRadio3">5</label>
                  </div>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" wire:model.lazy="General"  value="6" onclick='habilita()'>
                    <label class="form-check-label" for="inlineRadio3">6</label>
                  </div>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" wire:model.lazy="General"  value="7" >
                    <label class="form-check-label" for="inlineRadio3">7</label>
                  </div>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" wire:model.lazy="General"  value="8" >
                    <label class="form-check-label" for="inlineRadio3">8</label>
                  </div>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" wire:model.lazy="General"  value="9" >
                    <label class="form-check-label" for="inlineRadio3">9</label>
                  </div>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" wire:model.lazy="General"  value="10" >
                    <label class="form-check-label" for="inlineRadio3">10</label>
                  </div>
                  <div class="col-sm-6 col-md-12 "  id="divNumDemanda">
                  <textarea  class="form-control ob1" wire:model.lazy='ob1' hidden></textarea>
                  </div>
                </div>
            </li>
            <br>

            <li class="fw-bold text-center pt-4">
                <p value="Atención">En términos generales, califique del 1 al 10 la gestión de su reclamo en cuanto a:<br>
                Atención (calificar del 1 al 10). </p>

                <div class="pt-3">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input " type="radio" wire:model="Atencion" value="1" onclick='habilita2()'>
                        <label class="form-check-label" for="inlineRadio1">1</label>
                      </div>
                      <div class="form-check form-check-inline">
                        <input class="form-check-input " type="radio" wire:model="Atencion"  value="2" onclick='habilita2()'>
                        <label class="form-check-label" for="inlineRadio2">2</label>
                      </div>
                      <div class="form-check form-check-inline">
                        <input class="form-check-input " type="radio" wire:model="Atencion"  value="3" onclick='habilita2()'>
                        <label class="form-check-label" for="inlineRadio3">3</label>
                      </div>
                      <div class="form-check form-check-inline">
                        <input class="form-check-input " type="radio" wire:model="Atencion"  value="4" onclick='habilita2()'>
                        <label class="form-check-label" for="inlineRadio3">4</label>
                      </div>
                      <div class="form-check form-check-inline">
                        <input class="form-check-input " type="radio" wire:model="Atencion"  value="5" onclick='habilita2()'>
                        <label class="form-check-label" for="inlineRadio3">5</label>
                      </div>
                      <div class="form-check form-check-inline">
                        <input class="form-check-input " type="radio" wire:model="Atencion"  value="6" onclick='habilita2()'>
                        <label class="form-check-label" for="inlineRadio3">6</label>
                      </div>
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" wire:model="Atencion"  value="7" >
                        <label class="form-check-label" for="inlineRadio3">7</label>
                      </div>
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" wire:model="Atencion"  value="8" >
                        <label class="form-check-label" for="inlineRadio3">8</label>
                      </div>
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" wire:model="Atencion"  value="9" >
                        <label class="form-check-label" for="inlineRadio3">9</label>
                      </div>
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" wire:model="Atencion"  value="10" >
                        <label class="form-check-label" for="inlineRadio3">10</label>
                      </div>
                      <div class="col-sm-6 col-md-12 "  id="divNumDemanda">
                        <textarea  class="form-control ob2" wire:model.lazy='ob2' hidden></textarea>
                        </div>
                    </div>
            </li>
             
            <li class="fw-bold text-center pt-4">
               <p value="Rapidez"> Rapidez (calificar del 1 al 10).</p>

                <div class="pt-3">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" wire:model="Rapidez"  value="1" onclick='habilita3()'>
                        <label class="form-check-label" for="inlineRadio1">1</label>
                      </div>
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" wire:model="Rapidez"  value="2" onclick='habilita3()'>
                        <label class="form-check-label" for="inlineRadio2">2</label>
                      </div>
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" wire:model="Rapidez"  value="3" onclick='habilita3()'>
                        <label class="form-check-label" for="inlineRadio3">3</label>
                      </div>
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" wire:model="Rapidez"  value="4" onclick='habilita3()'>
                        <label class="form-check-label" for="inlineRadio3">4</label>
                      </div>
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" wire:model="Rapidez"  value="5" onclick='habilita3()'>
                        <label class="form-check-label" for="inlineRadio3">5</label>
                      </div>
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" wire:model="Rapidez" value="6" onclick='habilita3()'>
                        <label class="form-check-label" for="inlineRadio3">6</label>
                      </div>
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" wire:model="Rapidez" value="7" >
                        <label class="form-check-label" for="inlineRadio3">7</label>
                      </div>
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" wire:model="Rapidez" value="8" >
                        <label class="form-check-label" for="inlineRadio3">8</label>
                      </div>
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" wire:model="Rapidez" value="9" >
                        <label class="form-check-label" for="inlineRadio3">9</label>
                      </div>
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" wire:model="Rapidez" value="10" >
                        <label class="form-check-label" for="inlineRadio3">10</label>
                      </div>
                      <div class="col-sm-6 col-md-12 "  id="divNumDemanda">
                        <textarea  class="form-control ob3" wire:model.lazy='ob3' hidden></textarea>
                        </div>
                    </div>
            </li>

            <li class="fw-bold text-center pt-4">
               <p value="solucion">Solución final (calificar del 1 al 10).</p>
                
                <div class="pt-3">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" wire:model="solucion" value="1" onclick='habilita4()'>
                        <label class="form-check-label" for="inlineRadio1">1</label>
                      </div>
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" wire:model="solucion" value="2" onclick='habilita4()'>
                        <label class="form-check-label" for="inlineRadio2">2</label>
                      </div>
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" wire:model="solucion"  value="3" onclick='habilita4()'>
                        <label class="form-check-label" for="inlineRadio3">3</label>
                      </div>
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" wire:model="solucion"  value="4" onclick='habilita4()'>
                        <label class="form-check-label" for="inlineRadio3">4</label>
                      </div>
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" wire:model="solucion" value="5" onclick='habilita4()'>
                        <label class="form-check-label" for="inlineRadio3">5</label>
                      </div>
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" wire:model="solucion" value="6" onclick='habilita4()'>
                        <label class="form-check-label" for="inlineRadio3">6</label>
                      </div>
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" wire:model="solucion" value="7" >
                        <label class="form-check-label" for="inlineRadio3">7</label>
                      </div>
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" wire:model="solucion" value="8" >
                        <label class="form-check-label" for="inlineRadio3">8</label>
                      </div>
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" wire:model="solucion" value="9" >
                        <label class="form-check-label" for="inlineRadio3">9</label>
                      </div>
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" wire:model="solucion" value="10" >
                        <label class="form-check-label" for="inlineRadio3">10</label>
                      </div>
                      <div class="col-sm-6 col-md-12 "  id="divNumDemanda">
                        <textarea  class="form-control ob4" wire:model.lazy='ob4' hidden></textarea>
                        </div>
                    </div>
            </li>
        </ul>
        <div>
            @if ($errorMessage)
        <div class="alert alert-danger">{{ $errorMessage }}</div>
         @endif 
        </div>
        {{-- @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach --}}
        <div class="d-grid col-5 mx-auto pt-4">
            <x-jet-button wire:click="saveData" wire:loading.attr='disabled' wire:target='saveData' class="disabled:opacity-60"> Enviar </x-jet-button>
            </div> 
      </div>

      </div>
    </div>
 </div>
</div>
@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
  function habilita() {
  var id = event.target.name.replace("radio","");
  elementos = document.querySelectorAll(".ob1");
  for (var i = 0; i < elementos.length; i++) {
    elementos[i].hidden = false;
  }
}
function habilita2() {
  var id = event.target.name.replace("radio","");
  elementos = document.querySelectorAll(".ob2");
  for (var i = 0; i < elementos.length; i++) {
    elementos[i].hidden = false;
  }
}

function habilita3() {
  var id = event.target.name.replace("radio","");
  elementos = document.querySelectorAll(".ob3");
  for (var i = 0; i < elementos.length; i++) {
    elementos[i].hidden = false;
  }
}

function habilita4() {
  var id = event.target.name.replace("radio","");
  elementos = document.querySelectorAll(".ob4");
  for (var i = 0; i < elementos.length; i++) {
    elementos[i].hidden = false;
  }
};

</script>
@endpush
