@extends('layouts.app')

@section('content')
@include('sweetalert::alert')

<div class="container" >         
        <div class="form-group">         
            
            <div class="card-header" style="border-top-width: 10px;border-bottom-width: 10px; border-bottom-color: rgba(255,255,255,0.9); overflow: hidden ; " > {{ __('Send Message By Postmark ') }} </div>

              <form method="POST" action="{{ route('Postmark.SendEmail') }}">
                        @csrf

                   <label for="PostmarkSendEmail" class="col-md-4 col-form-label text-md-right"></label>
                      
                     
                        <div class="container" style="display: flex; justify-content: center; border-style: solid ; border-color: #E6E6E6 ;border-width: 10px; width: 602px;padding-top: 10px;padding-bottom: 5px;" >
                                
                                              <div class="form-group row" style="display: flex; justify-content: center;margin-bottom: 0px;">

                                                                 <label for="Email">{{ __('From') }}</label>
                                                               

                                                                <div class="col-md-10" style="padding-bottom: 10px;padding-left: 45px;">

                                                                   <select style="width: 450px;" class="form-control sel-User" name="from_email[]" multiple="multiple" class="form-control" data-placeholder="Select Email">                                                                   
                                                                      @foreach($user as  $use)
                                                                      <option  id="{{$use->id}}" value="{{ $use->id }}" class="{{$errors->has('from_email') ? ' is-invalid' : '' }}"  required autofocus> {{ $use->email }} </option>         @endforeach
                                                                    </select>

                                                                      @if ($errors->has('from_email'))
                                                                    <span class="invalid-feedback">
                                                                        <strong>{{ $errors->first('from_email') }}</strong>
                                                                    </span>
                                                                      @endif

                                                               </div>            

                                                       
                                                                
                                                              <div class=" col-md-2" style="padding-left: 0px;">
                                                                 <ul style="padding-left: 27px;height: 19px;">{{ __('Subject') }}</ul>
                                                              </div>      
                                                            
                                                                 <div class="col-md-10" style="padding-bottom: 15px;">
                                                                    <input style="width: 450px;" id="subject" type="text" class="form-control{{ $errors->has('subject') ? ' is-invalid' : '' }}" name="subject" required autofocus>

                                                                    @if ($errors->has('subject'))
                                                                        <span class="invalid-feedback">
                                                                            <strong>{{ $errors->first('subject') }}</strong>
                                                                        </span>
                                                                    @endif
                                                                 
                                                                  </div>
                                                                

                                                              <div class="col-md-12" > 
                                                                   <textarea name="Email_Text" id="Email_Text" rows="10" cols="40" class="form-control{{  $errors->has('Email_Text') ? ' is-invalid' : '' }}" required></textarea>
                                                                    @if ($errors->has('Email_Text'))
                                                                          <span class="invalid-feedback">
                                                                              <strong>{{ $errors->first('Email_Text') }}</strong>
                                                                          </span>
                                                                      @endif
                                                             </div> 
                                                          
                                                          
                                        </div>    



                                                                
                        </div>
                    


                                       <div class="container" style="display: flex;justify-content: center;padding-top: 5px;">
                                            
                                                <button value="boton" type="submit" class="btn btn-primary" name="boton" id="boton" onclick="accion();">
                                                    {{ __('Send Email') }}
                                                </button>
                                            
                                        </div>

                                       <!-- <div class="inputDiv i1"></div> -->
                                        
                    </form>
        </div> 
</div>
 
@endsection

@section('scripts')
    <script>
      $(document).ready(function(){
          $('.sel-User').select2();
       });
    </script>

<script type="text/javascript">
// una nueva hoja de estilo
var nuevaHojaDeEstilo = document.createElement("style");
document.head.appendChild(nuevaHojaDeEstilo);

// los elementos padre dondeponer los sliders
var elementoPadre1 = document.querySelector(".inputDiv.i1");
var inputsRy = [];

function Input(id) {
 // alert('idinput '+id);
  //<input type="range" value="35" min="0" max="100" autocomplete="off" step="1">
  this.att = {};
  this.att.type ="range";
  this.att.id = id;
  this.att.value = 100;
  this.att.min = 0;
  this.att.max = 100;
  this.att.autocomplete = "off";
  this.att.step = "1";
  this.color = {};
  this.color.a = "blue"; // la parte "baja" del slider
  this.color.b = "Black"; // la parte "alta" del slider
  this.input;
  this.output;
  this.interval = this.att.max - this.att.min;

  this.crear = function(elementoPadre) {
    this.input = document.createElement("input");
    this.output = document.createElement("div");
    this.output.innerHTML = this.att.value+'%';
    this.output.setAttribute("class", "output");
    for (var name in this.att) {
      if (this.att.hasOwnProperty(name)) {
        this.input.setAttribute(name, this.att[name]);
      }
    }
    elementoPadre.appendChild(this.input);
    elementoPadre.appendChild(this.output);

    this.CSSstyle();
  }
  
  this.actualizar = function() {
    this.output.innerHTML = this.input.value+'%';
    this.att.value = this.input.value;
    this.CSSstyle();
  }
  
  this.CSSstyle = function() {
   // alert('#id'+this.att.id);
    // calcula la posición del thumb en porcentajes
    this.porcentaje = ((this.att.value - this.att.min) / this.interval) * 100;
    // establece las nuevas reglas CSS
    this.style = "#" + this.att.id + "::-webkit-slider-runnable-track{ background-image:-webkit-linear-gradient(left, " + this.color.a + " " + this.porcentaje + "%, " + this.color.b + " " + this.porcentaje + "%)}\n";
    this.style += "#" + this.att.id + "::-moz-range-track{ background-image:-moz-linear-gradient(left, " + this.color.a + " " + this.porcentaje + "%, " + this.color.b + " " + this.porcentaje + "%)}\n";
  }
}

function actualizarCSS() {
  // una cadena de texto donde guardar los estilos
  var HojaCSS = "";
  for (var i = 0; i < inputsRy.length; i++) {
    HojaCSS += inputsRy[i].style;
  }
  nuevaHojaDeEstilo.textContent = HojaCSS;
}

// setup
var i = new Input("itr1");
i.crear(elementoPadre1);
inputsRy.push(i);

actualizarCSS();



for (var n = 0; n < inputsRy.length; n++) {
  (function(n) {
    inputsRy[n].input.addEventListener("input", function() {
      inputsRy[n].actualizar();
      actualizarCSS();

    }, false)
  }(n));
}
</script>
<script >
 $(document).ready(function()
   {
    //alert('id'+this.id);
  $('#itr1').change(function() {
   alert('seleciono  :'+this.value);
   });
 });
</script> 
@endsection