<?php
	require_once 'session.php';
	require('connect.php');
	
	// Get information entered by the user
	$user = $_POST['username'];
	$pass = md5($_POST['password']);
	$conf = md5($_POST['confirm_password']);
	$email = $_POST['email'];
	
	// Check to see if any criteria are missing or mismatched passwords.
	if(empty($user))
	{
		$error = "Please enter a username";
		$sendError = json_encode($error);
	}
	if(empty($pass))
	{
		$error = "Please enter a password";
		$sendError = json_encode($error);
	}
	if(strcmp($pass, $conf) != 0)
	{
		$error = "Passwords do not match";
		$sendError = json_encode($error);
	}
	
	// Check if there are any rows in the database that have the same userName
	$sqlUserExist = "SELECT * 
					 FROM users
					 WHERE userName = ?";
					 
	$stmt = mysqli_prepare($connect, $sqlUserExist);
	if (!$stmt) 
	{
		// could not compile the query (problem with query)
		exit(mysqli_error($connect));
	}
	
	// Populate the placeholders.
	$stmt->bind_param('s', $user);
	
	// Execute the query with placeholders populated.
	if (!$stmt->execute()) {
		
		// could not execute the query
		echo 'Prepared statement failed!!!\n';
		exit(mysqli_error($connect));
	}
	
	// Get the number of rows
	$result = $stmt->get_result();
	$numResult = $result->num_rows;
					 
	// If there are any rows with the same userName, then do not allow the user to user this same userName.
	if($numResult > 0)
	{
		exit("Username already exists");
	}
	else
	{
		// Clean-up
		$stmt->free_result();
		$stmt->close();
		
		$isStudent = 1;
		
		// Insert user into database
		$sqlInsert = "INSERT INTO users (userName, password, isStudent, email)
					  VALUES (?, ?, ?, ?)";
		
		$query = mysqli_prepare($connect, $sqlInsert);
		if(!$query)
		{
			echo 'prep stmt failed';
			exit(mysqli_error($connect));
		}
		
		$query->bind_param('ssis', $user, $pass, $isStudent, $email);
		if(!$query->execute())
		{
			echo 'second prep stmt failed\n';
			exit(mysqli_error($connect));
		}
		
		$query->free_result();
		$query->close();
		
		$sql = "INSERT INTO student(userID, StudentID)
				(SELECT userID, userID
				 FROM users
				 WHERE userName = '$user')";
				
		$stmt = mysqli_query($connect, $sql);
		/*		
		$stmt = mysqli_prepare($connect, $sql);
		$stmt->bind_param('s', $user);
		$stmt->execute();
	
		$stmt->free_result();
		$stmt->close();
		*/
	}
		/*
		$sqlGetID = "SELECT userID
					 FROM users
					 WHERE username = ?";
					 
		$getQuery = mysqli_prepare($connect, $sqlGetID);
		$getQuery->bind_param('s', $user);
		$getQuery->bind_result($userID);
		$getQuery->execute();
		$getQuery->free_result();
		$getQuery->close();
		
		$sqlInsertStudent = "INSERT INTO student (StudentID, userID)
							 VALUES (?, ?)";
		$query = mysqli_prepare($connect, $sqlInsertStudent);
		
		if (!$query) {
			exit("Poor query");
		}
		
		$query->bind_param('ii', $userID, $userID);
		$query->execute();
		$query->free_result();
		$query->close();
		
		
	}
	*/
	// Log user in
	include 'loginUser.php';