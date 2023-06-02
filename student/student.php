<?php
  include '../includes/studentHeader.php';
?>
<body>
  
  <div class="container-fluid">
    <div class="subject_wrapper">
      <div class="row">
        <?php include '../includes/studentSidebar.php'; ?>
        
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

          <div class="row px-5 my-4">
            <div class="col-md-9">
              <div class="">
                <a href="viewreport.php?student_id=<?php echo $student_id; ?>" class="btn btn-primary">View Report</a>
                <a href="studentreport.php?student_id=<?php echo $student_id; ?>" class="btn btn-primary">Download Report</a>
              </div>

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

            $sqlformarks = "SELECT mark_sheet.id, mark_sheet.student_id, student.roll_no, student.name AS student_name, mark_sheet.course_id, course.name AS course_name, mark_sheet.mid, mark_sheet.final, mark_sheet.sessional FROM ((mark_sheet INNER JOIN student ON mark_sheet.student_id = student.id) INNER JOIN course ON mark_sheet.course_id = course.id) WHERE mark_sheet.student_id='".$record['student_id']."' && mark_sheet.course_id='".$record['course_id']."' ORDER BY mark_sheet.id ASC";
            $resultformarks = mysqli_query($conn,$sqlformarks);
            if (mysqli_num_rows($resultformarks) > 0) {
              $marks = mysqli_fetch_array($resultformarks);
              $mid = $marks['mid'];
              $final = $marks['final'];
              $sessional = $marks['sessional'];
            }
            

            $sqlforpresent = "SELECT COUNT(attendance_sheet.id) AS AttendanceCount FROM attendance_sheet INNER JOIN student ON student.id = attendance_sheet.student_id INNER JOIN course ON course.id = attendance_sheet.course_id INNER JOIN teacher ON teacher.id = attendance_sheet.teacher_id WHERE attendance_sheet.attendance_status='P' && student.id='".$record['student_id']."' && course.id='".$record['course_id']."' && teacher.id='".$record['teacher_id']."'";
            $resultforpresent = mysqli_query($conn,$sqlforpresent);
            $presentAttendance = mysqli_fetch_array($resultforpresent);
            $present = $presentAttendance['AttendanceCount']; //Also have to counnt total no of attendance

            $sqlforabsent = "SELECT COUNT(attendance_sheet.id) AS AttendanceCount FROM attendance_sheet INNER JOIN student ON student.id = attendance_sheet.student_id INNER JOIN course ON course.id = attendance_sheet.course_id INNER JOIN teacher ON teacher.id = attendance_sheet.teacher_id WHERE attendance_sheet.attendance_status='A' && student.id='".$record['student_id']."' && course.id='".$record['course_id']."' && teacher.id='".$record['teacher_id']."'";
            $resultforabsent = mysqli_query($conn,$sqlforabsent);
            $absentAttendance = mysqli_fetch_array($resultforabsent);
            $absent = $absentAttendance['AttendanceCount'];

            $totalAttendance = ($present + $absent);
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