$(document).ready(function() {
	$('#newVendorDetails').hide();
	$('#view').click(function(){ 
		$('#newVendorDetails').hide();
		$('#vendorDetails').show();	
	});
	$('#add').click(function(){ 
		$('#newVendorDetails').show();
		$('#vendorDetails').hide();	
	});
})
