<?php include_once('header.php'); ?>
<?php include "essential.php"?>
<div class="post">
	<h2 class="title"><a href="#">Edit Employee Details </a></h2>
	<script type='text/javascript' src='./js/jquery.min.js'></script>
	<script type='text/javascript' src='./js/editEmployee.js'></script>
	<div style="clear: both;">&nbsp;</div>
	<div class="entry">
		<form id="editEmployee" method="POST" action="dbentry.php" name="edit">
			<table>
				<?php 
				$query="SELECT * FROM Employee NATURAL JOIN ".$_GET['Category']." WHERE EmpID=".$_GET['EmpID'].";";
				echo getEmployeeDetails($query);
				?>
			</table>
			<a href="#" class="more" onclick="document.edit.submit()">Submit</a>	
		</form>
	</form>	
</div>
			</div>
			<?php include_once('footer.php'); ?>
