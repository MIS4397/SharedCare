<?php
	include("config.php");	//Establishes DB connection
	session_start();	//Begins session so we can pass around username
	if($_SERVER["REQUEST_METHOD"] == "POST")
	{
		//username and password sent from Form
		$myusername=$_POST['username'];
		$mypassword=$_POST['password'];

		$sql="SELECT User_ID FROM Users WHERE User_Email='$myusername' and User_Password='$mypassword'";
		$result=mysql_query($sql);
		$count=mysql_num_rows($result);


		// If result matched $myusername and $mypassword, table row must be 1 row
		if($count==1)
		{
			$_SESSION['login_user']=$myusername;
			$checkOrg="SELECT User_IsOrg FROM Users WHERE User_Email='$myusername'";
			$result=mysql_query($checkOrg);
			$isOrg=mysql_result($result, 0);
			
				if($isOrg==true)
				{
					header("location: OrgDashboard.php");
				}
				else
				{
					header("location: EventsList.php");
				}
		}
		else
		{
			echo "<font color = 'red'>Your Login Name or Password is invalid</font>";
		}
	}
?>

<form action="" method="post">
<label>Email Address :</label>
<input type="text" name="username"/><br />
<label>Password :</label>
<input type="password" name="password"/><br/>
<input type="submit" value=" Submit "/><br />
</form>