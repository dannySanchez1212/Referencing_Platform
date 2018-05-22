$('#Address-Select2').change(function(){
	
     alert('event boton'+$(this).val());

	if ($(this).val()!='') {

		var select = $(this).attr("id");
		var value = $(this).val();
		//var dependent = $(this).data('dependent');
		var _token = $('input[name="_token"]').val();
	
		//var dependent = $(this).data('dependent');
		//var _token = $('input[name="_token"]').val();
		 alert('option select .................................'+select);
        alert('value.................................'+value);       
        alert('option token .................................'+_token);

   
   if($('#boton').on("click") ){

	    $.ajax({
			url:"/reference/update",
			method:"POST",
			data:{select:select, value:value, _token:_token},

			success:function(result){
                   alert('option select .................................'+select);
			        alert('value.................................'+value);       
			        alert('option token .................................'+_token);

				  swal({ title:'success!',text:"Update Reference",type:'success'});
                                location.reload();

			}
		})
	   }
	  
	 }

});	  