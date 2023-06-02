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
                    <div class="card text-center">
                      <div class="card-body">
                        <h5 class="card-title">Slots</h5>
                        <a href="http://localhost/face-attendance-system/admin/slot/slot.php?admin_id=<?php echo $_SESSION['admin_id']; ?>"
                          class="btn btn-dark btn-lg form-control bgcolor py-0">Slot (<?php echo $slot_count; ?>)</a>
                      </div>
                    </div>
                  </div>

                  <div class="col-md-4">
                    <div class="card text-center">
                      <div class="card-body">
                        <h5 class="card-title">Courses</h5>
                        <a href="http://localhost/face-attendance-system/admin/course/course.php?admin_id=<?php echo $_SESSION['admin_id']; ?>"
                          class="btn btn-dark btn-lg form-control bgcolor py-0">Courses (<?php echo $course_count; ?>)</a>
                      </div>
                    </div>
                  </div>

                  <div class="col-md-4">
                    <div class="card text-center">
                      <div class="card-body">
                        <h5 class="card-title">Students</h5>
                        <a href="http://localhost/face-attendance-system/admin/student/student.php?admin_id=<?php echo $_SESSION['admin_id']; ?>"
                          class="btn btn-dark btn-lg form-control bgcolor py-0">Students (<?php echo $student_count; ?>)</a>
                      </div>
                    </div>
                  </div>

                  <div class="col-md-4">
                    <div class="card text-center">
                      <div class="card-body">
                        <h5 class="card-title">Teachers</h5>
                        <a href="http://localhost/face-attendance-system/admin/teacher/teacher.php?admin_id=<?php echo $_SESSION['admin_id']; ?>"
                          class="btn btn-dark btn-lg form-control bgcolor py-0">Teachers (<?php echo $teacher_count; ?>)</a>
                      </div>
                    </div>
                  </div>

                  <div class="col-md-4">
                    <div class="card text-center">
                      <div class="card-body">
                        <h5 class="card-title">Time Table</h5>
                        <a href="http://localhost/face-attendance-system/admin/timeTable/timeTable.php?admin_id=<?php echo $_SESSION['admin_id']; ?>"
                          class="btn btn-dark btn-lg form-control bgcolor py-0">Time Table (<?php echo $timetable_count; ?>)</a>
                      </div>
                    </div>
                  </div>

                  <div class="col-md-4">
                    <div class="card text-center">
                      <div class="card-body">
                        <h5 class="card-title">Student Timetable</h5>
                        <a href="http://localhost/face-attendance-system/admin/student_timetable/student_timetable.php?admin_id=<?php echo $_SESSION['admin_id']; ?>"
                          class="btn btn-dark btn-lg form-control bgcolor py-0">Student Timetable (<?php echo $student_timetable_count; ?>)</a>
                      </div>
                    </div>
                  </div>

                  <div class="col-md-4">
                    <div class="card text-center">
                      <div class="card-body">
                        <h5 class="card-title">Attendance</h5>
                        <a href="http://localhost/face-attendance-system/admin/attendance_sheet/attendance_sheet.php?admin_id=<?php echo $_SESSION['admin_id']; ?>"
                          class="btn btn-dark btn-lg form-control bgcolor py-0">Attendance (<?php echo $attendance_count; ?>)</a>
                      </div>
                    </div>
                  </div>

                  <div class="col-md-4">
                    <div class="card text-center">
                      <div class="card-body">
                        <h5 class="card-title">Mark Sheet</h5>
                        <a href="http://localhost/face-attendance-system/admin/mark_sheet/mark_sheet.php?admin_id=<?php echo $_SESSION['admin_id']; ?>"
                          class="btn btn-dark btn-lg form-control bgcolor py-0">Mark Sheet (<?php echo $mark_sheet_count; ?>)</a>
                      </div>
                    </div>
                  </div>

                  <div class="col-md-4">
                    <div class="card text-center">
                      <div class="card-body">
                        <h5 class="card-title">QR Code</h5>
                        <a href="http://localhost/face-attendance-system/admin/student/qrgrid.php?admin_id=<?php echo $_SESSION['admin_id']; ?>"
                          class="btn btn-dark btn-lg form-control bgcolor py-0">QR Code (<?php echo $qr_code_count; ?>)</a>
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
  </div>
  </div>
</body>

</html>