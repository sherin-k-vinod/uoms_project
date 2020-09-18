$(document).ready(function(){
	$('.variant').change(function(){
		var fetch = $(this).attr('fetch');
		var token = $(this).attr('token');
		var variantId = $(this).val();
		$.ajax({
			url:fetch,
			type:'post',
			data:{'_token':token,'varient_id':variantId},
			success:function(response){
				$(".labelPrize").html(response);
				
			}
		});
	})
})