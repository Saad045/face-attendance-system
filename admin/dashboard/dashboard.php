<?php
session_start();
include 'config.php';

$alertMessage = $_SESSION['alertMessage'] ?? '';
unset($_SESSION['alertMessage']);

// Check if the admin is logged in
if (!isset($_SESSION['admin_login']) || $_SESSION['admin_login'] !== TRUE) {
  header("Location: signin.php");
  exit();
}

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

<!DOCTYPE html>
<html lang="en">
<?php include '../header_files.php'; ?>
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
      <?php include '../sideBar.php'; ?>

      <div class="col-md-10">
        <div class="row">
          <div class="col-md-6">
            <div class="px-4">
              <h3 class="font-weight-bold my-4 pb-2">
                Dashboard
                <!-- Add a "Logout" link/button in the dashboard page -->
                <div style="margin-left: 1150px;"><a href="http://localhost/face-attendance-system/"
                    class="btn btn-danger">Logout</a></div>
              </h3>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-md-12 pb-4">
            <div class="course p-3">
              <div class="px-0">
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
                            <h5 class="left-box text-center">Slots</h5>

                          </div>

                          <div class="right-box" style="text-siz">
                            <i class="fas fa-4x fa-print mr-1"
                              style="color: white; background-color: black; border-radius: 50%; padding: 10px;"></i>
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
                            <h5 class="left-box text-center">Courses</h5>

                          </div>

                          <div class="right-box">
                            <i class="fas fa-4x fa-book mr-1"
                              style="color: white; background-color: black; border-radius: 50%; padding: 10px;"></i>
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
                            <h5 class="left-box text-center">Students</h5>

                          </div>

                          <div class="right-box" style="text-siz">
                            <i class="fas fa-4x fa-graduation-cap mr-1"
                              style="color: white; background-color: black; border-radius: 50%; padding: 10px;"></i>
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
                            <h5 class="left-box text-center">Teachers</h5>

                          </div>

                          <div class="right-box" style="text-siz">
                            <i class="fas fa-4x fa-chalkboard-teacher mr-1"
                              style="color: white; background-color: black; border-radius: 50%; padding: 10px;"></i>
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
                            <h5 class="left-box text-center">Teacher Timetable</h5>

                          </div>

                          <div class="right-box" style="text-siz">
                            <i class="fas fa-4x fa-user-clock mr-1"
                              style="color: white; background-color: black; border-radius: 50%; padding: 10px;"></i>
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
                            <h5 class="left-box text-center">Student Timetable</h5>

                          </div>

                          <div class="right-box" style="text-siz">
                            <i class="fas fa-4x fa-calendar-alt mr-1"
                              style="color: white; background-color: black; border-radius: 50%; padding: 10px;"></i>
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
                            <h5 class="left-box text-center">Attendance Sheet</h5>

                          </div>

                          <div class="right-box" style="text-siz">
                            <i class="fas fa-4x fa-clipboard-list mr-1"
                              style="color: white; background-color: black; border-radius: 50%; padding: 10px;"></i>
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
                            <h5 class="left-box text-center">Mark Sheet</h5>

                          </div>

                          <div class="right-box" style="text-siz">
                            <i class="fas fa-4x fa-file-alt mr-1"
                              style="color: white; background-color: black; border-radius: 50%; padding: 10px;"></i>
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
                            <h5 class="left-box text-center">Qr Code</h5>

                          </div>

                          <div class="right-box" style="text-siz">
                            <i class="fas fa-4x fa-qrcode mr-1"
                              style="color: white; background-color: black; border-radius: 50%; padding: 10px;"></i>
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
  </div>
</body>

</html>