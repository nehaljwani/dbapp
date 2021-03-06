<?php include_once('header.php'); ?>
<?php 
	include"essential.php";
	$query="SELECT * FROM Items";
?>
<div class="post">
	<h2 class="title"><a href="#">Item List </a></h2>
	<div style="clear: both;">&nbsp;</div>
	<script type='text/javascript' src='./js/jquery.min.js'></script>
	<script type='text/javascript' src='./js/items.js'></script>
<?php if($_SESSION['ID']==0){
?>
        <p class="meta">
	<span class="date">Click to edit the details of any item!</span>
        </p>
	<button type="button" id='view' class="more">View Catalog</button>
	<button type="button" id='add' class="more">Add a new item</button>
<?php }
?>
<br><br><br><br>
	<div class="entry">
	<form method="POST" action="dbentry.php" name="delete">

		<table class="item-table" id="itemDetails">
				<tr>
					<td>ID</td>
					<td>Description</td>
					<td>Brand</td>
					<td>Name</td>
					<td>Price</td>
					<td>Category</td>
					<?php if($_SESSION['ID']==0){
                                        ?>
                                        <td>Delete Option</td>
                                        <?php }
                                        ?>

				</tr>
			<?php echo generateItems2($query); ?>
		</table>
                </form>
		<form id="newItemDetails" method="post" action="dbentry.php">
		Enter Item details:
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
					<td>Brand</td>
					<td>
						<select name="Brand"><?php echo genBrand();?></select>
					</td>
				</tr>
				<tr>
					<td>Price</td>
					<td><input type="text" name="Price" required></td>
				</tr>
				<tr>
					<td>Category</td>
					<td>
						<select name="Category" id='itemType'>
							<option value="HDD">Hard Disk Drive</option>
							<option value="Motherboard">Motherboard</option>
							<option value="Processor">Processor</option>
							<option value="RAM">RAM</option>
							<option value="Monitor">Monitor</option>
						</select>		
					</td>
				</tr>
			<tbody class="Category" id="HDD">
                                        <tr>
                                                <td>Size</td>
                                                <td><input type="text" name="Field1"></td>
                                        </tr>
                                </tbody>
                                <tbody class="Category" id="Motherboard">
                                        <tr>
                                                <td>Chipset</td>
                                                <td><input type="text" name="Field2"></td>
                                        </tr>
                                </tbody>
                                <tbody class="Category" id="Monitor">
                                        <tr>
                                                <td>Resolution</td>
                                                <td><input type="text" name="Field3"></td>
                                        </tr>
                                        <tr>
                                                <td>ScreenSize</td>
                                                <td><input type="text" name="Field4"></td>
                                        </tr>
                                </tbody>
                                <tbody class="Category" id="Processor">
                                        <tr>
                                                <td>Frequency</td>
                                                <td><input type="text" name="Field5"></td>
                                        </tr>
                                        <tr>
                                                <td>Cores</td>
                                                <td><input type="text" name="Field6"></td>
                                        </tr>
                                </tbody>
                                <tbody class="Category" id="RAM">
                                        <tr>
                                                <td>Frequency</td>
                                                <td><input type="text" name="Field7"></td>
                                        </tr>
                                        <tr>
                                                <td>Size</td>
                                                <td><input type="text" name="Field8"></td>
                                        </tr>
                                </tbody>

			</table>		
			<input type="submit" class="more" value="Submit">
		</form>	
	</div>
</div>
<?php include_once('footer.php'); ?>
