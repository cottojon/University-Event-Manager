<!DOCTYPE html>
<script>
	console.log("in university dropdown");
</script>
<?php
	require('connect.php');
	$query = "SELECT uniName
			  FROM university";
	$result = mysqli_prepare($connect, $query);
	$result->bind_param('s', "university");
	$result->execute();
	while($row = $result->fetch_assoc()) {
		echo "<option value='" . $row['uniName'] ."'>" . $row['uniName'] ."</option>";
	}
	//$result->free_result();
	//$result->close();
	//mysqli_close($connect); CHANGE TO NOT PREP STATEMENT???
?>