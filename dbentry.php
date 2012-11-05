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
else if($referer=='raiseTicket.php'){
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
else if($referer=='employee.php'){
	$query="INSERT INTO Employee(Name,DOB,Address,DOJ,Salary,PAN,Category) VALUES(
		'".$_POST['Name']."',
		'".$_POST['DOB']."',
		'".$_POST['Address']."',
		'".$_POST['DOJ']."',
		'".$_POST['Salary']."',
		'".$_POST['PAN']."',
		'".$_POST['Category']."'
	);";
	if(!execute($query)){
		echo "Employee Registration Unsuccessfull! Redirecting...";
		header("Refresh: 2; URL={$referer}");
	}
	print_r($_POST);
	$EmpID=mysql_fetch_assoc(execute("SELECT EmpID FROM Employee ORDER BY EmpID DESC LIMIT 1;"));
	$query="INSERT INTO ".$_POST['Category']." VALUES(
		'".$EmpID['EmpID']."',
		'".$_POST['Field2']."'
	);";
	if(execute($query)){
		echo "Employee Registration Successfull! Redirecting...";
		header("Refresh: 2; URL={$referer}");
	}
}
else if(strpos($_SERVER['HTTP_REFERER'],'editEmployee.php')){
	$query="SELECT column_name Col FROM information_schema.columns WHERE table_name='Employee';";
	$result=execute($query);
	while($field=mysql_fetch_array($result)){
		$query="UPDATE Employee SET ".$field['Col']."='".$_POST[$field['Col']]."' WHERE EmpID=".$_POST['EmpID'].";";
		echo $query."<br>";
		execute($query);
	}
	$query="SELECT column_name Col FROM information_schema.columns WHERE table_name='".$_POST['Category']."';";
	$result=execute($query);
	while($field=mysql_fetch_array($result)){
		$query="UPDATE ".$_POST['Category']." SET ".$field['Col']."='".$_POST[$field['Col']]."' WHERE EmpID=".$_POST['EmpID'].";";
		echo $query."<br>";
		execute($query);
	}
}
else if(strpos($_SERVER['HTTP_REFERER'],'vendor.php')){
	$query="INSERT INTO Vendor(Name,Address,Phone) VALUES(
		'".$_POST['Name']."',
		'".$_POST['Address']."',
		'".$_POST['Phone']."'
	);";
	if(!execute($query)){
		echo "Vendor added Successfully! Redirecting...";
		header("Refresh: 2; URL={$referer}");
	}
	print_r($_POST);
	$vendID=mysql_fetch_assoc(execute("SELECT VendID FROM Vendor ORDER BY VendID DESC LIMIT 1;"));
	$query="INSERT INTO VendorBrands VALUES(
		'".$vendID['VendID']."',
		'".$_POST['Brands']."'
	);";
	if(execute($query)){
		echo "New Vendor added successfully! Redirecting...";
		header("Refresh: 2; URL={$referer}");
	}

}
else if(strpos($_SERVER['HTTP_REFERER'],'editVendor.php')){
	$query="SELECT column_name Col FROM information_schema.columns WHERE table_name='Vendor';";
	$result=execute($query);
	while($field=mysql_fetch_array($result)){
		$query="UPDATE Vendor SET ".$field['Col']."='".$_POST[$field['Col']]."' WHERE VendID=".$_POST['VendID'].";";
		execute($query);
	}
	$query="SELECT column_name Col FROM information_schema.columns WHERE table_name='VendorBrands';";
	$result=execute($query);
	while($field=mysql_fetch_array($result)){
		$query="UPDATE VendorBrands SET ".$field['Col']."='".$_POST[$field['Col']]."' WHERE VendID=".$_POST['VendID'].";";
		execute($query);
	}
	if(execute($query)){
		echo "Vendor details modified successfully! Redirecting...";
		header("Refresh: 2; URL={$referer}");
	}
}
?>
