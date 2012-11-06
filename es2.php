<?php

//another essential for concurrent changing
function assocQueryTable($query){
	$result = execute($query);
	$row = mysql_fetch_assoc($result);
	foreach($row as $key=>$value){
		echo "<tr><td>{$key}</td><td>{$value}</td></tr>";
	}
}

?>
