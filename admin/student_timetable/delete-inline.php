<?php
include '../includes/config.php';

$std_id = $_GET['id'];
$sql = "DELETE FROM student_timetable WHERE id = {$std_id}";
$result = mysqli_query($conn, $sql) or die("Query Unsuccessful.");
$_SESSION['success'] = "Record deleted successfully!";
header("Location: student_timetable.php");
?>
