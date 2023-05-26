<?php
include 'config.php';

$m_student = $_POST['student'];
$m_course = $_POST['course'];
$m_teacher = $_POST['teacher'];
$m_mid = $_POST['mid'];
$m_final = $_POST['final'];
$m_sessional = $_POST['sessional'];

// Check if the record already exists
$checkQuery = "SELECT * FROM mark_sheet WHERE student_id = '{$m_student}' AND course_id = '{$m_course}'";
$checkResult = mysqli_query($conn, $checkQuery);

if (mysqli_num_rows($checkResult) > 0) {
    // Duplicate record found, display a message
    $alertMessage = "Student marks for this course already exist.";
    // You can choose to redirect or display the message on the same page
    // For redirection:
    session_start();
    $_SESSION['alertMessage'] = $alertMessage;
    header("Location: mark_sheet.php");
    exit();
    // For displaying the message on the same page:
    // echo $alertMessage;
} else {
    // No duplicate record found, proceed with inserting the record
    $sql = "INSERT INTO mark_sheet(id, student_id, course_id, teacher_id, mid, final, sessional) VALUES (Null, '{$m_student}', '{$m_course}', '{$m_teacher}', '{$m_mid}', '{$m_final}', '{$m_sessional}')";
    $result = mysqli_query($conn, $sql) or die("Query Unsuccessful.");
    header("Location: mark_sheet.php");
}
?>




// $sql = "SELECT marks_sheet.id As ms_id, marks_sheet.mid, marks_sheet.final, marks_sheet.sessional,
student_timetable.st_id, student.student_name, student.roll_no, course.course_name, slot.slot_no, teacher.teacher_name
FROM marks_sheet
// INNER JOIN student_timetable ON marks_sheet.studentTimetable_id = student_timetable.st_id
// INNER JOIN student ON student_timetable.student_id = student.id
// INNER JOIN time_table ON student_timetable.timetable_id = time_table.t_id
// INNER JOIN course ON time_table.course_id = course.id
// INNER JOIN slot ON time_table.slot_id = slot.id
// INNER JOIN teacher ON time_table.teacher_id = teacher.id WHERE student.roll_no=$m_student &&
course.course_name=$m_course";
// $studentTimetable = mysqli_query($conn, $sql) or die("Query Unsuccessful.");