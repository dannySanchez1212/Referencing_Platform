@extends('layouts.app')

@section('content')
@include('sweetalert::alert')
<div class="container" >
         
        <div class="form-group">
            

          
            <div class="card-header" style="border-top-width: 10px;border-bottom-width: 10px; border-bottom-color: rgba(255,255,255,0.9); overflow: hidden; " > {{ __(' Select Full Address 1 ') }} </div>

           <form method="POST" action="{{ route('Reference.update') }}">
                        @csrf

                   <label for="AddressSelect2" class="col-md-4 col-form-label text-md-right"></label>
                      

                        <div class="container" style="border-style: solid ; border-color: #E6E6E6 ;border-width: 10px; width: 602px;padding-top: 10px;padding-bottom: 5px;" >

                          <div class="container" style=" display: flex;justify-content: center;">
                                 
                                <dir class="form-group row">
                                  <label>{{__('Select Property')}}</label>
                                    <div class="col-md-9" style=" padding-left: 50px; width: 50px !important;">
                                         <select style="width:350px" class="form-control sel-Address input-lg dynamic" name="AddressSelect2" lass="form-control input-lg dynamic" data-placeholder="Select Address" data-dependent="applications">
                                              
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
                                    
                                        

                                                 <dir class="col-md-3" style="padding-right: 1px;width: 80px ! important;padding-left: 1px;">
                                                      <label>{{ __('Select Offer') }}</label>
                                                 </dir>
                                                  <div class="col-md-9" style="padding-top: 5px; padding-left: 27px;
">

                                                    <SELECT style="width:350px" Value="applications" id="applications" name="applications" class="form-control input-lg dynamic" data-dependent="city">
                                                        <option value="applications" id="applications" selected="selected" class="{{$errors->has('applications') ? ' is-invalid' : '' }}" >Select Offer</option>
                                                        
                                                    </SELECT>                                
                                                      @if ($errors->has('applications'))
                                                          <span class="invalid-feedback">
                                                              <strong>{{ $errors->first('applications') }}</strong>
                                                          </span>
                                                      @endif
                                                   </div>
                                          

                                   

                                              <div class="col-md-9" style=" display: flex; justify-content: center; padding-left: 80px;" >
                                                          
                                                              <button value="boton" type="submit" class="btn btn-primary" name="boton" id="boton" onclick="accion();">
                                                                  {{ __('Create') }}
                                                              </button>
                                              </div> 
                            </dir>                          
                        </div>
                      </div> 
                    </form>
           
         <div class="container" style="display: flex;justify-content: center;padding-top: 5px; ">
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
<script src="/js/Select/select.js"></script>
@endsection