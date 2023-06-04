<?php
	session_start();
	include '../includes/connection.php';

	$student_id = $_GET['student_id'];
	$course_id = $_GET['course_id'];
	$teacher_id = $_GET['teacher_id'];
	$timetable_id = $_GET['timetable_id'];
	$attendance_id = $_GET['attendance_id'];

	$sql = "DELETE FROM attendance_sheet WHERE id = {$attendance_id}";
	$result = mysqli_query($conn, $sql) or die("Query Unsuccessful.");
	$_SESSION['success'] = "Record deleted successfully!";
	header("Location: studentData.php?student_id=$student_id&course_id=$course_id&teacher_id=$teacher_id&timetable_id=$timetable_id");
?>