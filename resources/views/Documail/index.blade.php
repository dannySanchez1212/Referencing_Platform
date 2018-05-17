@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Doc mail') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('Twilio.send') }}">
                        @csrf
      
                                /////////////////////////////////////

                                <div class="row">
                                                 <div class="cell label">File:</div>
                                                 <div class="cell"><input type="file" name="file"/></div>
                                             </div>
                                             <div class="row">
                                                 <div class="cell label">Progress:</div>
                                                 <div class="cell"><progress id="prog" value="0"/></div>
                                             </div>
                                             <div class="row">
                                                 <div class="cell label">Total:</div>
                                                 <div id="results" class="cell">0 items</div>
                                             </div>




                                             //////////////////////////









                                              
                        <div class="form-group row">
                            <label for="Telefono" class="col-md-4 col-form-label text-md-right">{{ __('Numero de Telefono') }}</label>

                            <div class="col-md-3">
                                <input id="country_code" type="text" placeholder="Codigo de Pais" class="form-control{{ $errors->has('country_code') ? ' is-invalid' : '' }}" name="country_code" required>

                                @if ($errors->has('country_code'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('country_code') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="col-md-5">
                                <input id="phone_number" type="text" placeholder="Numero de Telefono Movil" class="form-control{{ $errors->has('phone_number') ? ' is-invalid' : '' }}" name="phone_number"  required>                                

                                @if ($errors->has('phone_number'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('phone_number') }}</strong>
                                    </span>
                                @endif
                            </div>

                          <div class="col-md-6" > 
                           <textarea name="sms" id="sms" rows="10" cols="40" placeholder="Text Sms" class="form-control{{  $errors->has('sms') ? ' is-invalid' : '' }}" required></textarea>
                              @if ($errors->has('sms'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('sms') }}</strong>
                                    </span>
                                @endif
                          </div>                          

                        </div>

                        

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Send Sms') }}
                                </button>
                            </div>
                        </div>
                        
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection