<?php
	include("config.php");
	session_start();
	$myusername=$_SESSION['login_user'];
		
	$sql="SELECT * FROM Organizations WHERE Org_UserEmail = '$myusername'";   //PICK RECORD WHERE USERNAME IS THE ORGANIZER
	$result=mysql_query($sql);
		
		$orgID = mysql_result($result, 0, "Org_ID");  //GRABS THE DATA IN "COLUMN _NAME"(this is the title of the column) FROM CURRENT ROW FROM CURRENT QUERY
		$orgName=mysql_result($result, 0,"Org_Name");
		$orgWebsite=mysql_result($result,0,"Org_Website");
		$orgLocation=mysql_result($result,0,"Org_Location");
		$orgCN=mysql_result($result,0,"Org_ContactName");
		$orgCP=mysql_result($result,0,"Org_ContactPhone");
		$orgCE=mysql_result($result,0,"Org_ContactEmail");
		$orgRequire=mysql_result($result,0,"Org_Requirements");
		$orgMission=mysql_result($result,0,"Org_Mission");
		$orgLeads=mysql_result($result,0,"Org_LeadCount");
		$orgType=mysql_result($result,0,"Org_Type");

		echo "<b>$orgName"."<br>"."$orgWebsite</b><br>$orgLocation<br>$orgCN<hr><br>"; //WE CAN FORMAT THIS TO PRINT AS PRETTY AS WE WANT


?>