<html>
<head>
<title>STUDENT PROFILE</title>
</head>
<body>

/*****************************************
 ** File:    returningStudent.php
 ** Project: CMSC 331 Project 1, Fall 2016
 ** Date:    10/28/16
 ** 
 ** Prints out the student's appointment and 
 ** gives them the option to cancel it
 **
 **
 **
 ***********************************************/

<head>

<form method="post" action='removeStudentAppointment.php'>

<?php
include('CommonMethods.php');

echo("Thank you for making an appointment!");
echo("<br/><br/>");

$debug = false;

$COMMON = new Common($debug);

session_start();
$studentEmail = (string)$_SESSION['Student_Email'];

//gets the students info from the database
$sql = "SELECT * FROM `Active Appointments` WHERE `Student_Email` = '$studentEmail'";

$rs = $COMMON->executeQuery($sql, $_SERVER['SCRIPT_NAME']);

$row = (mysql_fetch_assoc($rs));

echo("You have ");

//gets the type of appointment and parses it
if ($row['Type'] == 2)
  echo(" an individual ");

else{
  echo(" a group ");
}

echo("advising appointment at: ");

//gets the time back
echo($row['Time']);

echo(" on ");

//parses the days into words from numbers
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

//gets the room from the advisor's info for where the meeting is
echo("in room: ");

$sql2 = "SELECT * FROM `Adviser_Info` WHERE `Adviser Email` = '$row[Advisor_Email]'";
$rs2 = $COMMON->executeQuery($sql, $_SERVER['SCRIPT_NAME']);
$row2 = (mysql_fetch_assoc($rs2));

if ($row['Type'] == 2)
  echo($row2['Individual Location']);

else{
  echo($row2['Group Location']);

}

?>
<br>
<button type="submit"> Cancel Appointment </button>

</form>
</body>
</html>

