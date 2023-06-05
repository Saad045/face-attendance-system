<?php
  session_start();
  include '../includes/teacherHeader.php';

  $success = $_SESSION['success'] ?? '';
  $error = $_SESSION['error'] ?? '';
  unset($_SESSION['success']);
  unset($_SESSION['error']);
  
  $timetable_id = $_GET['timetable_id'];
  $course_id = $_GET['course_id'];
  $sqlforcourse = "SELECT * FROM course WHERE id=$course_id";
  $resultforcourse = mysqli_query($conn,$sqlforcourse);
  if (mysqli_num_rows($resultforcourse) > 0) {
    $course = mysqli_fetch_array($resultforcourse);
  }

  $student_id = $_GET['student_id'];
  $sqlforstudent = "SELECT * FROM student WHERE id=$student_id";
  $resultforstudent = mysqli_query($conn,$sqlforstudent);
  if (mysqli_num_rows($resultforstudent) > 0) {
    $student = mysqli_fetch_array($resultforstudent);
  }

  // We have to store timetable_id instead of course_id & teacher_id. If we need these attributes, we can access them through timetable_id
  if (isset($_POST['markAttendance'])) {
    date_default_timezone_set("Asia/Karachi");
    $curdate = date("Y-m-d");   // date("d M Y")
    $curtime = date("H:i");
    $curday = strtolower(date("l"));

    $sql = "SELECT slot.slot_time, time_table.day FROM student_timetable INNER JOIN time_table ON student_timetable.timetable_id = time_table.id INNER JOIN slot ON time_table.slot_id = slot.id WHERE student_timetable.student_id=$student_id && student_timetable.timetable_id=$timetable_id";
    $result = mysqli_query($conn,$sql);
    if (mysqli_num_rows($result) > 0) {
      $row = mysqli_fetch_array($result);
      $lecday = $row['day'];
      $lectime = explode('-', $row['slot_time']);
      $lecstarttime = reset($lectime);
      $lecendtime = end($lectime);

      if ($curday==$lecday && $curtime>=$lecstarttime && $curtime<=$lecendtime) {
        $sql = "SELECT * FROM attendance_sheet WHERE attendance_sheet.student_id=$student_id && attendance_sheet.course_id=$course_id && attendance_sheet.teacher_id=$teacher_id && attendance_sheet.date='".$curdate."'";
        $result = mysqli_query($conn,$sql);
        if (mysqli_num_rows($result) > 0) {
          $_SESSION['error'] = "Attendance is already marked against this student & course for today's lecture!";
          header("Location: studentData.php?student_id=$student_id&course_id=$course_id&teacher_id=$teacher_id&timetable_id=$timetable_id");
        } else {

          $attendance = $_POST['attendance'];
          $sql = "INSERT INTO attendance_sheet(id,student_id,course_id,teacher_id,date,attendance_status) VALUES (Null,'{$student_id}','{$course_id}','{$teacher_id}','{$curdate}','{$attendance}')";
          $result = mysqli_query($conn,$sql) or die("Query Unsuccessful.");

        }
        
      } else {

        $_SESSION['error'] = "Invalid lecture time/day!";
        header("Location: studentData.php?student_id=$student_id&course_id=$course_id&teacher_id=$teacher_id&timetable_id=$timetable_id");

      }

    } else {

      $_SESSION['error'] = "User is not enrolled for this lecture!";
      header("Location: studentData.php?student_id=$student_id&course_id=$course_id&teacher_id=$teacher_id&timetable_id=$timetable_id");
    }
    
  }

  if (isset($_POST['addMarks'])) {
    // $student_id = $_GET['student_id'];
    // $course_id = $_GET['course_id'];
    // $teacher_id = $_GET['teacher_id'];
    $mid = $_POST['mid'];
    $final = $_POST['final'];
    $sessional = $_POST['sessional'];

    $sql = "SELECT * FROM mark_sheet WHERE student_id=$student_id && course_id=$course_id && teacher_id=$teacher_id";
    $result = mysqli_query($conn, $sql) or die("Query Unsuccessful.");
    if (mysqli_num_rows($result) > 0) {
      $_SESSION['error'] = "Marks already added for this subject!";
      header("Location: studentData.php?student_id=$student_id&course_id=$course_id&teacher_id=$teacher_id&timetable_id=$timetable_id");
    } else {

      $sql = "INSERT INTO mark_sheet(id,student_id,course_id,teacher_id,mid,final,sessional) VALUES (Null,'{$student_id}','{$course_id}','{$teacher_id}','{$mid}','{$final}','{$sessional}')";
      $result = mysqli_query($conn, $sql) or die("Query Unsuccessful.");

    }
  }
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

                <div class="d-flex align-items-center py-3">
                  <div><img src="../admin/<?php echo $student['picture']; ?>" class="rounded" style="width: 8vw;height: auto;"></div><!-- 77*77 -->
                  <div class="p-3">
                    <h6 class="mb-0 pb-2"><?php echo $student['roll_no']; ?></h6>
                    <h5 class="mb-0"><?php echo $student['name']; ?></h5>
                  </div>
                </div>

                <div class="course p-3">
                  
                  <form method="post">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                       <h6 class="font-weight-bolder text-uppercase ">Mark Attendance</h6>
                    </div>
                    <div class="row justify-content-around align-items-center">
                      <div class="form-check-inline">
                        <label class="form-check-label" for="present">
                          <input type="radio" class="form-check-input" name="attendance" value="P" checked>Present
                        </label>
                      </div>

                      <div class="form-check-inline">
                        <label class="form-check-label" for="absent">
                          <input type="radio" class="form-check-input" name="attendance" value="A">Absent
                        </label>
                      </div>
                      <div class="clearfix"><button type="submit" class="btn btn-dark btn-sm float-right  " name="markAttendance"><i class="fas fa-user-check   mr-2"></i>Mark</button></div>

                    </div>
                    
                  </form>
                </div>

                <div>
                  <div class="mt-4 course p-3">
                  <form method="post">
                      <div class="d-flex justify-content-between align-items-center mb-3">
                        <h6 class="font-weight-bolder text-uppercase ">Marks</h6>
                        <button type="submit" class="btn btn-dark btn-sm float-right" name="addMarks"><i class="fas fa-user-plus  mr-2"></i>Add</button>
                      </div>
                      
                      <div class="form-row">
                        <div class="col-md-12">
                          <div class="form-group">
                            <input type="number" class="form-control" placeholder="Sessional marks (Max: 25)" name="sessional" max="25" required>
                          </div>
                        </div>
                      </div>
                      <div class="form-row">
                        <div class="col-md-6">
                          <div class="form-group">
                            <input type="number" class="form-control" placeholder="Mid-term marks (Max: 35)" name="mid" max="35" required>
                          </div>
                        </div>

                        <div class="col-md-6">
                          <div class="form-group">
                            <input type="number" class="form-control" placeholder="Final-term marks (Max: 40)" name="final" max="40" required>
                          </div>
                        </div>
                      </div>
                    </form>
                  </div>
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
                <div class="pb-3"></div>

                <div class="py-4">
                  <div class="d-flex justify-content-between align-items-center mb-4 mt-2">
                    <h5 class="mb-0 text-uppercase"><i class="fas fa-clipboard-user  mr-2"></i>Attendance</h5>
                  </div>
                <div class="course list p-3">
                        <?php
                      $sqlforattendance = "SELECT * FROM attendance_sheet WHERE attendance_sheet.student_id=$student_id && attendance_sheet.course_id=$course_id && attendance_sheet.teacher_id=$teacher_id ORDER BY attendance_sheet.date ASC";
                      $resultforattendance = mysqli_query($conn,$sqlforattendance);
                      if (mysqli_num_rows($resultforattendance) > 0) {
                        $lecture_no = 0;
                        foreach ($resultforattendance as $attendance) {
                          $lecture_no++;
                      ?>
                            <div class="d-flex justify-content-between bg-color rounded px-3 py-1 mb-2">
                              <div><h6 class="d-inline-block mb-0">Lecture <?php echo $lecture_no; ?>:</h6></div>

                              <div class="text-center">
                                <div class="custom-control custom-checkbox custom-control-inline">
                                  <input type="checkbox" class="custom-control-input" <?php if ($attendance['attendance_status']=='P') {echo "checked";}else{ echo "disabled";} ?>>
                                  <label class="custom-control-label">Present</label>
                                </div>

                                <div class="custom-control custom-checkbox custom-control-inline">
                                  <input type="checkbox" class="custom-control-input" <?php if ($attendance['attendance_status']=='A') {echo "checked";}else{ echo "disabled";} ?>>
                                  <label class="custom-control-label">Absent</label>
                                </div>
                              </div>

                              <div><h6 class="d-inline-block mb-0"><?php echo $attendance['date']; ?></h6></div>
                              <div>
                                <a href="editattendance.php?student_id=<?php echo $student_id ?>&course_id=<?php echo $course_id ?>&teacher_id=<?php echo $teacher_id ?>&timetable_id=<?php echo $timetable_id ?>&attendance_id=<?php echo $attendance['id']; ?>" class="btn btn-sm"><i class="fas fa-edit"></i></a>

                                <a href="deleteattendance.php?student_id=<?php echo $student_id ?>&course_id=<?php echo $course_id ?>&teacher_id=<?php echo $teacher_id ?>&timetable_id=<?php echo $timetable_id ?>&attendance_id=<?php echo $attendance['id']; ?>" class="btn btn-sm" onclick="return checkdelete()"><i class="fas fa-trash"></i></a>
                              </div>
                            </div>
                      <?php
                        }
                      }
                      ?>
                </div>
             
    </div>

  <?php
  $sqlformarks = "SELECT * FROM mark_sheet WHERE student_id=$student_id && course_id=$course_id && teacher_id=$teacher_id";
  $resultformarks = mysqli_query($conn, $sqlformarks) or die("Query Unsuccessful.");
  if (mysqli_num_rows($resultformarks) > 0) {
    $marks = mysqli_fetch_array($resultformarks);
    $marks_id = $marks['id'];
    $mid = $marks['mid'];
    $final = $marks['final'];
    $sessional = $marks['sessional'];
  ?>
                <div class="bg-color rounded p-4 my-3">
                  <div class="d-flex justify-content-between align-items-center mb-3">
                    <h5 class="mb-0 text-uppercase"><i class="fas fa-trophy  mr-2"></i>Marks</h5>
                    <div>
                      <a href="editmarks.php?student_id=<?php echo $student_id ?>&course_id=<?php echo $course_id ?>&teacher_id=<?php echo $teacher_id ?>&timetable_id=<?php echo $timetable_id ?>&marks_id=<?php echo $marks_id ?>" class="btn btn-sm px-2"><i class="fas fa-edit"></i></a>

                      <a href="deletemarks.php?student_id=<?php echo $student_id ?>&course_id=<?php echo $course_id ?>&teacher_id=<?php echo $teacher_id ?>&timetable_id=<?php echo $timetable_id ?>&marks_id=<?php echo $marks_id ?>" class="btn btn-sm px-2" onclick="return checkdelete()"><i class="fas fa-trash"></i></a>
                    </div>
                  </div>
  
                  <div class="d-flex justify-content-between text-center">
                    <div class="d-flex flex-column">
                      <h6>Total</h6>
                      <h6>100</h6>
                    </div>

                    <div class="d-flex flex-column">
                      <h6>Mid</h6>
                      <h6><?php if (!empty($mid)) {echo $mid;} else {echo "0";} ?></h6>
                    </div>

                    <div class="d-flex flex-column">
                      <h6>Final</h6>
                      <h6><?php if (!empty($final)) {echo $final;} else {echo "0";} ?></h6>
                    </div>

                    <div class="d-flex flex-column">
                      <h6>Sessional</h6>
                      <h6><?php if (!empty($sessional)) {echo $sessional;} else {echo "0";} ?></h6>
                    </div>
                  </div>
                </div>
  <?php } ?>
                
              </div>
            </div>
          </div>
        </div>
             
      </div>
    </div>
  </div>

  <!-- Modal For Updating Marks -->
  <div class="modal fade" id="updateMarksModal">
    <div class="modal-dialog modal-width my-5">
      <div class="modal-content p-3">
      
        <div class="modal-header border-0 px-3 py-2">
          <h5 class="modal-title font-weight-bolder">Update Marks</h5>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <div class="modal-body my-2 pt-1 pb-0">
          <form method="post" id="updatemarks_form" name="update_marks">
            <div class="form-row">
              <div class="col-md-6">
                <div class="form-group">
                    <label for="mid"><h6>Mid</h6></label>
                    <input type="number" class="form-control" name="mid">
                </div>
              </div>

              <div class="col-md-6">
                <div class="form-group">
                  <label for="final"><h6>Final</h6></label>
                  <input type="number" class="form-control" name="final">
                </div>
              </div>
            </div>
              
            <div class="form-row">
              <div class="col-md-12">
                <label for="">Sessional</label>
                <input type="number" class="form-control" name="sessional">
              </div>
            </div>
          </form>
        </div>
        
        <div class="modal-footer border-0">
          <button type="submit" class="btn btn-primary px-4" form="updatemarks_form" name="">Update</button>
        </div>
        
      </div>
    </div>
  </div> <!-- The Modal -->

  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.1/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>

  <script>
    function checkdelete() {
      return confirm('Are you sure you want to delete this record permanently?');
    }
  </script>
</body>
</html>



<!-- Modal For Updating Marks -->
  <!-- <div class="modal fade" id="updateMarks">
    <div class="modal-dialog modal-width my-5">
      <div class="modal-content p-3">
      
        <div class="modal-header border-0 px-3 py-2">
          <h5 class="modal-title font-weight-bolder">Update Marks</h5>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <div class="modal-body pt-1 pb-0">
          <div class="my-2">
            <form method="post" action="#">
              <div class="row">
                <div class="col-md-6">
                  <div class="d-flex justify-content-between border rounded-lg px-3">
                    <h6 class="mb-0">
                      <label class="text-center mt-2 mb-0 hw" for="final">Final</label>
                    </h6>
                    <h6 class="mb-0">
                      <input type="number" class="border-0 text-center mt-1 hw" id="final" placeholder="40" name="final">
                    </h6>
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="d-flex justify-content-between border rounded-lg px-3">
                    <h6 class="mb-0">
                      <label class="text-center mt-2 mb-0 hw" for="mid">Mid</label>
                    </h6>
                    <h6 class="mb-0">
                      <input type="number" class="border-0 text-center mt-1 hw" id="mid" placeholder="35" name="mid">
                    </h6>
                  </div>
                </div>
              </div>

              <div>
                <h6 class="mt-4"><b>Sessional</b></h6>
                <div class="row mb-3">
                  <div class="col-md-6">
                    <div class="d-flex justify-content-between border rounded-lg px-3">
                      <h6 class="mb-0">
                        <label class="text-center mt-2 mb-0 hw" for="quiz1">Quiz 1</label>
                      </h6>
                      <h6 class="mb-0">
                        <input type="number" class="border-0 text-center mt-1 hw" id="quiz1" placeholder="5" name="quiz1">
                      </h6>
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="d-flex justify-content-between border rounded-lg px-3">
                      <h6 class="mb-0">
                        <label class="text-center mt-2 mb-0 hw" for="quiz2">Quiz 2</label>
                      </h6>
                      <h6 class="mb-0">
                        <input type="number" class="border-0 text-center mt-1 hw" id="quiz2" placeholder="5" name="quiz2">
                      </h6>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-6">
                    <div class="d-flex justify-content-between border rounded-lg px-3">
                      <h6 class="mb-0">
                        <label class="text-center mt-2 mb-0 hw" for="assignment1">Assign 1</label>
                      </h6>
                      <h6 class="mb-0">
                        <input type="number" class="border-0 text-center mt-1 hw" id="assignment1" placeholder="5" name="assignment1">
                      </h6>
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="d-flex justify-content-between border rounded-lg px-3">
                      <h6 class="mb-0">
                        <label class="text-center mt-2 mb-0 hw" for="assignment2">Assign 2</label>
                      </h6>
                      <h6 class="mb-0">
                        <input type="number" class="border-0 text-center mt-1 hw" id="assignment2" placeholder="5" name="assignment2">
                      </h6>
                    </div>
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
        
        <div class="modal-footer border-0">
          <button type="submit" class="btn btn-primary px-4">Update</button>
        </div>
        
      </div>
    </div>
  </div> --> <!-- The Modal -->

  <!-- Modal For Adding Marks -->
  <!-- <div class="modal fade" id="addMarks">
    <div class="modal-dialog modal-width my-5">
      <div class="modal-content p-3">
      
        <div class="modal-header border-0 px-3 py-2">
          <h5 class="modal-title font-weight-bolder">Add Marks</h5>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <div class="modal-body pt-1 pb-0">
          <div class="my-2">
            <form method="post" action="#">
              <div class="row">
                <div class="col-md-6">
                  <div class="d-flex justify-content-between border rounded-lg px-3">
                    <h6 class="mb-0">
                      <label class="text-center mt-2 mb-0 hw" for="final">Final</label>
                    </h6>
                    <h6 class="mb-0">
                      <input type="number" class="border-0 text-center mt-1 hw" id="final" placeholder="40" name="final">
                    </h6>
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="d-flex justify-content-between border rounded-lg px-3">
                    <h6 class="mb-0">
                      <label class="text-center mt-2 mb-0 hw" for="mid">Mid</label>
                    </h6>
                    <h6 class="mb-0">
                      <input type="number" class="border-0 text-center mt-1 hw" id="mid" placeholder="35" name="mid">
                    </h6>
                  </div>
                </div>
              </div>

              <div>
                <h6 class="mt-4"><b>Sessional</b></h6>
                <div class="row mb-3">
                  <div class="col-md-6">
                    <div class="d-flex justify-content-between border rounded-lg px-3">
                      <h6 class="mb-0">
                        <label class="text-center mt-2 mb-0 hw" for="quiz1">Quiz 1</label>
                      </h6>
                      <h6 class="mb-0">
                        <input type="number" class="border-0 text-center mt-1 hw" id="quiz1" placeholder="5" name="quiz1">
                      </h6>
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="d-flex justify-content-between border rounded-lg px-3">
                      <h6 class="mb-0">
                        <label class="text-center mt-2 mb-0 hw" for="quiz2">Quiz 2</label>
                      </h6>
                      <h6 class="mb-0">
                        <input type="number" class="border-0 text-center mt-1 hw" id="quiz2" placeholder="5" name="quiz2">
                      </h6>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-6">
                    <div class="d-flex justify-content-between border rounded-lg px-3">
                      <h6 class="mb-0">
                        <label class="text-center mt-2 mb-0 hw" for="assignment1">Assign 1</label>
                      </h6>
                      <h6 class="mb-0">
                        <input type="number" class="border-0 text-center mt-1 hw" id="assignment1" placeholder="5" name="assignment1">
                      </h6>
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="d-flex justify-content-between border rounded-lg px-3">
                      <h6 class="mb-0">
                        <label class="text-center mt-2 mb-0 hw" for="assignment2">Assign 2</label>
                      </h6>
                      <h6 class="mb-0">
                        <input type="number" class="border-0 text-center mt-1 hw" id="assignment2" placeholder="5" name="assignment2">
                      </h6>
                    </div>
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
        
        <div class="modal-footer border-0">
          <button type="submit" class="btn btn-primary px-4">Add</button>
        </div>
        
      </div>
    </div>
  </div> --> <!-- The Modal -->


<!-- <div class="bg-color rounded p-4">
  <h5>Attendance Record</h5>
  <div class="d-flex justify-content-between align-items-center">
    <div>
      <h6>Present</h6>
      <h6>Absent</h6>
      <h6>Leave</h6>
    </div>

    <div>
      <h6>32/32</h6>
      <h6>32/32</h6>
      <h6>32/32</h6>
    </div>

    <div class="pt-2">
      <canvas id="myChart" style="width:100%;max-width:600px;height: 104px;width: 208px;"></canvas>
    </div>
  </div>
</div> -->

<!-- <div class="my-5">
  <form method="post" action="#">
    <div class="row">
      <div class="col-md-6">
        <div class="d-flex justify-content-between border rounded-lg px-3">
          <h6 class="mb-0">
            <label class="text-center mt-2 mb-0 hw" for="final">Final</label>
          </h6>
          <h6 class="mb-0">
            <input type="number" class="border-0 text-center mt-1 hw" id="final" placeholder="40" name="final">
          </h6>
        </div>
      </div>

      <div class="col-md-6">
        <div class="d-flex justify-content-between border rounded-lg px-3">
          <h6 class="mb-0">
            <label class="text-center mt-2 mb-0 hw" for="mid">Mid</label>
          </h6>
          <h6 class="mb-0">
            <input type="number" class="border-0 text-center mt-1 hw" id="mid" placeholder="35" name="mid">
          </h6>
        </div>
      </div>
    </div>

    <div>
      <h6 class="mt-4"><b>Sessional</b></h6>
      <div class="row mb-3">
        <div class="col-md-6">
          <div class="d-flex justify-content-between border rounded-lg px-3">
            <h6 class="mb-0">
              <label class="text-center mt-2 mb-0 hw" for="quiz1">Quiz 1</label>
            </h6>
            <h6 class="mb-0">
              <input type="number" class="border-0 text-center mt-1 hw" id="quiz1" placeholder="5" name="quiz1">
            </h6>
          </div>
        </div>

        <div class="col-md-6">
          <div class="d-flex justify-content-between border rounded-lg px-3">
            <h6 class="mb-0">
              <label class="text-center mt-2 mb-0 hw" for="quiz2">Quiz 2</label>
            </h6>
            <h6 class="mb-0">
              <input type="number" class="border-0 text-center mt-1 hw" id="quiz2" placeholder="5" name="quiz2">
            </h6>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-md-6">
          <div class="d-flex justify-content-between border rounded-lg px-3">
            <h6 class="mb-0">
              <label class="text-center mt-2 mb-0 hw" for="assignment1">Assign 1</label>
            </h6>
            <h6 class="mb-0">
              <input type="number" class="border-0 text-center mt-1 hw" id="assignment1" placeholder="5" name="assignment1">
            </h6>
          </div>
        </div>

        <div class="col-md-6">
          <div class="d-flex justify-content-between border rounded-lg px-3">
            <h6 class="mb-0">
              <label class="text-center mt-2 mb-0 hw" for="assignment2">Assign 2</label>
            </h6>
            <h6 class="mb-0">
              <input type="number" class="border-0 text-center mt-1 hw" id="assignment2" placeholder="5" name="assignment2">
            </h6>
          </div>
        </div>
      </div>
    </div>
  </form>
</div> -->