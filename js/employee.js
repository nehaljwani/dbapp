$(document).ready(function() {
	$('.Category').each(function(){$(this).hide()})
	$('#'+$('#EmployeeType').val()).show()
	$('#EmployeeType').change(function(){
		$('.Category').each(function(){$(this).hide()})
		$('#'+$(this).val()).show()
	})
})
