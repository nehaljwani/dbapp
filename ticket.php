<?php include_once('header.php'); ?>
<?php 
	include"essential.php";
	if($_SESSION['ID']==0)
		$query="SELECT * FROM Ticket;";
	else{
		$query="SELECT * FROM Ticket WHERE CustID=".$_SESSION['ID'].";";
	}
?>
<div class="post">
	<h2 class="title"><a href="#">List Tickets </a></h2>
	<div style="clear: botd;">&nbsp;</div>
	<script type='text/javascript' src='./js/jquery.min.js'></script>
	<div class="entry">
		<table class="ticket-table" >
				<tr>
					<td>Customer ID</td>
					<td>Ticket No.</td>
					<td>Grievance</td>
					<td>Date</td>
					<td>Status</td>
				</tr>
			<?php echo data2Table($query); ?>
		</table>
	</div>
</div>
<?php include_once('footer.php'); ?>
