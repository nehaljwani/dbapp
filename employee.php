<?php include_once('header.php'); ?>
<div class="post">
	<h2 class="title"><a href="#">Welcome to Keyboard </a></h2>
	<p class="meta">
	<span class="date">September 12, 2012</span>
	<span class="posted">Posted by <a href="#">Someone</a></span>
	</p>
	<div style="clear: both;">&nbsp;</div>
	<script type='text/javascript' src='./js/jquery.min.js'></script>
	<script type='text/javascript' src='./js/employee.js'></script>
	<div class="entry">
		Enter Employee details:
		<form id="info" method="post" action="dbentry.php">
			<table id="entry" >
				<tr>
					<td>Name</td>
					<td><input type="text" name="Name"></td>
				</tr>
				<tr>
					<td>DOB</td>
					<td><input type="text" name="Name"></td>
				</tr>
				<tr>
					<td>Address</td>
					<td><input type="text" name="Address"></td>
				</tr>
				<tr>
					<td>DOJ</td>
					<td><input type="text" name="Email"></td>
				</tr>
				<tr>
					<td>Salary</td>
					<td><input type="text" name="Phone"></td>
				</tr>
				<tr>
					<td>PAN</td>
					<td><input type="text" name="UserName"></td>
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
					<td><input type="text" name="Department"></td>
				</tr>
				<tr class="Category" id="Engineer">
					<td>Specialization</td>
					<td><input type="text" name="Specialization"></td>
				</tr>
				<tr class="Category" id="SalesPerson">
					<td>SalesNo</td>
					<td><input type="text" name="SalesNo"></td>
				</tr>
				<tr class="Category" id="Driver">
					<td>License No</td>
					<td><input type="text" name="LicenseNo"></td>
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
