@extends('layouts.app')

@section('content')
@include('sweetalert::alert')
<head>
<link rel="stylesheet" type="text/css" href="/input/css/fileinput.css" />
<!-- <link rel="stylesheet" type="text/css" href="/input/bootstrapcdn/font-awesome.min.css"> -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" media="all" rel="stylesheet" type="text/css"/>
<link rel="stylesheet" type="text/css" href="/input/themes/explorer-fa/theme.css"/>   
    
    </head>
     <body> 
<div class="container kv-main" >
         
        <div class="form-group">
            

          
            <div class="card-header" style="border-top-width: 10px;border-bottom-width: 10px; border-bottom-color: rgba(255,255,255,0.9); overflow: hidden; " > {{ __(' File Upload Docmail ') }} </div>

           <form method="POST" action="{{ route('Docmail.send') }}" enctype="multipart/form-data" accept-charset="UTF-8" >
                        @csrf

                        <div class="container"  style=" display: flex ; justify-content: center ; border-style: solid ; border-color: #E6E6E6 ;border-width: 10px; width: 602px; justify-content: space-around;padding-top: 15px;padding-bottom: 15px;padding-left: 0px; margin-bottom: 5px;" >
                                      <div class="form-group row" id="div2" style="width: 90%;">
                                      
                                       <label for="Twilio">{{ __('Select User When Sending Email') }}</label>
                                                               

                                                                <div style="padding-bottom: 10px;padding-left: 45px;">

                                                                   <select style="width: 200px;" class="form-control sel-User dynamic" name="user" id="user"  data-placeholder="Select User" data-dependent="country_code" required >
                                                                      <option name="user">Select user</option>
                                                                      @foreach($users as  $use)
                                                                      <option name="user" id="{{$use->id}}" value="{{ $use->id }}" class="{{$errors->has('user') ? ' is-invalid' : '' }}"  required autofocus> {{ $use->name }} </option>         @endforeach
                                                                    </select>

                                                                      @if ($errors->has('user'))
                                                                    <span class="invalid-feedback">
                                                                        <strong>{{ $errors->first('user') }}</strong>
                                                                    </span>
                                                                      @endif

                                                               </div>  

                                              </div>

                                              <div class="form-group row" id="div3" style="display:none;justify-content: center; margin-top: 10px;">
                                                                <label  for="Telefono">{{ __('Email Selected') }}</label>
                                                                
                                                                <div class="col-md-6">

                                                                    <select style="width: 200px;" id="country_code" type="text" name="country_code" class="form-control input-lg dynamic" required>

                                                                       <option value="country_code" name="country_code" id="country_code" placeholder="Country code" class="{{$errors->has('country_code') ? ' is-invalid' : '' }}" ></option> 
                                                                    </select>

                                                                  

                                                                    @if ($errors->has('country_code'))
                                                                        <span class="invalid-feedback">
                                                                            <strong>{{ $errors->first('country_code') }}</strong>
                                                                        </span>
                                                                    @endif
                                                                </div>
                                                              </div> 
                                                



                                    </div>




                     <div class="container" id="div1" style="border-style: solid ; border-color: #E6E6E6 ;border-width: 10px; ; height: 140%; display:none; justify-content: center; width:602px;">
                                 <meta charset="utf-8">
                                 <style>
                                 body { padding: 30px }
                                 form { display: block; margin: 20px auto; background: #eee; border-radius: 10px; padding: 15px }
                                 
                                 .progress { position:relative; width:602px; border: 1px solid #ddd; padding: 1px; border-radius: 3px; }
                                 .bar { background-color: #B4F5B4; width:0%; height:20px; border-radius: 3px; }
                                 .percent { position:absolute; display:inline-block; top:3px; left:48%; }
                                 </style>
                                
                                <ul></ul>
                                                     <div class="form-group" style="width: 150% !important;  margin-top: 10px;">
                                                      
                                                            
                                                        <div class="container">
                                                                     
                                                      
                                                        <div class="file-loading">
                                                            <input id="archivo" type="file" name="archivo[]" accept=".pdf" class="file" data-preview-file-type="text" size="500" multiple>
                                                        </div>
                                                                                                    
                                                     
                                                        </div>  
                                                        
                                                       
                                                      
                                                     </div>   

                                        
                                        <ul></ul>
                        </div>

                       <div class="container" id="button" style="display:none;justify-content: center; margin-top: 10px;">
                                                            <button type="submit" class="btn btn-success" style="margin-right: 10px; padding-top: 5px;" href="{{ route('Docmail.send') }}" >Submit</button>
                                                        
                                                        </div>  
                 </form>
        </div> 
</div>
</body>
 @endsection

 @section('scripts')   
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.js"></script>
<script src="/input/Jquery/jquery-3.2.1.min.js"></script>
    <script src="/input/js/plugins/sortable.js" type="text/javascript"></script>
    <script src="/input/js/fileinput.js" type="text/javascript"></script>
    <script src="/input/js/locales/fr.js" type="text/javascript"></script>
    <script src="/input/js/locales/es.js" type="text/javascript"></script>
    <script src="/input/themes/explorer-fa/theme.js" type="text/javascript"></script>
    <script src="/input/themes/fa/theme.js" type="text/javascript"></script>
    <script src="/input/Jquery/popper.min.js" type="text/javascript"></script>
<script src="/js/Docmail/jquery.form.js"></script>
<script src="/js/Docmail/DinamicInput.min.js"></script>
<script src="/user/select_User_Docmail.js"></script>
<script>
    var tipos=['pdf'];
    var contadores=[0,0,0,0];
    var reset_contadores=function(){
        for(var i=0;i<tipos.length;i++){
            contadores[i]=0;
        }
    };
   var contadores_tipos = function(archivo){
    for(var i=0; i<tipos.length;i++){
     if(archivo.indexOf(tipos[i])!=-1){
        contadores[i]+=1;
        break;
     }
    }
   };
var input=$('#archivo');

   input.fileinput({
       theme: 'fa',
        uploadUrl: '#',
        showRemove: false,
        showUpload: false,
        lavelUpload:false,
       removeFromPreviewOnError:true,
       allowedFileExtensions: tipos

   });


   $('#archivo').on('filebeforedelete',function(){
    $('div.alert').empty();
    $('div.alert').hide();
   });

    $('#archivo').on('filebatchuploadsuccess', function(event, data, previewId, index) {

    var ficheros = data.files;
    var respuesta = data.response;
    var total = data.filescount;
    var mensaje;
    var archivo;
    var total_tipos='';
    
    reset_contadores();
    mensaje='<p>'+total+ ' ficheros almacenados en la carpeta: '+respuesta.dirupload+'<br><br>';
    mensaje+='Ficheros procesados:</p><ul>';
    for(var i=0;i<ficheros.length;i++) {
      if(ficheros[i]!=undefined) {
        archivo=ficheros[i];                
        tam=archivo.size / 1024;
        mensaje+='<li>'+archivo.name+' ('+Math.ceil(tam)+'Kb)'+'</li>';
        contadores_tipos(archivo.name); 
      } 
    };

    mensaje+='</ul><br/>';
    
    for(var i=0; i<contadores.length; i++)  total_tipos+='('+contadores[i]+') '+tipos[i]+', ';
    
    total_tipos=total_tipos.substr(0,total_tipos.length-2);
    mensaje+='<p>'+total_tipos+'</p>';
    if(respuesta.total==total) mensaje+='<p>Match the total of files processed on the server.</p>';
    else mensaje+='<p>The files sent with the total of files processed on the server do not match.</p>';
    
    $('div.alert').html(mensaje);
    $('div.alert').show();
  });

  $('div.alert').hide();    
   

</script>

@endsection