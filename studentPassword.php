<?php

include('CommonMethods.php');

$email = (string)($_POST['email']);
$password = (string)($_POST['password']);

$debug = true;
$COMMON = new Common($debug);

$sql = "SELECT * FROM `Student_Info` WHERE `Email` = '$email' ";

$rs = $COMMON->executeQuery($sql, $_SERVER['SCRIPT_NAME']);
$row = (mysql_fetch_assoc($rs));
$stored_password = $row['Password'];

if ($password != $stored_password) {
  header('Location: home.html');
}

else {
  echo("IT WORKED");
}
?>