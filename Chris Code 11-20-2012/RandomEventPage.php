<?php
	include("config.php");
	include("lock.php");
	session_start();
	
	$sql = "SELECT * FROM Events WHERE Event_Date >= NOW() ORDER BY RAND() LIMIT 0,1";
	$query = mysql_query($sql);
	$myeventID=mysql_result($result,0,"Event_ID");
	$_SESSION['event_id'] = $myeventID;
?>