<?php
include "essential.php";
dbconnect();
session_start();

$referer = end((explode('/', $_SERVER['HTTP_REFERER'])));

if(strpos($_SERVER['HTTP_REFERER'],'registration.php')){
	$query="INSERT INTO User(Username, Password) VALUES(
		'".$_POST['Username']."',
		'".MD5($_POST['Password'])."'
	);";
	if(!execute($query)){
		$msg='Registration Unsuccessful!';
		header("Location: registration.php?msg={$msg}");
	}
	$query="INSERT INTO Customer(Name, Address, Email, Phone, Username) VALUES(
		'".$_POST['Name']."',
		'".$_POST['Address']."',
		'".$_POST['Email']."',
		'".$_POST['Phone']."',
		'".$_POST['Username']."'
	);";
	if(execute($query)){
		$msg='Registration Successful!';
		header("Location: index.php?msg={$msg}");
	}
}
else if(strpos($_SERVER['HTTP_REFERER'],'raiseTicket.php')){
	$query = "INSERT INTO Ticket(CustID, Grievance)  VALUES(
		'".$_POST['ID']."',
		'".$_POST['Grievance']."'
	);";
	if(execute($query)){
		$msg="Ticket raised successfully!";
		header("Location:index.php?msg=${msg}");
	}
	else{
		$msg="There is some glitch. Please try again!";
		header("Location:index.php?msg=${msg}");
	}
}
else if(strpos($_SERVER['HTTP_REFERER'],'index.php')){
	$query="SELECT Password FROM User WHERE Username='".$_POST['Username']."';";
	$result=mysql_fetch_assoc(execute($query));
	if($result['Password']==MD5($_POST['Password'])){
		$msg="Login Successfull!";
		$_SESSION['Username']=$_POST['Username'];
		$result = execute("select CustID from Customer where Username = \"{$_POST['Username']}\"");
		if(mysql_num_rows($result)){
			$resArray = mysql_fetch_row($result);
			$res = $resArray[0];
			$_SESSION['ID']=(int)$res;
			header("Location: index.php?msg={$msg}");
		}
		else{
			$_SESSION['ID']=0;
			header("Location: index.php?msg={$msg}");
		}
	}
	else{
		$msg="Login credentials invalid!";
		header("Location: index.php?msg={$msg}");
	}
}
else if(strpos($_SERVER['HTTP_REFERER'],'employee.php')){
	if(isset($_POST['delID'])){
		$query="DELETE FROM Employee WHERE EmpID='".$_POST['delID']."';";
		if(execute($query)){
			$msg="Employee deleted successfully!";
			header("Location: employee.php?msg={$msg}");
		}
		else{
			$msg="Oops! Employee couldn't be deleted! Try again";
			header("Location: employee.php?msg={$msg}");
		}
	}
	else{
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
			$msg="Employee Registration Unsuccessful! Please try again";
			header("Location: employee.php?msg=$msg");
		}
		$EmpID=mysql_fetch_assoc(execute("SELECT EmpID FROM Employee ORDER BY EmpID DESC LIMIT 1;"));
		$query="INSERT INTO ".$_POST['Category']." VALUES(
			'".$EmpID['EmpID']."',
			'".$_POST['Field2']."'
		);";
		if(execute($query)){
			$msg="Employee Registration Successfull!";
			header("Location: index.php?msg={$msg}");
		}
		else{
			$msg="Employee Registration Unsuccessful! Please try again";
			header("Location: employee.php?msg=$msg");
		}
	}
}
else if(strpos($_SERVER['HTTP_REFERER'],'editEmployee.php')){
	echo "Hi";
	$query="SELECT column_name Col FROM information_schema.columns WHERE table_name='Employee';";
	$result=execute($query);
	while($field=mysql_fetch_array($result)){
		$query="UPDATE Employee SET ".$field['Col']."='".$_POST[$field['Col']]."' WHERE EmpID=".$_POST['EmpID'].";";
		echo $query."<br>";
		if(!execute($query)){
			$msg="There is some glitch. Please try again.";
			header("Location: editEmployee.php?msg={$msg}");
		}
	}
	$query="SELECT column_name Col FROM information_schema.columns WHERE table_name='".$_POST['Category']."';";
	$result=execute($query);
	while($field=mysql_fetch_array($result)){
		$query="UPDATE ".$_POST['Category']." SET ".$field['Col']."='".$_POST[$field['Col']]."' WHERE EmpID=".$_POST['EmpID'].";";
		echo $query."<br>";
		if(!execute($query)){
			$msg="There is some glitch. Please try again.";
			header("Location: editEmployee.php?msg={$msg}");
		}
	}
	$msg="Employee details updated successfully!";
	header("Location: index.php?msg={$msg}");
}
else if(strpos($_SERVER['HTTP_REFERER'],'vendor.php')){
	if(isset($_POST['delID'])){
		$query="DELETE FROM Vendor WHERE VendID='".$_POST['delID']."';";
		if(execute($query)){
			$msg="Vendor deleted successfully!";
			header("Location: vendor.php?msg={$msg}");
		}
		else{
			$msg="Vendor couldn't be deleted! Try again";
			header("Location: vendor.php?msg={$msg}");
		}
	}
	else{
		$query="INSERT INTO Vendor(Name,Address,Phone) VALUES(
			'".$_POST['Name']."',
			'".$_POST['Address']."',
			'".$_POST['Phone']."'
		);";
		if(!execute($query)){
			$msg="Vendor couldn't be added. Try again!";
			header("Location: vendor.php?msg={$msg}");
		}
		$vendID=mysql_fetch_assoc(execute("SELECT VendID FROM Vendor ORDER BY VendID DESC LIMIT 1;"));
		$query="INSERT INTO VendorBrands VALUES(
			'".$vendID['VendID']."',
			'".$_POST['Brands']."'
		);";
		if(execute($query)){
			$msg="New Vendor added successfully!";
			header("Location: index.php?msg={$msg}");
		}
		else{
			$msg="Vendor couldn't be added. Try again!";
			header("Location: vendor.php?msg={$msg}");
		}
	}
}
else if(strpos($_SERVER['HTTP_REFERER'],'editVendor.php')){
	$query="SELECT column_name Col FROM information_schema.columns WHERE table_name='Vendor';";
	$result=execute($query);
	while($field=mysql_fetch_array($result)){
		$query="UPDATE Vendor SET ".$field['Col']."='".$_POST[$field['Col']]."' WHERE VendID=".$_POST['VendID'].";";
		if(!execute($query)){
			$msg="Vendor details couldn't be updated. Try again!";
			header("Location: editVendor.php?msg={$msg}");
		}
	}
	$query="SELECT column_name Col FROM information_schema.columns WHERE table_name='VendorBrands';";
	$result=execute($query);
	while($field=mysql_fetch_array($result)){
		$query="UPDATE VendorBrands SET ".$field['Col']."='".$_POST[$field['Col']]."' WHERE VendID=".$_POST['VendID'].";";
		if(!execute($query)){
			$msg="Vendor details couldn't be updated. Try again!";
			header("Location: editVendor.php?msg={$msg}");
		}
	}
	if(execute($query)){
		$msg="Vendor details modified successfully!";
		header("Location: index.php?msg={$msg}");
	}
	else{
		$msg="Vendor details couldn't be updated. Try again!";
		header("Location: editVendor.php?msg={$msg}");
	}
}
else if(strpos($_SERVER['HTTP_REFERER'],'item.php')){
	if(isset($_POST['delID'])){
		$query="DELETE FROM Items WHERE ID='".$_POST['delID']."';";
		if(execute($query)){
			$msg="Item deleted successfully!";
			header("Location: item.php?msg={$msg}");
		}
		else{
			$msg="Item couldn't be deleted! Try again";
			header("Location: item.php?msg={$msg}");
		}
	}
	else{
		$query="INSERT INTO Items(Name,Description,Brand,Price,Category) VALUES(
			'".$_POST['Name']."',
			'".$_POST['Description']."',
			'".$_POST['Brand']."',
			'".$_POST['Price']."',
			'".$_POST['Category']."'
		);";
		if(!execute($query)){
			$msg="Item Entry Unsuccessful! Try again";
			header("Location: item.php?msg={$msg}");
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
			$msg="Item Successfully Added! ";
			header("Location: index.php?msg={$msg}");
		}
		else{
			$msg="Item Entry Unsuccessful! Try again";
			header("Location: item.php?msg={$msg}");
		}
	}
}
else if(strpos($_SERVER['HTTP_REFERER'],'editItem.php')){
	$query="SELECT column_name Col FROM information_schema.columns WHERE table_name='Items';";
	$result=execute($query);
	while($field=mysql_fetch_array($result)){
		$query="UPDATE Items SET ".$field['Col']."='".$_POST[$field['Col']]."' WHERE ID=".$_POST['ID'].";";
		if(!execute($query)){
			$msg="Item details couldn't be updated! Try again";
			header("Location: {$referer}&msg={$msg}");
		}
	}
	$query="SELECT column_name Col FROM information_schema.columns WHERE table_name='".$_POST['Category']."';";
	$result=execute($query);
	while($field=mysql_fetch_array($result)){
		$query="UPDATE ".$_POST['Category']." SET ".$field['Col']."='".$_POST[$field['Col']]."' WHERE ID=".$_POST['ID'].";";
		if(!execute($query)){
			$msg="Item details couldn't be updated! Try again";
			header("Location: {$referer}&msg={$msg}");
		}
	}
	$msg="Item details updated successfully!";
	header("Location: item.php?msg={$msg}");
}
else if(strpos($_SERVER['HTTP_REFERER'],'serviceCenter.php')){
	if(isset($_POST['delID'])){
		$query="DELETE FROM AuthorizedSC WHERE ASCID='".$_POST['delID']."';";
		if(execute($query)){
			$msg="ASC deleted successfully!";
			header("Location: serviceCenter.php?msg={$msg}");
		}
		else{
			$msg="ASC couldn't be deleted. Try again";
			header("Location: serviceCenter.php?msg={$msg}");
		}
	}
	else{

		$query="INSERT INTO AuthorizedSC(Brand,Address,Phone) VALUES(
			'".$_POST['Brand']."',
			'".$_POST['Address']."',
			'".$_POST['Phone']."'
		);";
		if(!execute($query)){
			$msg="ASC addition unsuccessful! Try again";
			header("Location: serviceCenter.php?msg={$msg}");
		}
		$ASCID=mysql_fetch_assoc(execute("SELECT ASCID FROM AuthorizedSC ORDER BY ASCID DESC LIMIT 1;"));
		$query="INSERT INTO AuthorizedService VALUES(
			'".$ASCID['ASCID']."',
			'".$_POST['ServicesSupported']."'
		);";
		if(execute($query)){
			$msg="ASC added successfully!";
			header("Location: serviceCenter.php?msg={$msg}");
		}
		else{
			$msg="ASC addition unsuccessful! Try again";
			header("Location: serviceCenter.php?msg={$msg}");
		}
	}
}
else if(strpos($_SERVER['HTTP_REFERER'],'editServiceCenter.php')){
	$query="SELECT column_name Col FROM information_schema.columns WHERE table_name='AuthorizedSC';";
	$result=execute($query);
	while($field=mysql_fetch_array($result)){
		$query="UPDATE AuthorizedSC SET ".$field['Col']."='".$_POST[$field['Col']]."' WHERE ASCID=".$_POST['ASCID'].";";
		if(!execute($query)){
			$msg="ASC couldn't be updated! Please try again";
			header("Location: {$referer}&msg={$msg}");
		}
	}
	$query="SELECT column_name Col FROM information_schema.columns WHERE table_name='AuthorizedService';";
	$result=execute($query);
	while($field=mysql_fetch_array($result)){
		$query="UPDATE AuthorizedService SET ".$field['Col']."='".$_POST[$field['Col']]."' WHERE ASCID=".$_POST['ASCID'].";";
		if(!execute($query)){
			$msg="ASC couldn't be updated! Please try again";
			header("Location: {$referer}&msg={$msg}");
		}
	}
	$msg="ASC updated successfully!";
	header("Location: serviceCenter.php?msg={$msg}");
}
else if(strpos($_SERVER['HTTP_REFERER'],'brand.php')){
	if(isset($_POST['delID'])){
		$query="DELETE FROM Brand WHERE Name='".$_POST['delID']."';";
		if(execute($query)){
			$msg="Brand deleted successfully! ";
			header("Location: brand.php?msg={$msg}");
		}
		else{
			$msg="Brand couldn't be deleted! Try again";
			header("Location: brand.php?msg={$msg}");
		}
	}
	else{

		$query="INSERT INTO Brand(Name,Description,Rating) VALUES(
			'".$_POST['Name']."',
			'".$_POST['Description']."',
			'".$_POST['Rating']."'
		);";
		if(!execute($query)){
			$msg="Brand addition unsuccessful! Try again";
			header("Location: brand.php?msg={$msg}");
		}
		else{
			$msg="Brand addition successful!";
			header("Location: brand.php?msg={$msg}");
		}
	}
}
else if(strpos($_SERVER['HTTP_REFERER'],'editBrand.php')){
	$query="SELECT column_name Col FROM information_schema.columns WHERE table_name='Brand';";
	$result=execute($query);
	while($field=mysql_fetch_array($result)){
		$query="UPDATE Brand SET ".$field['Col']."='".$_POST[$field['Col']]."' WHERE Name='".$_POST['Name']."';";
		if(!execute($query)){
			$msg="Brand couldn't be updated! Try again";
			header("Location: {$referer}&msg={$msg}");
		}
	}
	$msg="Brand updated successfully!";
	header("Location: index.php?msg={$msg}");
}
else if(strpos($_SERVER['HTTP_REFERER'],'newOrder.php')){
	$maxItems = 5;
	print_r($_POST);
	$result = execute("SELECT max(OrderID) from SalesOrder");
	$Order = mysql_fetch_row($result);
	$OrderID = (int)$Order[0];
	$OrderID++;
	//echo $OrderID;
	if($_SESSION['ID'] == 0){
	//	echo "Invalid stuff";
		header("Location: {$referer}");
	}
	$ID = $_SESSION['ID'];
	$date = date('Y-m-d', time());
	//echo $date;

	$query = "insert into SalesOrder(CustID, Date) values($ID, \"$date\")";
	execute($query);
	for($i = 1; $i <= $maxItems; $i++){
		if($_POST['item-'.$i] != ""){
			if($_POST['quantity-'.$i] > 0){
				$item = $_POST['item-'.$i];
				$quantity = $_POST['quantity-'.$i];
	//			echo "Yo".$item."Yo".$quantity;
				$subquery = "insert into OrderItems values({$OrderID}, {$item}, $quantity)";
	//			echo $subquery."\n";
				execute($subquery);
			}
		}
	}
	$query = "insert into Shipment values({$OrderID}, \"{$_POST['date']}\", \"{$_POST['time']}\", \"{$_POST['address']}\", \"Processing\", NULL)";
	//echo $query;
	if(execute($query)){
		$msg="Order successfully placed!";
		header("Location: index.php?msg={$msg}");
	}
}
else if(strpos($_SERVER['HTTP_REFERER'],'giveFeedback.php')){
	$query="INSERT INTO Feedback(CustID,OrderID,TicketNo,Feedback,Rating) VALUES(
		'".$_SESSION['ID']."',
		'".$_POST['OrderID']."',
		'".$_POST['TicketNo']."',
		'".$_POST['Feedback']."',
		'".$_POST['Rating']."'
	);";
	if(!execute($query)){
		$msg="Feedback couldn't be submitted! Try again";
		header("Location: giveFeedback.php?msg={$msg}");
	}
	else{
		echo "Feedback submitted successfully!";
		header("Location: index.php?msg={$msg}");
	}
}
else if(strpos($_SERVER['HTTP_REFERER'],'editTicket.php')){
	$fields=array_keys($_POST);
	foreach($fields as $field){
		$idStatus=(explode(',',$field));
		$query="UPDATE Ticket SET Status='".$_POST[$field]."' WHERE TicketNo=".$idStatus[0].";";
		if(!execute($query)){
			$msg="Ticket couldn't be updated! Try again";
			header("Location: {$referer}?msg={$msg}");
		}
	}
	$msg="Ticket status updated successfully!";
	header("Location: index.php?msg={$msg}");
}
else if(strpos($_SERVER['HTTP_REFERER'],'editShipment.php')){
	$fields=array_keys($_POST);
	foreach($fields as $field){
		$idStatus=(explode(',',$field));
		if($idStatus[1]=='Status')
			$query="UPDATE Shipment SET Status='".$_POST[$field]."' WHERE OrderID=".$idStatus[0].";";
		else
			$query="UPDATE Shipment SET DeliveryDate='".$_POST[$field]."' WHERE OrderID=".$idStatus[0].";";
		if(!execute($query)){
			$msg="Shipment couldn't be updated! Try again";
			header("Location: editShipment.php?msg={$msg}");
		}
	}
	$msg="Shipment status updated successfully!";
	header("Location: index.php?msg={$msg}");
}
else if(strpos($_SERVER['HTTP_REFERER'],'makePayment.php')){
	$query = "insert into Payment values ({$_POST['orderID']}, \"{$_POST['desc']}\", \"{$_POST['amount']}\", \"{$_POST['method']}\")";
	if(execute($query)){
		$msg="Payment successful! ";
		header("Location: index.php?msg={$msg}");
	}
	else{
		$msg="Payment wasn't successful! Try again";
		header("Location: makePayment.php?msg={$msg}");
	}
}
else if(strpos($_SERVER['HTTP_REFERER'],'password.php')){
	echo "Hello";
	$query="SELECT Password FROM User WHERE Username='".$_SESSION['Username']."';";
	$result=mysql_fetch_assoc(execute($query));
	if($result['Password']==MD5($_POST['password1'])){
		$query="Update User set Password='".MD5($_POST['Password'])."' WHERE Username='".$_SESSION['Username']."';";
		if(!execute($query)){
			$msg="Something went wrong. Try again!";
			header("Location: index.php?msg={$msg}");
		}
		else{
			$msg="Password changed successfully!";
			header("Location: index.php?msg={$msg}");
		}
	}
	else{
		$msg="Wrong password! Try again";
		header("Location: index.php?msg={$msg}");
	}
}
?>
