<?php
include 'config.php';

$m_student = $_POST['student'];
$m_course = $_POST['course'];
$m_mid = $_POST['mid'];
$m_final = $_POST['final'];
$m_sessional = $_POST['sessional'];

$sql = "INSERT INTO mark_sheet(id,course_id,student_id,mid,final,sessional) VALUES (Null,'{$m_course}','{$m_student}','{$m_mid}','{$m_final}','{$m_sessional}')";
$result = mysqli_query($conn, $sql) or die("Query Unsuccessful.");
header("Location: index.php");
?>




// $sql = "SELECT marks_sheet.id As ms_id, marks_sheet.mid, marks_sheet.final, marks_sheet.sessional, student_timetable.st_id, student.student_name, student.roll_no, course.course_name, slot.slot_no, teacher.teacher_name FROM marks_sheet 
//       INNER JOIN student_timetable ON marks_sheet.studentTimetable_id = student_timetable.st_id 
//       INNER JOIN student ON student_timetable.student_id = student.id 
//       INNER JOIN time_table ON student_timetable.timetable_id = time_table.t_id 
//       INNER JOIN course ON time_table.course_id = course.id 
//       INNER JOIN slot ON time_table.slot_id = slot.id 
//       INNER JOIN teacher ON time_table.teacher_id = teacher.id WHERE student.roll_no=$m_student && course.course_name=$m_course";
// $studentTimetable = mysqli_query($conn, $sql) or die("Query Unsuccessful.");