 $(document).on('click','#boton',function(event){

                 var id = $(this).attr("name"); 
                 var _token = '{{csrf_token()}}';
                          
                         swal({
                          title: 'Are you sure?',
                          text: "Package Successfully Removed!",
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
                           alert('id....'+id+'/token....'+_token);
                             $.ajax({
                              url:"/destroyO",
                              method:"POST",
                              data:{id:id, _token:_token},
                              success:function(result){

                                swal({ title:'Deleted!',text:"Owner Successfully Removed",type:'success'});
                                location.reload();
                              }

                             })
                           } else if(result.dismiss == swal.DismissReason.cancel){
                            
                            swal({ title:'Cancelled',text:"Owner Successfully Not Removed",type:'error'});
                            
                          }
                        })

      });