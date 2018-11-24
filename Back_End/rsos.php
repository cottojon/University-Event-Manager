<!DOCTYPE html>
<?php

	require('connect.php');
	require('loginUser.php');
	
	$sql = "SELECT event_id
			FROM users_events
			WHERE user_id = '$id'";
			
	$rsoRows = mysqli_query($connect, $sql);	
	$numResult = (mysqli_num_rows($rsoRows));
	
	echo($numResult);
	
	while($row = $rsoRows->fetch_assoc())
	{
		$temp = $row["event_id"];
		$getEventName = mysqli_query($connect, "SELECT name
												FROM rsos
												WHERE id = '$temp'");
												
		$anotherVar = $getEventName->fetch_assoc();
		$name = $anotherVar["name"];
		mysqli_close($connect);
		echo $name;
	}
	
?>