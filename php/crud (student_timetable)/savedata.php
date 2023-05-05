<?php
include 'config.php';

$st_student = $_POST['class'];
$st_course = $_POST['course'];
// echo $st_student;die;

// $conn = mysqli_connect("localhost","root","","attendence_system") or die("Connection Failed");

$sql = "INSERT INTO student_timetable(id,student_id,timetable_id) VALUES (Null,'{$st_student}','{$st_course}')";
$result = mysqli_query($conn, $sql) or die("Query Unsuccessful.");
header("Location: index.php");

// header("Location: http://localhost/php/crud%20(student_timetable)/index.php");
// mysqli_close($conn);

?>