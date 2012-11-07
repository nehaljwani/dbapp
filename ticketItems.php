<?php include_once('header.php'); 
include_once('essential.php');
$query="select * from Ticket";

?>
			<div class="post">
				<h2 class="title"><a href="#">Tickets</a></h2>
				<div style="clear: both;">&nbsp;</div>
				<div class="entry">
					<table class = "ticket-table">
						<tr><td>Customer ID</td><td>Ticket No.</td><td>Grievance</td><td>Date</td><td>Status</td></tr>
						<?php echo data2Table($query); ?>
					</table>
				</div>
			</div>
<?php include_once('footer.php'); ?>
