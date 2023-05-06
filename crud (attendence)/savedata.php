<?php

include 'config.php';
$a_student = $_POST['student'];
$a_teacher = $_POST['teacher'];
$a_course = $_POST['course'];
$a_date = $_POST['date'];
$a_lec_no = $_POST['lec_num'];
$a_status= $_POST['attendance_status'];

//  echo "st_student roll number" . $tt_course . "<br>";
//  echo "st_course course name" . $tt_slot . "<br>";
//  echo gettype($tt_course) . "<br>";
//  echo gettype($tt_slot) . "<br>";
 
//  die(); 

$conn = mysqli_connect("localhost","root","","attendence_system") or die("Connection Failed");

$sql = "INSERT INTO attendance(student_id,teacher_id,course_id,date,lec_num,attendance_status) VALUES ('{$a_student}','{$a_teacher}','{$a_course}','{$a_date}','{$a_lec_no}','{$a_status}')";
$result = mysqli_query($conn, $sql) or die("Query Unsuccessful.");

header("Location: http://localhost/php/crud%20(attendence)/index.php");

mysqli_close($conn);

?>
