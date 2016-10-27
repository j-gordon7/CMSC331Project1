<?php

/*****************************************
 ** File:    advisorPassword.php
 ** Project: CMSC 331 Project 1, Fall 2016
 ** Date:    10/28/16
 ** 
 ** This file handles the password verifiation
 ** for advisors re-logging in.
 **
 **
 **
 **
 ***********************************************/

include('CommonMethods.php');

//gets info from home.html
$email = (string)($_POST['email']);
$password = (string)($_POST['password']);

$debug = false;
$COMMON = new Common($debug);

$sql = "SELECT * FROM `Adviser_Info` WHERE `Adviser Email` = '$email' ";

$rs = $COMMON->executeQuery($sql, $_SERVER['SCRIPT_NAME']);
$row = (mysql_fetch_assoc($rs));
$stored_password = $row['Password'];

//compares info with database if no match go to error page
if ($password != $stored_password || empty($password) || empty($email)){
  header('Location: error_Advisor_home.html');
}

else {
  session_start();
  $_SESSION['Advisor_Email'] = $email;
  header('Location: returningAdvisor.php');
}
?>