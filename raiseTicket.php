<?php include_once('header.php'); ?>
			<div class="post">
				<h2 class="title"><a href="#">Submit a complaint</a></h2>
				<!--p class="meta">
						<span class="date">September 12, 2012</span>
						<span class="posted">Posted by <a href="#">Someone</a></span>
				</p-->
				<div style="clear: both;">&nbsp;</div>
				<div class="entry">
					<form id="info" method="post" action="dbentry.php">
					<table id="entry">
						<tr>
							<td>Customer ID</td>
							<td><input type="text" name="ID"></td>
						</tr>
						<tr>
							<td valign="top">Grievance</td>
							<td><textarea rows="8" cols="40" name="Grievance"></textarea></td>
						</tr>
					</table>		
					<input type="submit" name="submit" value="Submit">
					<!--p class="links">	
						<a href="#" class="more">Read More</a>
						<a href="#" title="b0x" class="comments">Comments</a>
					</p-->
					</form>	
				</div>
			</div>
<?php include_once('footer.php'); ?>
