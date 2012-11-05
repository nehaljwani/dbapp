$(document).ready(function() {
	$('#newItemDetails').hide();
	$('#view').click(function(){ 
		$('#newItemDetails').hide();
		$('#itemDetails').show();	
	});
	$('#add').click(function(){ 
		$('#newItemDetails').show();
		$('#itemDetails').hide();	
	});
	$('.Category').each(function(){$(this).hide()})
	$('#'+$('#itemType').val()).show()
	$('#itemType').change(function(){
		$('.Category').each(function(){$(this).hide()})
		$('#'+$(this).val()).show()
	})
})
