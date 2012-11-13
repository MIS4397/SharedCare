<?php
	include("config.php");
	include("orgLock.php");
	session_start();
	
	$myOrgName = $org_name;
	
	$sql = "SELECT * FROM Organizations WHERE Org_Name = '$myOrgName'";
	$result = mysql_query($sql);
	echo $myOrgName;
?>
	
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="user-scalable=no, width=device-width, initial-scale=1, maximum-scale=1">
<!-- Apple Icon -->
<link rel="apple-touch-icon" sizes="114x114" href="images/splash/splash-icon.png">
<!-- Loading Screen -->
<link rel="apple-touch-startup-image" href="images/splash/splash-screen@2x.png" media="(max-device-width: 480px) and (-webkit-min-device-pixel-ratio: 2)" />
<!-- A Way to get people to download an App
<meta name="apple-itunes-app" content="app-id=284882215, app-argument=x-sfp:///visit/seal-rocks">-->

 
 <title>Profile Edit</title>
<!-- jQuery Mobile CSS --> 
<link rel="stylesheet" href="http://code.jquery.com/mobile/1.0/jquery.mobile-1.0.min.css" />
<!-- Template Css -->
<link href="style/style.css" rel="stylesheet" type="text/css">
<link href="style/buttons.css" rel="stylesheet" type="text/css">
<link href="style/photoswipe.css" rel="stylesheet" type="text/css">
<link href="style/retina.css" media="only screen and (-webkit-min-device-pixel-ratio: 2)" rel="stylesheet" />
<link href="style/add2home.css" rel="stylesheet" type="text/css">
 
 
<!-- jQuery and jQuery mobile scripts --> 
<script type="text/javascript" src="http://code.jquery.com/jquery-1.6.4.min.js"></script>
<script type="text/javascript" src="http://code.jquery.com/mobile/1.0/jquery.mobile-1.0.min.js"></script>
<!-- template script -->
<script src="scripts/klass.min.js"></script>
<script src="scripts/jquery.js"></script>
<script src="scripts/touchSwipe.js"></script>
<script src="scripts/photoswipe.js"></script>
<script src="scripts/roundabout.js"></script>
<script src="scripts/contact.js"></script>
<script src="scripts/retina.js"></script>
<script src="scripts/add2home.js"></script>
<script src="scripts/custom.js"></script>

</head> 

<body onload="touchScroll('scrollMe');">
<!-- ****************Organization List***********************--> 

<div data-role="page" id="orgList">
<div class="content" id="PageContent">
<div class="header">
	<a href="javascript: history.go(-1);" class="backbutton-nav header-icon"></a>
	<h1 class="page-title">Edit your Profile</h1> 
</div>
<!-- Header Notification, goes away after 10seconds -->
<div class="header-notification">
	<p class="center-text">__ Organizations Have joined this year</p>
</div>


<!--CONTENT OF HOME PAGE --> 
<div data-role="content">

<form action="UpdateOrg.php" method="post">
	<input type="hidden" name="org_id" value='<?php echo mysql_result($result,0,"Org_ID");?>'>
	<div data-role = "fieldcontain">
		<label for="name">Organization Name:</label></br>
		<input type="text" name="orgname" value='<?php echo mysql_result($result, 0,"Org_Name");?>'>
	</div>
	<div data-role="fieldcontain">
		<label for="address">Address:</label><br/>
		<input type="text" name="address" value='<?php echo mysql_result($result, 0,"Org_Location");?>'>
	</div>
	<div data-role="fieldcontain">
		<label for="website">Website:</label><br/>
		<input type="url" name="website" value='<?php echo mysql_result($result, 0,"Org_Website");?>'>
	</div>			
	<div data-role="fieldcontain">
		<label for="requirements">Requirements</label><br/>
		<textarea name="requirements"><?php echo mysql_result($result, 0,"Org_Requirements");?></textarea> 
	</div>	
	<div data-role="fieldcontain">
		<label for="">Description</label><br/>
		<textarea name="descriptionForm"><?php echo mysql_result($result, 0,"Org_Desc");?></textarea>
	</div>
	<div data-role="fieldcontain">
		<label for='contactname' >Contact Name :</label></br>
		<input type="text" name="contactname" value='<?php echo mysql_result($result, 0,"Org_ContactName");?>'/><br />
	</div>
	<div data-role="fieldcontain">
		<label for="contactphone" >Contact Phone :</label></br>
		<input type="text" name="contactphone" value='<?php echo mysql_result($result, 0,"Org_ContactPhone");?>'/><br />
	</div>
	<div data-role="fieldcontain">
		<label for="contactemail">Contact Email :</label></br>
		<input type="email" name="contactemail" value='<?php echo mysql_result($result, 0,"Org_ContactEmail");?>'/><br />
	</div>
	
	<div data-role = "fieldcontain">
		<input type="submit" value="Update">
	</div>


</form>

	
	


</div>


</div>


</div>
<!-- ****************END OF HOME PAGE ************************-->


</body>
</html>