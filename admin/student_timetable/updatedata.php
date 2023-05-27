<?php
include 'config.php';

$st_id = $_POST['st_id'];
$student_id = $_POST['student'];
$timetable_ids = $_POST['timetable'];

session_start();

// Check if the student exists
$checkStudentQuery = "SELECT * FROM student WHERE id = '{$student_id}'";
$checkStudentResult = mysqli_query($conn, $checkStudentQuery);

if (mysqli_num_rows($checkStudentResult) == 0) {
    $_SESSION['alertMessage'] = "Invalid student ID. Please select a valid student.";
    header("Location: edit.php?id={$st_id}");
    exit();
}

// Check if any of the students already have the same timetable assigned
$existingStudents = array();
foreach ($timetable_ids as $timetable_id) {
    $checkQuery = "SELECT * FROM student_timetable WHERE student_id = '{$student_id}' AND timetable_id = '{$timetable_id}' AND id != '{$st_id}'";
    $checkResult = mysqli_query($conn, $checkQuery);

    if (mysqli_num_rows($checkResult) > 0) {
        $existingStudents[] = $student_id;
    }
}

if (!empty($existingStudents)) {
    $existingStudentsStr = implode(", ", $existingStudents);
    $_SESSION['alertMessage'] = "Student(s) with ID {$existingStudentsStr} already have that timetable assigned.";
    header("Location: edit.php?id={$st_id}");
    exit();
}

// No duplicate records found, proceed with updating the record
$sql = "UPDATE student_timetable SET student_id = '{$student_id}' WHERE id = '{$st_id}'";
$result = mysqli_query($conn, $sql) or die("Query Unsuccessful.");

// Delete existing timetable entries for the student
$deleteQuery = "DELETE FROM student_timetable WHERE student_id = '{$student_id}'";
mysqli_query($conn, $deleteQuery);

// Insert new timetable entries for the student
foreach ($timetable_ids as $timetable_id) {
    $insertQuery = "INSERT INTO student_timetable (student_id, timetable_id) VALUES ('{$student_id}', '{$timetable_id}')";
    mysqli_query($conn, $insertQuery);
}

header("Location: student_timetable.php");
?>