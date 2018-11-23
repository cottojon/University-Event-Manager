<?php
	require_once 'session.php';
	require('connect.php');
	
	// Take in 5 emails
	$memberOne = $_POST['memberOne'];
	$memberTwo = $_POST['memberTwo'];
	$memberThree = $_POST['memberThree'];
	$memberFour = $_POST['memberFour'];
	$memberFive = $_POST['memberFive'];
	
	$rsoMembers = array($memberOne, $memberTwo, $memberThree, $memberFour, $memberFive);
	$email = explode("@", $memberOne);
	$domain = $email[1];
	
	$index = 1;
	while($index < 4)
	{
		$temp = explode("@", $rsoMembers[$index]);
		if($temp[1] != $domain)
		{
			json_encode("Emails must have the same domain.");
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
	$title = $_POST['rsoTitle'];
	$university = $_POST['rsoUniversity'];
	$description = $_POST['rsoDescription'];
	
	$sql = "INSERT INTO rso(rsoName, numStudents, isActive)
			VALUES(?, ?, ?)";
			
	$stmt = mysqli_prepare($connect, $sql);
	$stmt->bind_param('sii', $title, 5, 1);
	$stmt->execute();
	
	$stmt->free_result();
	$stmt->close();
	
	$index = 0;
	while($index < 5)
	{		
		// get rsoId from rso table and add student and rso to rsoStudents table
		$getId = "INSERT INTO rsoStudents(rsoID, StudentID)
				  SELECT r.rsoID, u.userID
				  FROM rso r, users u
				  WHERE r.rsoName = $title
						and u.email = ?";
						
		$stmt = mysqli_prepare($connect, $getID);
		$stmt->bind_param('s', $rsoMembers[$index]);
		$stmt->execute();
		
		$index++;
	}	
	$stmt->free_result();
	$stmt->close();
	
	// Set the first email entry to be the admin.
	$sql = "UPDATE users
			SET isAdmin = 1
			WHERE email = ?";
			
	$stmt = mysqli_prepare($connect, $sql);
	$stmt->bind_param('s', $memberOne);
	$stmt->execute();
	
	$stmt->free_result();
	$stmt->close();
?>