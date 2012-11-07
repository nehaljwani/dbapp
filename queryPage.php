<?php include_once('header.php'); 
include_once('essential.php');
$query="select * from Ticket";

?>
			<div class="post">
				<h2 class="title"><a href="#">Welcome to Keyboard </a></h2>
				<div style="clear: both;">&nbsp;</div>
				<div class="entry">
					<table border="1">
						<?php echo data2Table($query); ?>
					</table>
				</div>
			</div>
<?php include_once('footer.php'); ?>
