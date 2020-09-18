$(document).ready(function(){
	$('.productSwitch').change(function(){
		var fetch = $(this).attr('fetch');
		var token = $(this).attr('token');
		var productId = $(this).val();
		$.ajax({
			url:fetch,
			type:'post',
			data:{'_token':token,'product_id':productId},
			success:function(response){
				$(".variant").html(response);
			}
		});
	})
})