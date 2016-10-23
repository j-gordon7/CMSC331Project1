<?php

include('CommonMethods.php');

$debug = false;
$COMMON = new Common($debug);

$newAdvisorName = ($_POST['Name']);

$newAdvisorCollege = ($_POST['College']);

$newAdvisorOffice = ($_POST['Office']);

$newAdvisorEmail = ($_POST['Adviser_Email']);

$newAdvisorPhone = ($_POST['Phone_Number']);

$newAdvisorPassword = ($_POST['Password']);

$newAdvisorPasswordConfirm = ($_POST['passwordConfirm']);

$sql = "INSERT INTO `Adviser_Info`(`Adviser Email`, `Name`, `College`, `Office`, `Password`, `Phone Number`) VALUES ('$newAdvisorEmail','$newAdvisorName','$newAdvisorCollege','$newAdvisorOffice','$newAdvisorPassword','$newAdvisorPhone')";

$rs = $COMMON->executeQuery($sql, $_SERVER['SCRIPT_NAME']);

header('Location: advisorMeetingSchedule');

?>
