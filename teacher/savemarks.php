<?php
	session_start();
	include '../includes/connection.php';

	$student_id = $_POST['student_id'];
	$course_id = $_POST['course_id'];
	$teacher_id = $_POST['teacher_id'];
	$timetable_id = $_POST['timetable_id'];
	$mid = $_POST['mid'];
	$final = $_POST['final'];
	$sessional = $_POST['sessional'];
	$count = sizeof($student_id);

	for ($i=0; $i < $count; $i++) { 

		$s_id = $student_id[$i];
		$m_marks = $mid[$i];
		$f_marks = $final[$i];
		$s_marks = $sessional[$i];
		
		$sql = "UPDATE mark_sheet SET mid='{$m_marks}', final='{$f_marks}',sessional='{$s_marks}' WHERE student_id=$s_id && course_id=$course_id && teacher_id=$teacher_id";
		$result = mysqli_query($conn, $sql) or die("Query Unsuccessful.");
	}
	$_SESSION['success'] = "Marks updated successfully!";
	header("Location: class.php?course_id=$course_id&teacher_id=$teacher_id&timetable_id=$timetable_id");
	
	


	// if (empty($mid) ) {
    //  	$sql = "INSERT INTO mark_sheet(id,student_id,course_id,teacher_id,final,sessional) VALUES (Null,'{$s_id}','{$course_id}','{$teacher_id}','{$f_marks}','{$s_marks}')";
    //  	$result = mysqli_query($conn, $sql) or die("Query Unsuccessful.");
    //  	echo "1";
    // }

    // if (empty($final) ) {
    //  	$sql = "INSERT INTO mark_sheet(id,student_id,course_id,teacher_id,mid,sessional) VALUES (Null,'{$s_id}','{$course_id}','{$teacher_id}','{$m_marks}','{$s_marks}')";
    //  	$result = mysqli_query($conn, $sql) or die("Query Unsuccessful.");
    //  	echo "2";
    // }

    // if (empty($sessional) ) {
    //  	$sql = "INSERT INTO mark_sheet(id,student_id,course_id,teacher_id,mid,final) VALUES (Null,'{$s_id}','{$course_id}','{$teacher_id}','{$m_marks}','{$f_marks}')";
    //  	$result = mysqli_query($conn, $sql) or die("Query Unsuccessful.");
    //  	echo "3";
    // }

    // if (empty($final) && empty($sessional) && empty($mid)) {	
	// 	echo "Requied";
	// 	die;
    // }

    // if (empty($mid) && empty($final) ) {
    //  	$sql = "INSERT INTO mark_sheet(id,student_id,course_id,teacher_id,sessional) VALUES (Null,'{$s_id}','{$course_id}','{$teacher_id}','{$s_marks}')";
    //  	$result = mysqli_query($conn, $sql) or die("Query Unsuccessful.");
    //  	echo "4";
    // }


    // if (empty($mid) && empty($sessional) ) {
    //  	$sql = "INSERT INTO mark_sheet(id,student_id,course_id,teacher_id,final) VALUES (Null,'{$s_id}','{$course_id}','{$teacher_id}','{$f_marks}')";
    //  	$result = mysqli_query($conn, $sql) or die("Query Unsuccessful.");
    //  	echo "5";
    // }

    // if (empty($final) && empty($sessional) ) {
    //  	$sql = "INSERT INTO mark_sheet(id,student_id,course_id,teacher_id,mid) VALUES (Null,'{$s_id}','{$course_id}','{$teacher_id}','{$m_marks}')";
    //  	$result = mysqli_query($conn, $sql) or die("Query Unsuccessful.");
    //  	echo "6";
    // }


    // if (isset($final) && isset($sessional) && isset($mid) ) {

	// 	$sql = "INSERT INTO mark_sheet(id,student_id,course_id,teacher_id,mid,final,sessional) VALUES (Null,'{$s_id}','{$course_id}','{$teacher_id}','{$m_marks}','{$f_marks}','{$s_marks}')";
	// 	$result = mysqli_query($conn, $sql) or die("Query Unsuccessful.");
	// 	echo "7";
    // }
?>