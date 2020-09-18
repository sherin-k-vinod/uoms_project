$(document).ready(function(){
	$('.svBtn').click(function(){
		var amount = $(".amnt").val();	
		//$(".uname"") where 'uname' is class , if it is id, $('#name')
		if(amount == ""){
			alert("Amount is required");
			return false;
		}else{
			return true;
		}

	});
});