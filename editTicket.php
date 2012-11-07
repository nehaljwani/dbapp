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
	<h2 class="title"><a href="#">Update Ticket Status </a></h2>
	<div style="clear: both;">&nbsp;</div>
	<script type='text/javascript' src='./js/jquery.min.js'></script>
	<div class="entry">
		<form method="POST" action="dbentry.php">
		<table class="item-table" >
				<tr>
					<td>CustID</td>
					<td>TicketNo</td>
					<td>Grievance</td>
					<td>Date</td>
					<td>Status</td>
					<td>New Status</td>
				</tr>
			<?php echo getTickets($query); ?>
		</table>
		<input type="Submit" value="Apply">
		</form>
	</div>
</div>
<?php include_once('footer.php'); ?>
