<?php
	include("config.php");
	session_start();
	$myusername=$_SESSION['login_user'];
	
	
	$sql="SELECT * FROM Events";   //STILL NEEDS DATE LOGIC AND FEATURED LOGIC
	$result=mysql_query($sql);
	
	$num=mysql_numrows($result);//GRABS NUMBER OF ROWS

	$i=0;
	while ($i < $num) //GETS CURRENT ROW IN TABLE AND MAKES SURE WE GO THROUGH ALL RECORDS
	{
		$eventID = mysql_result($result, $i, "Event_ID");  //GRABS THE DATA IN "COLUMN _NAME"(this is the title of the column) FROM CURRENT ROW FROM CURRENT QUERY
		$eventName=mysql_result($result,$i,"Event_Name");
		$eventDate=mysql_result($result,$i,"Event_Date");
		$eventDesc=mysql_result($result,$i,"Event_Description");
		$eventType=mysql_result($result,$i,"Event_Type");

		echo "<b>$eventName"."<br>"."$eventDate</b><br>$eventDesc<br>$eventType<hr><br>"; //WE CAN FORMAT THIS TO PRINT AS PRETTY AS WE WANT

		$i++; //GO TO NEXT ROW
	}

?>