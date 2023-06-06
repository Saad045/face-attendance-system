<?php
session_start();
include '../includes/config.php';

$m_student = $_POST['student'];
$m_course = $_POST['course'];
$m_teacher = $_POST['teacher'];
$m_mid = $_POST['mid'];
$m_final = $_POST['final'];
$m_sessional = $_POST['sessional'];

$checkQuery = "SELECT * FROM mark_sheet WHERE student_id = '{$m_student}' AND course_id = '{$m_course}'";
$checkResult = mysqli_query($conn, $checkQuery);
if (mysqli_num_rows($checkResult) > 0) {
    $_SESSION['error'] = "Student marks for this course already exist!";
    header("Location: mark_sheet.php");
} else {

    $sql = "INSERT INTO mark_sheet(id, student_id, course_id, teacher_id, mid, final, sessional) VALUES (Null, '{$m_student}', '{$m_course}', '{$m_teacher}', '{$m_mid}', '{$m_final}', '{$m_sessional}')";
    $result = mysqli_query($conn, $sql) or die("Query Unsuccessful.");
    $_SESSION['success'] = "Record added successfully!";
    header("Location: mark_sheet.php");
    
}
?>