<?php
include 'config.php';

$timetable_id = $_POST['timetable_id'];
$student_id = $_POST['student_id'];

session_start();

// Check if any of the students already have the same timetable assigned
$existingStudents = array();
foreach ($student_id as $id) {
	$checkQuery = "SELECT * FROM student_timetable WHERE student_id = '{$id}' AND timetable_id = '{$timetable_id}'";
	$checkResult = mysqli_query($conn, $checkQuery);

	if (mysqli_num_rows($checkResult) > 0) {
		$existingStudents[] = $id;
	}
}

if (!empty($existingStudents)) {
	$existingStudentsStr = implode(", ", $existingStudents);
	$_SESSION['alertMessage'] = "Student(s) with ID {$existingStudentsStr} already have that timetable assigned.";
	header("Location: student_timetable.php");
	exit();
}

// No duplicate records found, proceed with adding the records
foreach ($student_id as $id) {
	$sql = "INSERT INTO student_timetable (id, student_id, timetable_id) VALUES (Null, '{$id}', '{$timetable_id}')";
	$result = mysqli_query($conn, $sql) or die("Query Unsuccessful.");
}

header("Location: student_timetable.php");
?>