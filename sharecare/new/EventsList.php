<?php
	include("config.php");
	include("orgLock.php");
	session_start();
	$myusername=$_SESSION['login_user'];
	
	$org_name = $_GET['id'];
	
	$sql="SELECT * FROM Events WHERE Event_OrgName = '$org_name'";   //STILL NEEDS DATE LOGIC AND FEATURED LOGIC
	$result=mysql_query($sql);
	
	$num=mysql_numrows($result);//GRABS NUMBER OF ROWS

	$i=0;
	while ($i < $num) //GETS CURRENT ROW IN TABLE AND MAKES SURE WE GO THROUGH ALL RECORDS
	{
		echo "<tr><td id='eventList'>";
		echo "<form action='EditEvent.php' method='POST'>";
		echo "<p id='eventTableDate'>".mysql_result($result,$i,"Event_Date")."</p>";
		echo "<img src='defaultProf.png' id='eventTablePic'></img>";
		echo "<p id='eventTableHd'>".mysql_result($result,$i,"Event_Name")."</p>";
		echo "<p id='eventTableDesc'>".mysql_result($result,$i,"Event_Description")."</p>";
		echo "<input id='uni_ID' name='event_id' type='hidden' value='".mysql_result($result,$i,"Event_ID")."' hidden>";
		echo "</form></td></tr><hr>";

		$i++; //GO TO NEXT ROW
	}

?>