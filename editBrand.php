<?php include_once('header.php'); ?>
<?php include "essential.php"?>
<div class="post">
	<h2 class="title"><a href="#">Edit Brand Details </a></h2>
	<script type='text/javascript' src='./js/jquery.min.js'></script>
	<script type='text/javascript' src='./js/editBrand.js'></script>
	<div style="clear: both;">&nbsp;</div>
	<div class="entry">
		<form id="editBrand" method="POST" action="dbentry.php">
			<table>
				<?php 
				$query="SELECT * FROM Brand WHERE Name=".$_GET['Name'].";";
				echo getBrandDetails($query);
				?>
			</table>
			<input type=submit class="more">	
		</form>
	</form>	
</div>
			</div>
			<?php include_once('footer.php'); ?>
