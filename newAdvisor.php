<?php

include('CommonMethods.php');

$debug = false;
$COMMON = new Common($debug);

if ($_POST['Name'] == '' || $_POST['Adviser_Email'] == '' || $_POST['Password'] == '' || $_POST['Office'] == '') {
  header('Location: newAdvisor_error.html');
}

else {
session_start();
$_SESSION['Advisor_Email'] = $_POST['Adviser_Email'];

$newAdvisorName = ($_POST['Name']);
$newAdvisorCollege = ($_POST['College']);
$newAdvisorOffice = ($_POST['Office']);
$newAdvisorEmail = ($_POST['Adviser_Email']);
$newAdvisorPhone = ($_POST['Phone_Number']);
$newAdvisorPassword = ($_POST['Password']);
$newIndMeeting = ($_POST['IndMeeting']);
$newGroupMeeting = ($_POST['GroMeeting']);

$sql = "INSERT INTO `Adviser_Info`(`Adviser Email`, `Name`, `College`, `Office`, `Group Location`, `Individual Location`,`Password`, `Phone Number`) VALUES ('$newAdvisorEmail','$newAdvisorName','$newAdvisorCollege','$newAdvisorOffice','$newIndMeeting','$newGroupMeeting','$newAdvisorPassword','$newAdvisorPhone')";

$rs = $COMMON->executeQuery($sql, $_SERVER['SCRIPT_NAME']);

header('Location: advisorMeetingSchedule.html');
}
?>
