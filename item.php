<?php include_once('header.php'); ?>
<?php 
	include"essential.php";
	$query="SELECT * FROM Items";
?>
<div class="post">
	<h2 class="title"><a href="#">Welcome to Keyboard </a></h2>
	<p class="meta">
	<span class="date">September 12, 2012</span>
	<span class="posted">Posted by <a href="#">Someone</a></span>
	</p>
	<div style="clear: both;">&nbsp;</div>
	<script type='text/javascript' src='./js/jquery.min.js'></script>
	<script type='text/javascript' src='./js/items.js'></script>
	<button type="button" id='view'>View Catalog</button>
	<button type="button" id='add'>Add Item</button>
	<div class="entry">
		<table id="itemDetails" >
			<thead>
				<tr>
					<th>ID</th>
					<th>Description</th>
					<th>Brand</th>
					<th>Name</th>
					<th>Price</th>
					<th>Category</th>
				</tr>
			</thead>
			<?php echo generateItems2($query); ?>
		</table>
		<form id="newItemDetails" method="post" action="dbentry.php">
		Enter Item details:
			<table >
				<tr>
					<td>Name</td>
					<td><input type="text" name="Name" required></td>
				</tr>
				<tr>
					<td>Description</td>
					<td><input type="text" name="Description"></td>
				</tr>
				<tr>
					<td>Brand</td>
					<td><input type="text" name="Brand"></td>
				</tr>
				<tr>
					<td>Price</td>
					<td><input type="text" name="Price"></td>
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
                                                <td><input type="text" name="Feild2"></td>
                                        </tr>
                                </tbody>
                                <tbody class="Category" id="Motherboard">
                                        <tr>
                                                <td>Chipset</td>
                                                <td><input type="text" name="Feild2"></td>
                                        </tr>
                                </tbody>
                                <tbody class="Category" id="Monitor">
                                        <tr>
                                                <td>Resolution</td>
                                                <td><input type="text" name="Field2"></td>
                                        </tr>
                                        <tr>
                                                <td>ScreenSize</td>
                                                <td><input type="text" name="Field2"></td>
                                        </tr>
                                </tbody>
                                <tbody class="Category" id="Processor">
                                        <tr>
                                                <td>Frequency</td>
                                                <td><input type="text" name="Field2"></td>
                                        </tr>
                                        <tr>
                                                <td>Cores</td>
                                                <td><input type="text" name="Field2"></td>
                                        </tr>
                                </tbody>
                                <tbody class="Category" id="RAM">
                                        <tr>
                                                <td>Frequency</td>
                                                <td><input type="text" name="Field2"></td>
                                        </tr>
                                        <tr>
                                                <td>Size</td>
                                                <td><input type="text" name="Field2"></td>
                                        </tr>
                                </tbody>

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
