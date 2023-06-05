<?php
  session_start();
  include '../includes/teacherHeader.php';

  $success = $_SESSION['success'] ?? '';
  $error = $_SESSION['error'] ?? '';
  unset($_SESSION['success']);
  unset($_SESSION['error']);
  // We have to prevent a student from adding him to a timetable for more than one time.

  $course_id = $_GET['course_id'];
  $sqlforcourse = "SELECT * FROM course WHERE id=$course_id";
  $resultforcourse = mysqli_query($conn,$sqlforcourse);
  if (mysqli_num_rows($resultforcourse) > 0) {
    $course = mysqli_fetch_array($resultforcourse);
  }

  $timetable_id = $_GET['timetable_id'];
  $sqlforclass = "SELECT student_timetable.id, student.id AS student_id, student.roll_no, student.name AS student_name FROM student_timetable INNER JOIN student ON student_timetable.student_id = student.id WHERE student_timetable.timetable_id=$timetable_id GROUP BY student_id ORDER BY roll_no ASC";
  $resultforclass = mysqli_query($conn,$sqlforclass);
?>
<body>
  <div class="container-fluid">
    <div class="subject_wrapper">
      <div class="row">
        <?php include '../includes/teacherSidebar.php'; ?>
        
        <div class="col-md-10">
          <div class="row">
          
            <div class="col-md-6">
              <div class="px-4">
                <div class="d-flex justify-content-between align-items-center">
                  <h5 class="font-weight-bold text-uppercase my-4 py-1"><i class="fas fa-book   mr-2"></i><?php echo $course['name']; ?></h5>
                  
                  <button  id="sidebar-toggle" onclick="toggleSidebar()" class=" btn btn-outline-dark  btn-sm  float-right" >
                      <i class="fas fa-chevron-right   mr-1"></i>
                  </button>

                </div>
              </div>
            </div>

            <div class="col-md-6">
              <div class="px-4 my-4">
                <div class="alert alert-success alert-dismissible <?php echo !empty($success) ? 'd-block' : 'd-none'; ?>">
                  <button type="button" class="close" data-dismiss="alert">&times;</button>
                  <?php echo $success; ?>
                </div>
                <div class="alert alert-danger alert-dismissible <?php echo !empty($error) ? 'd-block' : 'd-none'; ?>">
                  <button type="button" class="close" data-dismiss="alert">&times;</button>
                  <?php echo $error; ?>
                </div>
              </div>
            </div>
          </div>

          <div class="d-flex justify-content-between px-4 mt-4">
            <div>
              <a href="attendance.php?teacher_id=<?php echo $teacher_id; ?>&course_id=<?php echo $course_id; ?>&timetable_id=<?php echo $timetable_id; ?>" class="btn btn-dark btn-sm"><i class="fas fa-user-check   mr-2"></i>Mark Attendance</a>
              <a href="marks.php?teacher_id=<?php echo $teacher_id; ?>&course_id=<?php echo $course_id; ?>&timetable_id=<?php echo $timetable_id; ?>" class="btn btn-dark btn-sm"><i class="fas fa-user-plus   mr-2"></i>Add Marks</a>
            </div>
            <!-- <div>
              <button type="" class="btn btn-dark btn-sm px-3">Date</button>
              <button type="" class="btn btn-dark btn-sm px-3">All</button>
              <button type="" class="btn btn-dark btn-sm px-3">Present</button>
              <button type="" class="btn btn-dark btn-sm px-3">Absent</button>
              <button type="" class="btn btn-dark btn-sm px-3">Leave</button>
            </div> -->
              <div>
                <a href="viewreport.php?teacher_id=<?php echo $teacher_id; ?>&course_id=<?php echo $course_id; ?>&timetable_id=<?php echo $timetable_id; ?>" class="btn btn-dark btn-sm"><i class="fas fa-download   mr-2"></i>Download Report</a>
              </div>
          </div>

          <div class="row justify-content-around my-2 px-4">
            <div class="col-md-12 ">
              <div class="course list p-3 mt-3">
              <table class="table table-borderless table-sm">
                <thead>
                  <tr class="my-border">
                    <th class="text-center  pt-4 pb-1">Roll Number</th>
                    <th class="text-center pt-4 pb-1">Name</th>
                    <th class="px-2"></th>

                    <th class="text-center pt-4 pb-1">Lectures</th>
                    <th class="text-center pt-4 pb-1">Present</th>
                    <th class="text-center pt-4 pb-1">Absent</th>
                    <td class="px-2"></td>

                    <th class="text-center pt-4 pb-1">Marks</th>
                    <th class="text-center pt-4 pb-1">Mid</th>
                    <th class="text-center pt-4 pb-1">Final</th>
                    <th class="text-center pt-4 pb-1">Sessional</th>
                  </tr>
                </thead>
                <tbody>
                  
                  <?php
                  foreach ($resultforclass as $class) {
                    $student_id = $class['student_id'];
                    $sqlformarks = "SELECT mark_sheet.id, mark_sheet.mid, mark_sheet.final, mark_sheet.sessional FROM mark_sheet WHERE mark_sheet.student_id=$student_id && mark_sheet.course_id=$course_id && mark_sheet.teacher_id=$teacher_id";
                    $resultformarks = mysqli_query($conn,$sqlformarks);
                    $marks = mysqli_fetch_array($resultformarks);

                    $sqlforpresent = "SELECT COUNT(attendance_sheet.id) AS AttendanceCount FROM attendance_sheet WHERE attendance_sheet.attendance_status='P' && attendance_sheet.student_id=$student_id && attendance_sheet.course_id=$course_id && attendance_sheet.teacher_id=$teacher_id";
                    $resultforpresent = mysqli_query($conn,$sqlforpresent);
                    $presentAttendance = mysqli_fetch_array($resultforpresent);
                    $present = $presentAttendance['AttendanceCount'];

                    $sqlforabsent = "SELECT COUNT(attendance_sheet.id) AS AttendanceCount FROM attendance_sheet WHERE attendance_sheet.attendance_status='A' && attendance_sheet.student_id=$student_id && attendance_sheet.course_id=$course_id && attendance_sheet.teacher_id=$teacher_id";
                    $resultforabsent = mysqli_query($conn,$sqlforabsent);
                    $absentAttendance = mysqli_fetch_array($resultforabsent);
                    $absent = $absentAttendance['AttendanceCount'];

                    $totalAttendance = ($present + $absent);
                  ?>
                  <tr><td colspan="9" class="py-2"></td></tr>
                  <!-- Onclick event on row to mark attendance & add marks for single student -->
                  <tr class="row-color" onclick="window.location='studentData.php?student_id=<?php echo $student_id; ?>&teacher_id=<?php echo $teacher_id; ?>&course_id=<?php echo $course_id; ?>&timetable_id=<?php echo $timetable_id; ?>'">
                    <!-- <a href="studentData.php"></a> -->
                    <td class="text-center font-weight-bold round-left "><?php echo $class['roll_no']; ?></td>
                    <td class="text-center"><?php echo $class['student_name']; ?></td>
                    <td></td>

                    <td class="text-center"><?php echo $totalAttendance; ?></td>
                    <td class="text-center"><?php echo $present; ?></td>
                    <td class="text-center"><?php echo $absent; ?></td>
                    <!-- <td class="text-center">
                      <div class="custom-control custom-checkbox custom-control-inline mr-0 ml-2">
                        <input type="checkbox" class="custom-control-input" id="present1" name="attendance">
                        <label class="custom-control-label" for="present1"></label>
                      </div>
                    </td>
                    <td class="text-center">
                      <div class="custom-control custom-checkbox custom-control-inline mr-0 ml-2">
                        <input type="checkbox" class="custom-control-input" id="absent1" name="attendance">
                        <label class="custom-control-label" for="absent1"></label>
                      </div>
                    </td> -->
                    <td></td>

                    <td class="text-center">100</td>
                    <td class="text-center"><?php if (!empty($marks['mid'])) {echo $marks['mid'];} else {echo "0";} ?></td>
                    <td class="text-center"><?php if (!empty($marks['final'])) {echo $marks['final'];} else {echo "0";} ?></td>
                    <td class="text-center round-right"><?php if (!empty($marks['sessional'])) {echo $marks['sessional'];} else {echo "0";} ?></td>
                  </tr>
                  <?php } ?>

                  <!-- <tr><td colspan="13" class="py-1"></td></tr>
                  <tr class="row-color">
                    <td class="text-center round-left">BCS19-002</td>
                    <td class="text-center">Name</td>
                    <td class="px-4"></td>

                    <td class="text-center">
                      <div class="custom-control custom-checkbox custom-control-inline mr-0 ml-2">
                        <input type="checkbox" class="custom-control-input" id="present2" name="attendance">
                        <label class="custom-control-label" for="present2"></label>
                      </div>
                    </td>
                    <td class="text-center">
                      <div class="custom-control custom-checkbox custom-control-inline mr-0 ml-2">
                        <input type="checkbox" class="custom-control-input" id="absent2" name="attendance">
                        <label class="custom-control-label" for="absent2"></label>
                      </div>
                    </td>
                    <td class="text-center">
                      <div class="custom-control custom-checkbox custom-control-inline mr-0 ml-2">
                        <input type="checkbox" class="custom-control-input" id="leave2" name="attendance">
                        <label class="custom-control-label" for="leave2"></label>
                      </div>
                    </td>
                    <td class="px-2"></td>
                    
                    <td class="text-center">100</td>
                    <td class="text-center">40</td>
                    <td class="text-center">35</td>
                    <td class="text-center">25</td>
                    <td class="text-center">5</td>
                    <td class="text-center">5</td>
                    <td class="text-center">5</td>
                    <td class="text-center round-right">5</td>
                  </tr> -->
                </tbody>
              </table>
              </div>
              
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.1/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>