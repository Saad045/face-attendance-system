<?php
include 'config.php';

$tt_id = $_POST['t_id'];
$tt_course = $_POST['course'];
$tt_slot = $_POST['slot'];
$tt_day = $_POST['day'];
$tt_teacher = $_POST['teacher'];

$sql = "UPDATE time_table SET course_id = '{$tt_course}', slot_id = '{$tt_slot}', day = '{$tt_day}',teacher_id = '{$tt_teacher}' WHERE id = {$tt_id}";
$result = mysqli_query($conn, $sql) or die("Query Unsuccessful.");
header("Location: index.php");
?>
