<?php include_once('header1.php'); 
	if(isset($_SESSION['Username'])){
?>
<div class="post">
	<h2 class="title"><a href="#">Welcome to Eklavya</a></h2>
	<div style="clear: both;">&nbsp;</div>
	<div class="entry">
	Welcome to Eklavya Enterprises' online shopping portal. Click the links on the Nav Bar at the top or the Side Bar to navigate. Feel free to contact us in case of any queries.
	</div>
</div>

<?php }else{ ?>
<div class="post">
	<h2 class="title"><a href="#">Login</a></h2>
	<div style="clear: both;">&nbsp;</div>
	<div class="entry">
		<form method="POST" action="dbentry.php">
		<table id="login">
			<tr>
				<td>Login:</td>
				<td><input type="text" name="Username" required></td>
			</tr>
			<tr>
				<td>Password:</td>
				<td><input type="password" name="Password" required>	</td>
			</tr>
			
		</table>
			<input type="submit" name="submit" value="Submit" class="more">
		</form>
	</div>
</div>
<?php } ?>
<?php include_once('footer.php'); ?>
