<?php session_start(); ?>
			<!-- Break 2 -->
			<div style="clear: both;">&nbsp;</div>
		</div>
		<!-- end #content -->
		<div id="sidebar">
			<ul>
				<li>
					<h2>Categories</h2>
					<ul class="side-list">
						<?php
							if(!isset($_SESSION['Username'])){
						?>		<li><a href="index.php">Login</a></li>
								<li><a href="registration.php">Register</a></li>
								
						<?php	}
							else if($_SESSION['ID']==0){
						?>
								<li><a href="logout.php">Logout</a></li>
								<li><a href="viewOrders.php">Orders</a></li>
								<li><a href="viewPayments.php">Payments</a></li>
								<li><a href="employee.php">Employees</a></li>
								<li><a href="vendor.php">Vendors</a></li>
								<li><a href="serviceCenter.php">Service Centers</a></li>
								<li><a href="brand.php">Brands</a></li>
								<li><a href="customer.php">Customer</a></li>
								<li><a href="editTicket.php">Tickets</a></li>
								<li><a href="editShipment.php">Shipments</a></li>
								<li><a href="password.php">Change Password</a></li>
						<?php	}
							else if($_SESSION['ID']!=0){
						?>
								<li><a href="logout.php">Logout</a></li>
								<li><a href="brand.php">Brands</a></li>
								<li><a href="viewOrders.php">My Orders</a></li>
								<li><a href="vendor.php">Vendor</a></li>
								<li><a href="employee.php">Employees</a></li>
								<li><a href="serviceCenter.php">Service Centers</a></li>
								<li><a href="makePayment.php">Make Payment</a></li>
								<li><a href="shipment.php">Shipment</a></li>
								<li><a href="viewPayments.php">My Payments</a></li>
								<li><a href="ticket.php">My Tickets</a></li>
								<li><a href="feedback.php">My Feedbacks</a></li>
								<li><a href="password.php">Change Password</a></li>
						<?php	}
						?>
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
						<script>
						$('.msg').delay(2000).fadeOut();

</script>
</body>
</html>
