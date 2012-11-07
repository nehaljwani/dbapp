<?php include_once('header.php'); ?>
<?php 
	include"essential.php";
	if($_SESSION['ID']==0)
		$query="SELECT * FROM Feedback;";
	else{
		$query="SELECT * FROM Feedback WHERE CustID=".$_SESSION['ID'].";";
	}
?>
<div class="post">
	<h2 class="title"><a href="#">Feedback</a></h2>
	<div style="clear: botd;">&nbsp;</div>
	<script type='text/javascript' src='./js/jquery.min.js'></script>
	<div class="entry">
		<table class="ticket-table" >
				<tr>
					<td>Customer ID</td>
					<td>Order ID</td>
					<td>Ticket No</td>
					<td>Feedback</td>
					<td>Rating</td>
				</tr>
			<?php echo data2Table($query); ?>
		</table>
	</div>
</div>
<?php include_once('footer.php'); ?>
