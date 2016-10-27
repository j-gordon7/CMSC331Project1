<?php

/*****************************************
 ** File:    studentPassword.php
 ** Project: CMSC 331 Project 1, Fall 2016
 ** Date:    10/28/16
 ** 
 ** This file handles the password verifiation
 ** for students re-logging in.
 **
 **
 **
 **
 ***********************************************/

include('CommonMethods.php');

//gets the info typed on home.html
$email = (string)($_POST['email']);
$password = (string)($_POST['password']);

$debug = false;
$COMMON = new Common($debug);

$sql = "SELECT * FROM `Student_Info` WHERE `Email` = '$email' ";

$rs = $COMMON->executeQuery($sql, $_SERVER['SCRIPT_NAME']);
$row = (mysql_fetch_assoc($rs));
$stored_password = $row['Password'];

//compares typed info with info from the database, goes to error state if no match
if ($password != $stored_password || empty($password) || empty($email)) {
  header('Location: error_Student_home.html');
}

else {
  session_start();
  $_SESSION['Student_Email'] = $email;
  header('Location: returningStudent.php');
}
?>