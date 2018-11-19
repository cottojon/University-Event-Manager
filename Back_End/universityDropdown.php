<?php
	require('connect.php');
	$query = "SELECT uniID, uniName
			  FROM ?";
	$result = mysqli_prepare($connect, $query);
	$result->bind_param('s', "university");
	$result->execute();
	while($row = $result->fetch_assoc()) {
		?> <option value="<? php $row['uniID']?>"><? php$row['uniName']?></option>;
	<? php}?>
	<? php
	$result->free_result();
	$result->close();
?>