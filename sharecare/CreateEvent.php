<?php
	session_start();
	include("orgLock.php");

	if($_SERVER["REQUEST_METHOD"] == "POST")
	{
			// Event info from form is gathered here
			$myeventname=addslashes($_POST['eventname']);
			$myeventdate=addslashes($_POST['eventdate']);
			$myaddress=addslashes($_POST['address']);
			$mycity=addslashes($_POST['city']);
			$mystate=addslashes($_POST['state']);
			$myzip=addslashes($_POST['zip']);
			$mycontactname=addslashes($_POST['contactname']);
			$mycontactphone=addslashes($_POST['contactphone']);
			$mycontactemail=addslashes($_POST['contactemail']);
			$mydescription=addslashes($_POST['eventdesc']);
			$mystarttime=addslashes($_POST['eventstart']);
			$mystoptime=addslashes($_POST['eventstop']);
			$myeventtype=addslashes($_POST['eventtype']);
			$myeventduties=addslashes($_POST['duties']);
			$myeventrequirements=addslashes($_POST['requirements']);
			$myorgid=$org_id;	//org_id is in the orgLock
			//$_SESSION['orgName']; PUT THIS IN ONCE REDIRECTING FROM ORG DASHBOARD
			
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
						Event_OrgID,
						Event_Date,
						Event_DateAdded,
						Event_Description,
						Event_Type,
						Event_TypePicture,
						Event_StartTime,
						Event_EndTime,
						Event_ContactName,
						Event_ContactPhone,
						Event_ContactEmail,
						Event_Address,
						Event_City,
						Event_State,
						Event_Zip,
						Event_Duties,
						Event_Requirements) 
							VALUES (
						'$myeventname',
						'$myorgid',
						'$myeventdate',
						'".date("Y-m-d")."',
						'$mydescription',
						'$myeventtype',
						'',
						'$mystarttime',
						'$mystoptime',
						'$mycontactname',
						'$mycontactphone',
						'$mycontactemail',
						'$myaddress',
						'$mycity',
						'$mystate',
						'$myzip',
						'$myeventduties',
						'$myeventrequirements')";
						//echo $sql2;
						mysql_query($sql2, $bd);
						
						//echo mysql_error($bd);
						
		
						header("Location: orgSuccess.html");
		
					}

				}
				else //If all required fields are not filled in, error message displayed
				{
					echo "Please fill out all required fields.";
				}
			
	}
	

?>