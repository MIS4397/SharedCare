<?php
include('lock.php');
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

 
 <title>Welcome!</title>
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


<body onload="touchScroll(scrollMe);">

<!-- *********************** User Home Page ******************--> 


<div data-role="page">
<div class="content" >

	<div class="header">
		<a href="#" class="deploy-nav header-icon"></a>
		<a href="#" class="hide-nav header-icon-active"></a>
		<h1 class="page-title">User Home Page</h1>
	</div>
	
	<!-- Header Notification, goes away after 10seconds -->
	<div class="header-notification">
		<p class="center-text">__ number of Events Have been added this week</p>
	</div>
	
	<!--CONTENT OF HOME PAGE --> 
	<div data-role="content">
		<h1 class="center-text" style="font-size:2em;" id="orgDashName">Welcome <?php echo $login_session; ?></h1><br/>
		
		<div class="decoration"></div>
		
		
		<div class="random-detected">
			<a data-role="none" class="button green" href="javascript:history.go(-1);"><img class="button-icon" src="images/icons/shuffle@2x.png"></img><em> Don't Press This</em><strong>Random</strong></a>
		</div>
		
		
		<div class="decoration"></div>
		
		<div class="container">
			<table data-role="none" cellspacing=0 class='table'>
				<tr data-role="none"><th data-role="none" class="topRow">
					<h2 id="orgDashTitle">Upcoming Events:</h2>
				</th></tr>
				<!-- Div To insert table html from PHP --> 
				<div id="insertOrgEvents">
				
				
					<tr>
					<td id="eventList">
					<form action="javascript:alert('success');">
						<p id="eventTableDate"><em> 08/09/2012</em></p>
						<img src="defaultProf.png" id="eventTablePic"></img>
						<p id="eventTableHd">Food Bank Event</p>
						<p id="eventTableDesc"> this is an event to helppeople ocme together in the spirit of helping others. We will be meeting early in the morning to show you how much you can influence somebodies life. We try to tell you a story of our people but you rrefuse to listen because you only have 350 in your pocket<a href="index.html">.....</a></p>
						<input name='gloria' type='hidden' value='ORG_UNIQUE_ID' hidden>
					</form>
					</td>
					</tr>
				
					
					
					<tr>
					<td id="eventList">
					<form action="javascript:alert('success');">
						<p id="eventTableDate"><em> 08/09/2012</em></p>
						<img src="defaultProf.png" id="eventTablePic"></img>
						<p id="eventTableHd">Food Bank Event</p>
						<p id="eventTableDesc"> this is an event to helppeople ocme together in the spirit of helping others. We will be meeting early in the morning to show you how much you can influence somebodies life. We try to tell you a story of our people but you rrefuse to listen because you only have 350 in your pocket<a href="index.html">.....</a></p>
						<input name='gloria' type='hidden' value='ORG_UNIQUE_ID' hidden>
					</form>
					</td>
					</tr>
					
					<tr>
					<td >
					<form action="javascript:alert('success');">
						<p id="eventTableDate"><em> 08/09/2012</em></p>
						<img src="defaultProf.png" id="eventTablePic"></img>
						<p id="eventTableHd">Food Bank Event</p>
						<p id="eventTableDesc"> this is an event to helppeople ocme together in the spirit of helping others. We will be meeting early in the morning to show you how much you can influence somebodies life. We try to tell you a story of our people but you rrefuse to listen because you only have 350 in your pocket<a href="index.html">.....</a></p>
						<input name='gloria' type='hidden' value='ORG_UNIQUE_ID' hidden>
					</form>
					</td>
					</tr>
					
				</div>
				
					<tr>
					<td>
						<form action='javascript:alert("get more events");'>
						<p id="eventTableHd">Click Here to get more events....</p>
						</form>
					</td>
					</tr>
			</table>
			<!-- END OF TABLE --> 
			<!-- Script for making all the td clickable and able to post to next page-->
			<script>
					$(function(){$('a').removeClass('ui-link');});
					
					$('td').click(function(){$(this).find('form').submit();});
					
					
			</script>
		</div>
		
		
		
		
	</div>
	
	
	</div>


<!-- SIDE BAR --> 
<div class="sidebar">
	<div class="sidebar-hide-scroll" id="scrollMe">
	<div class="sidebar-header">
	<!-- Side Bar Title must change for every page --> 
		<h1 class="sidebar-title">UserHome</h1>
    </div>
	
    <p class="sidebar-divider no-top">
    	NAVIGATION
    </p>
	
    <a class="menu-item menu-icon home" href="#home" data-ajax="false">ORGANIZATIONS<em></em></a>
    <a class="menu-item menu-icon alert3" id="sub-menu-one" href="feat.html" data-ajax="false">EVENTS<strong></strong></a>
    <a class="menu-item menu-icon mail last-menu-item" href="contact.html" data-ajax="false">CONTACT<em></em></a>
	<a class="menu-item menu-icon mail last-menu-item" href="Logout.php" data-ajax="false">LOG OUT<em></em></a>
	
	<!-- Social Media --> 
    <p class="sidebar-divider">
    	TELL A FRIEND
    </p>
	
	
    <a class="menu-item menu-icon facebook" target="_blank" href="http://www.facebook.com/enabled.labs">FACEBOOK PAGE</a>
    <a class="menu-item menu-icon last-menu-item twitter" target="_blank" href="https://twitter.com/iEnabled">TWITTER PAGE</a>
 	
	<!-- Note to user --> 
    <p class="sidebar-divider">
    	TAP THE CONTENT TO CLOSE
    </p>
    </div>
</div>

	
	
	
	
</div>

</body> 
</html>