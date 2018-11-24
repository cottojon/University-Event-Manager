<?php
	require_once 'session.php';
	require('connect.php');
	
	// Get user input
	$title = $_POST['eventTitle'];
	$university = $_POST['eventUniversity'];
	$type = $_POST['eventType'];
	$group = $_POST['eventGroup'];
	$startTime = $_POST['startTime'];
	$eventDuration = $_POST['eventDuration'];
	$date = $_POST['dateOfEvent'];
	$phone = $_POST['contactPhone'];
	$email = $_POST['contactEmail'];
	$address = $_POST['eventAddress'];
	$rso = $_POST['rsoName'];
	$description = $_POST['eventDescription'];
	
	
	$sql = "INSERT INTO events (`eventName1)
			VALUES($title)";
	
	/*// sort events at the same location by day and time
	$otherEvents = array();
	$getEvents = "SELECT *
				  FROM events
				  WHERE '$locationID' = (SELECT locationID
										 FROM locationMark
										 WHERE address = '$address')
										 ORDER BY dateOfEvent, timeOfEvent, durationOfEvent";
		
	$getEvents->execute();
	result = $getEvents->fetchAll();
	print_r($results);
	*/
	/*	
	while()
	{
		
	}
	$SELECT TIMEDIFF('2000:01:01 00:00:00',
                     '2000:01:01 00:00:00.000001');
										 
	$query = mysqli_query($connect, $getEvents);
	
	echo json_encode($query);
	mysqli_close($connect);
				  
	
	// if any overlap send error to the front-count
	// otherwise enter above into database
	
	/*
	$sql = "SELECT uniID
				FROM university
				WHERE uniName = $university";
				
		$uid = mysqli_query($connect, $sql);
		mysqli_close($connect);
		
		echo ($uid);
/*		
	$location = "SELECT locationID
			FROM locationMark
			WHERE address = $address";
			
		$lid = mysqli_query($connect, $location);
		mysqli_close($connect);
*	
	if(strcmp($group, "public") == 0)
		$groupType = "isPublicEvent";
	else if(strcmp($group, "private") == 0)
		$groupType = "isPrivateEvent";
	else
		$groupType = "isRSOEvent";
	
	$query = "INSERT INTO events('eventName', 'uniID', $groupType, 'eventDescription', 'timeOfEvent', 'dateOfEvent', 'contactEmail')
			  VALUES ($title, $uid, '1', $description, $startTime, $date, $email)";
	
	$stmt = mysqli_query($connect, $query);
	if(!$stmt)
		echo("bad query");
	
	mysqli_close($connect);
?>
*/