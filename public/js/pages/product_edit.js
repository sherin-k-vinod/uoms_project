$(document).ready(function(){
	$('.psaveBtn').click(function(){
		var username = $(".nam").val();
		var size = $(".siz").val();
		//$(".uname"") where 'uname' is class , if it is id, $('#name')
		if(username ==""){
			alert("Username is required");
			return false;
		}
		else if(size ==""){
			alert("Size is required");
			return false;
		}else{
			return true;
		}
		

	});
});