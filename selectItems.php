<?php include_once('header.php'); ?>
<?php include "essential.php"?>
			<div class="post">
				<h2 class="title"><a href="#">Welcome to Keyboard </a></h2>
				<p class="meta">
						<span class="date">September 12, 2012</span>
						<span class="posted">Posted by <a href="#">Someone</a></span>
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
					<p class="links">	
						<a href="#" class="more">Read More</a>
						<a href="#" title="b0x" class="comments">Comments</a>
					</p>
					</form>	
				</div>
			</div>
<?php include_once('footer.php'); ?>
