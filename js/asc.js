$(document).ready(function() {
	$('#newASCDetails').hide();
	$('#view').click(function(){ 
		$('#newASCDetails').hide();
		$('#ASCDetails').show();	
	});
	$('#add').click(function(){ 
		$('#newASCDetails').show();
		$('#ASCDetails').hide();	
	});
})
