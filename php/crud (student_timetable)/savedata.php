<?php
	include 'config.php';

	$timetable_id = $_POST['timetable_id'];
	$student_id = $_POST['student_id'];

	foreach($student_id as $id){      
	    $sql = "INSERT INTO student_timetable(id,student_id,timetable_id) VALUES (Null,'{$id}','{$timetable_id}')";
	    $result = mysqli_query($conn, $sql) or die("Query Unsuccessful.");
	}
	header("Location: index.php");
?>