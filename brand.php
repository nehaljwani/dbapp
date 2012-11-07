<?php include_once('header.php'); ?>
<?php 
	include"essential.php";
	$query="SELECT * FROM Brand;";
?>
<div class="post">
	<h2 class="title"><a href="#">Brand List </a></h2>
	<p class="meta">
	<span class="date">Click to edit the details of any Brand!</span>
	</p>
	<div style="clear: both;">&nbsp;</div>
	<script type='text/javascript' src='./js/jquery.min.js'></script>
	<script type='text/javascript' src='./js/brand.js'></script>
	<button type="button" id='view' class="more">View Brands</button>
	<button type="button" id='add' class="more">Add a Brand</button>
	<br><br><br><br>
	<div class="entry">
		<table class="payment-table" id="brandDetails" >
				<tr>
					<td>Name</td>
					<td>Description</td>
					<td>Rating</td>
				</tr>
			<?php echo generateBrand($query); ?>
		</table>
		<form id="newBrandDetails" method="post" action="dbentry.php">
		Enter Vendor details:
			<table >
				<tr>
					<td>Name</td>
					<td><input type="text" name="Name"></td>
				</tr>
				<tr>
					<td>Description</td>
					<td><input type="text" name="Description"></td>
				</tr>
				<tr>
					<td>Rating</td>
					<td><input type="text" name="Rating"></td>
				</tr>
			</table>		
			<input type="submit" class="more" value="Submit">
		</form>	
	</div>
</div>
<?php include_once('footer.php'); ?>
