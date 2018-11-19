<? php
	require_once 'session.php';
	require('connect.php');
	
	$title = $_POST['eventTitle'];
	$university = $_POST['eventUniversity'];
	$description = $_POST['eventDescription'];
	
	require_once 'getUniversityFunction.php';
	$uid = getUniversityIdByName($university);
		
	$query = "INSERT INTO events(eventName, uniID, eventDescription)
			  VALUES (?, ?, ?)";
			  
	$stmt = mysqli_prepare($connect, $query);
	$stmt->bind_param('sis', $title, $uid, $description);
	if(!$stmt->execute())
		echo 'no execution';
	
	$stmt->free_result();
	$stmt->close();
?>