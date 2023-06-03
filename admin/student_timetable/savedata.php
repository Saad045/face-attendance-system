<?php
session_start();
include 'config.php';

$timetable_ids = $_POST['timetable_id'];
$student_id = $_POST['student_id'];
$course_id = $_POST['course_id'];
$teacher_id = $_POST['teacher_id'];

// Check if any of the students already have the same timetable assigned
$existingStudents = array();
foreach ($student_id as $id) {
	foreach ($timetable_ids as $timetable_id) {
		$checkQuery = "SELECT * FROM student_timetable WHERE student_id = '{$id}' AND timetable_id = '{$timetable_id}'";
		$checkResult = mysqli_query($conn, $checkQuery);

		if (mysqli_num_rows($checkResult) > 0) {
			$existingStudents[] = $id;
		}
	}
}

if (!empty($existingStudents)) {
	$existingStudentsStr = implode(", ", $existingStudents);
	$_SESSION['alertMessage'] = "Student(s) with ID {$existingStudentsStr} already have that timetable assigned.";
	header("Location: student_timetable.php");
	exit();
} else {

	// No duplicate records found, proceed with adding the records
	foreach ($student_id as $id) {
		foreach ($timetable_ids as $timetable_id) {
			$sql = "INSERT INTO student_timetable (id, student_id, timetable_id) VALUES (Null, '{$id}', '{$timetable_id}')";
			$result = mysqli_query($conn, $sql) or die("Query Unsuccessful.");
		}

		$sql = "SELECT * FROM mark_sheet WHERE student_id=$id && course_id=$course_id && teacher_id=$teacher_id";
	    $result = mysqli_query($conn, $sql) or die("Query Unsuccessful.");
	    if (mysqli_num_rows($result) == 0) {
	    	$sqlformarks = "INSERT INTO mark_sheet(id,student_id,course_id,teacher_id) VALUES (Null,'{$id}','{$course_id}','{$teacher_id}')";
		    $resultformarks = mysqli_query($conn, $sqlformarks) or die("Query Unsuccessful.");
	    }

	}
	$_SESSION['alertMessage'] = "Time-table added successfully!";
	header("Location: student_timetable.php");

}
?>