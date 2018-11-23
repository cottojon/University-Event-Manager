<?php
	require_once 'session.php';

	// Connection to database.
	require('connect.php');
	
	// Get information user entered.
	$user = $_POST['username'];
	$pass = md5($_POST['password']);
	
	// Prepared statement to see if there is a user with a matching username and password.
	$sql = "SELECT userID
			FROM users 
			WHERE userName = ? AND password = ?";
			
	// Have the database parse the SQL.
	$stmt = mysqli_prepare($connect, $sql);
	if (!$stmt) {
		// could not compile the query (problem with query)
		exit(mysqli_error($connect));
	}
	
	// Populate the placeholders.	
	$stmt->bind_param('ss', $user, $pass);
	$stmt->bind_result($userId);
	// Execute the query with placeholders populated.
	if (!$stmt->execute()) {
		// could not execute the query
		exit(mysqli_error($connect));
	}
	// If that user exists, then create a session with their userID.
	$matchedUser = false;
	if($stmt->fetch())
	{
		$_SESSION['logged-in-user'] = $userId;
		logUserIn($_SESSION['logged-in-user']);
		$matchedUser = true;
	}
	
	// Clean up.
	$stmt->free_result();
	$stmt->close();
	
	if (!$matchedUser) {
		json_encode("No user found");
	}
	
	//header('Location: myOtherPage.html'); // Redirection
	//$_SESSION['logged-in-user'] = $userId; // Add data to session.
	//unset($_SESSION['logged-in-user']); // Remove data from session.
	
	//$currentLoggedInUser = $_SESSION['logged-in-user'];
	/*
	// Examples of safe places to use regular sql without prepped stmt
	$myUserInput = (int) $_POST['myParameter'];
	$myConstant = 'happy birthday';
	$sql = "select * from blah where columnValue = '$myConstant'";
	exit(); // just to stop more execution in this specific script, don't actually do this.
	// TODO !!! PREPARED STATEMENT
	*/
	/*
	// Check that a row for this username and password exists.
	$sqlChkUser = "SELECT userId
				   FROM users
				   WHERE userName = '$user' AND password = '$pass'";
				   echo $sqlChkUser;
	$result = mysqli_query($connect, $sqlChkUser);
	$numResult = mysqli_num_rows($result);
	*/
	// Return error message if the information is incorrect.
	//if($numResult != 1)
	//{
	//	exit("Invalid login information");
	//}
	
	// $id holds the user id of the user to load the proper events later, other pages will require this information.
	//$row = $result->fetch_assoc();
	//$id = (int) $row['userId'];
?>