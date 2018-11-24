<?php
	require_once 'session.php';
	require('connect.php');
	
	// Get rsoID from frontend
	$rsoId = json_decode(GET["rsoId"]);
	
	// upon button press, numStudents-- in rso
	$sql = "UPDATE rso
			SET numStudents = numStudents - 1
			WHERE rsoID = $rsoId";
			
	$result = mysqli_query($connect, $sql);
	
	// delete row from rsoStudents table	
	$query = "DELETE FROM rsoStudents
			  WHERE rsoID = $rsoId
				AND StudentID = $_SESSION['logged-in-user']";
				
	$delete = mysqli_query($connect, $query);
	mysqli_close($connect);
?>