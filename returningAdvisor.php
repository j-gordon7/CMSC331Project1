<html>
<head>
<title>ADVISOR PROFILE</title>
</head>
<body>

<head>


<?php

include('CommonMethods.php');

$debug = false;
$COMMON = new Common($debug);

//Take in a row of the database (an appointment) and display it in a set format
function displayAppointment($appointment) {
  //Display day

  $debug = false;
  $COMMON = new Common($debug);

  echo("Day: ");
	if ($appointment['Day of Week'] == 1) {
	  echo("Monday ");
	} else if ($appointment['Day of Week'] == 2) {
	  echo("Tuesday ");
	} else if ($appointment['Day of Week'] == 3) {
	  echo("Wednesday ");
	} else if ($appointment['Day of Week'] == 4) {
	  echo("Thursday ");
	} else if ($appointment['Day of Week'] == 5) {
	  echo("Friday ");
	}
	
	//Display the time
	echo("Time: ");
	echo($appointment['Time Slot']);
	
	$appADEmail = (string)$appointment['Advisor Email'];
	$appTime = (int)$appointment['Time Slot'];
	$appDay = (string)$appointment['Day of Week'];

$COMMON2 = new Common($debug);
$sql2 = "SELECT * FROM `Active Appointments` WHERE `Time` = '$appTime' && `Day` = '$appDay' && `Advisor_Email` = '$appADEmail' ";

$rs2 = $COMMON2->executeQuery($sql2, $_SERVER['SCRIPT_NAME']);
	
//Determine if it is a group or individual appointment
if ($appointment['Choice of meeting'] == 3) {
  
//Group appointment -> Display all students/IDs in this appointment
$COMMON3 = new Common($debug);

  echo(" Students: ");
  echo"<br/>";
  
  while($row2 = mysql_fetch_assoc($rs2)) {
    
    $semail = (string)$row2['Student_Email'];
    $sql3 = "SELECT * FROM `Student_Info` WHERE `Email` = '$semail'";
    $rs3 = $COMMON3->executeQuery($sql3, $_SERVER['SCRIPT_NAME']);
    $row3 = mysql_fetch_assoc($rs3);
    echo("Name: ");
    echo($row3['FirstName']);
    echo (" ");
    echo($row3['LastName']);
    echo (" Student ID: ");
    echo ($row3['StudentID']);
    echo (" Email: ");
    echo ($row3["Email"]);
    echo ("<br/>");
    echo (" Questions the Student has: ");
    echo ($row3['Questions']);
    echo ("<br/><br/>");
  }
  
} else {
  //Individual appointment -> Display just that students name and ID
  echo(" Student: ");
  echo"<br/>";
  $row2 = mysql_fetch_assoc($rs2);
  $COMMON3 = new Common($debug);
  if (empty($row2) == false) {
  $semail = (string)$row2['Student_Email'];
  $sql3 = "SELECT * FROM `Student_Info` WHERE `Email` = '$semail'";
  $rs3 = $COMMON3->executeQuery($sql2, $_SERVER['SCRIPT_NAME']);
  $row3 = mysql_fetch_assoc($rs3);
  echo("Name: ");
  echo($row3['FirstName']);
  echo (" ");
  echo($row3['LastName']);
  echo (" Student ID: ");
  echo ($row3['StudentID']);
  echo (" Email: ");
  echo ($row3["Email"]);
  echo ("<br/>");
  echo (" Questions the Student has: ");
  echo ($row3['Questions']);
  echo ("<br/>");
  }
}

echo("<br/>");

}

session_start();
$advisorEmail = (string)$_SESSION['Advisor_Email'];

$sql = "SELECT * FROM `Advisor_Time_Input` WHERE `Advisor Email` = '$advisorEmail'";

$rs = $COMMON->executeQuery($sql, $_SERVER['SCRIPT_NAME']);

//Loop to get each individual appointment and display
while($row = mysql_fetch_assoc($rs)) {
	displayAppointment($row);
}

?>

</body>
</html>
