@extends('layouts.app')

@section('content')
@include('sweetalert::alert')
<div class="container">
         
        <div class="form-group">
            <?php $users=$properties->data ?>
           <form method="POST" action="{{ route('Reference.update') }}">
                        @csrf

          <label for="Address-Select2"> Select Full Address 1 </label>
          
          <select value="Address-Select2" id="{{ $user->id }}" class="form-control input-lg dynamic" name="Address-Select2"  class="form-control">

            @foreach($properties->data as  $user)

            <option selected="selected" name= "Address-Select2" id="{{ $user->id }}" value="{{ $user->full_address }}" class="{{$errors->has('Address-Select2') ? ' is-invalid' : '' }}" required autofocus> {{ $user->full_address }} </option>          
                              
             
            @endforeach

          </select>
            @if ($errors->has('Address-Select2'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('Address-Select2') }}</strong>
                                    </span>
                                @endif


                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button value="boton" type="submit" class="btn btn-primary" name="boton" id="boton">
                                    {{ __('update') }}
                                </button>
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