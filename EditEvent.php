<?php
	include("config.php");
	session_start();
	
	$myeventID = $_POST["event_id"];
	
	$sql = "SELECT * FROM Events WHERE Event_ID = '$myeventID'";
	$result = mysql_query($sql);?>	
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

 
 <title>Organization Dashboard</title>
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


<!--*************** Organization Org Dashboard Page **************-->
<div data-role="page">
<div class="content">
	<div class="header">
		<a href="#" class="deploy-nav header-icon"></a>
		<a href="#" class="hide-nav header-icon-active"></a>
		<h1 class="page-title">Share Care</h1>
	</div>
	
<!-- Org Dash Content -->
<div data-role="content" >
		<h1 class="center-text" style="font-size:2em;" id="orgDashName"> <?php echo mysql_result($result, 0,"Event_OrgName"); ?> <br/>
		</h1>
	
		<div class="decoration"></div>
		
		
<form data-ajax="false" name="addEvent" action="UpdateEvent.php" method="POST" ">
<div data-role="fieldcontain">
		<label for="eventname">Name of Event:</label></br>
		<input type="text" name="eventname" placeholder="ex. Beach Cleanup, Food Bank, etc." value='<?php echo mysql_result($result, 0,"Event_Name");?>' /><br />
</div>
<div data-role="fieldcontain">
		<label for="evendate">Date of Event</label></br>
		<input type="date" name="eventdate" placeholder="Date of Event" value='<?php echo mysql_result($result, 0,"Event_Date");?>'/><br />
</div>
<div data-role="fieldcontain">
		<label for="eventdesc">Description</label></br>
		<input type="text" name="eventdesc" placeholder="Description" value='<?php echo mysql_result($result, 0,"Event_Description");?>'/><br />
</div>
<div data-role="fieldcontain">
		<label for="eventtype">Event Type</label></br>
		<input type="text" name="eventtype" placeholder="Event Type" value='<?php echo mysql_result($result, 0,"Event_Type");?>'/><br/>
</div>
<div data-role="fieldcontain">
		<label for="eventstart">Start Time</label></br>
		<input type="time" name="eventstart" placeholder="Start Time" value='<?php echo mysql_result($result, 0,"Event_StartTime");?>'/><br />
</div>
<div data-role="fieldcontain">
		<label for="eventstop">End Time</label></br>
		<input type="time" name="eventend" placeholder="End Time" value='<?php echo mysql_result($result, 0,"Event_EndTime");?>'/><br />
</div>
<div data-role="fieldcontain">
		<label for='contactname' >Contact Name :</label></br>
		<input type="text" name="contactname" value='<?php echo mysql_result($result, 0,"Event_ContactName");?>'/><br />
</div>
<div data-role="fieldcontain">
		<label for="contactphone" >Contact Phone :</label></br>
		<input type="text" name="contactphone" value='<?php echo mysql_result($result, 0,"Event_ContactPhone");?>'/><br />
</div>
<div data-role="fieldcontain">
		<label for="contactemail">Contact Email :</label></br>
		<input type="email" name="contactemail" value='<?php echo mysql_result($result, 0,"Event_ContactEmail");?>'/><br />
</div>
<div data-role="fieldcontain">
		<label for="location">Location :</label></br>
		<textarea name="location"><?php echo mysql_result($result, 0,"Event_Location");?></textarea><br/>
</div>
<div data-role="fieldcontain">
		<label for="comments" >Comments :</label></br>
		<textarea name="comments"><?php echo mysql_result($result, 0,"Event_Comments");?></textarea><br/>
</div>
		<input type="hidden" name='event_id'  value='<?php echo $myeventID?>' hidden>
		<input type="submit" value="Submit"/><br />
		<input type="button" value="Delete" onclick="deleteEvent()">
</form>
</form>


</div>
<!--- END OF CONTENT-->		
</div>

<!-- Begining of SideBar for org Dash -->
<div class="sidebar">
	<div class="sidebar-hide-scroll" id="scrollMe">
	<div class="sidebar-header">
	<!-- Side Bar Title must change for every page --> 
		<h1 class="sidebar-title">Organizations</h1>
    </div>
	
    <p class="sidebar-divider no-top">
    	Organization Menu
    </p>
	
		<a class="menu-item menu-icon home" href="orgDash.html" data-ajax="false">HOME<em></em></a>
		<a class="menu-item menu-icon alert3" href="EditOrgProfile.html" data-ajax="false">EDIT PROFILE<strong></strong></a>
		<a class="menu-item menu-icon img" id="sub-menu-two" href="EditEventsPage.html" data-ajax="false">EDIT EVENTS<strong></strong></a>
		<a class="menu-item menu-icon mail last-menu-item" href="addEvent.html" data-ajax="false">ADD AN EVENT<em></em></a>

	
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
<!-- **************** End of Org Dashboard Page ************** --> 
<script language="javascript">
//This function is jQuery AJAX to get the Org Info from the Database
/*
$(document).ready($.post('EditEvent.php', function(responseText, status){
	var a = responseText.split("<split>");
	console.log(a);
	$('#orgDashName').html(a[0]);
	$('input').each(function(index){
		$(this).val(a[index+1]);// NEED TO MAKE SURE TO CHANGE PHP AS WELL AS INPUTS
	});
	})
);

*/


function deleteEvent(){
	alert('delete!');
}
</script> 




</body>


</html>