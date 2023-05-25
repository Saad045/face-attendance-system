<?php
include 'config.php';
$as_id = $_POST['as_id'];
// $a_student = $_POST['student'];
// $a_teacher = $_POST['teacher'];
// $a_course = $_POST['course'];
// $a_date = $_POST['date'];
// $a_lec_no = $_POST['lec_num'];
$a_status = $_POST['attendance_status'];

// $sql = "UPDATE attendance SET student_id = '{$a_student}',teacher_id = '{$a_teacher}',course_id = '{$a_course}',date = '{$a_date}', lec_num = '{$a_lec_no}',attendance_status = '{$a_status}'WHERE id = {$as_id}";

$sql = "UPDATE attendance_sheet SET attendance_status = '{$a_status}' WHERE id = {$as_id}";
$result = mysqli_query($conn, $sql) or die("Query Unsuccessful.");
header("Location: attendance_sheet.php");
?>