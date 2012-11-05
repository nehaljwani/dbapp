$(document).ready(function() {
	$('#newBrandDetails').hide();
	$('#view').click(function(){ 
		$('#newBrandDetails').hide();
		$('#brandDetails').show();	
	});
	$('#add').click(function(){ 
		$('#newBrandDetails').show();
		$('#brandDetails').hide();	
	});
})
