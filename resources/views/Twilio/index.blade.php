@extends('layouts.app')

@section('content')
<div class="container">
    <div class="form-group">

                <div class="card-header" style=" border-top-width: 10px;border-bottom-width: 10px; border-bottom-color: rgba(255,255,255,0.9); overflow: hidden; ">{{ __('Send Sms') }}</div>

                  <div class="container" style="display: flex ; justify-content: center ;">
                    <form method="POST" action="{{ route('Twilio.send') }}">
                       
                                <label for="TwilioSendSms" class="col-md-4 col-form-label text-md-right"></label>                                           
                                       
                                      
                                    <div class="container" style=" display: flex ; justify-content: center ; border-style: solid ; border-color: #E6E6E6 ;border-width: 10px; width: 602px; justify-content: space-around;padding-top: 15px;padding-bottom: 15px;padding-left: 0px;" >

                                        <div class="form-group row" style="width: 90%;">
                                    
                                                      
                                                        
                                                        <label for="Telefono">{{ __('Phone number') }}</label>
                                                        
                                                        <div class="col-md-4">
                                                            <input id="country_code" type="text" placeholder="Country code" class="form-control{{ $errors->has('country_code') ? ' is-invalid' : '' }}" name="country_code" required>

                                                            @if ($errors->has('country_code'))
                                                                <span class="invalid-feedback">
                                                                    <strong>{{ $errors->first('country_code') }}</strong>
                                                                </span>
                                                            @endif
                                                        </div>

                                                        <div class="col-md-5">
                                                            <input id="phone_number" type="text" placeholder="Phone number" class="form-control{{ $errors->has('phone_number') ? ' is-invalid' : '' }}" name="phone_number"  required>                                

                                                            @if ($errors->has('phone_number'))
                                                                <span class="invalid-feedback">
                                                                    <strong>{{ $errors->first('phone_number') }}</strong>
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
                        
                                               
                                    <div class="container" style="padding-top: 5px; display: flex ; justify-content: center ;">
                                        
                                            <button type="submit" class="btn btn-primary">
                                                {{ __('Send Sms') }}
                                            </button>
                                   </div>
                   </form> 
                 </div>
              </div>             
          </div>
    </div>
@endsection