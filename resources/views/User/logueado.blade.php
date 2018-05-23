@extends('layouts.app')

@section('content')

@include('sweetalert::alert')
<div class="container">
    @if($user->count())
    <table id="userLogueo" class="display nowrap" >
        <div class="card-header">{{ __('Login Records') }} </div>
        <ul style="border-top-width: 10px;border-bottom-width: 10px; border-bottom-color: rgba(255,255,255,0.9); height: auto ! important;"></ul>
        <thead>
            <tr>
                <th>User</th> 
                <th>Name</th>
                <th>Email</th>                
                <th>Log in</th>

            </tr>
        </thead>
        <tbody>
            @foreach ($user as  $value  => $use)
            <tr>
                <td>{{$use->id}}</td>
                <td>{{$use->user_id}}</td>
                <td>{{$use->created_at}}</td>
                <td>{{$use->log_in }}</td>                
            </tr>
            @endforeach
        </tbody>
    </table>   
    @else
       <p> No user have been found </p>
    @endif
</div>
 
@endsection

@section('scripts')
    <script>
        $(document).ready(function() 
            {
            $('#userLogueo').DataTable( 
                {
                "scrollY": 500,
                } );
            } );
    </script>
    @endsection