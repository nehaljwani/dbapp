<?php include_once('header.php'); ?>
<?php include_once('essential.php'); ?>
<div class="post">
	<h2 class="title"><a href="#">Create an order</a></h2>
	<div style="clear: both;">&nbsp;</div>
	<div class="entry">
		<form name="quantity" method="post" action="dbentry.php">
		<table class="sales-table">
		<!--thead>
			<tr>
				<th>Item</th>
				<th>Quantity</th>
			</tr>
		</thead-->
		<tbody>
		<tr>
			<td>Shipping Address</td>
			<td><input type="text" name="address" required></td>
		</tr>
		<tr>
			<td>Preferred Date</td>
			<td><input type="text" name="date" value="yyyy-mm-dd" required></td>
		</tr>
		<tr>
			<td>Preferred Time</td>
			<td><input type="text" name="time" value="00:00:00" required></td>
		</tr>
<?php

$numList = 5;
$maxQuantity = 10;

for($i=1;$i<=$numList;$i++){
	echo "
		<tr>
		<td>
		<select name=\"item-{$i}\">
		<option value=\"\">Select an item</option>";
	itemsOptionList();
	echo "
		</select>
		</td>
		<td>
			<select name=\"quantity-{$i}\">";
	quantityList($maxQuantity);
	echo "
		</select>
		</td>
		</tr>";
	}
?>
		</tbody>
		</table>
		</form>

		<p class="links"><a href="#" onclick="document.forms['quantity'].submit();" class="more">Submit</a></p>
	</div>
</div>
<?php include_once('footer.php'); ?>
