$(document).ready(function(){
	$('.uloginBtn').click(function(){
		var username = $(".uname").val();
		var password = $(".pawd").val();
		//$(".uname"") where 'uname' is class , if it is id, $('#name')
		if(username ==""){
			alert("Username is required");
			return false;
		}else if(IsEmail(username)==false){
          alert("Username must be a valid email");
          return false;
        }
		else if(password ==""){
			alert("Password is required");
			return false;
		}else{
			return true;
		}
		//here used 'usernames' are name of field
		function IsEmail(username){
			var valrule = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
			if(!valrule.test(username)){
				return false;
			}else{
				return true;
			}
		}

	});
});