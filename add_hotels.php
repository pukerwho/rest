<?php 

header('Access-Control-Allow-Origin: *');

$EmailTo = "pelegrin2puk@gmail.com";
$EmailFrom = 'info@timeto.top';
$Subject = "Заполнили форму на сайте";

$message = $_POST['myname'];

$success = mail($EmailTo, $Subject, $message, "From: <$EmailFrom>");
if($success) { echo "Success! Your e-mail was sent!"; }
else{  echo "Error! Your e-mail was not sent!"; }

?>