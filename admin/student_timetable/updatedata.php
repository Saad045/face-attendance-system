<?php
include 'config.php';

$st_id = $_POST['st_id'];
$st_roll = $_POST['student'];
$st_timetable = $_POST['timetable'];

$sql = "UPDATE student_timetable SET student_id = '{$st_roll}', timetable_id = '{$st_timetable}' WHERE id = {$st_id}";
$result = mysqli_query($conn, $sql) or die("Query Unsuccessful.");
header("Location: student_timetable.php");

// header("Location: http://localhost/php/crud%20(student_timetable)/index.php");
// mysqli_close($conn);

?>
