<?php include_once('header.php'); 
	if(isset($_SESSION['Username']))
		header("Location:selectItems.php");
?>
<div class="post">
	<h2 class="title"><a href="#">Login</a></h2>
	<p class="meta">
	<span class="date">September 12, 2012</span>
	<span class="posted">Posted by <a href="#">Someone</a></span>
	</p>
	<div style="clear: both;">&nbsp;</div>
	<div class="entry">
		<form method="POST" action="dbentry.php">
		<table id="login">
			<tr>
				<td>Login:</td>
				<td><input type="text" name="Username"></td>
			</tr>
			<tr>
				<td>Password:</td>
				<td><input type="password" name="Password">	</td>
			</tr>
			
		</table>
			<input type="submit" name="submit" value="Submit" class="more">
		</form>
	</div>
</div>
<?php include_once('footer.php'); ?>
