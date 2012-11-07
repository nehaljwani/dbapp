<?php

//another essential for concurrent changing
function assocQueryTable($query){
	$result = execute($query);
	$row = mysql_fetch_assoc($result);
	foreach($row as $key=>$value){
		echo "<tr><td>{$key}</td><td>{$value}</td></tr>";
	}
}
function queryOptionsList($query){
	$result = execute($query);
	while($row = mysql_fetch_row($result)){
		echo "<option value=\"{$row[0]}\">{$row[0]}</option>";
	}
}

?>
