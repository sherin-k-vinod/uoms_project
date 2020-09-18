$(document).ready(function(){
	$(".saveBtn").click(function(){
		var amount = $(".amnt").val();
		if(amount == ""){
			alert("Amount is required");
			return false;
		}else{
			return true;
		}
	});
});
