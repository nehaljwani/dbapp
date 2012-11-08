<?php include_once('header.php');
	include "essential.php";
?>
<div class="post">
	<h2 class="title"><a href="#">Change Password</a></h2>
	<!--p class="meta">
	<span class="date">September 12, 2012</span>
	<span class="posted">Posted by <a href="#">Someone</a></span>
	</p-->
	<div style="clear: both;">&nbsp;</div>
	<div class="entry">
		<form id="info" method="post" action="dbentry.php">
		<table>
			<tr>
                                <td>Current Password</td>
                                <td><input type="password" name="password1" required></td>
                        </tr>
                        <tr>
                                <td>New Password</td>
                                <td><input type="password" name="Password" required>    </td>
			</tr>
		</table>
			<input type="Submit" class="more">
		</form>	
	</div>
</div>
<?php include_once('footer.php'); ?>
