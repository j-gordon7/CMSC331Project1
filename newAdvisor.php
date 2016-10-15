<?php

include('CommonMethods.php');

$debug = true;
$COMMON = new Common($debug);

$newAdvisorName = string($_POST['Name']);

$newAdvisorCollege = string($_POST['college']);

$newAdvisorOffice = string($_POST['office']);

$newAdvisorEmail = string($_POST['email']);

$newAdvisorPhone = string($_POST['phone']);

$newAdvisorPassword = string($_POST['password']);

$newAdvisorPasswordConfirm = string($_POST['passwordConfirm']);

$sql = "INSERT INTO `AdvisorDatabase`(`Name`, `College`, `Office`, `Email`, `Phone Number`, `Password`) VALUES ($newAdvisorName,$newAdvisorCollege,$newAdvisorOffice,$newAdvisorEmail,$newAdvisorPhone,$newAdvisorPassword)";

$rs = $COMMON->executeQuery($sql, $_SERVER[

?>
