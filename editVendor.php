<?php include_once('header.php'); ?>
<?php include "essential.php"?>
<div class="post">
	<h2 class="title"><a href="#">Edit Vendor Details </a></h2>
	<script type='text/javascript' src='./js/jquery.min.js'></script>
	<script type='text/javascript' src='./js/editVendor.js'></script>
	<div style="clear: both;">&nbsp;</div>
	<div class="entry">
		<form id="editEmployee" method="POST" action="dbentry.php">
			<table>
				<?php 
				$query="SELECT * FROM Vendor NATURAL JOIN VendorBrands WHERE VendID=".$_GET['VendID'].";";
				echo getVendorDetails($query);
				?>
			</table>
			<input type=submit class="more" value="Submit">	
		</form>
	</form>	
</div>
			</div>
			<?php include_once('footer.php'); ?>
