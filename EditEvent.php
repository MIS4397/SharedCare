<?php
	include("config.php");
	session_start();
	$myeventID = $_SESSION["event_id"];
	
	echo "hello";
	
	
	$sql = "SELECT * FROM Events WHERE Event_ID = '$myeventID'";
	$query = mysql_query($sql);
	$i = 0;
	while($i < mysql_num_fields($query)){
		echo mysql_result($query, 0, $i)."**";
		$i++;
	}
?>	