<?php include_once('header.php'); ?>
<?php 
	include"essential.php";
	$query="SELECT * FROM AuthorizedSC NATURAL JOIN AuthorizedService";
?>
<div class="post">
	<h2 class="title"><a href="#">Authorized Service Center List</a></h2>
	<div style="clear: both;">&nbsp;</div>
	<div class="entry">
	<script type='text/javascript' src='./js/jquery.min.js'></script>
	<script type='text/javascript' src='./js/asc.js'></script>
	</div>
<?php if($_SESSION['ID']==0){
	?>
	<p class="meta">
	<span class="date">Click to edit the details of any ASC!</span>
	</p>
	<button type="button" id='view' class="more">View Service Centers</button>
	<button type="button" id='add' class="more">Add Service Center</button>

<?php }
?>
</div><div class="post">
	<div class="entry">
<form method="POST" action="dbentry.php" name="delete">

		<table class="item-table" id="ASCDetails">
				<tr>
					<td>ASCID</td>
					<td>Brand</td>
					<td>Address</td>
					<td>Phone</td>
					<td>Services Supported</td>
					<?php if($_SESSION['ID']==0){
                                        ?>
                                        <td>Delete Option</td>
                                        <?php }
                                        ?>

				</tr>
			<?php echo generateASC($query); ?>
		</table>
                </form>
		<form id="newASCDetails" method="post" action="dbentry.php">
		Enter Service Center details:
			<table >
				<tr>
					<td>Brand</td>
					<td><select name="Brand"><?php echo genBrand(); ?></td>
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
					<td>Services Supported</td>
					<td><input type="text" name="ServicesSupported" required></td>
				</tr>
			</table>		
			<input type="submit" class="more" value="Submit">
		</form>	
	</div>
</div>
<?php include_once('footer.php'); ?>
