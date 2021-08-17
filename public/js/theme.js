document.querySelectorAll('.datepicker').forEach(function(field) {
	var picker = new Pikaday({
		field: field
	});
});



$("#fav").click(function(){

	color=$(this).css("color");
	
	if(color=="rgb(136, 136, 136)"){
		$(this).css("color","red");
		id=$(this).attr("data-id");
		send_fav(1,id);
		


	}else{
		$(this).css("color","rgb(136, 136, 136)");
		id=$(this).attr("data-id");
		send_fav(0,id);
	}

	
	});



	function send_fav(number,add_id){

		$.ajax({
			url: "/update_fav",
			type:"POST",
			data:{
				"add_id":add_id,
				"id":number,
				"_token":  document.querySelector('meta[name="csrf-token"]').content,
			 
			},
			success:function(response){
			 
			},
		   });

	}