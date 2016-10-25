<?php

include ('CommonMethods.php');
$debug = false;

/*Take in variables from newStudent.html*/
$newStudentID = (string)($_POST['newStudentID']);
$newStudentFirstName = (string)($_POST['newStudentFirstName']);
$newStudentMiddleInitial = (string)($_POST['newStudentMiddleInitial']);
$newStudentLastName = (string)($_POST['newStudentLastName']);
$newStudentEmail = (string)($_POST['newStudentEmail']);
$newStudentPassword = (string)($_POST['newStudentPassword']);
$newStudentMajor = (string)($_POST['newStudentMajor']);

/*Start session with student email*/
session_start();
$_SESSION['Student_Email'] = $newStudentEmail;

/*Connect to database*/
$COMMON = new Common($debug);

/*Insert new student object into student_info database*/
$sql = "INSERT INTO `Student_Info`(`StudentID`, `FirstName`, `MiddleInitial`, `LastName`, `Email`, `Password`, `Major`) VALUES ('$newStudentID','$newStudentFirstName','$newStudentMiddleInitial','$newStudentLastName','$newStudentEmail','$newStudentPassword','$newStudentMajor')";
$rs = $COMMON->executeQuery($sql, $_SERVER['SCRIPT_NAME']);

/*Send user to new page*/
header('Location: newStudentAppointment.html');

?>