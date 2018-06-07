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
                                
                                              <div class="form-group row" style="display: flex; justify-content: center;">

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

@endsection