<?php include_once('header.php'); ?>
<?php include "essential.php"?>
<div class="post">
	<h2 class="title"><a href="#">Edit Service Center Details </a></h2>
	<script type='text/javascript' src='./js/jquery.min.js'></script>
	<script type='text/javascript' src='./js/editASC.js'></script>
	<div style="clear: both;">&nbsp;</div>
	<div class="entry">
		<form id="editASC" method="POST" action="dbentry.php">
			<table>
				<?php 
				$query="SELECT * FROM AuthorizedSC NATURAL JOIN AuthorizedService WHERE ASCID=".$_GET['ASCID'].";";
				echo getASCDetails($query);
				?>
			</table>
			<input type=submit class="more">	
		</form>
	</form>	
</div>
			</div>
			<?php include_once('footer.php'); ?>
