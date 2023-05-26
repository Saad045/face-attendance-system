<?php
session_start(); // Start the session
include 'config.php';

$c_id = $_POST['id'];
$c_name = $_POST['name'];
$c_code = $_POST['course_code'];
$c_hours = $_POST['credit_hour'];
$l_hours = $_POST['hours'];

// Check if a record with the same roll_no, cnic, email or phone already exists
$sql = "SELECT id FROM course WHERE (name = '{$c_name}' OR course_code = '{$c_code}')AND id != {$c_id}";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
	$_SESSION['alertMessage'] = "A course record with the same Course_name, or Course_code already exists. Please check your input.";
	header("Location: edit.php?id={$c_id}");
	exit();

}


$sql = "UPDATE course SET name = '{$c_name}', course_code = '{$c_code}',credit_hour = '{$c_hours}', hours = '{$l_hours}' WHERE id = {$c_id}";
$result = mysqli_query($conn, $sql) or die("Query Unsuccessful.");
header("Location: course.php");

// header("Location: http://localhost/php/crud%20(course)/");
// mysqli_close($conn);

?>