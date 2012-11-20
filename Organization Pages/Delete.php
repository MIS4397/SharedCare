<?php
	include("config.php");
	include("orgLock.php");
	session_start();
	$myeventID = $_SESSION["event_id"];
	
	$sql="DELETE FROM Events WHERE Event_ID='$myeventID'";
	mysql_query($sql);
	
	echo "OK";	
?>