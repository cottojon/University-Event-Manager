<? php
	require_once 'session.php';
	require('connect.php');
	
	$sql = "SELECT eventID
			FROM userEvents
			WHERE studentID = ?";//studentID of $_SESSION['logged-in-user']
			
	$stmt = mysqli_prepare($connect, $sql);
	
	if(!$stmt)
	{
		exit(mysqli_error($connect));
	}
	

	$stmt->bind_param('i', $_SESSION['student']);
	if(!$stmt->execute())
	{
		exit("execution failed");
	}
	
	$matchedUser = false;
	$stmt->bind_result($eventId);
	if($eventId == null)
		exit("no events");
	else
		echo $eventId;
?>

/*
$rsos = array(
	array(
		'rsoTitle' => 'Title 1',
		'rsoType' => 'Type 1',
		'rsoDescription' => 'My Description',
		'rsoID' => 'rso-1',
	),
);

echo json_encode($rsos);
*/
/*
	require_once 'session.php';
	require('connect.php');
	//require_once 'findEventsById.php';
	
	
	while(stmt->fetch())
	{
		// id of card deck = eventCardDeck
		// get event info from events table
		// put info into card deck, somehow?
	}
	
	//eventCardDeck.card-title = 'Replace title';//Does text get added when it is sent back as json? or does it get added by php?
			
	// clean up, tell the database you no longer need the prepared statement.
	
	
	$data = Array();
	
	$sql = "//SELECT eventName, approvedBySuperAdmin, eventDescription, eventID
			//FROM events
			//WHERE eventID = ?";
	
	$getEvents = mysqli_prepare($connect, $sql);
	$getEvents->bind_param('i', $_SESSION['student']);
	$getEvents->bind_result($title, $host, $description, $id);
	$getEvents->execute();
	echo $title;
	exit();
	$result = $getEvents->get_result();
	
	echo $title;
	
	$events = array(
	array(
		'eventTitle' => 'title',
		'eventHost' => 'host',
		'eventDescription' => 'description',
		'eventID' => 'id',
	),
);

echo json_encode($events);
	
	
	//$myJson = json_encode($result);
	$getEvents->free_result();
	$getEvents->close();
	
	$eventRows = mysqli_query($connect, $sql);
	$numResult = (mysqli_num_rows($eventRows));
	
	echo($numResult);
	
	while($row = $eventRows->fetch_assoc())
	{
		$temp = $row["event_id"];
		$getEventName = mysqli_query($connect, "SELECT name
												FROM events
												WHERE id = '$temp'");
												
		$anotherVar = $getEventName->fetch_assoc();
		$name = $anotherVar["name"];
		
		echo $name;
	}
	
	*/