<?php
	include("config.php");
	include("lock.php");
	session_start();
	$myusername=$_SESSION['login_user'];
	
	$sql="SELECT * FROM Organizations";   //STILL NEEDS DATE LOGIC AND FEATURED LOGIC
	$result=mysql_query($sql);
	
	$num=mysql_numrows($result);//GRABS NUMBER OF ROWS

	$i=0;
	while ($i < $num) //GETS CURRENT ROW IN TABLE AND MAKES SURE WE GO THROUGH ALL RECORDS
	{
		echo "<tr><td id='eventList'>";
		echo "<form action='orgProf.php' method='POST'>";
		echo "<p id='eventTableDate'>".mysql_result($result,$i,"Org_Website")."</p>";
		echo "<img src='defaultProf.png' id='eventTablePic'></img>";
		echo "<p id='eventTableHd'>".mysql_result($result,$i,"Org_Name")."</p>";
		echo "<p id='eventTableDesc'>".mysql_result($result,$i,"Org_Desc")."</p>";
		echo "<input id='uni_ID' name='org_id' type='hidden' value='".mysql_result($result,$i,"Org_ID")."' hidden>";
		echo "</form></td></tr><hr>";

		$i++; //GO TO NEXT ROW
	}

?>