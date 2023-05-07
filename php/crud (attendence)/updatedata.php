<?php
$a_id = $_POST['id'];
$a_student = $_POST['student'];
$a_teacher = $_POST['teacher'];
$a_course = $_POST['course'];
$a_date = $_POST['date'];
$a_lec_no = $_POST['lec_num'];
$a_status= $_POST['attendance_status'];


include 'config.php';

$sql = "UPDATE attendance SET student_id = '{$a_student}',teacher_id = '{$a_teacher}',course_id = '{$a_course}',date = '{$a_date}', lec_num = '{$a_lec_no}',attendance_status = '{$a_status}'WHERE id = {$a_id}";
$result = mysqli_query($conn, $sql) or die("Query Unsuccessful.");

header("Location: http://localhost/php/crud%20(attendence)/index.php");

mysqli_close($conn);

?>
