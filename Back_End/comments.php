<?php
	require_once 'session.php';
	require('connect.php');
	
	// Get comment and decode the json
	$event = $_POST['eventID'];
	$comment = $_POST['comment'];
	$rating = $_POST['rate'];
	
	// put into table
	$sql = "INSERT INTO commentsAndRating(userID, commentText, eventID, rating)
			VALUES(?, ?, ?, ?)";
			
	$query = mysqli_prepare($connect, $sql);
	$query->bind_param('isii', $_SESSION['logged-in-user'], $comment, $event, $rating);
	$query->execute();
	
	$query->free_result();
	$query->close();
?>