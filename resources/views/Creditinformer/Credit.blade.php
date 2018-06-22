@extends('layouts.app')

@section('content')
@include('sweetalert::alert')
<div class="container">
    <div class="form-group">
              
                <div class="card-header" style=" border-top-width: 10px;border-bottom-width: 10px; border-bottom-color: rgba(255,255,255,0.9); overflow: hidden; ">{{ __('Creditinformer') }}</div>

                  <div class="container" style="display: flex ; justify-content: center ;">
                    <form method="POST" action="{{ route('Twilio.send') }}">
                        {{ csrf_field() }}
                        @csrf
                                <label for="TwilioSendSms" class="col-md-4 col-form-label text-md-right"></label>                                           
                                    <div class="container" style="display: flex;justify-content: space-around;border-style: solid;border-color: rgb(230, 230, 230);border-width: 10px;width: 602px;padding-top: 15px;padding-bottom: 15px;padding-left: 15px;margin-bottom: 5px;" >
                                      <div class="form-group row" style="display: flex;justify-content: center;margin-bottom: 0px;">
                                      
                                       <label for="Twilio">{{ __('Select User') }}</label>
                                                               

                                                                <div style="padding-bottom: 10px;padding-left: 45px;">

                                                                   <select style="width: 200px;" class="form-control sel-User dynamic" name="user" id="user" data-dependent="country_code" required >
                                                                       <option name="user">Select User</option>                                                                  
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
                                    </div>
                                      
                                    <div class="container" id="div1" style=" display: flex ; justify-content: center ; border-style: solid ; border-color: #E6E6E6 ;border-width: 10px; width: 602px; justify-content: space-around;padding-top: 15px;padding-bottom: 15px;padding-left: 0px; display:none;" >

                                        <div class="form-group row" style="width: 90%; display: flex !important ;justify-content: center !important; ">
                                    
                                                      
                                                        
                                                        <label for="Telefono">{{ __('Phone number') }}</label>
                                                        
                                                        <div class="col-md-4">

                                                            <select style="width: 200px;" id="country_code" type="text" name="country_code" class="form-control input-lg dynamic" required>

                                                               <option value="country_code" name="country_code" id="country_code" placeholder="Country code" class="{{$errors->has('country_code') ? ' is-invalid' : '' }}" ></option> 
                                                            </select>

                                                          

                                                            @if ($errors->has('country_code'))
                                                                <span class="invalid-feedback">
                                                                    <strong>{{ $errors->first('country_code') }}</strong>
                                                                </span>
                                                            @endif


                                                        </div>
                                              

                                              <div class="col-md-15" style="padding-top: 5px;" > 
                                               <textarea name="sms" id="sms" rows="10" cols="90" placeholder="Text Sms" class="form-control{{  $errors->has('sms') ? ' is-invalid' : '' }}" required></textarea>
                                                  @if ($errors->has('sms'))
                                                        <span class="invalid-feedback">
                                                            <strong>{{ $errors->first('sms') }}</strong>
                                                        </span>
                                                    @endif
                                              </div>  
                                              

                                         </div>
                                        
                                   </div>     
                        
                                               
                                    <div id="button" class="container" style="padding-top: 5px; display: flex ; justify-content: center ; display:none;">
                                        
                                            <button type="submit" class="btn btn-primary">
                                                {{ __('Send Sms') }}
                                            </button>
                                   </div>
                   </form> 
                 </div>
              </div>             
          </div>
               <div class="form-group" id="link" style="display: flex;justify-content: center;">
                              
                                                <iframe src="https://html.hazunaweb.com/"

                                            width="600" height="400" scrolling="auto">

                                            Texto alternativo para navegadores que no aceptan iframes

                                            </iframe>

                                            <object type="text/html" data="https://app.noagent.co.uk/apply/eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJwcnAiOiJhcGkiLCJzYnQiOiJ1c2VyIiwic3ViIjoxMTA4LCJleHAiOjMzMDY0MzkzMjQwLCJwZXIiOnsiYXBpLnByb3BlcnRpZXMuKiI6MSwiYXBpLmFwcGxpY2F0aW9ucy4qIjoxfX0.YrNXHlHYVW7jQvJE7HDzS8tYrz9tvuIXYQ3D4Ll3mbY" width="400" height="400"> </object> 

                            </div>   
    </div>
@endsection
@section('scripts')
<script src="/user/select_User.js"></script>
    <script>
      $(document).ready(function(){
          $('.sel-User').select2();
       });
    </script>
@endsection
