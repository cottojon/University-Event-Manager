<?php
	require_once 'session.php';
	require('connect.php');
	
	$data = json_decode("jsonRSO");
	
	var_dump($data);
	
	$sql = "INSERT INTO rso(rsoName, numStudents, isActive)
			VALUES($data[rsoTitle], 5, 1)";
			
	$stmt = mysqli_query($connect, $sql);
	
	mysqli_close($connect);
	// Take in 5 emails
	/*$memberOne = $_POST['email1'];
	$memberTwo = $_POST['email2'];
	$memberThree = $_POST['email3'];
	$memberFour = $_POST['email4'];
	$memberFive = $_POST['email5'];
	
	$rsoMembers = array($adminEmail, $student2Email, $student3Email, $student4Email, $student5Email);
	
	$email = explode("@", $adminEmail);
	$domain = $email[1];
	
	$index = 1;
	while($index < 4)
	{
		$temp = explode("@", $rsoMembers[$index]);
		if($temp[1] != $domain)
		{
			echo json_encode("Emails must have the same domain.");
			break;
		}
		$index++;
	}
	
	// Verify that all the emails entered are all in the database.
	$sql = "SELECT userID
			FROM users
			WHERE email = ?";
			
	$index = 0;
	$memberIDs = array();
	while($index < 5)
	{
		$stmt = mysqli_prepare($connect, $sql);
		$stmt->bind_param('s', $rsoMembers[$index]);
		$stmt->execute();
		$result = $stmt->get_result();
		$numResult = $result->num_rows;
		if($numResult == 0)
		{
			json_encode("One of the provided emails is invalid");
			unset($memberIDs);
			break;
		}
		array_push($memberIDs, $result);
		$index++;
	}
	$stmt->free_result();
	$stmt->close();
	
	// Create RSO by adding it to the rso table and making it active with its first 5 members
	//$title = $_POST['rsoTitle'];
	//$university = $_POST['rsoUniversity'];
	//$description = $_POST['rsoDescription'];
	//$one = 1;
	
	
	
	//*****************************************************************
	$sql = "INSERT INTO rso(rsoName, numStudents, isActive)
			VALUES($rsoTitle, 5, 1)";
			
	$stmt = mysqli_query($connect, $sql);
	
	mysqli_close($connect);
	*/
	//$index = 0;
	/*while($index < 5)
	{		
		get rsoId from rso table and add student and rso to rsoStudents table
		$getId = "INSERT INTO rsoStudents(StudentID)
				  SELECT r.rsoID, s.StudentID
				  FROM rso r, student s
				  WHERE r.rsoName = $rsoTitle
						and s.StudentID = (SELECT userID
										   FROM users
										   WHERE email = rsoMembers[$index])";
						
		$result = mysqli_query($connect, $getId);
		$index++;
	}
	mysqli_close($connect);
	*/
	// Set the first email entry to be the admin.
	/*$sql = "UPDATE users
			SET isAdmin = 1
			WHERE email = $memberOne";
			
	$stmt = mysqli_query($connect, $sql);
	mysqli_close($connect);
	*/
?>