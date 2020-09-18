$(document).ready(function(){
	$('.editBtn').click(function(){
		var colour = $(".colour").val();
		var prize = $(".prize").val();
		//var gender = $('.gender').val();
		//$(".uname"") where 'uname' is class , if it is id, $('#name')
		if(colour == ""){
			alert("Colour is required");
			return false;
		}
		else if(prize == ""){
			alert("Prize is required");
			return false;
		}else{
			return true;
		}

	});
});