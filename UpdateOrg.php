<?php
	include("config.php");
	session_start();
	
	$myorg_ID = $_POST["org_id"];
	
	$myorgname=addslashes($_POST['orgname']);
	$mywebsite=addslashes($_POST['website']);
	$mylocation=addslashes($_POST['address']);
	$mycontactname=addslashes($_POST['contactname']);
	$mycontactphone=addslashes($_POST['contactphone']);
	$mycontactemail=addslashes($_POST['contactemail']);
	$myrequirements=addslashes($_POST['requirements']);
	$mymission=addslashes($_POST['mission']);
	$myorgtype=addslashes($_POST['orgtype']);
 
	$sql = "UPDATE Organizations SET Org_Name = '$myorgname', Org_Website = '$mywebsite',
			Org_Location = '$mylocation', Org_ContactName = '$mycontactname',
			Org_ContactPhone = '$mycontactphone', Org_ContactEmail = '$mycontactemail',
			Org_Requirements = '$myrequirements', Org_Mission = '$mymission',
			Org_Type = '$myorgtype' WHERE Org_ID = '$myorg_ID'";
 
	mysql_query($sql) or die ("Error: ".mysql_error());
	
	header("Location: orgSuccess.html");
?>