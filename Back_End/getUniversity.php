<?php
	require_once 'session.php';
	require('connect.php');
	
	function getUniversityIdByName($name) {
		$sql = "SELECT uniID
				FROM university
				WHERE uniName = $name";
				
		$result = mysqli_query($connect, $sql);
		
		return $result;
		mysqli_close($connect);
	}
?>