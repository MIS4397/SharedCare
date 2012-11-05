<?php
$mysql_hostname = "localhost";
$mysql_user = "sharec_jose";
$mysql_password = "openbucket13";
$mysql_database = "sharec_barney";
$bd = mysql_connect($mysql_hostname, $mysql_user, $mysql_password) or die("Opps some thing went wrong");
mysql_select_db($mysql_database, $bd) or die("Opps some thing went wrong");
?>