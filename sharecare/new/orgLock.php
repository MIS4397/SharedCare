<?php
include('config.php');
session_start();
$user_check=$_SESSION['login_user'];

$ses_sql=mysql_query("select Org_Name, Org_UserEmail from Organizations where Org_UserEmail='$user_check' ");

$row=mysql_fetch_array($ses_sql);

$login_session=$row['Org_UserEmail'];

$org_name = $row['Org_Name'];

if(!isset($login_session))
{
	header("Location: index.html");
}
?>