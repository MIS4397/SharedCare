<?php
	include("config.php");  //Establishes DB connection

	if($_SERVER["REQUEST_METHOD"] == "POST")
	{
		if($_POST['orgBool']=="on")			//Check to see if the Org checkbox has been selected
		{
			//Gather user info from form
			$myusername=addslashes($_POST['username']);
			$myfirstname=addslashes($_POST['first']);
			$mylastname=addslashes($_POST['last']);
			$myage=addslashes($_POST['age']);
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
								$sql2="INSERT INTO Users (User_Email, User_FirstName, User_LastName, User_Age, User_Password, User_IsOrg) VALUES ('$myusername','$myfirstname','$mylastname','$myage','$mypassword',true)";
								mysql_query($sql2);
							}
					}
				}
				else		//Enter information if it is not already filled out
				{
					echo "Please enter all information...";
				}
				
				// Org infor from form is gathered here
			$myorgname=addslashes($_POST['orgname']);
			$mywebsite=addslashes($_POST['website']);
			$myaddress=addslashes($_POST['orgaddress']);
			$mycity=addslashes($_POST['orgcity']);
			$mystate=addslashes($_POST['orgstate']);
			$myzip=addslashes($_POST['orgzip']);
			$mycontactname=addslashes($_POST['contactname']);
			$mycontactphone=addslashes($_POST['contactphone']);
			$mycontactemail=addslashes($_POST['contactemail']);
			$mytype=addslashes($_POST['type']);
			$myorgdesc=addslashes($_POST['description']);
			$sql3="SELECT User_ID FROM Users WHERE User_Email='$myusername'";
			$result3=mysql_query($sql3);
			$myuserid=mysql_result($result3,0,"User_ID");
			$myorguserid=$myuserid;
				if(($myorgname != '' && $mywebsite != '' && $mycontactname != '') || ($myorgname !=null && $mywebsite != null && $mycontactname != null)) //Are all required fields filled out?
				{

					//Check to see if Org already exists
					$sql4="SELECT Org_Name FROM Organizations WHERE Org_Name='$myorgname'";
					$result4=mysql_query($sql4);
					$count4=mysql_num_rows($result4);
					
					if($count4>=1)
					{
						echo "This organization already exists already exists!";
					}
					else		//If not, insert into org table
					{	
						$sql5="INSERT INTO Organizations (
						Org_Name,
						Org_Website,
						Org_Address,
						Org_City,
						Org_State,
						Org_Zip,
						Org_ContactName,
						Org_ContactPhone,
						Org_ContactEmail,
						Org_NumOfRatings,
						Org_RatingTotal,
						Org_UserID,
						Org_LeadCount,
						Org_Type,
						Org_TypePicture,
						Org_JoinDate,
						Org_Desc) 
							VALUES (
						'$myorgname',
						'$mywebsite',
						'$myaddress',
						'$mycity',
						'$mystate',
						'$myzip',
						'$mycontactname',
						'$mycontactphone',
						'$mycontactemail',
						0,
						0,
						'$myorguserid',
						0,
						'',
						'',
						'".date("Y-m-d")."',
						'$myorgdesc')";
						
						mysql_query($sql5, $bd);
							
						//echo mysql_error($bd);
		
						//echo "org query submitted";
						
						header('Location: SuccessSignUp.html');
						
										
		
					}

				}
				else //If all required fields are not filled in, error message displayed
				{
					echo "Please fill out all required fields.";
				}

		}
		else
		{
			//Gather user info from form
			$myusername=addslashes($_POST['username']);
			$myfirstname=addslashes($_POST['first']);
			$mylastname=addslashes($_POST['last']);
			$myage=addslashes($_POST['age']);
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
								echo "This username already exists!";// NEED TO MAKE A PAGE
							}
							else			//Insert into user table
							{
								$sql2="INSERT INTO Users (User_Email, User_FirstName, User_LastName, User_Age, User_Password, User_IsOrg) VALUES ('$myusername','$myfirstname','$mylastname','$myage','$mypassword',false)";
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