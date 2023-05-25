<?php
session_start(); // Start the session
include 'config.php';

$st_id = $_POST['st_id'];
$st_roll = $_POST['student'];
$st_timetable = $_POST['timetable'];


// Query to check if the record already exists
$checkQuery = "SELECT * FROM student_timetable WHERE student_id = '{$st_roll}' AND timetable_id = '{$st_timetable}' AND id != {$st_id}";
$checkResult = mysqli_query($conn, $checkQuery);

// If a row is found, display an error message and stop the script
if (mysqli_num_rows($checkResult) > 0) {
    $_SESSION['alertMessage'] = "This Student has already assigned that timetable. Please check your TimeTable input.";
    header("Location: edit.php?id={$st_id}");
    exit();
}

$sql = "UPDATE student_timetable SET student_id = '{$st_roll}', timetable_id = '{$st_timetable}' WHERE id = {$st_id}";
$result = mysqli_query($conn, $sql) or die("Query Unsuccessful.");
header("Location: student_timetable.php");

// header("Location: http://localhost/php/crud%20(student_timetable)/index.php");
// mysqli_close($conn);

?>