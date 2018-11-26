
<!DOCTYPE html>
<?php
//$rsoName="Moo";
	  //session variable
		session_start();
		require('connect.php');
		$echo= "testing";
		$echo = "testing2";
		$userName= $_SESSION['user'];
		$rsoName = $_SESSION['rsoName'];
		

	/*$sqlGetNumStudents= "SELECT Column2
							FROM rso
							WHERE rsoName = $_SESSION['rsoName']";
	$numResult=mysqli_query($connect, $sqlGetNumStudents);
	$numResult=$numResult+1;
	$sqlGetNumStudents= "Update rso
							Set numStudents =numStudents+1
							WHERE rsoName = '$rsoName'";
	mysqli_query($connect, $sqlGetNumStudents); */

/*	if($query) // will return true if succefull else it will return false
	{
	echo "increment numstudents query works";
	}
	else  {
		echo "increment numstudents query did not work";
	} */
    // insert university into db
    $unisql = "INSERT INTO rsoStudents (rsoStudentName, rsoName)
    VALUES
    ('$userName', '$rsoName')";

    mysqli_query($connect, $unisql);
	//link to new page when this is  done doing queiries
	//header('Location: home.php');

?>
