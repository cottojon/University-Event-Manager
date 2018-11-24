<?php
	require_once 'session.php';
	require('connect.php');
	
	// Receive rsoID from front end.
	$rso = json_decode(GET["rsoId"]);
	
	// Insert into rsoStudents table
	$sql = "INSERT INTO rsoStudents(rsoID, StudentID)
			VALUES($rso, $_SESSION['logged-in-user'])";
	
	$result = mysqli_query($connect, $sql);
	mysqli_close($connect);
	
	// Update numstudents in rso.
	$updateNumStudents = "UPDATE rso
						  SET numStudents = numStudents + 1
						  WHERE rsoID = $rso";
						  
	$update = mysqli_query($connect, $sql);
	mysqli_close($connect);
?>