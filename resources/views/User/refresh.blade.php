@extends('layouts.app')

@section('content')
@include('sweetalert::alert')
<div class="container" >
         
        <div class="form-group">
            

          
            <div class="card-header" style="border-top-width: 10px;border-bottom-width: 10px; border-bottom-color: rgba(255,255,255,0.9); overflow: hidden; "  > {{ __(' Select Full Address 1 ') }} </div>

           <form method="POST" action="{{ route('Reference.update') }}">
                        @csrf

                   <label for="AddressSelect2" class="col-md-4 col-form-label text-md-right"></label>
                      

                        <div class="container" style="border-style: solid;border-color: rgb(230, 230, 230);border-width: 10px;width: 69%;padding-top: 10px;padding-bottom: 5px; display: flex; justify-content: center;" >                           
                                 
                                <dir class="form-group row" style="width: 100%;display: flex;justify-content: center;padding-right: 40px;margin-top: 0px;margin-bottom: 0px;">
                                     
                                          <label class="col-md-3" id="labelPro1">{{__('Select Property')}}</label>
                                          
                                          <div id="Property1" class="col-md-7" style=" padding-left: 5px; width: 50px !important;">
                                               <select style="width:350px" id="Address" class="form-control sel-Address input-lg dynamic" name="AddressSelect2" lass="form-control input-lg dynamic" data-dependent="applications">
                                                    
                                                  <option selected="selected" >Select Property</option>
                                                  @foreach($properties->data as  $user)

                                                  <option name= "AddressSelect2" id="{{$user->id}}" value="{{ $user->id }}" class="{{$errors->has('AddressSelect2') ? ' is-invalid' : '' }}" required autofocus> {{ $user->full_address }} </option>          
                                                                    
                                                   
                                                  @endforeach

                                                </select>
                                                  @if ($errors->has('AddressSelect2'))
                                                <span class="invalid-feedback">
                                                    <strong>{{ $errors->first('AddressSelect2') }}</strong>
                                                </span>
                                                   @endif

                                            </div>    
                                    </dir>   
                                        
                               </div> 

                                          
                            <div class="container" id="offer1" style="border-style: solid;border-color: rgb(230, 230, 230);border-width: 10px;width: 69%;padding-top: 10px;padding-bottom: 5px; display: none; justify-content: center;margin-top: 5px;" >                           
                                 
                                <div class="form-group row" style="width: 100%;display: flex;justify-content: center;padding-right: 40px;margin-top: 0px;margin-bottom: 0px;padding-left: 50px;">

                                          

                                                 <dir  class="col-md-2" style="padding-right: 1px;padding-left: 1px;margin-top: 0px;margin-bottom: 0px;">
                                                      <label>{{ __('Select Offer') }}</label>
                                                 </dir>
                                                  <div  class="col-md-7" style="padding-left: 5px;margin-left: 20px;">

                                                    <SELECT style="width:350px margin-left: 20px;" id="applications" class="form-control input-lg dynamic" data-dependent="URL" required>

                                                      
                                                       
                                                        <option value="applications"  id="applications"  class="{{$errors->has('applications') ? ' is-invalid' : '' }}" ></option>
                                                     
                                                    </SELECT>   

                                                      @if ($errors->has('applications'))
                                                          <span class="invalid-feedback">
                                                              <strong>{{ $errors->first('applications') }}</strong>
                                                          </span>
                                                      @endif
                                                   </div>
                                          
                                      </div>
                                   </div>
                                      
                            <div id="buttonoffer1" style="display: flex;justify-content: center; display: none;">

                                     <div id="frame1" class="form-group" id="link" style="display: flex;justify-content: center;">
                                        
                                                          <iframe id="URL">browser does not support the iframe component</iframe>

                                                      <object id="URL" name="URL" type="text/html" width="400" height="400"sandbox="allow-scripts allow-same-origin allow-forms"> </object> 

                                      </div> 
                                      



                                       <div class="container"  style="border-style: solid;border-color: rgb(230, 230, 230);border-width: 10px;width: 69%;padding-top: 10px;padding-bottom: 5px; justify-content: center;margin-top: 5px;" >                           
                                 
                                            <div class="form-group row" style="width: 100%;display: flex;justify-content: center;padding-right: 40px;margin-top: 0px;margin-bottom: 0px;padding-left: 50px;">


                                                  <div  class="col-md-9" style=" display: flex; justify-content: center; padding-left: 80px;" >
                                                              
                                                                  <button value="boton" type="submit" class="btn btn-primary" name="boton" id="boton" onclick="accion();">
                                                                      {{ __('Create') }}
                                                                  </button>
                                                  </div> 

                                            </div>
                                      </div>                           

                                                           
                        </div>
                     
                    </form>
           
                   
                   <div class="container"  id="buttons" style="display: flex;justify-content: center;padding-top: 5px;  display: none;">
                          <button class="btn btn-danger" style="margin-right: 10px;">Send Twilio</button>
                          <button class="btn btn-warning">Send Postmark</button>
                  </div>
        </div> 
</div>
 
@endsection

@section('scripts')
    <script>
      $(document).ready(function(){
          $('.sel-Address').select2();
       });
    </script>

<script type="text/javascript">
  $('#Address').change(function (){
  document.getElementById('offer1').style.display ='inherit';
  document.getElementById('offer1').style.display ='flex';

  var id = $(this).attr("name"); 
  var dependent = $(this).data('dependent');
  //alert('id=    '+id);
 // alert('depndent=    '+dependent);
                 var _token = '{{csrf_token()}}';
  
   $.ajax({
                              url:"/Petition",
                              method:"POST",
                              data:{id:id, _token:_token,dependent:dependent},
                              success:function(result){                                
                               $('#'+dependent).html(result);
                              }

                             })


  });
  
  $('#applications').change(function (){
  document.getElementById('buttonoffer1').style.display ='inherit';
  document.getElementById('buttonoffer1').style.display ='flex';
  document.getElementById('buttons').style.display ='inherit';
  document.getElementById('buttons').style.display ='flex';


 var id = $(this).attr("id"); 
  var value = $(this).val();
  alert('value '+value);
  var dependent = $(this).data('dependent');
  //alert('id=    '+id);
  //alert('depndent=    '+dependent);
                 var _token = '{{csrf_token()}}';
  
   $.ajax({
                              url:"/PetitionURL",
                              method:"POST",
                              data:{id:id, value:value, _token:_token,dependent:dependent},
                              success:function(result){                               
                               $('#'+dependent).html(result);
                              }

                             })



  });
</script>

@endsection