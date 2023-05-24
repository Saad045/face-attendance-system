<?php
include 'config.php';

$std_id = $_GET['id'];
$sql = "DELETE FROM student_timetable WHERE id = {$std_id}";
$result = mysqli_query($conn, $sql) or die("Query Unsuccessful.");
header("Location: student_timetable.php");

// header("Location: http://localhost/php/crud%20(student)/");
// mysqli_close($conn);

?>
