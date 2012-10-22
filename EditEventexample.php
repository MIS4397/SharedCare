<?php
	include("config.php");
	session_start();
	
	$myeventID = $_POST["event_id"];
	
	$sql = "SELECT * FROM Events WHERE Event_ID = '$myeventID'";
	$result = mysql_query($sql);
	
	//GRABS THE DATA IN "COLUMN _NAME"(this is the title of the column) FROM CURRENT ROW FROM CURRENT QUERY
	echo mysql_result($result, 0,"Event_OrgName");
	echo "<split>";
	echo mysql_result($result, 0,"Event_Name");
	echo "<split>";
	echo mysql_result($result,0,"Event_Date");
	echo "<split>";
	echo mysql_result($result,0,"Event_Description");
	echo "<split>";
	echo mysql_result($result,0,"Event_Type");
	echo "<split>";
	echo mysql_result($result,0,"Event_StartTime");
	echo "<split>";
	echo mysql_result($result,0,"Event_EndTime");
	echo "<split>";
	echo mysql_result($result,0,"Event_ContactName");
	echo "<split>";
	echo mysql_result($result,0,"Event_ContactPhone");
	echo "<split>";
	echo mysql_result($result,0,"Event_ContactEmail");
	echo "<split>";
	echo mysql_result($result,0,"Event_Location");
	echo "<split>";
	echo mysql_result($result,0,"Event_Comments");
	
?>