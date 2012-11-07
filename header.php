<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<!--
Design by Free CSS Templates
http://www.freecsstemplates.org
Released for free under a Creative Commons Attribution 2.5 License

Name       : Keyboard 
Description: A two-column, fixed-width design with dark color scheme.
Version    : 1.0
Released   : 20120915

-->
<?php 

$file = $_SERVER['PHP_SELF'];

$filearray = explode(".php", $file);

$file = $filearray[0];

$filearray = explode("/", $file);

$file = $filearray[2];

?>
<?php session_start();
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="keywords" content="" />
<meta name="description" content="" />
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>Eklavya Enterprises | Buy computer accessories</title>
<link href='http://fonts.googleapis.com/css?family=Oswald:400,300' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Abel' rel='stylesheet' type='text/css'>
<link href="style.css" rel="stylesheet" type="text/css" media="screen" />
<script type='text/javascript' src='./js/jquery.min.js'></script>
</head>
<body>
<div id="wrapper">
	<div id="header-wrapper">
		<div id="header" class="container">
			<div id="logo">
				<h1><a href="#">Eklavya</a></h1>
			</div>
			<div id="menu">
				<ul>
					<?php if($_SESSION['ID']=="0"){ ?>
					<li <?php if($file == "index") echo "class=\"current_page_item\""; ?>><a href="index.php">Home</a></li>
					<li <?php if($file == "item") echo "class=\"current_page_item\""; ?>><a href="item.php">Items</a></li>
					<li <?php if($file == "viewOrders") echo "class=\"current_page_item\""; ?>><a href="viewOrders.php">Orders</a></li>
					<li <?php if($file == "feedback") echo "class=\"current_page_item\""; ?>><a href="feedback.php">Feedback</a></li>
					<li <?php if($file == "ticket") echo "class=\"current_page_item\""; ?>><a href="ticket.php">Tickets</a></li>
					<li <?php if($file == "about") echo "class=\"current_page_item\""; ?>><a href="about.php">About</a></li>
					<?php }else{ ?>
					<li <?php if($file == "index") echo "class=\"current_page_item\""; ?>><a href="index.php">Home</a></li>
					<li <?php if($file == "selectItems") echo "class=\"current_page_item\""; ?> ><a href="selectItems.php">Items</a></li>
					<li <?php if($file == "newOrder") echo "class=\"current_page_item\""; ?>><a href="newOrder.php">Order</a></li>
					<li <?php if($file == "raiseTicket") echo "class=\"current_page_item\""; ?>><a href="raiseTicket.php">Tickets</a></li>
					<li <?php if($file == "giveFeedback") echo "class=\"current_page_item\""; ?>><a href="giveFeedback.php">Feedback</a></li>
					<li <?php if($file == "about") echo "class=\"current_page_item\""; ?>><a href="about.php">About</a></li>
					<?php } ?>
				</ul>
			</div>
		</div>
	</div>
	<!-- end #header -->
	
	<div id="page">
		<div id="content">
			<!-- Break 1 -->
<?php 	if(isset($_SESSION['Username']))
echo "Greetings, ".$_SESSION['Username']."!"; ?>
<?php

if(isset($_GET['msg'])){
	echo "<div class=\"msg\">";
	echo $_GET['msg'];
	echo "</div>";
}

?>
