<?php
include 'config.php';

$st_id = $_GET['id'];
$sql = "DELETE FROM student_timetable WHERE id = {$st_id}";
$result = mysqli_query($conn, $sql) or die("Query Unsuccessful.");
header("Location: index.php");

// header("Location: http://localhost/php/crud%20(student_timetable)/index.php");
// mysqli_close($conn);

?>
