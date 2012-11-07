<?php include_once('header.php'); ?>
<?php include "essential.php"?>
<div class="post">
	<h2 class="title"><a href="#">View Calatog </a></h2>
	<p class="meta">
	<span class="date">Click on any item to view its complete details!</span>
	</p>

	<div style="clear: botd;">&nbsp;</div>
	<div class="entry">
		<table class="item-table">
				<tr>
					<td>ItemId</td>
					<td>Brand</td>
					<td>Name</td>
					<td>Price</td>
					<td>Category</td>
				</tr>
			<?php 
			$query="SELECT ID,Name,Brand,Price,Category FROM Items ORDER BY Category";
			echo generateItems($query);
			?>
		</table>
	</form>	
</div>
			</div>
<?php include_once('footer.php'); ?>
