function addToBasket(id,price){        
	$.ajax({
		url: './ajax/addToBasket.php',
		data: 'id=' + id + '&price=' + price +  '',
		cache: false,
		success: function(html) {
			$("#basketInfo").html(html);			
		}
	});
}