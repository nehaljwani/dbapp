<?php session_start(); ?>
			<!-- Break 2 -->
			<div style="clear: both;">&nbsp;</div>
		</div>
		<!-- end #content -->
		<div id="sidebar">
			<ul>
				<li>
					<h2>Categories</h2>
					<ul>
						<?php
							if(!isset($_SESSION['Username'])){
						?>		<li><a href="login.php">Login</a></li>
								<li><a href="registration.php">Register</a></li>
								
						<?php	}
							else{
						?>
								<li><a href="logout.php">Logout</a></li>
						<?php	}
						?>
						<li><a href="ticketItems.php">View tickets</a></li>
						<li><a href="customerItems.php">View Customers</a></li>
					</ul>
				</li>
			</ul>
		</div>
		<!-- end #sidebar -->
		<div style="clear: both;">&nbsp;</div>
	</div>
	<!-- end #page --> 
</div>
<div id="footer">
	<p>	Databases Project by <a href="#">Ankush Jain</a> and <a href="#">Nehal J. Wani</a></p>
</div>
<!-- end #footer -->
</body>
</html>
