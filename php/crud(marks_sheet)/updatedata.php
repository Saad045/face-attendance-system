<?php
include 'config.php';

$ms_id = $_POST['ms_id'];
$mid = $_POST['mid'];
$final = $_POST['final'];
$sessioanl = $_POST['sessional'];
// $roll_no = $_POST['roll_no'];
// $course = $_POST['course'];
// $teacher = $_POST['course'];
// $sql = "UPDATE mark_sheet SET teacher_id = '{$teacher}',course_id = '{$course}',student_id = '{$roll_no}', mid = '{$mid }', final = '{$final }', sessional = '{$sessioanl}' WHERE id = {$ms_id}";

$sql = "UPDATE mark_sheet SET mid='{$mid }', final='{$final }', sessional='{$sessioanl}' WHERE id = {$ms_id}";
$result = mysqli_query($conn, $sql) or die("Query Unsuccessful.");
header("Location: index.php");
?>
