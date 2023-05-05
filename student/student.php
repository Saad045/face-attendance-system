<?php
  session_start();
  include '../includes/connection.php';

  // We have to make logout button to use this feature!
  if (!isset($_SESSION['loggedin'])) {
    header('Location: login.php');
  }

  $student_id = $_GET['id'];
  $sqlforstudent = "SELECT * FROM student WHERE id = $student_id";
  $resultforstudent = mysqli_query($conn,$sqlforstudent);
  if (mysqli_num_rows($resultforstudent) > 0) {
    $student = mysqli_fetch_array($resultforstudent);
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
</head>
<body>
  
  <div class="container-fluid">
    <div class="subject_wrapper">
      <div class="row">
        <div class="col-md-2 bg-dark text-white text-center sticky-top sidebar">
          
            <img src="../<?php echo $student['picture']; ?>" class="img-fluid px-3 py-3">
            <p class="mb-0"><?php echo $student['name']; ?></p>
            <div class="tab my-3"><a href="#" class="">Timetable</a></div>
  <?php
  $sqlfortimetable = "SELECT student_timetable.id As id, student.name As student_name, student.roll_no, student.session, student.email As student_email, student.picture As student_picture, course.id As course_id, course.name As course_name, course.credit_hour, slot.slot_time, time_table.day, teacher.name As teacher_name, teacher.email As teacher_email, teacher.qualification, teacher.image As teacher_image FROM student_timetable INNER JOIN student ON student_timetable.student_id = student.id INNER JOIN time_table ON student_timetable.timetable_id = time_table.id INNER JOIN course ON time_table.course_id = course.id INNER JOIN slot ON time_table.slot_id = slot.id INNER JOIN teacher ON time_table.teacher_id = teacher.id WHERE student_timetable.student_id =$student_id GROUP BY course_name ORDER BY course_id ASC";
  $resultfortimetable = mysqli_query($conn,$sqlfortimetable);
  
  
    if (mysqli_num_rows($resultfortimetable) > 0) {
      while ($timetable = mysqli_fetch_array($resultfortimetable)) {

  ?>

            <div class="tab my-3"><a href="subject.php?courseid=<?php echo $timetable['course_id']; ?>"><?php echo $timetable['course_name']; ?></a></div>
  <?php
      }
    }
  ?>
          
        </div>

        <div class="col-md-10">
          <div class="row justify-content-between px-4">
            <div class="col-md-6">
              <h5 class="font-weight-bold my-4">Semester Record</h5>
            </div>

            <div class="col-md-5">
              <div class="my-4">
                <input type="text" class="form-control" placeholder="Search.." style="border: 1px solid black;">
              </div>
            </div>
          </div>

          <div class="row px-5 my-5">
            <div class="col-md-9">
              <table class="table table-borderless table-sm">
                <thead>
                  <tr>
                    <th colspan="4">Marks</th>
                    <th class="p-4"></th>
                    <th colspan="3">Attendance</th>
                  </tr>

                  <tr>
                    <th class="text-center pt-4">Total</th>
                    <th class="text-center pt-4">Mid</th>
                    <th class="text-center pt-4">Final</th>
                    <th class="text-center pt-4">Sessional</th>
                    <th></th>
                    <th class="text-center pt-4">P</th>
                    <th class="text-center pt-4">A</th>
                  </tr>
                </thead>
                <tbody>
      <?php
  // We have to select student ID! Confusion-> student_timetable.student_id || student.id
  $sqlforrecord = "SELECT student_timetable.id As id,student.id As student_id, student.name As student_name, student.roll_no, student.session, student.email As student_email, student.picture As student_picture, course.id As course_id, course.name As course_name, course.credit_hour, slot.slot_time, time_table.day, teacher.id As teacher_id, teacher.name As teacher_name, teacher.email As teacher_email, teacher.qualification, teacher.image As teacher_image FROM student_timetable INNER JOIN student ON student_timetable.student_id = student.id INNER JOIN time_table ON student_timetable.timetable_id = time_table.id INNER JOIN course ON time_table.course_id = course.id INNER JOIN slot ON time_table.slot_id = slot.id INNER JOIN teacher ON time_table.teacher_id = teacher.id WHERE student_timetable.student_id =$student_id GROUP BY course_name ORDER BY course_id ASC";
  $resultforrecord = mysqli_query($conn,$sqlforrecord);
        if (mysqli_num_rows($resultforrecord) > 0) {
          while ($record = mysqli_fetch_array($resultforrecord)) {

            $sqlformarks = "SELECT mark_sheet.id, mark_sheet.student_id, student.roll_no, student.name AS student_name, mark_sheet.course_id, course.name AS course_name, mark_sheet.mid, mark_sheet.final, mark_sheet.sessional, mark_sheet.teacher_id, teacher.name AS teacher_name FROM (((mark_sheet INNER JOIN student ON mark_sheet.student_id = student.id) INNER JOIN course ON mark_sheet.course_id = course.id) INNER JOIN teacher ON mark_sheet.teacher_id = teacher.id) WHERE mark_sheet.student_id='".$record['student_id']."' && mark_sheet.course_id='".$record['course_id']."' && mark_sheet.teacher_id='".$record['teacher_id']."' ORDER BY mark_sheet.id ASC";
            $resultformarks = mysqli_query($conn,$sqlformarks);
            if (mysqli_num_rows($resultformarks) > 0) {
              $marks = mysqli_fetch_array($resultformarks);
              $mid = $marks['mid'];
              $final = $marks['final'];
              $sessional = $marks['sessional'];
            }
            

            $sqlforattendance = "SELECT COUNT(attendance_sheet.id) AS AttendanceCount FROM attendance_sheet INNER JOIN student ON student.id = attendance_sheet.student_id INNER JOIN course ON course.id = attendance_sheet.course_id INNER JOIN teacher ON teacher.id = attendance_sheet.teacher_id WHERE attendance_sheet.attendance_status='p' && student.id='".$record['student_id']."' && course.id='".$record['course_id']."' && teacher.id='".$record['teacher_id']."'";
            $resultforattendance = mysqli_query($conn,$sqlforattendance);
            $attendance = mysqli_fetch_array($resultforattendance);
            $present = $attendance['AttendanceCount']; //Also have to counnt total no of attendance
            $absent = (32 - $present);
      ?>
                  <tr>
                    <th colspan="12" class="pt-2 pb-2"><?php echo $record['course_name']; ?></th>
                  </tr>
                  <tr class="bg-color">
                    <td class="text-center round-left">100</td>
                    <td class="text-center"><?php if (isset($mid)) { echo $mid; } ?></td>
                    <td class="text-center"><?php if (isset($final)) { echo $final; } ?></td>
                    <td class="text-center"><?php if (isset($sessional)) { echo $sessional; } ?></td>
                    <td></td>
                    <td class="text-center"><?php echo $present; ?></td>
                    <td class="text-center round-right"><?php echo $absent; ?></td>
                  </tr>
      <?php      
          }
        }
      ?>
                  <!-- <tr>
                    <th colspan="12" class="pt-3 pb-2">Subject Name 2:</th>
                  </tr>
                  <tr class="bg-color">
                    <td class="text-center round-left">100</td>
                    <td class="text-center">40</td>
                    <td class="text-center">35</td>
                    <td class="text-center">25</td>
                    <td class="text-center">5</td>
                    <td class="text-center">5</td>
                    <td class="text-center">5</td>
                    <td class="text-center">5</td>
                    <td></td>
                    <td class="text-center">32</td>
                    <td class="text-center">32</td>
                    <td class="text-center round-right">32</td>
                  </tr>
                  <tr>
                    <th colspan="12" class="pt-3 pb-2">Subject Name 3:</th>
                  </tr>
                  <tr class="bg-color">
                    <td class="text-center round-left">100</td>
                    <td class="text-center">40</td>
                    <td class="text-center">35</td>
                    <td class="text-center">25</td>
                    <td class="text-center">5</td>
                    <td class="text-center">5</td>
                    <td class="text-center">5</td>
                    <td class="text-center">5</td>
                    <td></td>
                    <td class="text-center">32</td>
                    <td class="text-center">32</td>
                    <td class="text-center round-right">32</td>
                  </tr> -->
                </tbody>
              </table>
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>

</body>
</html>