<?php

include('CommonMethods.php');

$debug = false;
$COMMON = new Common($debug);
$COMMON2 = new Common($debug);

session_start();
$email = $_SESSION['Adviser_Email'];

$dateTime = 8001;

while ($dateTime > 8000 || $dateTime < 4312){


  //gets the info
  $meetingChoice = $_POST[$dateTime];
  

  //parses the needed info
  $timeSlot = floor($meetingChoice/100);
  
  $dayOfWeek = (floor($meetingChoice/10))%10;

  $choiceOfMeeting = $meetingChoice%10;

  //sends the stuff
  $sql = "INSERT INTO `Advisor_Time_Input`(`Advisor Email`, `Time Slot`, `Day of Week`, `Choice of meeting`) VALUES ('$email','$timeSlot','$dayOfWeek','$choiceOfMeeting')";

  $sql2 = "INSERT INTO `Inactive Appointments`(`Time`, `Day`, `Type`, `Advisor_Email`) VALUES ('$timeSlot','$dayOfWeek','$choiceOfMeeting','$email')";

    
  if ($choiceOfMeeting != 1) {
    $rs = $COMMON->executeQuery($sql, $_SERVER['SCRIPT_NAME']);
    $rs2 = $COMMON2->executeQuery($sql2, $_SERVER['SCRIPT_NAME']);
  }


  //adds 10 slots for a group appointment
  if ($choiceOfMeeting > 2) {
    for ($i = 0; $i < 9; $i++) {
      $rs2 = $COMMON2->executeQuery($sql2, $_SERVER['SCRIPT_NAME']);
    }
  }

  //iterates through the times  
  $dateTime = $dateTime + 1;
  
  if ($dateTime%10 > 5){
    $dateTime = $dateTime + 295;
  }

  if ($dateTime%1000 >= 601){
    $dateTime = $dateTime + 400;
  }

  if ($dateTime > 13000){
    $dateTime = 1001;
  }
}

?>