<html>
<head>
<title>ADVISOR PROFILE</title>
</head>
<body>

<head>

<form method="post" action=''>

<?php

include('CommonMethods.php');

$debug = false;
$COMMON = new Common($debug);

//Take in a row of the database (an appointment) and display it in a set format
function displayAppointment($appointment) {
	//Display day
	echo("Day: ");
	if ($appointment['Day'] == 1) {
		echo("Monday\n");
	} else if ($appointment['Day'] == 2) {
		echo("Tuesday\n")
	} else if ($appointment['Day'] == 3) {
		echo("Wednesday\n")
	} else if ($appointment['Day'] == 4) {
		echo("Thursday\n")
	} else if ($appointment['Day'] == 5) {
		echo("Friday\n")
	}
	
	//Display the time
	echo("Time: ");
	echo($appointment['Time']);
	
	//Determine if it is a group or individual appointment
	if ($appointment['Type'] == 3) {
		//Group appointment -> Display all students/IDs in this appointment
		echo("\nStudents: ")
	} else {
		//Individual appointment -> Display just that students name and ID
		echo("\nStudent: ");
	}
}

session_start();
$advisorEmail = (string)$_SESSION['Advisor_Email'];

$sql = "SELECT * FROM `Active Appointments` WHERE `Advisor_Email` = '$advisorEmail'";

$rs = $COMMON->executeQuery($sql, $_SERVER['SCRIPT_NAME']);

//Loop to get each individual appointment and display
while($row = mysql_fetch_assoc($rs)) {
	displayAppointment($row);
}

?>
</form>

</body>
</html>
