<?php
include 'config.php';

$ms_id = $_POST['ms_id'];
$tt_teacher = $_POST['teacher'];
$tt_course = $_POST['course'];
$roll_no = $_POST['roll_no'];
$mid = $_POST['mid'];
$final = $_POST['final'];
$sessioanl = $_POST['sessional'];

$sql = "UPDATE mark_sheet SET teacher_id = '{$tt_teacher}',course_id = '{$tt_course}',student_id = '{$roll_no}', mid = '{$mid }', final = '{$final }', sessional = '{$sessioanl}' WHERE id = {$ms_id}";
$result = mysqli_query($conn, $sql) or die("Query Unsuccessful.");
header("Location: index.php");
?>
