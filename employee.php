<?php include_once('header.php'); ?>
<?php 
	include"essential.php";
	$query="SELECT * FROM Employee";
?>
<div class="post">
	<h2 class="title"><a href="#">Employee List</a></h2>
	<div style="clear: botd;">&nbsp;</div>
	<script type='text/javascript' src='./js/jquery.min.js'></script>
	<script type='text/javascript' src='./js/employee.js'></script>
<?php if($_SESSION['ID']==0){
	?>
	<p class="meta">
	<span class="date">Click to edit tde details of any employee!</span>
	</p>
	<button type="button" id='view' class="more">View Employees</button>
	<button type="button" id='add' class="more">Add Employee</button>
<?php }
?>

	<br><br><br><br>
	<div class="entry">
<form method="POST" action="dbentry.php" name="delete">

		<table class="item-table" id="employeeDetails">
				<tr>
					<td>EmpId</td>
					<td>Name</td>
					<td>DOB</td>
					<td>Address</td>
					<td>DOJ</td>
					<td>Salary</td>
					<td>PAN</td>
					<td>Category</td>
					<?php if($_SESSION['ID']==0){
                                        ?>
                                        <td>Delete Option</td>
                                        <?php }
                                        ?>

				</tr>
			<?php echo generateEmployee($query); ?>
		</table>
                </form>
		<form id="newEmployeeDetails" method="post" action="dbentry.php" name="employee">
		Enter Employee details:
			<table >
				<tr>
					<td>Name</td>
					<td><input type="text" name="Name" required></td>
				</tr>
				<tr>
					<td>DOB</td>
					<td><input type="date" name="DOB"></td>
				</tr>
				<tr>
					<td>Address</td>
					<td><input type="text" name="Address"></td>
				</tr>
				<tr>
					<td>DOJ</td>
					<td><input type="date" name="DOJ"></td>
				</tr>
				<tr>
					<td>Salary</td>
					<td><input type="text" name="Salary"></td>
				</tr>
				<tr>
					<td>PAN</td>
					<td><input type="text" name="PAN"></td>
				</tr>
				<tr>
					<td>Category</td>
					<td>
						<select name="Category" id='EmployeeType'>
							<option value="Manager">Manager</option>
							<option value="Engineer">Engineer</option>
							<option value="SalesPerson">Sales Person</option>
							<option value="Driver">Driver</option>
						</select>		
					</td>
				</tr>
				<tr class="Category" id="Manager">
					<td>Department</td>
					<td><input type="text" name="Feild2"></td>
				</tr>
				<tr class="Category" id="Engineer">
					<td>Specialization</td>
					<td><input type="text" name="Field2"></td>
				</tr>
				<tr class="Category" id="SalesPerson">
					<td>SalesNo</td>
					<td><input type="text" name="Field2"></td>
				</tr>
				<tr class="Category" id="Driver">
					<td>License No</td>
					<td><input type="text" name="Field2"></td>
				</tr>
			</table>		
			<a href="#" class="more" onclick = "document.employee.submit()">Submit</a>
		</form>	
	</div>
</div>
<?php include_once('footer.php'); ?>
