<?php
	require_once 'session.php';
	require('connect.php');
	
	// Get comment and decode the decode the json
	$comment = $_POST['insertComment'];
	
	// put into table
	$sql = "INSERT INTO comments(comment)
			VALUES($comment)";
			
	$insert = mysqli_query($connect, $sql);
?>