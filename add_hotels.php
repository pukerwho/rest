<?php
/*
Template Name: Успешно добавили
*/
?>

<?php 

header('Access-Control-Allow-Origin: *');

$EmailTo = "pelegrin2puk@gmail.com";
$EmailFrom = 'info@timeto.top';
$Subject = "Добавить предложение";

$message = print_r($_POST,true);

$success = mail($EmailTo, $Subject, $message, "From: <$EmailFrom>");
if($success) { include 'blocks/add/success_add.php'; }
else{  echo "Error! Your e-mail was not sent!"; }

?>

<?php get_footer(); ?>