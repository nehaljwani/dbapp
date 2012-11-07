<?php include_once('header.php'); ?>
<?php 
	include"essential.php";
	if($_SESSION['ID']==0)
		$query="SELECT OrderID, PreferredDate, PreferredTime, Address, Status,DeliveryDate FROM Shipment;";
	else{
		$query="SELECT OrderID, PreferredDate, PreferredTime, Address, Status,DeliveryDate FROM Shipment NATURAL JOIN SalesOrder WHERE CustID=".$_SESSION['ID'].";";
	}
?>
<div class="post">
	<h2 class="title"><a href="#">Shipment Details </a></h2>
	<div style="clear: both;">&nbsp;</div>
	<script type='text/javascript' src='./js/jquery.min.js'></script>
	<br><br><br><br>
	<div class="entry">
		<table class="payment-table" id="ticketDetails" >
				<tr>
					<td>OrderID</td>
					<td>Preferred Date</td>
					<td>Preferred Time</td>
					<td>Address</td>
					<td>Status</td>
					<td>Delivery Date</td>
				</tr>
			<?php echo data2Table($query); ?>
		</table>
	</div>
</div>
<?php include_once('footer.php'); ?>
