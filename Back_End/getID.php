<? php
require_once 'session.php';
require 'connect.php';
function getID() {
$sqlGetID = "SELECT userID
					 FROM users
					 WHERE username = ?";
					 
		$getQuery = mysqli_prepare($connect, $sqlGetID);
		$getQuery->bind_param('s', $user);
		$getQuery->bind_result($userID);
		$getQuery->execute();
		//if($getQuery->fetch())
		//	$_SESSION['logged-in-user'] = $userID;
		//echo $ID['userID'];
		$studentID = $userID;
		return $userID;
}