<?php

if (($_POST['newStudentID'] == '') || ($_POST['newStudentFirstName'] == '') || ($_POST['newStudentLastName'] == '') || ($_POST['newStudentEmail'] == '') || ($_POST['newStudentPassword'] == '')) {
  header('Location: newStudent_error.html');
}

else {
$newStudentID = (string)($_POST['newStudentID']);
$newStudentFirstName = (string)($_POST['newStudentFirstName']);
$newStudentMiddleInitial = (string)($_POST['newStudentMiddleInitial']);
$newStudentLastName = (string)($_POST['newStudentLastName']);
$newStudentEmail = (string)($_POST['newStudentEmail']);
$newStudentPassword = (string)($_POST['newStudentPassword']);
$newStudentMajor = (string)($_POST['newStudentMajor']);
$newStudentQuestion = (string)($_POST['Student_Questions']);

session_start();
$_SESSION['Student_Email'] = $newStudentEmail;

include ('CommonMethods.php');

$debug = false;

$COMMON = new Common($debug);

$sql = "INSERT INTO `Student_Info`(`StudentID`, `FirstName`, `MiddleInitial`, `LastName`, `Email`, `Password`, `Major`, `Questions`) VALUES ('$newStudentID','$newStudentFirstName','$newStudentMiddleInitial','$newStudentLastName','$newStudentEmail','$newStudentPassword','$newStudentMajor', '$newStudentQuestion')";

$rs = $COMMON->executeQuery($sql, $_SERVER['SCRIPT_NAME']);

header('Location: newStudentAppointment.html');
}
?>