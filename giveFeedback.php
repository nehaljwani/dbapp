<?php include_once('header.php');
	include "essential.php";
?>
<div class="post">
	<h2 class="title"><a href="#">Provide Feedback</a></h2>
	<!--p class="meta">
	<span class="date">September 12, 2012</span>
	<span class="posted">Posted by <a href="#">Someone</a></span>
	</p-->
	<div style="clear: both;">&nbsp;</div>
	<div class="entry">
		<form id="info" method="post" action="dbentry.php">
			<table id="entry">
				<tr>
					<td>OrderID</td>
					<td> 
						<select name="OrderID">
							<?php getMyOrders();?>
						</select>	
					</td>
				</tr>
				<tr>
					<td>TicketNo</td>
					<td> 
						<select name="TicketNo">
							<?php getMyTickets();?>
						</select>	
					<td>
				</tr>
				<tr>
					<td valign="top">Feedback</td>
					<td><textarea rows="8" cols="40" name="Feedback"></textarea></td>
				</tr>
				<tr>
					<td>Rating</td>
					<td><input type="text" name="Rating"></td>
				</tr>
			</table>		
			<input type="submit" name="submit" value="Submit" class="more">
			<!--p class="links">	
			<a href="#" class="more">Read More</a>
			<a href="#" title="b0x" class="comments">Comments</a>
			</p-->
		</form>	
	</div>
</div>
<?php include_once('footer.php'); ?>
