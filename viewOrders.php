<?php include_once('header.php'); ?>
<?php include_once('essential.php'); ?>
<?php include_once('es2.php'); ?>
<div class="post">
	<h2 class="title"><a href="#">Order Details</a></h2>
	<div style="clear: both;">&nbsp;</div>
	<div class="entry">
<?php


if(isset($_GET['id'])){
	$query = "select Name, Phone, Date, Shipment.Address, PreferredDate, PreferredTime, Status from SalesOrder, Customer, Shipment where SalesOrder.CustID = Customer.CustID and SalesOrder.OrderID = Shipment.OrderID and SalesOrder.OrderID={$_GET['id']}";
	echo "<table class=\"order-detail\">";
	assocQueryTable($query);
	echo "</table>";
	$query = "select Brand, Name, Category, Price, Quantity from OrderItems, Items where OrderItems.Item = Items.ID and OrderID = {$_GET['id']}";
	echo "<table class = \"payment-table\">";
	echo "<tr><td>Brand</td><td>Name</td><td>Category</td><td>Price</td><td>Quantity</td></tr>";
	echo orderTable($query);
	echo "</table>";

}
else{
	if($_SESSION['ID']==0){		
		$query = "select OrderID, Name, Date from SalesOrder, Customer where SalesOrder.CustID = Customer.CustID Order by Date";
	}
	else{
		$query = "select OrderID, Name, Date from SalesOrder, Customer where SalesOrder.CustID = Customer.CustID and Customer.CustID = {$_SESSION['ID']} Order by Date;";		
	}
	echo "<table class = \"payment-table\">";
	echo "<tr><td>Order ID</td><td>Customer</td><td>Date</td></tr>";
	echo orderTable($query);
	echo "</table>";
}


?>
	
	</div>
</div>
<?php include_once('footer.php'); ?>
