<? php
require_once 'session.php';
require('connect.php');

//function createStudent($userID) {
		$sqlInsertStudent = "INSERT INTO student (StudentID, userID)
							 VALUES (?, ?)";
		$query = mysqli_prepare($connect, $sqlInsertStudent);
		
		if (!$query) {
		// could not compile the query (problem with query)
		exit("Poor query");
	}
		
		$query->bind_param('ii', $_SESSION['logged-in-user'], $_SESSION['logged-in-user'];
		if(!$query->execute())
			exit('cannot execute new student');
		$query->free_result();
		$query->close();
	//}