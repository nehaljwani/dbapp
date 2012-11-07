<?php include_once('header.php'); ?>
<?php 
	include"essential.php";
	$query="SELECT * FROM Brand;";
?>
<div class="post">
	<h2 class="title"><a href="#">Brand List </a></h2>
	<div style="clear: both;">&nbsp;</div>
	<script type='text/javascript' src='./js/jquery.min.js'></script>
	<script type='text/javascript' src='./js/brand.js'></script>
<?php if($_SESSION['ID']==0){
	?>
        <p class="meta">
	<span class="date">Click to edit the details of any Brand!</span>
        </p>
	<button type="button" id='view' class="more">View Brands</button>
	<button type="button" id='add' class="more">Add a Brand</button>
<?php }
?>
	<br><br><br><br>
	<div class="entry">
<form method="POST" action="dbentry.php" name="delete">

		<table class="payment-table" id="brandDetails" >
				<tr>
					<td>Name</td>
					<td>Description</td>
					<td>Rating</td>
					<?php if($_SESSION['ID']==0){
                                        ?>
                                        <td>Delete Option</td>
                                        <?php }
                                        ?>

				</tr>
			<?php echo generateBrand($query); ?>
		</table>
                </form>
		<form id="newBrandDetails" method="post" action="dbentry.php">
		Enter Brand details:
			<table >
				<tr>
					<td>Name</td>
					<td><input type="text" name="Name" required></td>
				</tr>
				<tr>
					<td>Description</td>
					<td><input type="text" name="Description" required></td>
				</tr>
				<tr>
					<td>Rating</td>
					<td><input type="text" name="Rating" required></td>
				</tr>
			</table>		
			<input type="submit" class="more" value="Submit">
		</form>	
	</div>
</div>
<?php include_once('footer.php'); ?>
