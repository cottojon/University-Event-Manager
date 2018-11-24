<?php
require_once 'session.php';
require('connect.php');

$sql = "SELECT eventName, contactEmailAddress, eventDescription, eventID
		FROM   events
		WHERE  eventID = (SELECT eventID
						  FROM userEvents
						  WHERE StudentID = '".$_SESSION['logged-in-user']."')";
					   
$result = mysqli_query($connect, $sql);
$userEvents = array();
while($row = mysqli_fetch_assoc($result))
{
	$currEvent = array('eventTitle' => $row['eventName'], 
					   'rsoHosting' => $row['contactEmailAddress'], 
					   'eventDescription' => $row['eventDescription'], 
					   'eventID' => $row['eventID']
					  );
				   
	array_push($userEvents, $currEvent);
}
mysqli_close($connect);
echo json_encode($userEvents);
?>
