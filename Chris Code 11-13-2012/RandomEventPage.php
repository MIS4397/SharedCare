<?php
	include("config.php");
	session_start();
	
	$sql = "SELECT * FROM Events WHERE NOW() <= Event_Date ORDER BY RAND() LIMIT 0,1";
	$result = mysql_query($sql);
	$myOrgID=mysql_result($result,0,"Event_OrgID");
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
	<h1 class="page-title">Event Search</h1> 
</div>

<!-- Header Notification, goes away after 10seconds -->
<div class="header-notification">
	<p class="center-text">___ number of events have been added to the database</p>
</div>

<div data-role="content">
	<div class="center-div">
		<img src="defaultProf.png" class="float">
		<h1 class="mainTitle"> <?php echo mysql_result($result, 0,"Event_Name");?> </h1>
		<h2 class="subTitle"> <?php $sql2 ="SELECT Org_Name FROM Organizations WHERE Org_ID='myOrgID'"; $result2=mysql_query($sql2); echo mysql_result($result2, 0,"Org_Name");?> </h2>
		<p > <?php echo mysql_result($result, 0,"Event_Address");?>
	</div>

		<div>
			<a data-role="none" class="button green" href="javascript:history.go(0)"><img class="button-icon" src="images/icons/shuffle@2x.png"> </img><em></em><strong>AGAIN!</strong></a>
		</div>

<div class="decoration"></div>
	
<div data-role='collapsible'>
	<h1> type </h1>
	<p><ul><?php echo mysql_result($result, 0,"Event_Type");?>

</div>

<div data-role='collapsible'>
	<h1> Contact Information </h1>
	<p><ul><?php echo mysql_result($result, 0,"Event_ContactName");?></br>
		<?php echo mysql_result($result, 0,"Event_ContactPhone");?><br/>
		<?php echo mysql_result($result, 0,"Event_ContactEmail");?></p>	
</div>

<div data-role='collapsible'>
	<h1> Summary </h1>
	<p><?php echo mysql_result($result, 0,"Event_Description");?>
</div>



<iframe width="425" height="350" frameborder="0" scrolling="no" style="margin-left:90px; margin-bottom: 30px;" src="https://maps.google.com/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q=community+service+houston&amp;aq=&amp;sll=31.168934,-100.076842&amp;sspn=13.122599,23.269043&amp;ie=UTF8&amp;hq=community+service&amp;hnear=Houston,+Harris,+Texas&amp;t=m&amp;fll=29.72667,-95.381241&amp;fspn=0.0521,0.090895&amp;st=110949415103031623905&amp;rq=1&amp;ev=zi&amp;split=1&amp;ll=29.758906,-95.448171&amp;spn=0.0521,0.090895&amp;output=embed"></iframe><br />

<div class="center-div">
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