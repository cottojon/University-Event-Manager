<? php
	//require_once 'session.php';
	require('connect.php');
	
	function getUniversityIdByName($name) {
		$sql = "SELECT uniID
				FROM university
				WHERE uniName = ?";
				
		$result = mysqli_prepare($connect, $sql);
		$result -> bind_param('s', $name);
		$result -> bind_result($id);
		$result -> execute();
		return $id;
	}
?>