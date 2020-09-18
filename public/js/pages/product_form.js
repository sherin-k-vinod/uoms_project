$(document).ready(function(){
	$('.formBtn').click(function(){
		var username = $(".nam").val();
		var size = $(".siz").val();
		//var gender = $('.gender').val();
		//$(".uname"") where 'uname' is class , if it is id, $('#name')

		if(username == ""){
			alert("Username is required");
			return false;
		}else if ($(".gender:checked").length > 1 || $(".gender:checked").length == 0){
     	 	alert("Gender is required");
     	 	return false;
    	}
		else if(size == ""){
			alert("Size is required");
			return false;
		}else if(size<30 ||size>50){
			alert("The size limit must between 30 & 50");
			return false;
		}
		else{
			return true;
		}



	});
});