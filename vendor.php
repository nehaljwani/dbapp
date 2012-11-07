<?php include_once('header.php'); ?>
<?php 
	include"essential.php";
	$query="SELECT * FROM Vendor NATURAL JOIN VendorBrands;";
?>
<div class="post">
	<h2 class="title"><a href="#">Vendor List </a></h2>
	<script type='text/javascript' src='./js/jquery.min.js'></script>
	<script type='text/javascript' src='./js/vendor.js'></script>
	<div style="clear: both;">&nbsp;</div>
<?php if($_SESSION['ID']==0){
?>
	<p class="meta">
	<span class="date">Click to edit the details of any Vendor!</span>
	</p>
	<button type="button" id='view' class="more">View Vendors</button>
	<button type="button" id='add' class="more">Add a Vendor</button>
<?php }
?>
	<br><br><br><br>
	<div class="entry">
		<form method="POST" action="dbentry.php" name="delete">
		<table class="item-table" id="vendorDetails">
				<tr>
					<td>VendId</td>
					<td>Name</td>
					<td>Address</td>
					<td>Phone</td>
					<td>Brands</td>
					<?php if($_SESSION['ID']==0){
					?>
					<td>Delete Option</td>
					<?php }
					?>
				</tr>
			<?php echo generateVendor($query); ?>
	</table>
		</form>
		<form id="newVendorDetails" method="post" action="dbentry.php">
		Enter Vendor details:
			<table >
				<tr>
					<td>Name</td>
					<td><input type="text" name="Name" required></td>
				</tr>
				<tr>
					<td>Address</td>
					<td><input type="text" name="Address" required></td>
				</tr>
				<tr>
					<td>Phone</td>
					<td><input type="text" name="Phone" required></td>
				</tr>
				<tr>
					<td>Brands</td>
					<td><input type="text" name="Brands" required></td>
				</tr>
			</table>		
			<input type="submit" class="more" value="Submit">
		</form>	
	</div>
</div>
<?php include_once('footer.php'); ?>
