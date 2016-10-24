<?php

$AppTime = (int)$_POST['appointmentTime'];
$AppDay = (int)$_POST['appointmentDay'];
$AppType = (int)$_POST['appointmentType'];

include('CommonMethods.php');

$debug = true;

$COMMON = new Common($debug);
$COMMON2 = new Common($debug);
$COMMON3 = new Common($debug);

session_start();
$studentEmail = (string)$_SESSION['Student_Email'];

$sql = "SELECT * FROM `Inactive Appointments` WHERE `Time` = '$AppTime' && `Day` = '$AppDay' && `Type` = '$AppType'";
$rs = $COMMON->executeQuery($sql, $_SERVER['SCRIPT_NAME']);
$row = (mysql_fetch_assoc($rs));

$Advisor_Email = (string)$row['Advisor_Email'];

$sql2 = "INSERT INTO `Active Appointments`(`Time`, `Day`, `Type`, `Advisor_Email`, `Student_Email`) VALUES ('$AppTime','$AppDay','$AppType','$Advisor_Email','$studentEmail')";
$rs2 = $COMMON2->executeQuery($sql2, $_SERVER['SCRIPT_NAME']);

$Code = (int)$row['Code'];

$sql3 = "DELETE FROM `Inactive Appointments` WHERE `Code` = '$Code'";
$rs3 = $COMMON3->executeQuery($sql3, $_SERVER['SCRIPT_NAME']);

?>
