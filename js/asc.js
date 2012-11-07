$(document).ready(function() {
	$('#newASCDetails').hide();
	$('#view').click(function(){ 
		$('#newASCDetails').hide();
		$('#ASCDetails').show();
		$('#delbtn').show();
	});
	$('#add').click(function(){ 
		$('#newASCDetails').show();
		$('#ASCDetails').hide();	
		$('#delbtn').hide();
	});
})
