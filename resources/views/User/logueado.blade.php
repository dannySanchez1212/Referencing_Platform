@extends('layouts.app')

@section('content')

@include('sweetalert::alert')
<div class="container">
    @if($user->count())
    <table id="userLogueo" class="display nowrap">
        <div class="card-header">{{ __('Users ') }} </div>
        <p align="right"><a class="btn btn-primary" href="{{ route('register') }}" role="button">Add User </a></p>
        <thead>
            <tr>
                <th>User</th> 
                <th>NAME</th>
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