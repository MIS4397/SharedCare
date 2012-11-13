<?php
 echo "Starting file";
 require_once("mail.php");
 echo "After Mail.php";
 
 $from = "ShareCare <noreply@sharecare.optic5.com>";
 $to = "Chris Hale <christopher.hale.3@gmail.com>";
 $subject = "Hi!";
 $body = "Hi,\n\nHow are you?";
 
 $host = "ssl://mail.sharecare.optic5.com";
 $port = "26";
 $username = "noreply";
 $password = "openbucket13";
 
 $headers = array ('From' => $from,
   'To' => $to,
   'Subject' => $subject);
 $smtp = Mail::factory('smtp',
   array ('host' => $host,
     'port' => $port,
     'auth' => true,
     'username' => $username,
     'password' => $password));
 
 $mail = $smtp->send($to, $headers, $body);
 
 if (PEAR::isError($mail)) {
   echo("<p>" . $mail->getMessage() . "</p>");
  } else {
   echo("<p>Message successfully sent!</p>");
  }
 ?>