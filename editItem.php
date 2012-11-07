<?php include_once('header.php'); ?>
<?php include "essential.php"?>
<div class="post">
	<h2 class="title"><a href="#">Edit Item Details </a></h2>
	<script type='text/javascript' src='./js/jquery.min.js'></script>
	<script type='text/javascript' src='./js/editItem.js'></script>
	<div style="clear: both;">&nbsp;</div>
	<div class="entry">
		<form id="editItem" method="POST" action="dbentry.php">
			<table>
				<?php 
				$query="SELECT * FROM Items NATURAL JOIN ".$_GET['Category']." WHERE ID=".$_GET['ID'].";";
				echo getItemDetails($query);
				?>
			</table>
			<input type=submit class="more" value="Submit">	
		</form>
	</form>	
</div>
			</div>
			<?php include_once('footer.php'); ?>
