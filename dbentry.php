<?php

include "essential.php";
dbconnect();

$referer = end((explode('/', $_SERVER['HTTP_REFERER'])));

if($referer=='registration.php'){
	$query="INSERT INTO User(UserName, Password) VALUES(
		'".$_POST['UserName']."',
		'".MD5($_POST['Password'])."'
	);";
	if(!execute($query)){
		echo 'Registration UnSuccessful! Redirecting to Registration Page ...';
		sleep(2);
		header('Location: registration.php');
	}
	$query="INSERT INTO Customer(Name, Address, Email, Phone) VALUES(
		'".$_POST['Name']."',
		'".$_POST['Address']."',
		'".$_POST['Email']."',
		'".$_POST['Phone']."'
	);";
	if(execute($query)){
		echo 'Registration Successful! Redirecting to Login Page ...';
		header('Refresh: 2; URL=login.php');
	}
}
else if($referer=='raiseTicket.php')
{
	$defaultStatus = "Unread";
	$query = "INSERT INTO Ticket(CustID, Grievance, Status)  VALUES(
		'".$_POST['ID']."',
		'".$_POST['Grievance']."',
		'".$defaultStatus."'
	);";
	if(execute($query)){
		echo "Successfully submitted. Redirecting...";
		header("Refresh: 2; URL={$referer}");
	}

}

?>
