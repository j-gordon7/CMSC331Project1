<?php
$newStudentID = (string)($_POST['newStudentID']);
$newStudentFirstName = (string)($_POST['newStudentFirstName']);
$newStudentMiddleInitial = (string)($_POST['newStudentMiddleInitial']);
$newStudentLastName = (string)($_POST['newStudentLastName']);
$newStudentEmail = (string)($_POST['newStudentEmail']);
$newStudentPassword = (string)($_POST['newStudentPassword']);
$newStudentMajor = (string)($_POST['newStudentMajor']);

//var_dump($_POST); echo("<br>");

include ('CommonMethods.php');

$debug = false;

$COMMON = new Common($debug);

$sql = "INSERT INTO `Student_Info`(`StudentID`, `FirstName`, `MiddleInitial`, `LastName`, `Email`, `Password`, `Major`) VALUES ('$newStudentID','$newStudentFirstName','$newStudentMiddleInitial','$newStudentLastName','$newStudentEmail','$newStudentPassword','$newStudentMajor')";

$rs = $COMMON->executeQuery($sql, $_SERVER['SCRIPT_NAME']);

?>