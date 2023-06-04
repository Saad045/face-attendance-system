<?php
	session_start();
	include '../includes/connection.php';

	$student_id = $_GET['student_id'];
	$course_id = $_GET['course_id'];
	$teacher_id = $_GET['teacher_id'];
	$timetable_id = $_GET['timetable_id'];
	$marks_id = $_GET['marks_id'];

	$sql = "DELETE FROM mark_sheet WHERE id = {$marks_id}";
	$result = mysqli_query($conn, $sql) or die("Query Unsuccessful.");
	$_SESSION['success'] = "Marks deleted successfully!";
	header("Location: studentData.php?student_id=$student_id&course_id=$course_id&teacher_id=$teacher_id&timetable_id=$timetable_id");
?>