<?php include_once('header.php'); ?>
<?php include "essential.php"?>
<div class="post">
	<h2 class="title"><a href="#">Welcome to Keyboard </a></h2>
	<p class="meta">
	<span class="date">September 12, 2012</span>
	<span class="posted">Posted by <a href="#">Someone</a></span>
	</p>
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
			<input type=submit>	
		</form>
		<p class="links">	
		<a href="#" class="more">Read More</a>
		<a href="#" title="b0x" class="comments">Comments</a>
		</p>
	</form>	
</div>
			</div>
			<?php include_once('footer.php'); ?>