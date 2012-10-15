<?php
	include("config.php");
	session_start();
	$myusername=$_SESSION['login_user'];
	
	
	$sql="SELECT * FROM Events";
	$result=mysql_query($sql);
	
	$num=mysql_numrows($result);

	echo "<b><center>Database Output</center></b><br><br>";

	$i=0;
	while ($i < $num) 
	{
		$eventID = mysql_result($result, $i, "Event_ID");
		$eventName=mysql_result($result,$i,"Event_Name");
		$eventDate=mysql_result($result,$i,"Event_Date");
		$eventDesc=mysql_result($result,$i,"Event_Description");
		$eventType=mysql_result($result,$i,"Event_Type");

		echo "<b>$eventName"."<br>"."$eventDate</b><br>$eventDesc<br>$eventType<hr><br>";

		$i++;
	}

?>