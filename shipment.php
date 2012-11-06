<?php include_once('header.php'); ?>
<?php 
	include"essential.php";
	if($_SESSION['ID']==0)
		$query="SELECT * FROM Shipment;";
	else{
		$query="SELECT * FROM Shipment WHERE CustID=".$_SESSION['ID'].";";
	}
?>
<div class="post">
	<h2 class="title"><a href="#">Shipment Details </a></h2>
	<div style="clear: both;">&nbsp;</div>
	<script type='text/javascript' src='./js/jquery.min.js'></script>
	<br><br><br><br>
	<div class="entry">
		<table id="ticketDetails" >
			<thead>
				<tr>
					<th>OrderID</th>
					<th>Preferred Date</th>
					<th>Preferred Time</th>
					<th>Address</th>
					<th>Status</th>
					<th>Delivery Date</th>
				</tr>
			</thead>
			<?php echo data2Table($query); ?>
		</table>
	</div>
</div>
<?php include_once('footer.php'); ?>
