<?php

/*****************************************
 ** File:    newStudent.php
 ** Project: CMSC 331 Project 1, Fall 2016
 ** Date:    10/28/16
 ** 
 ** Sends the student data to the database
 **
 **
 **
 **
 ***********************************************/

  //checks to see if everything was entered
if (($_POST['newStudentID'] == '') || ($_POST['newStudentFirstName'] == '') || ($_POST['newStudentLastName'] == '') || ($_POST['newStudentEmail'] == '') || ($_POST['newStudentPassword'] == '')) {
  header('Location: newStudent_error.html');
}


//saves info from html
else {
$newStudentID = (string)($_POST['newStudentID']);
$newStudentFirstName = (string)($_POST['newStudentFirstName']);
$newStudentMiddleInitial = (string)($_POST['newStudentMiddleInitial']);
$newStudentLastName = (string)($_POST['newStudentLastName']);
$newStudentEmail = (string)($_POST['newStudentEmail']);
$newStudentPassword = (string)($_POST['newStudentPassword']);
$newStudentMajor = (string)($_POST['newStudentMajor']);
$newStudentQuestion = (string)($_POST['Student_Questions']);


//prepares to send it to the server
session_start();
$_SESSION['Student_Email'] = $newStudentEmail;

include ('CommonMethods.php');

$debug = false;

$COMMON = new Common($debug);

//writes it to the server friendly code
$sql = "INSERT INTO `Student_Info`(`StudentID`, `FirstName`, `MiddleInitial`, `LastName`, `Email`, `Password`, `Major`, `Questions`) VALUES ('$newStudentID','$newStudentFirstName','$newStudentMiddleInitial','$newStudentLastName','$newStudentEmail','$newStudentPassword','$newStudentMajor', '$newStudentQuestion')";

//sends it
$rs = $COMMON->executeQuery($sql, $_SERVER['SCRIPT_NAME']);

//moves the student to the next page
header('Location: newStudentAppointment.html');
}
?>