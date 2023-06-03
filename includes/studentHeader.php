<?php
session_start();
include '../includes/connection.php';

// We have to make logout button to use this feature! We can't use it in header bcz it is also used in reset password.
// if (!isset($_SESSION['loggedin'])) {
//   header('Location: login.php');
// }

if (isset($_GET['student_id'])) {
  $student_id = $_GET['student_id'];
  $sqlforstudent = "SELECT * FROM student WHERE id = $student_id";
  $resultforstudent = mysqli_query($conn, $sqlforstudent);
  if (mysqli_num_rows($resultforstudent) > 0) {
    $student = mysqli_fetch_array($resultforstudent);
  }
}

if (isset($_GET['course_id'])) {
  $course_id = $_GET['course_id'];
  $sqlforcourse = "SELECT course.name AS course_name, teacher.name AS teacher_name, teacher.image AS teacher_image FROM student_timetable INNER JOIN time_table ON time_table.id = student_timetable.timetable_id INNER JOIN course ON time_table.course_id = course.id INNER JOIN teacher ON time_table.teacher_id = teacher.id WHERE student_timetable.student_id=$student_id && course.id=$course_id GROUP BY course_name";
  $resultforcourse = mysqli_query($conn, $sqlforcourse);
  if (mysqli_num_rows($resultforcourse) > 0) {
    $course = mysqli_fetch_array($resultforcourse);
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Student</title>
  <link rel="shortcut icon" href="../assets/images/logo-2.png">
  <link rel="stylesheet" href="../assets/css/style.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
    integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>