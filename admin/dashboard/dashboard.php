<?php
session_start();
include '../includes/header.php';
include '../includes/config.php';

$alertMessage = $_SESSION['alertMessage'] ?? '';
unset($_SESSION['alertMessage']);

// Check if the admin is logged in
// if (!isset($_SESSION['admin_login']) || $_SESSION['admin_login'] !== TRUE) {
//   $_SESSION['error'] = "Login required!";
//   header("Location: signin.php");
//   exit();
// }

// Fetch the count of slots from the database
$sql = "SELECT COUNT(*) AS slot_count FROM slot";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$slot_count = $row['slot_count'];

// Fetch the count of courses from the database
$sql = "SELECT COUNT(*) AS course_count FROM course";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$course_count = $row['course_count'];

// Fetch the count of students from the database
$sql = "SELECT COUNT(*) AS student_count FROM student";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$student_count = $row['student_count'];

// Fetch the count of teachers from the database
$sql = "SELECT COUNT(*) AS teacher_count FROM teacher";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$teacher_count = $row['teacher_count'];

// Fetch the count of timetable from the database
$sql = "SELECT COUNT(*) AS timetable_count FROM time_table";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$timetable_count = $row['timetable_count'];

// Fetch the count of student_timetable from the database
$sql = "SELECT COUNT(*) AS student_timetable_count FROM student_timetable";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$student_timetable_count = $row['student_timetable_count'];

// Fetch the count of attendance from the database
$sql = "SELECT COUNT(*) AS attendance_count FROM attendance_sheet";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$attendance_count = $row['attendance_count'];

// Fetch the count of mark_sheet from the database
$sql = "SELECT COUNT(*) AS mark_sheet_count FROM mark_sheet";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$mark_sheet_count = $row['mark_sheet_count'];

// Fetch the count of QR codes from the database
$sql = "SELECT COUNT(*) AS qr_code_count FROM student";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$qr_code_count = $row['qr_code_count'];

mysqli_close($conn);
?>

<style>
  .card-title {
    font-size: 24px;
    font-weight: bold;
    margin-bottom: 20px;
  }

  .card-body {
    padding: 20px;
  }

  .btn-lg {
    padding: 15px;
    font-size: 18px;
  }

  .bgcolor {
    background-color: #f8f9fa;
  }

  .py-0 {
    padding-top: 0;
    padding-bottom: 0;
  }

  .pt-2 {
    padding-top: 20px;
  }

  hr {
    margin-top: 30px;
    margin-bottom: 30px;
  }
</style>


<body>
  <div class="container-fluid">
    <div class="row">
      <?php include '../includes/sideBar.php'; ?>

      <div class="col-md-10">
        <div class="row">
          <div class="col-md-6">
            <div class="px-4">
              <h3 class="font-weight-bold my-4 pb-2">
                DASHBOARD
              </h3>
            </div>
          </div>
          <div class="col-md-6">
            <div class="px-4">
              <a href="../logout.php" class=" btn btn-dark btn-sm text-white  float-right my-4 "> <i class="fas fa-sign-out-alt text-white mr-1"></i> Log Out </a>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-md-12 p-4 ">
            <div class="course p-3">
              <!-- Your dashboard content goes here -->
              <div class="row justify-content-center pt-2">
                <div class="col-md-4">
                  <a href="../slot/slot.php?admin_id=<?php echo $_SESSION['admin_id']; ?>" class="text-reset">
                    <div class="card  px-5 py-4 m-2">
                      <div class="d-flex justify-content-between align-items-center">
                        <div>
                          <h3>
                            <?php echo $slot_count; ?>
                          </h3>
                          <h5 class="left-box ">Slots</h5>

                        </div>

                        <div class="right-box">
                          <i class="fas fa-4x fa-calendar-day "></i>
                          <!-- style="color: white; background-color: black; border-radius: 50%; padding: 10px;"></i> -->
                        </div>
                      </div>
                    </div>
                  </a>
                </div>

                <div class="col-md-4">
                  <a href="../course/course.php?admin_id=<?php echo $_SESSION['admin_id']; ?>" class="text-reset">
                    <div class="card  px-5 py-4 m-2">
                      <div class="d-flex justify-content-between align-items-center">
                        <div>
                          <h3>
                            <?php echo $course_count; ?>
                          </h3>
                          <h5 class="left-box ">Courses</h5>

                        </div>

                        <div class="right-box">
                          <i class="fas fa-4x fa-book "></i>
                          <!-- style="color: white; background-color: black; border-radius: 50%; padding: 10px;"></i> -->
                        </div>
                      </div>
                    </div>
                  </a>
                </div>

                <div class="col-md-4">
                  <a href="../student/student.php?admin_id=<?php echo $_SESSION['admin_id']; ?>" class="text-reset">
                    <div class="card  px-5 py-4 m-2">
                      <div class="d-flex justify-content-between align-items-center">
                        <div>
                          <h3>
                            <?php echo $student_count; ?>
                          </h3>
                          <h5 class="left-box ">Students</h5>

                        </div>

                        <div class="right-box">
                          <i class="fas fa-4x fa-user-graduate  "></i>
                          <!-- style="color: white; background-color: black; border-radius: 50%; padding: 10px;"></i> -->
                        </div>
                      </div>
                    </div>
                  </a>
                </div>

                <div class="col-md-4">
                  <a href="../teacher/teacher.php?admin_id=<?php echo $_SESSION['admin_id']; ?>" class="text-reset">
                    <div class="card  px-5 py-4 m-2">
                      <div class="d-flex justify-content-between align-items-center">
                        <div>
                          <h3>
                            <?php echo $teacher_count; ?>
                          </h3>
                          <h5 class="left-box ">Teachers</h5>

                        </div>

                        <div class="right-box">
                          <i class="fas fa-4x fa-chalkboard-teacher "></i>
                          <!-- style="color: white; background-color: black; border-radius: 50%; padding: 10px;"></i> -->
                        </div>
                      </div>
                    </div>
                  </a>
                </div>

                <div class="col-md-4">
                  <a href="../timeTable/timeTable.php?admin_id=<?php echo $_SESSION['admin_id']; ?>"
                    class="text-reset">
                    <div class="card  px-5 py-4 m-2">
                      <div class="d-flex justify-content-between align-items-center">
                        <div>
                          <h3>
                            <?php echo $timetable_count; ?>
                          </h3>
                          <h5 class="left-box ">Teacher Timetable</h5>

                        </div>

                        <div class="right-box">
                          <i class="fas fa-4x fa-user-clock "></i>
                          <!-- style="color: white; background-color: black; border-radius: 50%; padding: 10px;"></i> -->
                        </div>
                      </div>
                    </div>
                  </a>
                </div>

                <div class="col-md-4">
                  <a href="../student_timetable/student_timetable.php?admin_id=<?php echo $_SESSION['admin_id']; ?>"
                    class="text-reset">
                    <div class="card  px-5 py-4 m-2">
                      <div class="d-flex justify-content-between align-items-center">
                        <div>
                          <h3>
                            <?php echo $student_timetable_count; ?>
                          </h3>
                          <h5 class="left-box ">Student Timetable</h5>

                        </div>

                        <div class="right-box">
                          <i class="fas fa-4x fa-calendar-alt "></i>
                          <!-- style="color: white; background-color: black; border-radius: 50%; padding: 10px;"></i> -->
                        </div>
                      </div>
                    </div>
                  </a>
                </div>

                <div class="col-md-4">
                  <a href="../attendance_sheet/attendance_sheet.php?admin_id=<?php echo $_SESSION['admin_id']; ?>"
                    class="text-reset">
                    <div class="card  px-5 py-4 m-2">
                      <div class="d-flex justify-content-between align-items-center">
                        <div>
                          <h3>
                            <?php echo $attendance_count; ?>
                          </h3>
                          <h5 class="left-box ">Attendance Sheet</h5>

                        </div>

                        <div class="right-box">
                          <i class="fas fa-4x fa-clipboard-list "></i>
                          <!-- style="color: white; background-color: black; border-radius: 50%; padding: 10px;"></i> -->
                        </div>
                      </div>
                    </div>
                  </a>
                </div>

                <div class="col-md-4">
                  <a href="../mark_sheet/mark_sheet.php?admin_id=<?php echo $_SESSION['admin_id']; ?>"
                    class="text-reset">
                    <div class="card  px-5 py-4 m-2">
                      <div class="d-flex justify-content-between align-items-center">
                        <div>
                          <h3>
                            <?php echo $mark_sheet_count; ?>
                          </h3>
                          <h5 class="left-box ">Mark Sheet</h5>

                        </div>

                        <div class="right-box">
                          <i class="fas fa-4x fa-file-alt "></i>
                          <!-- style="color: white; background-color: black; border-radius: 50%; padding: 10px;"></i> -->
                        </div>
                      </div>
                    </div>
                  </a>
                </div>

                <div class="col-md-4">
                  <a href="../student/qrgrid.php?admin_id=<?php echo $_SESSION['admin_id']; ?>" class="text-reset">
                    <div class="card  px-5 py-4 m-2">
                      <div class="d-flex justify-content-between align-items-center">
                        <div>
                          <h3>
                            <?php echo $qr_code_count; ?>
                          </h3>
                          <h5 class="left-box ">Qr Code</h5>

                        </div>

                        <div class="right-box">
                          <i class="fas fa-4x fa-qrcode "></i><!--
                            style="color: white; background-color: black; border-radius: 50%; padding: 10px;"> -->
                        </div>
                      </div>
                    </div>
                  </a>
                </div>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</body>
</html>