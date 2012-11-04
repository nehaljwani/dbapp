<?php include_once('header.php'); ?>
			<div class="post">
				<h2 class="title"><a href="#">Welcome to Keyboard </a></h2>
				<p class="meta">
						<span class="date">September 12, 2012</span>
						<span class="posted">Posted by <a href="#">Someone</a></span>
				</p>
				<div style="clear: both;">&nbsp;</div>
				<div class="entry">
				Enter your details:
					<form id="info" method="post" action="dbentry.php">
					<table id="entry">
						<tr>
							<td>Name</td>
							<td><input type="text" name="Name"></td>
						</tr>
						<tr>
							<td>Address</td>
							<td><input type="text" name="Address"></td>
						</tr>
						<tr>
							<td>Email Id</td>
							<td><input type="text" name="Email"></td>
						</tr>
						<tr>
							<td>Contact Number</td>
							<td><input type="text" name="Phone"></td>
						</tr>
						<tr>
							<td>Username</td>
							<td><input type="text" name="UserName"></td>
						</tr>
						<tr>
							<td>Password</td>
							<td><input type="password" name="Password"></td>
						</tr>
					</table>		
					<input type="submit">
					<p class="links">	
						<a href="#" class="more">Read More</a>
						<a href="#" title="b0x" class="comments">Comments</a>
					</p>
					</form>	
				</div>
			</div>
<?php include_once('footer.php'); ?>
