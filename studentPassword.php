<?php

include('CommonMethods.php');

$email = (string)($_POST['email']);
$password = (string)($_POST['password']);

$debug = false;
$COMMON = new Common($debug);

$sql = "SELECT * FROM `Student_Info` WHERE `Email` = '$email' ";

$rs = $COMMON->executeQuery($sql, $_SERVER['SCRIPT_NAME']);
$row = (mysql_fetch_assoc($rs));
$stored_password = $row['Password'];

if ($password != $stored_password || empty($password) || empty($email)) {
  header('Location: error_Student_home.html');
}

else {
  echo("it worked");
}
?>