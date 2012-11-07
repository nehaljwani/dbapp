<?php include_once('header.php'); ?>
<?php include "essential.php"?>
			<div class="post">
				<h2 class="title"><a href="#">Item Details</a></h2>
				<div style="clear: both;">&nbsp;</div>
				<div class="entry">
					<table class="item-table">
						<tr>
							<td>Item ID</td>
							<td>Description</td>
							<td>Brand</td>
							<td>Name</td>
							<td>Price</td>
							<td>Category</td>
							<td>Chipset</td>
						</tr>
					<?php 
						$query="SELECT * FROM Items NATURAL JOIN ".$_GET['Category']." WHERE ID=".$_GET['ID'].";";
						echo generateItems($query);
					?>
					</table>
					</form>	
				</div>
			</div>
<?php include_once('footer.php'); ?>
