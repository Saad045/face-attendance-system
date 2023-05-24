<?php
	include 'config.php';

	$student_id = $_POST['student_id'];
	$course_id = $_POST['course_id'];
	$teacher_id = $_POST['teacher_id'];
	$timetable_id = $_POST['timetable_id'];

	foreach($student_id as $id){      
	    $sql = "INSERT INTO student_timetable(id,student_id,timetable_id) VALUES (Null,'{$id}','{$timetable_id}')";
	    $result = mysqli_query($conn, $sql) or die("Query Unsuccessful.");

	    $sqlformarks = "INSERT INTO mark_sheet(id,student_id,course_id,teacher_id) VALUES (Null,'{$id}','{$course_id}','{$teacher_id}')";
	    $resultformarks = mysqli_query($conn, $sqlformarks) or die("Query Unsuccessful.");
	}
	header("Location: index.php");
?>