<?php
include('config.php');
session_start();
$user_check=$_SESSION['login_user'];

$ses_sql=mysql_query("select User_Email from Users where User_Email='$user_check' ");

$row=mysql_fetch_array($ses_sql);

$login_session=$row['User_Email'];

if(!isset($login_session))
{
	header("Location: index.html");
}
?>