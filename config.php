

<?php
//die;
$conn = mysqli_connect('localhost','root','','audio_db') or die('No database found');


session_start();


$base_url = "http://localhost:8888/";
$my_email = "YOUR_EMAIL";

$smtp['host'] = "smtp.gmail.com";
$smtp['user'] = "";
$smtp['pass'] = "";
$smtp['port'] = 465;


?>

