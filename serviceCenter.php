<?php include_once('header.php'); ?>
<?php 
	include"essential.php";
	$query="SELECT * FROM AuthorizedSC NATURAL JOIN AuthorizedService";
?>
<div class="post">
	<h2 class="title"><a href="#">Authorized Service Center List</a></h2>
	<p class="meta">
	<span class="date">Click to edit the details of any ASC!</span>
	</p>
	<div style="clear: both;">&nbsp;</div>
	<script type='text/javascript' src='./js/jquery.min.js'></script>
	<script type='text/javascript' src='./js/asc.js'></script>
	<button type="button" id='view' class="more">View Service Centers</button>
	<button type="button" id='add' class="more">Add Service Center</button>
	<br><br><br><br>
	<div class="entry">
		<table id="ASCDetails" >
			<thead>
				<tr>
					<th>ASCID</th>
					<th>Brand</th>
					<th>Address</th>
					<th>Phone</th>
					<th>Services Supported</th>
				</tr>
			</thead>
			<?php echo generateASC($query); ?>
		</table>
		<form id="newASCDetails" method="post" action="dbentry.php">
		Enter Service Center details:
			<table >
				<tr>
					<td>Brand</td>
					<td><input type="text" name="Brand" required></td>
				</tr>
				<tr>
					<td>Address</td>
					<td><input type="text" name="Address"></td>
				</tr>
				<tr>
					<td>Phone</td>
					<td><input type="text" name="Phone"></td>
				</tr>
				<tr>
					<td>Services Supported</td>
					<td><input type="text" name="ServicesSupported"></td>
				</tr>
			</table>		
			<input type="submit" class="more">
		</form>	
	</div>
</div>
<?php include_once('footer.php'); ?>
