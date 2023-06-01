<?php
  include '../includes/studentHeader.php';
  require '../vendor/autoload.php';
?>
<style>
  .my-border{
    border-bottom: 5px solid navy;
  }
</style>
<body>
  <div class="container border px-0" style="height:100vh">
    <div class="text-center my-border p-2">
      <img src="../admin/assets/images/pugc.png" alt="Institute Logo" class="img-fluid"/>
      <div>
        <h2>University Of The Punjab, Gujranwala Campus</h2>
        <h5>Near Ali Pur Chowk Rawalpindi Bypass Gujranwala, Pakistan</h5>
      </div>
    </div>

    <?php
    if (mysqli_num_rows($resultforstudent) > 0) {
    ?>
    <div class="px-4 py-3">
      <h3 class="text-center my-3">Semester Report</h3>
      <div class="d-flex justify-content-between">
        <div>
          <div><label>Roll No:&nbsp;&nbsp;</label><span class="font-weight-bold"><?php echo $student['roll_no']; ?></span></div>
          <div><label>Name:&nbsp;&nbsp;</label><span class="font-weight-bold"><?php echo $student['name']; ?></span></div>
          <div><label>Degree:&nbsp;&nbsp;</label><span class="font-weight-bold"><?php echo $student['degree'] ?></span></div>
        </div>

        <div>
          <div><label>Session:&nbsp;&nbsp;</label><span class="font-weight-bold"><?php echo $student['session'] ?></span></div>
          <div><label>Semester:&nbsp;&nbsp;</label><span class="font-weight-bold">7<sup>th</sup></span></div>
          <div><label>Shift:&nbsp;&nbsp;</label><span class="font-weight-bold text-capitalize"><?php echo $student['shift'] ?></span></div>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-md-12">
        <table class="table table-bordered">
          <thead class="thead-dark">
            <tr>
              <th rowspan="2" class="text-center align-middle">Sr.</th>
              <th rowspan="2" class="align-middle pl-3">Subjects</th>
              <th rowspan="2" class="align-middle text-center">Total <br>Marks</th>
              <th class="align-middle text-center" colspan="4">Marks Obtained</th>
              <th rowspan="2" class="align-middle text-center">Attendance</th>
            </tr>
            <tr>
              <th class="align-middle text-center">Mid</th>
              <th class="align-middle text-center">Final</th>
              <th class="align-middle text-center">Sessional</th>
              <th class="align-middle text-center">Total</th>
            </tr>
          </thead>
          <tbody>
  <?php
  $a = 0;
  $sqlforrecord = "SELECT student_timetable.id As id,student.id As student_id, student.name As student_name, student.roll_no, student.session, student.degree, student.shift, course.id As course_id, course.name As course_name, course.credit_hour, teacher.id As teacher_id, teacher.name As teacher_name, teacher.qualification FROM student_timetable INNER JOIN student ON student_timetable.student_id = student.id INNER JOIN time_table ON student_timetable.timetable_id = time_table.id INNER JOIN course ON time_table.course_id = course.id INNER JOIN slot ON time_table.slot_id = slot.id INNER JOIN teacher ON time_table.teacher_id = teacher.id WHERE student_timetable.student_id =$student_id GROUP BY course_name ORDER BY course_id ASC";
  $resultforrecord = mysqli_query($conn,$sqlforrecord);
  if (mysqli_num_rows($resultforrecord) > 0) {
    while ($record = mysqli_fetch_array($resultforrecord)) {
      $a++;

      $sqlformarks = "SELECT mark_sheet.id, mark_sheet.student_id, student.roll_no, student.name AS student_name, mark_sheet.course_id, course.name AS course_name, mark_sheet.mid, mark_sheet.final, mark_sheet.sessional FROM ((mark_sheet INNER JOIN student ON mark_sheet.student_id = student.id) INNER JOIN course ON mark_sheet.course_id = course.id) WHERE mark_sheet.student_id='".$record['student_id']."' && mark_sheet.course_id='".$record['course_id']."' && mark_sheet.teacher_id='".$record['teacher_id']."' ORDER BY mark_sheet.course_id ASC";
      $resultformarks = mysqli_query($conn,$sqlformarks);
      if (mysqli_num_rows($resultformarks) > 0) {
        $marks = mysqli_fetch_array($resultformarks);
        $mid = $marks['mid'];
        $final = $marks['final'];
        $sessional = $marks['sessional'];
        $totalmarks = $mid + $final + $sessional;
      }

      $sqlforpresent = "SELECT COUNT(attendance_sheet.id) AS AttendanceCount FROM attendance_sheet INNER JOIN student ON student.id = attendance_sheet.student_id INNER JOIN course ON course.id = attendance_sheet.course_id INNER JOIN teacher ON teacher.id = attendance_sheet.teacher_id WHERE attendance_sheet.attendance_status='P' && student.id='".$record['student_id']."' && course.id='".$record['course_id']."' && teacher.id='".$record['teacher_id']."'";
      $resultforpresent = mysqli_query($conn,$sqlforpresent);
      $presentAttendance = mysqli_fetch_array($resultforpresent);
      $present = $presentAttendance['AttendanceCount'];

      $sqlforabsent = "SELECT COUNT(attendance_sheet.id) AS AttendanceCount FROM attendance_sheet INNER JOIN student ON student.id = attendance_sheet.student_id INNER JOIN course ON course.id = attendance_sheet.course_id INNER JOIN teacher ON teacher.id = attendance_sheet.teacher_id WHERE attendance_sheet.attendance_status='A' && student.id='".$record['student_id']."' && course.id='".$record['course_id']."' && teacher.id='".$record['teacher_id']."'";
      $resultforabsent = mysqli_query($conn,$sqlforabsent);
      $absentAttendance = mysqli_fetch_array($resultforabsent);
      $absent = $absentAttendance['AttendanceCount'];

      $totalAttendance = ($present + $absent);
      if ($totalAttendance > 0) {
        $attendance = ($present/$totalAttendance) * 100;
      }
  ?>
            <tr>
              <td class="text-center"><?php echo $a; ?></td>
              <td class="pl-3"><?php echo $record['course_name']; ?></td>
              <td class="text-center">100</td>
              <td class="text-center"><?php if (isset($mid)) {echo $mid;} ?></td>
              <td class="text-center"><?php if (isset($final)) {echo $final;} ?></td>
              <td class="text-center"><?php if (isset($sessional)) {echo $sessional;} ?></td>
              <td class="text-center"><?php if (isset($totalmarks)) {echo $totalmarks;} ?></td>
              <td class="text-center"><?php if (isset($attendance)) {echo $attendance."%";} ?></td>
            </tr>
  <?php
    }
  }
  ?>
            <!-- <tr>
              <td class="text-center">2</td>
              <td class="pl-3">Physics</td>
              <td class="text-center">100</td>
              <td class="text-center">30</td>
              <td class="text-center">38</td>
              <td class="text-center">23</td>
              <td class="text-center">87</td>
              <td class="text-center">90%</td>
            </tr>
            <tr>
              <td class="text-center">3</td>
              <td class="pl-3">Chemistry</td>
              <td class="text-center">100</td>
              <td class="text-center">30</td>
              <td class="text-center">38</td>
              <td class="text-center">23</td>
              <td class="text-center">87</td>
              <td class="text-center">80%</td>
            </tr> -->
            <!-- Add more subjects and their marks and attendance details here -->
          </tbody>
        </table>
      </div>
    </div>
    <?php } ?>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.1/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
