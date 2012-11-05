<?php
	include("config.php");
	include("lock.php");
	session_start();
	
	$eventID = $_POST["event_id"];
	
	$sql = "SELECT * FROM Events WHERE Event_ID = '$eventID'";
	$result = mysql_query($sql);
	$myOrgID=mysql_result($result,0,"Event_OrgID");
?>

<!doctype html> 
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

 
 <title>Event Page</title>
<!-- Template Css -->
<link href="style/style.css" rel="stylesheet" type="text/css">
<link href="style/buttons.css" rel="stylesheet" type="text/css">
<link href="style/photoswipe.css" rel="stylesheet" type="text/css">
<link href="style/retina.css" media="only screen and (-webkit-min-device-pixel-ratio: 2)" rel="stylesheet" />
<link href="style/add2home.css" rel="stylesheet" type="text/css">
<!-- jQuery Mobile CSS --> 
<link rel="stylesheet" href="http://code.jquery.com/mobile/1.0/jquery.mobile-1.0.min.css" />
 
 
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


<div data-role="page"> 
<div class="content" id="PageContent">

<div class="header">
	<a href="javascript: history.go(-1);" class="backbutton-nav header-icon"></a>
	<h1 class="page-title">Event Profile</h1> 
</div>


<div data-role="content">
	<div class="center-div">
		<img src="defaultProf.png" class="float">
		<h1 class="mainTitle"><?php echo mysql_result($result, 0,"Event_Name");?> </h1>
		<h2 class="subTitle"> <?php $sql2 ="SELECT Org_Name FROM Organizations WHERE Org_ID='myOrgID'"; $result2=mysql_query($sql2); echo mysql_result($result2, 0,"Org_Name");?> </h2>
		<p > <?php echo mysql_result($result, 0,"Event_Address");?></p> 
	</div>

<br/>
<br/>
<div style='clear:both;' class="decoration"></div>
	
<div data-role='collapsible'>
	<h1> Description</h1>
	<p><?php echo mysql_result($result, 0,"Event_Description");?></p>

</div>

<div data-role='collapsible'>
	<h1> Contact Information </h1>
	<p><ul><?php echo mysql_result($result, 0,"Event_ContactName");?></br>
		Phone: <?php echo mysql_result($result, 0,"Event_ContactPhone");?><br/>
		Email: <?php echo mysql_result($result, 0,"Event_ContactEmail");?></p>	
</div>

<div data-role='collapsible'>
	<h1> Summary </h1>
	<p>Start Time: <?php echo mysql_result($result, 0,"Event_StartTime");?></br>End Time: <?php echo mysql_result($result, 0,"Event_EndTime");?>
	</br>Date: <?php echo mysql_result($result, 0,"Event_Date");?>
	</p>	
</div>
<br/>
<br/>
<div class="center-div" style="clear:both;">
<div data-role="none" class="random-detected two-column-one">
			<a data-role="none" class="button yellow" href="javascript:history.go(-1);"><img id='buttonIcon' class="button-icon" src="images/lists/heart_48.png"></img><em> Click to like Organization</em><strong>Press it!</strong></a>
</div>
<div data-role='none' class="random-detected two-column-two">
			<a data-role="none" class="button blue" href="mailto:<?php echo mysql_result($result, 0,"Event_ContactEmail");?>"><img id='buttonIcon' class="button-icon" src="images/lists/address_48.png"></img><em> Click to reserve a spot</em><strong>Press it!</strong></a>
</div>
</div>

</div>
</div>
</div>
</body>


</html>