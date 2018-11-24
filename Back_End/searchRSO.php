<?php
	require('connect.php');
	
	$search = $_GET['key'];
	
	$query = "SELECT rsoName
			  FROM rso
			  WHERE rsoName LIKE '%$search%'";
				
	$result = mysqli_query($connect, $query);
				
	$index = 1;
	$send = array();
	while($row = mysqli_fetch_assoc($result))
	{
		
		$currRow = array('ind' => $index++, 
						 'rsoTitle' => $row['rsoName'] 
						 );
						 
		array_push($send, $currRow);
	}
	mysqli_close($connect);
	echo json_encode($send);
?>