<?php
	include("config.php");
	session_start();
	
	$myeventID = 1;			//$_POST("Event_ID");
	
	$sql = "SELECT * FROM Events WHERE Event_ID = '$myeventID'";
	$result = mysql_query($sql);
	
	//GRABS THE DATA IN "COLUMN _NAME"(this is the title of the column) FROM CURRENT ROW FROM CURRENT QUERY
	$eventName=mysql_result($result, 0,"Event_Name");
	$eventOrgName=mysql_result($result,0,"Event_OrgName");
	$eventDate=mysql_result($result,0,"Event_Date");
	$eventDesc=mysql_result($result,0,"Event_Description");
	$eventType=mysql_result($result,0,"Event_Type");
	$eventStartTime=mysql_result($result,0,"Event_StartTime");
	$eventEndTime=mysql_result($result,0,"Event_EndTime");
	$eventCN=mysql_result($result,0,"Event_ContactName");
	$eventCP=mysql_result($result,0,"Event_ContactPhone");
	$eventCE=mysql_result($result,0,"Event_ContactEmail");
	$eventLocation=mysql_result($result,0,"Event_Location");
	$eventComments=mysql_result($result,0,"Event_Comments");
	
	$_SESSION['event_id'] = $myeventID;
	
	//header("Location: EditEvent.php");

?>