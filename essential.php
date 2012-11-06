<?php
function dbconnect(){
	GLOBAL $con;
	$con = mysql_connect('','','');
	if(!$con){
		die("Error in connection!");
	}   
	else {
		$chooseDB = "USE dbapp";
		$fetchDB = mysql_query( $chooseDB , $con);
		if(!$fetchDB){
			echo mysql_error();
			die("no database!");
		}   
	}   
}

function execute($query){
	GLOBAL $con;
	if($con == 0 ){
		dbconnect();
	}   
	$result = mysql_query($query,$con);
	if(!$result){
		echo mysql_error();
		die("Cannot execute the query ".$query);
	}
	else{
		return $result;
	}
}

function generateItems($query){
	dbconnect();
	$result=execute($query);
	$string="";
	while($rows = mysql_fetch_assoc($result)){
		$string.="<tr>";
		foreach($rows as $row){
			$string.="<td><a href=itemDetails.php?ID=".$rows['ID']."&Category=".$rows['Category'].">".$row."</a></td>";
		}
		$string.="</tr>";
	}   
	return $string;
}

function generateItems2($query){
	dbconnect();
	$result=execute($query);
	$string="";
	while($rows = mysql_fetch_assoc($result)){
		$string.="<tr>";
		foreach($rows as $row){
			$string.="<td><a href=editItem.php?ID=".$rows['ID']."&Category=".$rows['Category'].">".$row."</a></td>";
		}
		$string.="</tr>";
	}   
	return $string;
}

function generateEmployee($query){
	dbconnect();
	$result=execute($query);
	$string="";
	while($rows = mysql_fetch_assoc($result)){
		$string.="<tr>";
		foreach($rows as $row){
			$string.="<td><a href=editEmployee.php?EmpID=".$rows['EmpID']."&Category=".$rows['Category'].">".$row."</a></td>";
		}
		$string.="</tr>";
	}   
	return $string;
}

function generateVendor($query){
	dbconnect();
	$result=execute($query);
	$string="";
	while($rows = mysql_fetch_assoc($result)){
		$string.="<tr>";
		foreach($rows as $row){
			$string.="<td><a href=editVendor.php?VendID=".$rows['VendID'].">".$row."</a></td>";
		}
		$string.="</tr>";
	}   
	return $string;
}

function generateASC($query){
	dbconnect();
	$result=execute($query);
	$string="";
	while($rows = mysql_fetch_assoc($result)){
		$string.="<tr>";
		foreach($rows as $row){
			$string.="<td><a href=editASC.php?ASCID=".$rows['ASCID'].">".$row."</a></td>";
		}
		$string.="</tr>";
	}   
	return $string;
}
function generateBrand($query){
	dbconnect();
	$result=execute($query);
	$string="";
	while($rows = mysql_fetch_assoc($result)){
		$string.="<tr>";
		foreach($rows as $row){
			$string.="<td><a href=editBrand.php?Name='".$rows['Name']."'>".$row."</a></td>";
		}
		$string.="</tr>";
	}   
	return $string;
}

function generateTicket($query){
	dbconnect();
	$result=execute($query);
	$string="";
	while($rows = mysql_fetch_assoc($result)){
		$string.="<tr>";
		foreach($rows as $row){
			$string.="<td><a href=ediTicket.php?TicketNo='".$rows['TicketNo']."'>".$row."</a></td>";
		}
		$string.="</tr>";
	}   
	return $string;
}

function getEmployeeDetails($query){
	dbconnect();
	$result=execute($query);
	$string="";
	$row=mysql_fetch_assoc($result);
	$fields=array_keys($row);
	foreach($fields as $detail){
		$string.="<tr><td>".$detail."</td><td><input type='text' value='".$row[$detail]."' class='empDet' name='".$detail."'></td></tr>\n";
	}
	return $string;
}

function getBrandDetails($query){
	dbconnect();
	$result=execute($query);
	$string="";
	$row=mysql_fetch_assoc($result);
	$fields=array_keys($row);
	foreach($fields as $detail){
		$string.="<tr><td>".$detail."</td><td><input type='text' value='".$row[$detail]."' class='brandDet' name='".$detail."'></td></tr>\n";
	}
	return $string;
}



function getASCDetails($query){
	dbconnect();
	$result=execute($query);
	$string="";
	$row=mysql_fetch_assoc($result);
	$fields=array_keys($row);
	foreach($fields as $detail){
		$string.="<tr><td>".$detail."</td><td><input type='text' value='".$row[$detail]."' class='ASCDet' name='".$detail."'></td></tr>\n";
	}
	return $string;
}

function getVendorDetails($query){
	dbconnect();
	$result=execute($query);
	$string="";
	$row=mysql_fetch_assoc($result);
	$fields=array_keys($row);
	foreach($fields as $detail){
		$string.="<tr><td>".$detail."</td><td><input type='text' value='".$row[$detail]."' class='vendDet' name='".$detail."'></td></tr>\n";
	}
	return $string;
}

function getItemDetails($query){
	dbconnect();
	$result=execute($query);
	$string="";
	$row=mysql_fetch_assoc($result);
	$fields=array_keys($row);
	foreach($fields as $detail){
		$string.="<tr><td>".$detail."</td><td><input type='text' value='".$row[$detail]."' class='itemDet' name='".$detail."'></td></tr>\n";
	}
	return $string;
}


function data2Table($query){
	dbconnect();
	$result=execute($query);
	$string="";
	while($rows = mysql_fetch_assoc($result)){
		$string.="<tr>";
		foreach($rows as $row){
			$string.="<td>".$row."</td>";
		}
		$string.="</tr>";
	}   
	return $string;
}
function getShipment($query){
	dbconnect();
	$result=execute($query);
	$string="";
	while($rows = mysql_fetch_assoc($result)){
		$string.="<tr>";
		foreach($rows as $row){
			$string.="<td>".$row."</td>";
		}
		$string.="<td><select name='".$rows['TicketNo'].",Status'>
			<option value='Unread'>Unread </option>
			<option value='Processing'>Processing </option>
			<option value='Done'> Done</option>
			</select></td></tr>";
		$string.="<td><input type='date' name='".$rows['TicketNo'].",DeliveryDate' value='NULL' size=10></td></tr>";
	}   
	return $string;
}
function itemsOptionList(){
	dbconnect();
	$result = execute("select ID, Brand, Name from Items order by Brand, Name;");
	while($row = mysql_fetch_assoc($result)){
		echo "<option value='".$row['ID']."'>".$row['Brand']." ".$row['Name']."</option>\n";
	}
}

function getMyOrders(){
	dbconnect();
	$result=execute("SELECT DISTINCT OrderID FROM SalesOrder WHERE CustID='".$_SESSION['ID']."'");
	while($row = mysql_fetch_assoc($result)){
		echo "<option value='".$row['OrderID']."'>".$row['OrderID']."</option>\n";
	}
}
function getMyTickets(){
	dbconnect();
	$result=execute("SELECT DISTINCT TicketNo FROM Ticket WHERE CustID='".$_SESSION['ID']."'");
	while($row = mysql_fetch_assoc($result)){
		echo "<option value='".$row['TicketNo']."'>".$row['TicketNo']."</option>\n";
	}
}
function getTickets($query){
	dbconnect();
	$result=execute($query);
	$string="";
	while($rows = mysql_fetch_assoc($result)){
		$string.="<tr>";
		foreach($rows as $row){
			$string.="<td>".$row."</td>";
		}
		$string.="<td><select name='".$rows['TicketNo'].",Status'>
			<option value='Unread'>Unread </option>
			<option value='Processing'>Processing </option>
			<option value='Done'> Done</option>
			</select></td></tr>";
	}   
	return $string;
}

function quantityList($maxNumber){
	for($i=0;$i<=$maxNumber;$i++){
		echo "<option value='".$i."'>".$i."</option>\n";
	}
}
function orderTable($query){
	dbconnect();
	$result=execute($query);
	$string="";
	while($rows = mysql_fetch_assoc($result)){
		$string.="<tr>";
		$count=0;
		foreach($rows as $row){
			if($count==0){
				$string.="<td><a href='?id=".$row."'>".$row."</a></td>";
			}
			else{
				$string.="<td>".$row."</td>";
			}
			$count++;
		}
		$string.="</tr>";
	}   
	return $string;
}

?>
