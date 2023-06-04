<?php
session_start();
include 'config.php';

$alertMessage = $_SESSION['alertMessage'] ?? '';
unset($_SESSION['alertMessage']);


$a_student = $_POST['student'];
$a_course = $_POST['course'];
$a_teacher = $_POST['teacher'];
$a_date = $_POST['date'];
$a_lec_no = $_POST['lec_num'];
$a_status = $_POST['attendance_status'];

if (isset($_POST['submit'])) {
    // Check if the record already exists
    $checkQuery = "SELECT * FROM attendance_sheet WHERE student_id = '{$a_student}' AND course_id = '{$a_course}' AND lec_num = '{$a_lec_no}'";
    $checkResult = mysqli_query($conn, $checkQuery);

    if (mysqli_num_rows($checkResult) > 0) {
        // Duplicate record found, display a message
        $alertMessage = "Student attendance for this course and lecture number has already been marked.";
        // You can choose to redirect or display the message on the same page
        // For redirection:
        session_start();
        $_SESSION['alertMessage'] = $alertMessage;

        // For displaying the message on the same page:
        // echo $alertMessage;
    } else {
        // No duplicate record found, proceed with inserting the record
        $sql = "INSERT INTO attendance_sheet(id, student_id, course_id, teacher_id, date, lec_num, attendance_status) VALUES (Null, '{$a_student}', '{$a_course}', '{$a_teacher}', '{$a_date}', '{$a_lec_no}', '{$a_status}')";
        $result = mysqli_query($conn, $sql) or die("Query Unsuccessful.");
        // Record successfully saved, display a success alert message
        $alertMessage = "Data saved successfully.";
    }
    // Store the alert message in the session
    $_SESSION['alertMessage'] = $alertMessage;

    // Redirect back to the attendance_sheet.php page
    header("Location: attendance_sheet.php");
    exit();
}
?>