<?php include_once('header.php'); ?>
<?php include "essential.php"?>
<div class="post">
	<h2 class="title"><a href="#">View Calatog </a></h2>
	<p class="meta">
	<span class="date">Click on any item to view its complete details!</span>
	</p>

	<div style="clear: both;">&nbsp;</div>
	<div class="entry">
		<table>
			<thead>
				<tr>
					<th>ItemId</th>
					<th>Description</th>
					<th>Brand</th>
					<th>Name</th>
					<th>Price</th>
					<th>Category</th>
				</tr>
			</thead>
			<?php 
			$query="SELECT * FROM Items ORDER BY Category";
			echo generateItems($query);
			?>
		</table>
	</form>	
</div>
			</div>
<?php include_once('footer.php'); ?>
