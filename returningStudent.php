<html>
<head>
<title>STUDENT PROFILE</title>
</head>
<body>

<head>

<form method="post" action='removeStudentAppointment.php'>

<?php
include('CommonMethods.php');

echo("Thank you for making an appointment!\n");

$debug = false;

$COMMON = new Common($debug);

session_start();
$studentEmail = (string)$_SESSION['Student_Email'];


$sql = "SELECT * FROM `Active Appointments` WHERE `Student_Email` = '$studentEmail'";

$rs = $COMMON->executeQuery($sql, $_SERVER['SCRIPT_NAME']);

$row = (mysql_fetch_assoc($rs));

echo("You have your");

if ($row['Type'] == 2)
  echo("an individual ");

else{
  echo("a group ");
}

echo("advising appointment at: ");

echo($row['Time']);

echo(" on ");

if($row['Day'] == 1){
echo("Monday ");
} 

else if ($row['Day'] == 2){
echo("Tuesday ");
}

else if ($row['Day'] == 3){
echo("Wednesday ");
}

else if ($row['Day'] == 4){
echo("Thursday ");
}

else if ($row['Day'] == 5){
echo("Friday ");
}




?>
<br>
<button type="submit"> Cancel Appointment </button>

</form>
</body>
</html>

