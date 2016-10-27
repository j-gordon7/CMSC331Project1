<?php

include('CommonMethods.php');

$debug = true;

//sets up common vars
$COMMON = new Common($debug);
$COMMON2 = new Common($debug);
$COMMON3 = new Common($debug);

session_start();
$studentEmail = (string)$_SESSION['Student_Email'];

//finds the info
$sql = "SELECT * FROM `Active Appointments` WHERE `Student_Email` = '$studentEmail'";

$rs = $COMMON->executeQuery($sql, $_SERVER['SCRIPT_NAME']);

//checks to see if a match
if (mysql_num_rows($rs) == 0)
  header('Location: newStudentAppointment.html');


else{

  $row = (mysql_fetch_assoc($rs));
  
  //saves the appointment data so that the info can be moved to the inactive database
  $AppTime = (int)$row['Time'];
  $AppDay = (int)$row['Day'];
  $AppType = (int)$row['Type'];
  $AppAdvEmail = (string)$row['Advisor_Email'];

  $sql2 = "INSERT INTO `Inactive Appointments`(`Time`, `Day`, `Type`,`Advisor_Email`) VALUES ('$AppTime','$AppDay','$AppType','$AppAdvEmail')";
  $rs2 = $COMMON2->executeQuery($sql2, $_SERVER['SCRIPT_NAME']);

  $sql3 = "DELETE FROM `Active Appointments` WHERE `Student_Email` = '$studentEmail'";
  $rs3 = $COMMON3->executeQuery($sql3, $_SERVER['SCRIPT_NAME']);

  header('Location: newStudentAppointment.html');
}
?>
