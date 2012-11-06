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
	<h2 class="title"><a href="#">Vendor List </a></h2>
	<p class="meta">
	<span class="date">Click to edit the details of any Vendor!</span>
	</p>
	<div style="clear: both;">&nbsp;</div>
	<script type='text/javascript' src='./js/jquery.min.js'></script>
	<br><br><br><br>
	<div class="entry">
		<table id="feedbackDetails" >
			<thead>
				<tr>
					<th>CustID</th>
					<th>OrderID</th>
					<th>TicketNo</th>
					<th>Feedback</th>
					<th>Rating</th>
				</tr>
			</thead>
			<?php echo data2Table($query); ?>
		</table>
	</div>
</div>
<?php include_once('footer.php'); ?>
