<?php
	include '../includes/connection.php';

	$student_id = $_POST['student_id'];
	$course_id = $_POST['course_id'];
	$teacher_id = $_POST['teacher_id'];
	$total = $_POST['total'];
	$mid = $_POST['mid'];
	$final = $_POST['final'];
	$sessional = $_POST['sessional'];

	echo sizeof($student_id);die();

	

	// foreach ($student_id as $id) {
	// 	$sql = "INSERT INTO mark_sheet(id,student_id,course_id,teacher_id,mid,final,sessional) VALUES (Null,'{$id}','{$course_id}','{$teacher_id}','{$mid}','{$final}','{$sessional}')";
	//     $result = mysqli_query($conn, $sql) or die("Query Unsuccessful.");
	// }
?>