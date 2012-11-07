$(document).ready(function() {
	$('#newVendorDetails').hide();
	$('#view').click(function(){ 
		$('#newVendorDetails').hide();
		$('#vendorDetails').show();	
		$('#delbtn').show();
	});
	$('#add').click(function(){ 
		$('#newVendorDetails').show();
		$('#vendorDetails').hide();
		$('#delbtn').hide();
	});
})
