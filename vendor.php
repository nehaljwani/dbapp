<?php include_once('header.php'); ?>
<?php 
	include"essential.php";
	$query="SELECT * FROM Vendor NATURAL JOIN VendorBrands;";
?>
<div class="post">
	<h2 class="title"><a href="#">Vendor List </a></h2>
	<p class="meta">
	<span class="date">Click to edit the details of any Vendor!</span>
	</p>
	<div style="clear: both;">&nbsp;</div>
	<script type='text/javascript' src='./js/jquery.min.js'></script>
	<script type='text/javascript' src='./js/vendor.js'></script>
	<button type="button" id='view' class="more">View Vendors</button>
	<button type="button" id='add' class="more">Add a Vendor</button>
	<br><br><br><br>
	<div class="entry">
		<table id="vendorDetails" >
			<thead>
				<tr>
					<th>VendId</th>
					<th>Name</th>
					<th>Address</th>
					<th>Phone</th>
					<th>Brands</th>
				</tr>
			</thead>
			<?php echo generateVendor($query); ?>
		</table>
		<form id="newVendorDetails" method="post" action="dbentry.php">
		Enter Vendor details:
			<table >
				<tr>
					<td>Name</td>
					<td><input type="text" name="Name"></td>
				</tr>
				<tr>
					<td>Address</td>
					<td><input type="text" name="Address"></td>
				</tr>
				<tr>
					<td>Phone</td>
					<td><input type="text" name="Phone"></td>
				</tr>
				<tr>
					<td>Brands</td>
					<td><input type="text" name="Brands"></td>
				</tr>
			</table>		
			<input type="submit" class="more">
		</form>	
	</div>
</div>
<?php include_once('footer.php'); ?>
