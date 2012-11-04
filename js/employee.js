$(document).ready(function() {
	$('#newEmployeeDetails').hide();
	$('#view').click(function(){ 
		$('#newEmployeeDetails').hide();
		$('#employeeDetails').show();	
	});
	$('#add').click(function(){ 
		$('#newEmployeeDetails').show();
		$('#employeeDetails').hide();	
	});
	$('.Category').each(function(){$(this).hide()})
	$('#'+$('#EmployeeType').val()).show()
	$('#EmployeeType').change(function(){
		$('.Category').each(function(){$(this).hide()})
		$('#'+$(this).val()).show()
	})
})
