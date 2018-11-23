<?php
	require_once 'session.php';
	require('connect.php');
	
	$commentID = json_decode(GET["commentId"]);
	$comment = $_POST['insertComment'];
	
	$sql = "UPDATE comments
			SET comment = ?
			WHERE commentID = ?";
			
	$stmt = mysqli_prepare($connect, $sql);
	$stmt->bind_param('si', $comment, $commentID);
	$stmt->execute();
	
	$stmt->free_result();
	$stmt->close();
	
?>