

$('#user').change(function () {
	
	document.getElementById('div1').style.display ='inherit';
	document.getElementById('button').style.display='inherit';
	document.getElementById('div1').style.display ='flex';
	document.getElementById('button').style.display='flex';
	document.getElementById('div2').style.display='none';
	document.getElementById('div3').style.display='inherit';
	document.getElementById('div3').style.display='flex';
	

    var Country=$(this).val();

   // alert('user  '+Country); 
     //  alert('#user....'+$('#user').val());
    
	if ($('#user').val()!='') {
        
		/////var Country = $("#Country").html;
		var select = $(this).attr("id");
		var value = $(this).val();
		//alert('value.................................'+value);
		var dependent = $(this).data('dependent');
	//	alert('dependent.................................'+dependent);
		var _token = $('input[name="_token"]').val();
	  if (dependent=='country_code') {
	  	$.ajax({
			url:"/Docmail/Select",
			method:"POST",
			data:{select:select, value:value, _token:_token, dependent:dependent},
			success:function(result){
				$('#'+dependent).html(result);
			}
		})

	  } else {         
            
           // alert(Country);
          
          $.ajax({
			url:"/Docmail/Select",
			method:"POST",
			data:{select:select, value:value, _token:_token, dependent:dependent, Country:Country},
			success:function(result){
				$('#'+dependent).html(result);
			}
		}) 

	  }
	  
	 }

});	  