<?php
require_once 'session.php';
require('connect.php');

$sql = "SELECT rsoName, rsoType, numStudents, rsoID
		FROM rso
		WHERE rsoID = (SELECT rsoID
					   FROM rsoStudents
					   WHERE StudentID = '".$_SESSION['logged-in-user']."')";
					   
$result = mysqli_query($connect, $sql);
$rsos = array();
while($row = mysqli_fetch_assoc($result))
{
	$currRso = array('rsoTitle' => $row['rsoName'], 
					 'rsoType' => $row['rsoType'], 
					 'rsoDescription' => $row['numStudents'], 
					 'rsoID' => $row['rsoID']
					);
				   
	array_push($rsos, $currRso);
}
mysqli_close($connect);
echo json_encode($rsos);

//$sql->free_result();
//$sql->close();
