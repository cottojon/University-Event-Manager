<?php
	require('connect.php');
	
	function getLocationByAddress() {
		$sql = "SELECT locationID
				FROM locationMark
				WHERE locationNAME = ?";
				
		$result = mysqli_query($connect, $sql);
		
		return $result;
	}
?>