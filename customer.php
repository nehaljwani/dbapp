<?php include_once('header.php'); 
include_once('essential.php');
$query="select CustID, Name, Address, Phone, Email, Username from Customer";

?>
			<div class="post">
				<h2 class="title"><a href="#">Customer details</a></h2>
				<div style="clear: both;">&nbsp;</div>
				<div class="entry">
					<table class="item-table">
						<tr>
							<td>Cust ID</td><td>Name</td><td>Address</td><td>Phone</td><td>E-Mail</td><td>User ID</td>
						</tr>
						<?php echo data2Table($query); ?>
					</table>
				</div>
			</div>
<?php include_once('footer.php'); ?>
