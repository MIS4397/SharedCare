<?php
	include("config.php");  //Establishes DB connection

	if($_SERVER["REQUEST_METHOD"] == "POST")
	{
		if($_POST['orgBool']=="on")			//Check to see if the Org checkbox has been selected
		{
			// Org infor from form is gathered here
			$myorgname=addslashes($_POST['orgname']);
			$mywebsite=addslashes($_POST['website']);
			$mylocation=addslashes($_POST['orglocation']);
			$mycontactname=addslashes($_POST['contactname']);
			$mycontactphone=addslashes($_POST['contactphone']);
			$mycontactemail=addslashes($_POST['contactemail']);
			$myrequirements=addslashes($_POST['requirements']);
			$myorgusername=addslashes($_POST['username']);
			$myorgdesc=addslashes($_POST['description']);
				if(($myorgname != '' && $mywebsite != '' && $mycontactname != '') || ($myorgname !=null && $mywebsite != null && $mycontactname != null)) //Are all required fields filled out?
				{

					//Check to see if Org already exists
					$sql="SELECT Org_Name FROM Organizations WHERE Org_Name='$myorgname'";
					$result=mysql_query($sql);
					$count=mysql_num_rows($result);

					if($count>=1)
					{
						echo "This organization already exists already exists!";
					}
					else		//If not, insert into org table
					{	
						$sql2="INSERT INTO Organizations (
						Org_Name,
						Org_Website,
						Org_Location,
						Org_ContactName,
						Org_ContactPhone,
						Org_ContactEmail,
						Org_Requirements,
						Org_NumOfRatings,
						Org_RatingTotal,
						Org_UserEmail,
						Org_LeadCount,
						Org_JoinDate,
						Org_Desc) 
							VALUES (
						'$myorgname',
						'$mywebsite',
						'$mylocation',
						'$mycontactname',
						'$mycontactphone',
						'$mycontactemail',
						'$myrequirements',
						0,
						0,
						'$myorgusername',
						0,
						'".date("Y-m-d")."',
						'$myorgdesc')";
						mysql_query($sql2, $bd);
						
						//echo mysql_error($bd);
		
						//echo "org query submitted";
										
		
					}

				}
				else //If all required fields are not filled in, error message displayed
				{
					echo "Please fill out all required fields.";
				}
			//Gather user info from form
			$myusername=addslashes($_POST['username']);
			$mypassword=addslashes($_POST['password1']);
			$mypassword2=addslashes($_POST['password2']);
				if(($myusername != '' && $mypassword != '' && $mypassword2 != '') || ($myusername !=null && $mypassword != null && $mypassword2 != null)) //Make sure info is filled in
				{
					if($mypassword != $mypassword2) //Do the passwords match? If not, try again....
					{
						echo "Your passwords do not match! Please try again.";
					}
					else		//If so, Make sure username doesn't already exist 
					{
						$sql="SELECT User_ID FROM Users WHERE User_Email='$myusername'";
						$result=mysql_query($sql);
						$count=mysql_num_rows($result);

							if($count>=1)
							{
								echo "This username already exists!";
							}
							else //Insert into user table
							{
								$sql2="INSERT INTO Users (User_Email, User_Password, User_IsOrg) VALUES ('$myusername','$mypassword',true)";
								mysql_query($sql2);
								
								header('Location: SuccessSignUp.html');
							}
					}
				}
				else		//Enter information if it is not already filled out
				{
					echo "Please enter all information...";
				}

		}
		else
		{
			//Gather user info from form
			$myusername=addslashes($_POST['username']);
			$mypassword=addslashes($_POST['password1']);
			$mypassword2=addslashes($_POST['password2']);
				if(($myusername != '' && $mypassword != '' && $mypassword2 != '') || ($myusername !=null && $mypassword != null && $mypassword2 != null))
				{
					if($mypassword != $mypassword2)    //Do the passwords match? If not, try again....
					{
						echo "try again";
					}
					else		//If so, Make sure username doesn't already exist
					{

						$sql="SELECT User_ID FROM Users WHERE User_Email='$myusername'";
						$result=mysql_query($sql);
						$count=mysql_num_rows($result);

							if($count>=1)		
							{
								echo "This username already exists!";
							}
							else			//Insert into user table
							{
								$sql2="INSERT INTO Users (User_Email, User_Password, User_IsOrg) VALUES ('$myusername','$mypassword',false)";
								mysql_query($sql2);
		
								header('Location: SuccessSignUp.html');
		
							}
					}
				}
				else		//Enter information if it is not already filled out
				{
					echo "Please enter all information...";
				}
		}
	}

?>