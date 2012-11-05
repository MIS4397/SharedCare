<?php
include('config.php');
session_start();
$user_check=$_SESSION['login_user'];

//echo $user_check;

$ses_sql=mysql_query("select * from Organizations where Org_UserID='$user_check'");

//$row=mysql_fetch_array($ses_sql);

$login_session=mysql_result($ses_sql,0,"Org_UserID");//$row['Org_UserID'];

$org_id = mysql_result($ses_sql,0,"Org_ID");//$row['Org_ID'];

if(!isset($login_session))
{
	header("Location: index.html");
}
?>