<?php
//Include CommonMethods file
include 'CommonMethods.php';

//Establish database connection
$common = new Common;
$common.connect('Student Database');

//Get input from form
$newStudentName = string($_POST['newStudentName']);
$newStudentEmail = string($_POST['newStudentEmail']);
$newStudentPassword = string($_POST['newStudentPassword']);
$newStudentMajor = string($_POST['newStudentMajor']);

//Validate with database and insert
if (/*Check if an account already has that email*/) {
	/*Spit out error message*/
} else {
	/*Create new student in database*/
	common.executeQuery(/*Put query here*/);
}

//"INSERT INTO 'Student Database'('Student Key', 'Name', 'Email', 'Major', 'Has Scheduled Meeting', 'Password') VALUES ([value-1],[value-2],[value-3],[value-4],[value-5],[value-6])"//

?>