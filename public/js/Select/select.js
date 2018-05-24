$('#boton').on('click',function(){
	
	//alert($propertis[1]->data->id);

   // alert('event boton'+$(this).val());

	if ($(this).val()!='') {

		var value = $('.sel-Address').select2().val();
		var id = $('.sel-Address').select2().attr("id");
		//var dependent = $(this).data('dependent');
		var _token = $('input[name="_token"]').val();
	
		
   

	    $.ajax({

			url:"/reference/update",
			method:"POST",
			data:{select:select, value:value, _token:_token},

			success:function(){
                  alert('event boton'+$(this).val());
				  swal({ title:'success!',text:"Reference created",type:'success'});
                                location.reload();

			}
		})
	   
	  
	 }

});	  