function updateCart(action, id) {
	$.ajaxSetup({
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		}
	});

	$.ajax({
		type : "get",
		url : "updateCart",
		data : {'action': action, 'id': id},
		success: function(data) {
			console.log(action + " ok");
		},
		error : function() {
			alert("error");
		}
	});
}

function addToCart() {

}

function removeBook(id){
	updateCart('removeBook', id);
}

function increaseQty(id){
	updateCart('increaseQty', id);
}

function decreaseQty(id){
	updateCart('decreaseQty', id);
}
