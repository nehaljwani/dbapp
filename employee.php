<?php include_once('header.php'); ?>
<?php 
	include"essential.php";
	$query="SELECT * FROM Employee";
?>
<div class="post">
	<h2 class="title"><a href="#">Welcome to Keyboard </a></h2>
	<p class="meta">
	<span class="date">September 12, 2012</span>
	<span class="posted">Posted by <a href="#">Someone</a></span>
	</p>
	<div style="clear: both;">&nbsp;</div>
	<script type='text/javascript' src='./js/jquery.min.js'></script>
	<script type='text/javascript' src='./js/employee.js'></script>
	<button type="button" id='view'>View Employees</button>
	<button type="button" id='add'>Add Employee</button>
	<div class="entry">
		<table id="employeeDetails" >
			<thead>
				<tr>
					<th>EmpId</th>
					<th>Name</th>
					<th>DOB</th>
					<th>Address</th>
					<th>DOJ</th>
					<th>Salary</th>
					<th>PAN</th>
					<th>Category</th>
				</tr>
			</thead>
			<?php echo generateEmployee($query); ?>
		</table>
		<form id="newEmployeeDetails" method="post" action="dbentry.php">
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
			<input type="submit">
			<p class="links">	
			<a href="#" class="more">Read More</a>
			<a href="#" title="b0x" class="comments">Comments</a>
			</p>	
		</form>	
	</div>
</div>
<?php include_once('footer.php'); ?>
