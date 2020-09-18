$(document).ready(function(){
	$('.quantity').keyup(function(){
		var quantity = $(this).val();
		// var prize =  $(".labelPrize").html();
		var prize =  $(this).parent().prev().find('label').html();
 		var total = quantity*parseFloat(prize);
 		$(".labelTotal").html(total); 
		$(".grandTotal").html(total); 
		$(".hiddenTotal").val(total);
		$(".hiddenQuantity").val(quantity);
 		
	})
})