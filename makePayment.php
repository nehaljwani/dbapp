<?php include_once('header.php'); ?>
<?php include_once('essential.php'); ?>
<?php include_once('es2.php'); ?>
<div class="post">
	<h2 class="title"><a href="#">Make a payment</a></h2>
	<div style="clear: both;">&nbsp;</div>
	<div class="entry">
		<form name="payment" method="post" action="dbentry.php">
		<table class="payment-form">
			<tr>
				<td>Order ID</td>
				<td>

				<select name="orderID">
				<?php 
					$query = "select OrderID from SalesOrder where CustID = {$_SESSION['ID']} and OrderID not in (Select OrderID from Payment where CustID={$_SESSION['ID']})";
					queryOptionsList($query);
				?>
				</select>				

				</td>
			</tr>
			<tr>
				<td>Amount</td>
				<td><input type="text" name="amount" required></td>
			</tr>
			<tr>
				<td>Description</td>
				<td><input type="text" name="desc" required></td>
			</tr>
			<tr>
				<td>Payment Method</td>
				<td>
					<input type="radio" name="method" value="cash">Cash
					<input type="radio" name="method" value="cheque">Cheque
					<input type="radio" name="method" value="card">Credit Card
				</td>
			</tr>


		</table>


		</form>
	
		<p class="links"><a href="#" onclick="document.payment.submit()" class="more">Submit</a></p>
	</div>
</div>
<?php include_once('footer.php'); ?>
