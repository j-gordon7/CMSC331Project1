<?php
  //$newStudentID = string($_POST['newStudentID']);
  //$newStudentFirstName = string($_POST['newStudentFirstName']);
  //$newStudentMiddleInitial = string($_POST['newStudentMiddleInitial']);
  //$newStudentLastName = string($_POST['newStudentLastName']);
  //$newStudentEmail = string($_POST['newStudentEmail']);
  //$newStudentPassword = string($_POST['newStudentPassword']);
  //$newStudentMajor = string($_POST['newStudentMajor']);

//var_dump($_POST); echo("<br>");

include ('CommonMethods.php');

$debug = true;

$COMMON = new Common($debug);

$sql = "insert into Student_Info (`StudentID`, `FirstName`, `MiddleInitial`,
 `LastName`, `Email`, `Password`, `Major`) values ('$_POST[newStudentID]',
'$_POST[newStudentFirstName]','$_POST[newStudentMiddleInitial]',
'$_POST[newStudentLastName]','$_POST[newStudentEmail]',
'$_POST[newStudentPassword]','$_POST[newStudentMajor]')";

$rs = $COMMON->executeQuery($sql, $_SEVER["SCRIPT_NAME"]);

?>