function removeProduct(id){
	$('#'+id).parents('form').submit();
}

function displayMenu(){
	$("#menu").css('display', 'initial');
}

function closeMenu(){
	$("#menu").css('display', 'none');
}