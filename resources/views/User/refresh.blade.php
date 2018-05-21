@extends('layouts.app')

@section('content')

<div class="container">

        <div class="form-group">

          <label for="Address-Select2"> Select Full Address 1 </label>

          <select name="Address-Select2" id="Address-Select2" class="form-control">

            @foreach($properties->data as  $user)

            <option value="{{ $user->id  }}">{{ $user->full_address }}</option>

            @endforeach

          </select>
        </div> 
</div>
 
@endsection

@section('scripts')
    <script>
      $(document).ready(function(){
          $('.sel-Address').select2();
       });
    </script>
@endsection