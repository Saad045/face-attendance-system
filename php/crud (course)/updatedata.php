<?php
	include 'config.php';

	$c_id = $_POST['id'];
	$c_name = $_POST['name'];
	$c_code = $_POST['course_code'];
	$c_hours = $_POST['credit_hour'];
	$l_hours = $_POST['hours'];

	$sql = "UPDATE course SET name = '{$c_name}', course_code = '{$c_code}',credit_hour = '{$c_hours}', hours = '{$l_hours}' WHERE id = {$c_id}";
	$result = mysqli_query($conn, $sql) or die("Query Unsuccessful.");
	header("Location: index.php");

// header("Location: http://localhost/php/crud%20(course)/");
// mysqli_close($conn);

?>
