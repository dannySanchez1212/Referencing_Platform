@extends('layouts.app')

@section('content')

<div class="container">

        <div class="form-group">

          <label for="TableAddress">Select Full Address 1</label>

          <select name="user_id" id="TableAddress" class="form-control">

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
          $('#TableAddress').select2();
       });
    </script>
@endsection