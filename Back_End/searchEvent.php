<?php
	require('connect.php');
	
	$search = $_GET['key'];
	
	$query = "SELECT eventName
			  FROM events
			  WHERE eventName LIKE '%$search%'
			  OR eventDescription LIKE '%$search%'";
				
	$result = mysqli_query($connect, $query);
				
	$index = 1;
	$send = array();
	while($row = mysqli_fetch_assoc($result))
	{
		
		$currRow = array('ind' => $index++, 
						 'eventTitle' => $row['eventName'] 
						 );
						 
		array_push($send, $currRow);
	}
	mysqli_close($connect);
	echo json_encode($send);
?>