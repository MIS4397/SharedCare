<?php
	include("config.php");
	include("lock.php");
	session_start();
	
	$eventID = $_POST["event_id"];
	
	$sql = "SELECT * FROM Events WHERE Event_ID = '$eventID'";
	$result = mysql_query($sql);
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

 
 <title>Organization Profile</title>
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

<body onload="touchScroll(scrollMe);">
<!-- ****************Organization List***********************--> 

<div data-role="page" id="orgList">
<div class="content" id="PageContent">
<div class="header">
	<a href="javascript: history.go(-1);" class="backbutton-nav header-icon"></a>
	<h1 class="page-title">Organization Profile</h1> 
</div>
<!-- Header Notification, goes away after 10seconds -->


<!--CONTENT OF HOME PAGE --> 
<div data-role="content">
	<center><div class="center-div"> 
		<img src="defaultProf.png" class="float">
		<h1 class="mainTitle"><?php echo mysql_result($result,0,"Org_Name");?></h1>
		<p class="subTitile">
		<?php echo mysql_result($result, 0,"Org_Location");?>
		</p>
		<p> Url: <a href="<?php echo mysql_result($result, 0,"Org_Website");?>"><?php echo mysql_result($result, 0,"Org_Website");?></a></p>
	</div></center>
<br/>
<br/>
<br/>
	<div class="decoration"></div>
	<!-- Profile Dashboard -->
	<div class="column-three-one center-text">
		<h3> Upcoming Events </h3>
		<h4></h4>
	</div>
	
	<div class="column-three-two">
		<div class="random-detected">
			<a data-role="none" class="button yellow" href="javascript:history.go(-1);"><img id="buttonIcon" class="button-icon" src="images/lists/heart_48.png"></img><em> Click to like Organization</em><strong>Press it!</strong></a>
		</div>
	</div>
	
	<div class="column-three-three center-text">
		<h3> Total Likes </h3>
		<h4> 56 </h4>
	</div>
	
	
	<!-- description --> 
	<div class="clear">
		<h2> Decription: </h2>
		<textarea disabled>This is the description of the organization in the aformentioned place holder, I knew that onLIve would go out of businesss back in the '10. their startegy was just not thought out there was way to many resources needed in order to give peole something that was not up to what they already had</textarea>
		
		<div class="decoration"></div>
		
		
			

		
		<div class="container">
			<h3 class="left-text text-space">General Requirements</h3>
			<div class="toggle">
				<a href="#" data-role="none" class="toggle-deploy">Click to Expand</a>
				<a href="#" data-role="none" class="toggle-close">Click to Hide</a>
					<ul class="toggle-content">
					<?php echo mysql_result($result, 0,"Org_Requirements");?>
					</ul>
			</div>
		</div>
		
		<div class="column-two-one">
			<a href="mailto:<?php echo mysql_result($result, 0,"Org_ContactEmail");?>" data-role="button"> Contact Us </a>
		</div>
		<div class="column-two-two">
			<form action="javascript: alert('success');" method="post">
			<a onclick="submit();" data-role="button"> Events </a>
			</form>
		</div>			
	</div>
</div>
</div>
</div>
<!-- ****************END OF HOME PAGE ************************-->


</body>
</html>