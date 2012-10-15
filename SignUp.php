<?php
	include("config.php");  //Establishes DB connection

	if($_SERVER["REQUEST_METHOD"] == "POST")
	{
		if($_POST['checkVal']=="true")			//Check to see if the Org checkbox has been selected
		{
			// Org infor from form is gathered here
			$myorgname=addslashes($_POST['orgname']);
			$mywebsite=addslashes($_POST['website']);
			$mylocation=addslashes($_POST['orglocation']);
			$mycontactname=addslashes($_POST['contactname']);
			$mycontactphone=addslashes($_POST['contactphone']);
			$mycontactemail=addslashes($_POST['contactemail']);
			$myrequirements=addslashes($_POST['requirements']);
			$mymission=addslashes($_POST['mission']);
			$myorgtype=addslashes($_POST['orgtype']);
			$myorgusername=addslashes($_POST['username']);
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
						Org_Mission,
						Org_NumOfRatings,
						Org_RatingTotal,
						Org_UserEmail,
						Org_LeadCount,
						Org_Type,
						Org_JoinDate) 
							VALUES (
						'$myorgname',
						'$mywebsite',
						'$mylocation',
						'$mycontactname',
						'$mycontactphone',
						'$mycontactemail',
						'$myrequirements',
						'$mymission',
						0,
						0,
						'$myorgusername',
						0,
						'$myorgtype',
						'".date("Y-m-d")."')";
						mysql_query($sql2);
						
		
						echo "Thanks for signing up!!";
										
		
					}

				}
				else //If all required fields are not filled in, error message displayed
				{
					echo "Please fill out all required fields.";
				}
			//Gather user info from form
			$myusername=addslashes($_POST['username']);
			$mypassword=addslashes($_POST['password']);
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
		
								echo "Thanks for signing up!!";
								
								header("location: Login.php");
		
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
			$mypassword=addslashes($_POST['password']);
			$mypassword2=addslashes($_POST['password2']);
				if(($myusername != '' && $mypassword != '' && $mypassword2 != '') || ($myusername !=null && $mypassword != null && $mypassword2 != null))
				{
					if($mypassword != $mypassword2)    //Do the passwords match? If not, try again....
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
							else			//Insert into user table
							{
								$sql2="INSERT INTO Users (User_Email, User_Password, User_IsOrg) VALUES ('$myusername','$mypassword',false)";
								mysql_query($sql2);
		
								echo "Thanks for signing up!!";
								
								header("location: Login.php");
		
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
<html>

<script>
function hiddenBoxes()
{
	var value = document.form1.elements[4].checked;
	if(value)
	{
		for(x = 5; x< document.form1.length-1; x++)
			document.form1.elements[x].hidden = false;
		
	}
	else
	{
		for(x = 5; x< document.form1.length-1; x++)
			document.form1.elements[x].hidden = true;
	}
	
	document.form1.elements[0].value = document.form1.elements[4].checked;
	
}
</script>

<body>

<form name="form1" action="" method="post">
<input hidden name="checkVal" value="">
<label>Enter your Email Address :</label>
<input type="text" name="username"/><br />
<label>Enter a Password :</label>
<input type="password" name="password"/><br/>
<label>Re-type your Password :</label>
<input type="password" name="password2"  /><br/>
<label>Is this an organization?</label>
<input type="checkbox" name="org" value="yes" onclick="hiddenBoxes();" /><br />
<label >*Organization Name :</label>
<input type="text" name="orgname" hidden /><br />
<label >*Organization Website :</label>
<input hidden type="text" name="website"/><br/>
<label >Organization Location :</label>
<input type="text" name="orglocation" hidden /><br />
<label >Contact Name :</label>
<input type="text" name="contactname" hidden /><br />
<label >Contact Phone :</label>
<input type="text" name="contactphone" hidden /><br />
<label >Contact Email :</label>
<input type="text" name="contactemail" hidden /><br />
<label >Organization Requirements :</label>
<textarea hidden name="requirements"></textarea><br/>
<label >Organization Mission :</label>
<textarea  hidden name="mission"></textarea><br/>
<label  >Organization Type :</label>
<textarea  hidden name="orgtype"></textarea><br/>
* - denotes required field<br />

<input type="submit" value=" Submit "/><br />
</form>
</body>
</html>