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

?>
