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
	<div style="clear: both;">&nbsp;</div>
	<script type='text/javascript' src='./js/jquery.min.js'></script>
	<br><br><br><br>
	<div class="entry">
		<table id="ticketDetails" >
			<thead>
				<tr>
					<th>CustID</th>
					<th>TicketNo</th>
					<th>Grievance</th>
					<th>Date</th>
					<th>Status</th>
				</tr>
			</thead>
			<?php echo data2Table($query); ?>
		</table>
	</div>
</div>
<?php include_once('footer.php'); ?>
