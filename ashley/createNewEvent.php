<?php
  include_once 'connect.php';
  include_once 'session.php';
?>

<!DOCTYPE html>
<?php
	require('connect.php');

	// Get information entered by the user
	$eventName = $_POST['event_name'];
	$eventCategory = $_POST['event_category'];
  $eventDescription = $_POST['event_description'];
  $eventTime = $_POST['event_time'];
  $eventDate = $_POST['event_date'];
	$eventLocation = $_POST['event_location'];
  $contactPhone = $_POST['contact_phone'];
  $contactEmail = $_POST['contact_email'];

  if(strcmp($eventCategory, 'public') == 0)
	{
		$isPublic = 1;
    $isPrivate = 0;
	}
  if(strcmp($eventCategory, 'private') == 0)
	{
    $isPublic = 0;
    $isPrivate = 1;
	}
  // Insert RSO information
	$sql = "INSERT INTO event (eventName, eventCategory, isPublicEvent, isPrivateEvent, eventDescription,
     timeOfEvent, dateOfEvent, contactEmailAddress, contactPhone)
	VALUES
	('$eventName', '$eventCategory', $isPublic, $isPrivate, '$eventDescription', '$email1')";

	mysqli_query($connect, $sql);

	header('Location: home.php');
?>
