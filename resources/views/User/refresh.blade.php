@extends('layouts.app')

@section('content')

<div class="container">
   
    <table id="TableProperties" class="display nowrap">
        <div class="card-header">{{ __('Reference Properties') }} </div>
         <thead>
            <tr>
                <th>Id</th> 
                <th>Full Address</th>
                <th>Address Lines</th>                
                <th>Building Name</th>
                <th>Address 1</th>
                <th>Address 2</th>
                <th>City</th>
                <th>Post Code</th>
                <th>Country</th>
                <th>Country Code</th>
                <th>Available From</th>
                <th>Marketing Rent</th>
                <th>Viewing Arrangement Information</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($properties->data as  $propertie)
            <tr>
                <td>{{$propertie->id}}</td>
                <td>{{$propertie->full_address}}</td>
                <td>{{$propertie->address_lines}}</td>
                <td>{{$propertie->building_name}}</td>
                <td>{{$propertie->address_1}}</td>
                <td>{{$propertie->address_2}}</td>
                <td>{{$propertie->city}}</td>
                <td>{{$propertie->post_code}}</td>
                <td>{{$propertie->county}}</td>
                <td>{{$propertie->country_code}}</td>
                <td>{{$propertie->available_from}}</td>
                <td>{{$propertie->marketing_rent}}</td>
                <td>{{$propertie->viewing_arrangement_information}}</td>                
            </tr>
            @endforeach
        </tbody>
    </table>   
   
</div>
 
@endsection

@section('scripts')
    <script>
        $(document).ready(function() 
            {
            $('#TableProperties').DataTable( 
                {
                "scrollY": 500,
                } );
            } );
    </script>
    @endsection