<?php include_once('header.php'); ?>
<?php include "essential.php"?>
			<div class="post">
				<h2 class="title"><a href="#">Welcome to Keyboard </a></h2>
				<div style="clear: both;">&nbsp;</div>
				<div class="entry">
					<table>
					<thead>
						<tr>
							<th>Name</th>
							<th>Description</th>
							<th>Rating</th>
						</tr>
					</thead>
					<?php 
						$query="SELECT * FROM Brand";
						echo data2Table($query);
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
