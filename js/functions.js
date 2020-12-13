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

$(document).ready(function(e) {	
	$("#search").keyup(function() {
		$("#search__results").show();
		if($(this).val().length == 0) {
			$("#search__results").hide();
		}
		var x = $(this).val();
		$.ajax({
			type: 'GET',
			url: './ajax/searchItem.php',
			data: 'q=' + x,
			success: function(html) {
				$("#search__results").html(html);
			}
		})
	});
})