@extends('layouts.app')

@section('content')

@include('sweetalert::alert')

<div class="container">
    @if($user->count())
    <table id="user" class="display nowrap">

              <div  class="card-header" style="overflow: hidden; padding-top: 6px;padding-bottom: 6px;"  > 
                  
                        

                          {{ __('Users ') }}                          
                           
                          
                           <a align="right" class="btn btn-primary" href="{{ route('Register.neW') }}"  role="button" style="float:right; text-align:right;">Add User </a>
                          
                          
                     
                  
              </div>
               <ul style="border-top-width: 10px;border-bottom-width: 10px; border-bottom-color: rgba(255,255,255,0.9); height: auto ! important;"></ul>
        <thead>
            <tr>
                <th>User</th> 
                <th>Name</th>
                <th>Email</th>
                <th>Country Code</th>
                <th>Phone Number</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($user as $use)
            <tr>
                <td>{{ $use->id}}</td>
                <td>{{ $use->name }}</td>
                <td>{{ $use->email }}</td>
                <td>{{ $use->country_code }}</td>
                <td>{{ $use->phone_number }}</td>
                <td>
                    <a class="btn btn-success" href="{{ route('edit', $use->id) }}" role="button"> Edit </a>
                    <a class="btn btn-danger" name="{{  $use->id }}" href="#" id="boton" id="boton"> Delete </a>
                </td>
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
            $('#user').DataTable( 
                {
                "scrollY": 500,
                } );
            } );
    </script> 

  <script type="text/javascript">
         $(document).on('click','#boton',function(event){
                 
                 var id = $(this).attr("name"); 
                 var _token = '{{csrf_token()}}';
                          
                         swal({
                          title: 'Are you sure?',
                          text: " User Successfully Removed!",
                          type: 'warning',
                          showCancelButton: true,
                          confirmButtonColor: '#3085d6',
                          cancelButtonColor: '#d33',
                          confirmButtonText: 'Yes, delete it!',
                          cancelButtonText: 'No, cancel!',
                          confirmButtonClass: 'btn btn-success',
                          cancelButtonClass: 'btn btn-danger',
                          buttonsStyling: false,
                          reverseButtons: true
                        }).then(function(result){
                          if (result.value) {
                           
                             $.ajax({
                              url:"/destroyU",
                              method:"POST",
                              data:{id:id, _token:_token},
                              success:function(result){

                                swal({ title:'Deleted!',text:"User Successfully Removed",type:'success'});
                                location.reload();
                              }

                             })
                           } else if(result.dismiss == swal.DismissReason.cancel){
                            
                            swal({ title:'Cancelled',text:"User Successfully Not Removed",type:'error'});
                            
                          }
                        })

      });
    </script>  
@endsection
