<?php include_once('header.php'); ?>
<?php include_once('essential.php'); ?>
<?php include_once('es2.php'); ?>
<div class="post">
	<h2 class="title"><a href="#">View Payments</a></h2>
	<div style="clear: both;">&nbsp;</div>
	<div class="entry">
<?php

if($_SESSION['ID'] == 0){
	$query = "select * from Payment";
}
else{
	$query = "select Payment.OrderID, Description, Amount, PaymentMethod from Payment, SalesOrder where SalesOrder.CustID = {$_SESSION['ID']} and SalesOrder.OrderID = Payment.OrderID;";
}

?>
<table class="payment-table">
<tr><td>Order ID</td><td>Description</td><td>Amount</td><td>Payment Mode</td></tr>
<?php echo data2Table($query); ?>
</table>
	
	</div>
</div>
<?php include_once('footer.php'); ?>
