<?php
	include("config.php");
	session_start();
		
	if($_SERVER["REQUEST_METHOD"] == "POST")
	{
			// Event info from form is gathered here
			$myeventname=addslashes($_POST['eventname']);
			$myeventdate=addslashes($_POST['eventdate']);
			$mylocation=addslashes($_POST['location']);
			$mycontactname=addslashes($_POST['contactname']);
			$mycontactphone=addslashes($_POST['contactphone']);
			$mycontactemail=addslashes($_POST['contactemail']);
			$mydescription=addslashes($_POST['eventdesc']);
			$mystarttime=addslashes($_POST['eventstart']);
			$mystoptime=addslashes($_POST['eventstop']);
			$myeventtype=addslashes($_POST['eventtype']);
			$myeventcomments=addslashes($_POST['comments']);
			$myorgname='TEST';	//$_SESSION['orgName']; PUT THIS IN ONCE REDIRECTING FROM ORG DASHBOARD
			
				if(($myeventname != '' && $myeventdate != '' && $mycontactname != '') || ($myeventname !=null && $myeventdate != null && $mycontactname != null)) //Are all required fields filled out?
				{

					//Check to see if Event already exists
					$sql="SELECT Event_Name FROM Events WHERE Event_Name='$myeventname'";
					$result=mysql_query($sql);
					$count=mysql_num_rows($result);

					if($count>=1)
					{
						echo "This event already exists!";
					}
					else		//If not, insert into Events table
					{	
						$sql2="INSERT INTO Events (
						Event_Name,
						Event_OrgName,
						Event_Date,
						Event_DateAdded,
						Event_Description,
						Event_Type,
						Event_StartTime,
						Event_EndTime,
						Event_ContactName,
						Event_ContactPhone,
						Event_ContactEmail,
						Event_Location,
						Event_Comments) 
							VALUES (
						'$myeventname',
						'$myorgname',
						'$myeventdate',
						'".date("Y-m-d")."',
						'$mydescription',
						'$myeventtype',
						'$mystarttime',
						'$mystoptime',
						'$mycontactname',
						'$mycontactphone',
						'$mycontactemail',
						'$mylocation',
						'$myeventcomments')";
						mysql_query($sql2);
						
		
						echo "Thanks for adding your event!!";
		
					}

				}
				else //If all required fields are not filled in, error message displayed
				{
					echo "Please fill out all required fields.";
				}
			
	}
	

?>

<form name="" action="" method="post">
<input hidden name="checkVal" value="">
<label>Enter your Event Name :</label>
<input type="text" name="eventname"/><br />
<label>Date of your event(YYYY-MM-DD):</label>
<input type="text" name="eventdate"/><br />
<label >Event Description :</label>
<input type="text" name="eventdesc"/><br />
<label >Event Type :</label>
<input type="text" name="eventtype"/><br/>
<label >Start Time :</label>
<input type="text" name="eventstart"/><br />
<label >End Time :</label>
<input type="text" name="eventstop"/><br />
<label >Contact Name :</label>
<input type="text" name="contactname"/><br />
<label >Contact Phone :</label>
<input type="text" name="contactphone"/><br />
<label >Contact Email :</label>
<input type="text" name="contactemail"/><br />
<label >Location :</label>
<textarea name="location"></textarea><br/>
<label >Comments :</label>
<textarea name="comments"></textarea><br/>


<input type="submit" value=" Submit "/><br />
</form>