<?php
	//include("config.php");
	echo "starting to send";
	echo "another string";
	//if($_SERVER["REQUEST_METHOD"] == "POST")
	//{
		/*$myuserid=$_SESSION['login_user'];
		$myeventname="Some Event";					// $_POST['eventname']
		
		$sql="SELECT * FROM Users WHERE User_ID='$myuserid'";
		$result=mysql_query($sql);
		$firstName=mysql_result($result,0,"User_FirstName");
		$lastName=mysql_result($result,0,"User_LastName");
		$email=mysql_result($result,0,"User_Email");
		
		$sql2="SELECT * FROM Events WHERE Event_Name='$myeventname'";
		$result2=mysql_query($sql2);
		$eventEmail=mysql_result($result2,0,"Event_ContactEmail");
		$myeventid=mysql_result($result2,0,"Event_ID");
		$myeventtype=mysql_result($result2,0,"Event_Type");*/
		
		$to="jp.ramirezpra@gmail.com, chi.qui.413@gmail.com";//$eventEmail;
		echo $to;
		$subject="Someone has expressed interest in your event!";//.$myeventname;
		$message='Hello!\nI am very interested in attending your upcoming event';//.$myeventname."/n/nHere is my contact information: ".$firstName." ".$lastName." ".$email."/n/nPlease let me know if I need to complete any steps in order to attend./n/nThanks,/nThe ShareCare Team";
		
		$headers  = 'MIME-Version: 1.0' . "\r\n";
		$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

	// Additional headers
		$headers .= 'From: ShareCare DO NOT REPLY <notifications@sharecare.com>' . "\r\n";
		$headers .= 'Bcc: chi.qui.@example.com' . "\r\n";

		if(mail($to,$subject,$message, $headers)){
			echo "\n"."mail sent";
		}
		
		else { 
			echo "send failed";
		}
		
		//$sql3="INSERT INTO Likes (Like_EventID, Like_UserID, Like_EventType) VALUES ('$myeventid','$myuserid','$myeventtype')";
		//mysql_query($sql3, $error);
		//echo $error;
		
		//header("Location: userHome.php");
	//}
?>