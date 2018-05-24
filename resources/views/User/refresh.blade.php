@extends('layouts.app')

@section('content')
@include('sweetalert::alert')
<div class="container" >
         
        <div class="form-group">
            

          
            <div class="card-header" style="border-top-width: 10px;border-bottom-width: 10px; border-bottom-color: rgba(255,255,255,0.9); overflow: hidden; " > {{ __(' Select Full Address 1 ') }} </div>

           <form method="POST" action="{{ route('Reference.update') }}">
                        @csrf

                   <label for="AddressSelect2" class="col-md-4 col-form-label text-md-right"></label>
                      

                        <div class="form-group row" style="display: flex; flex-direction: row; flex-wrap: wrap; justify-content: center;" >

                          <div class="col-md-8">

                                   <select class="form-control sel-Address" name="AddressSelect2"  class="form-control" >

                                    <option value="AddressSelect2" id="AddressSelect2" selected="selected" class="{{$errors->has('AddressSelect2') ? ' is-invalid' : '' }}" >Select Full Address 1 </option>
                                         
                                      @foreach($properties->data as  $user)

                                      <option selected="selected" name= "AddressSelect2" id="{{$user->id}}" value="{{ $user->id }}" class="{{$errors->has('AddressSelect2') ? ' is-invalid' : '' }}" required autofocus> {{ $user->full_address }} </option>          
                                                        
                                       
                                      @endforeach

                                    </select>
                                      @if ($errors->has('AddressSelect2'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('AddressSelect2') }}</strong>
                                    </span>
                                @endif

                               </div>

                                <div class="col-md-2" align="right">
                                    <div class="col-md-6 offset-md-4">
                                        <button value="boton" type="submit" class="btn btn-primary" name="boton" id="boton" onclick="accion();">
                                            {{ __('Create') }}
                                        </button>
                                    </div>
                                </div>
                        </div>
                    </form>
           
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