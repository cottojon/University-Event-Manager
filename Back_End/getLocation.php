
	
	function getLocationIdByUniversity($university) {
		$sql = "SELECT locationID
				FROM locationMark
				WHERE locationNAME = ?";
				
		$result = mysqli_prepare($connect, $sql);
		$result -> bind_param('s', $university);
		$result -> bind_result($location);
		$result -> execute();
		return $location;
	}