<?php
session_start();
include '../includes/config.php';

$a_student = $_POST['student'];
$a_course = $_POST['course'];
$a_teacher = $_POST['teacher'];
$a_date = $_POST['date'];
$a_lec_no = $_POST['lec_num'];
$a_status = $_POST['attendance_status'];

if (isset($_POST['submit'])) {
    $checkQuery = "SELECT * FROM attendance_sheet WHERE student_id = '{$a_student}' AND course_id = '{$a_course}' AND lec_num = '{$a_lec_no}'";
    $checkResult = mysqli_query($conn, $checkQuery);

    if (mysqli_num_rows($checkResult) > 0) {
        $_SESSION['error'] = "Student attendance for this course and lecture number has already been marked!";
        header("Location: attendance_sheet.php");
    } else {

        $sql = "INSERT INTO attendance_sheet(id, student_id, course_id, teacher_id, date, lec_num, attendance_status) VALUES (Null, '{$a_student}', '{$a_course}', '{$a_teacher}', '{$a_date}', '{$a_lec_no}', '{$a_status}')";
        $result = mysqli_query($conn, $sql) or die("Query Unsuccessful.");
        $alertMessage = "Data saved successfully.";
        $_SESSION['success'] = "Record added successfully!";
        header("Location: attendance_sheet.php");

    }
}
?>