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
	$query = "INSERT INTO Ticket(CustID, Grievance)  VALUES(
		'".$_POST['ID']."',
		'".$_POST['Grievance']."'
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
		echo "Vendor addition unsuccessfull! Redirecting...";
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
else if(strpos($_SERVER['HTTP_REFERER'],'item.php')){
	$query="INSERT INTO Items(Name,Description,Brand,Price,Category) VALUES(
		'".$_POST['Name']."',
		'".$_POST['Description']."',
		'".$_POST['Brand']."',
		'".$_POST['Price']."',
		'".$_POST['Category']."'
	);";
	if(!execute($query)){
		echo "Item Entry Unsuccessfull! Redirecting...";
		header("Refresh: 2; URL={$referer}");
	}
	print_r($_POST);
	$ID=mysql_fetch_assoc(execute("SELECT ID FROM Items ORDER BY ID DESC LIMIT 1;"));
	$string="";
	for($i=1;$i<=10;$i++){
		if(($_POST['Field'.$i]))
			$string.=",'".$_POST['Field'.$i]."'";
	}          
	$query="INSERT INTO ".$_POST['Category']." VALUES(
		'".$ID['ID']."'
		".$string."
	);";
	echo $query;
	if(execute($query)){
		echo "Item Successfully Added! Redirecting...";
		header("Refresh: 2; URL={$referer}");
	}
}
else if(strpos($_SERVER['HTTP_REFERER'],'editItem.php')){
	$query="SELECT column_name Col FROM information_schema.columns WHERE table_name='Items';";
	$result=execute($query);
	while($field=mysql_fetch_array($result)){
		$query="UPDATE Items SET ".$field['Col']."='".$_POST[$field['Col']]."' WHERE ID=".$_POST['ID'].";";
		echo $query."<br>";
		execute($query);
	}
	$query="SELECT column_name Col FROM information_schema.columns WHERE table_name='".$_POST['Category']."';";
	$result=execute($query);
	while($field=mysql_fetch_array($result)){
		$query="UPDATE ".$_POST['Category']." SET ".$field['Col']."='".$_POST[$field['Col']]."' WHERE ID=".$_POST['ID'].";";
		echo $query."<br>";
		execute($query);
	}
}
else if(strpos($_SERVER['HTTP_REFERER'],'serviceCenter.php')){
	$query="INSERT INTO AuthorizedSC(Brand,Address,Phone) VALUES(
		'".$_POST['Brand']."',
		'".$_POST['Address']."',
		'".$_POST['Phone']."'
	);";
	if(!execute($query)){
		echo "ASC addition unsuccessfull! Redirecting...";
		header("Refresh: 2; URL={$referer}");
	}
	print_r($_POST);
	$ASCID=mysql_fetch_assoc(execute("SELECT ASCID FROM AuthorizedSC ORDER BY ASCID DESC LIMIT 1;"));
	$query="INSERT INTO AuthorizedService VALUES(
		'".$ASCID['ASCID']."',
		'".$_POST['ServicesSupported']."'
	);";
	if(execute($query)){
		echo "New Vendor added successfully! Redirecting...";
		header("Refresh: 2; URL={$referer}");
	}

}
else if(strpos($_SERVER['HTTP_REFERER'],'editServiceCenter.php')){
	$query="SELECT column_name Col FROM information_schema.columns WHERE table_name='AuthorizedSC';";
	$result=execute($query);
	while($field=mysql_fetch_array($result)){
		$query="UPDATE AuthorizedSC SET ".$field['Col']."='".$_POST[$field['Col']]."' WHERE ASCID=".$_POST['ASCID'].";";
		echo $query."<br>";
		execute($query);
	}
	$query="SELECT column_name Col FROM information_schema.columns WHERE table_name='AuthorizedService';";
	$result=execute($query);
	while($field=mysql_fetch_array($result)){
		$query="UPDATE AuthorizedService SET ".$field['Col']."='".$_POST[$field['Col']]."' WHERE ASCID=".$_POST['ASCID'].";";
		echo $query."<br>";
		execute($query);
	}
}
else if(strpos($_SERVER['HTTP_REFERER'],'brand.php')){
	$query="INSERT INTO Brand(Name,Description,Rating) VALUES(
		'".$_POST['Name']."',
		'".$_POST['Description']."',
		'".$_POST['Rating']."'
	);";
	if(!execute($query)){
		echo "Brand addition unsuccessfull! Redirecting...";
		header("Refresh: 2; URL={$referer}");
	}
	else{
		echo "New Brand added successfully! Redirecting...";
		header("Refresh: 2; URL={$referer}");
	}

}
else if(strpos($_SERVER['HTTP_REFERER'],'editBrand.php')){
	$query="SELECT column_name Col FROM information_schema.columns WHERE table_name='Brand';";
	$result=execute($query);
	while($field=mysql_fetch_array($result)){
		$query="UPDATE Brand SET ".$field['Col']."='".$_POST[$field['Col']]."' WHERE Name='".$_POST['Name']."';";
		echo $query."<br>";
		execute($query);
	}
}
?>
