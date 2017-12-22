<?php
require("class.phpmailer.php");
$mailer = new PHPMailer();
$mailer->IsSMTP();
$mailer->Host = 'ssl://smtp.gmail.com:465';
$mailer->SMTPAuth = TRUE;
$mailer->Username = 'ivysbernardino@gmail.com';  // Change this to your gmail adress
$mailer->Password = 'dannicaloy';  // Change this to your gmail password
$mailer->From = 'ivy@yahoo.com';  // This HAVE TO be your gmail adress
$mailer->FromName = 'me@you.com'; // This is the from name in the email, you can put anything you like here
$mailer->Body = 'PHP mail testing';
$mailer->Subject = 'This is the subject of the email';
$mailer->AddAddress('ivysb1223@yahoo.com');  // This is where you put the email adress of the person you want to mail
if(!$mailer->Send())
{
   echo "Message was not sent<br/ >";
   echo "Mailer Error: " . $mailer->ErrorInfo;
}
else
{
   echo "Message has been sent";
}
?>