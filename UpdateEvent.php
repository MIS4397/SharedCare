<?php
	include("config.php");
	session_start();
	
	$myeventID = $_POST['event_id'];
	
	$myeventname=addslashes($_POST['eventname']);
	$myeventdate=addslashes($_POST['eventdate']);
	$mylocation=addslashes($_POST['location']);
	$mycontactname=addslashes($_POST['contactname']);
	$mycontactphone=addslashes($_POST['contactphone']);
	$mycontactemail=addslashes($_POST['contactemail']);
	$mydescription=addslashes($_POST['eventdesc']);
	$mystarttime=addslashes($_POST['eventstart']);
	$mystoptime=addslashes($_POST['eventend']);
	$myeventtype=addslashes($_POST['eventtype']);
	$myeventcomments=addslashes($_POST['comments']);
 
	$sql = "UPDATE Events SET Event_Name = '$myeventname', Event_Date = '$myeventdate',
			Event_Location = '$mylocation', Event_ContactName = '$mycontactname',
			Event_ContactPhone = '$mycontactphone', Event_ContactEmail = '$mycontactemail',
			Event_Description = '$mydescription', Event_StartTime = '$mystarttime',
			Event_EndTime = '$mystoptime', Event_Comments = '$myeventcomments',
			Event_Type = '$myeventtype' WHERE Event_ID = '$myeventID'";
 
	mysql_query($sql) or die ("Error: ".mysql_error());
	
	header('Location: orgSuccess.html');
 
?>