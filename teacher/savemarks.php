<?php
	include '../includes/connection.php';

	$student_id = $_POST['student_id'];
	

	$course_id = $_POST['course_id'];
	$teacher_id = $_POST['teacher_id'];

	$total = $_POST['total'];
	$mid = $_POST['mid'];

	$final = $_POST['final'];
	$sessional = $_POST['sessional'];

	$count = sizeof($student_id);

	 if (empty($final) && empty($sessional) && empty($mid)) {	
		echo "Requied";
		die;
     }


	for ($i=0; $i < $count; $i++) { 

	 $s_id = $student_id[$i];
	 $m_marks = $mid[$i];
	 $f_marks = $final[$i];
	 $s_marks = $sessional[$i];

    if (empty($mid) ) {
     	$sql = "INSERT INTO mark_sheet(id,student_id,course_id,teacher_id,final,sessional) VALUES (Null,'{$s_id}','{$course_id}','{$teacher_id}','{$f_marks}','{$s_marks}')";
     	$result = mysqli_query($conn, $sql) or die("Query Unsuccessful.");
     	echo "1";
     }

    if (empty($final) ) {
     	$sql = "INSERT INTO mark_sheet(id,student_id,course_id,teacher_id,mid,sessional) VALUES (Null,'{$s_id}','{$course_id}','{$teacher_id}','{$m_marks}','{$s_marks}')";
     	$result = mysqli_query($conn, $sql) or die("Query Unsuccessful.");
     	echo "2";
     }

    if (empty($sessional) ) {
     	$sql = "INSERT INTO mark_sheet(id,student_id,course_id,teacher_id,mid,final) VALUES (Null,'{$s_id}','{$course_id}','{$teacher_id}','{$m_marks}','{$f_marks}')";
     	$result = mysqli_query($conn, $sql) or die("Query Unsuccessful.");
     	echo "3";
     }



    if (empty($mid) && empty($final) ) {
     	$sql = "INSERT INTO mark_sheet(id,student_id,course_id,teacher_id,sessional) VALUES (Null,'{$s_id}','{$course_id}','{$teacher_id}','{$s_marks}')";
     	$result = mysqli_query($conn, $sql) or die("Query Unsuccessful.");
     	echo "4";
     }


    if (empty($mid) && empty($sessional) ) {
     	$sql = "INSERT INTO mark_sheet(id,student_id,course_id,teacher_id,final) VALUES (Null,'{$s_id}','{$course_id}','{$teacher_id}','{$f_marks}')";
     	$result = mysqli_query($conn, $sql) or die("Query Unsuccessful.");
     	echo "5";
     }

    if (empty($final) && empty($sessional) ) {
     	$sql = "INSERT INTO mark_sheet(id,student_id,course_id,teacher_id,mid) VALUES (Null,'{$s_id}','{$course_id}','{$teacher_id}','{$m_marks}')";
     	$result = mysqli_query($conn, $sql) or die("Query Unsuccessful.");
     	echo "6";
     }


     if ( isset($final) && isset($sessional) && isset($mid) ) {

		$sql = "INSERT INTO mark_sheet(id,student_id,course_id,teacher_id,mid,final,sessional) VALUES (Null,'{$s_id}','{$course_id}','{$teacher_id}','{$m_marks}','{$f_marks}','{$s_marks}')";
		$result = mysqli_query($conn, $sql) or die("Query Unsuccessful.");
		echo "7";
     }
	
	}

die();

	foreach ($student_id as $id) {


			$sql = "INSERT INTO mark_sheet(id,student_id,course_id,teacher_id) VALUES (Null,'{$id}','{$course_id}','{$teacher_id}')";

			$result = mysqli_query($conn, $sql) or die("Query Unsuccessful.");

			$id = mysqli_insert_id($conn);

			if (!empty($mid) ) {
				foreach ($mid as $m) {

					$sqlformid = "UPDATE `mark_sheet` SET `mid`='$m' WHERE id = '$id'";

					$resultformid = mysqli_query($conn, $sqlformid) or die("Query Unsuccessful.");
				}
	}
	}

	






	// foreach ($student_id as $id) {
	// 	$sql = "INSERT INTO mark_sheet(id,student_id,course_id,teacher_id,mid,final,sessional) VALUES (Null,'{$id}','{$course_id}','{$teacher_id}','{$mid}','{$final}','{$sessional}')";
	//     $result = mysqli_query($conn, $sql) or die("Query Unsuccessful.");
	// }
?>