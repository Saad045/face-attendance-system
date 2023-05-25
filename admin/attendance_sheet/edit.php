<?php
session_start();
include 'config.php';

$alertMessage = $_SESSION['alertMessage'] ?? '';
unset($_SESSION['alertMessage']);
?>
<!DOCTYPE html>
<html lang="en">

<?php include '../header_files.php'; ?>

<body>
  <div class="container-fluid">
    <div class="course_wrapper">
      <div class="row">
        <?php include '../sideBar.php'; ?>

        <div class="col-md-10">
          <!-- Add this HTML code where you want to display the alert message -->
          <div class="alert alert-danger <?php echo !empty($alertMessage) ? 'd-block' : 'd-none'; ?>">
            <?php echo $alertMessage; ?>
          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="px-4">
                <h3 class="font-weight-bold my-4 pb-2">
                  Profile
                </h3>
              </div>
            </div>
          </div>

          <!-- <div class="px-4"><h3 class="font-weight-bold">Courses</h3></div> -->
          <div class="row px-4 ">

            <div class="col-md-5 pb-4 ">


              <div class="course p-3">
                <div class="px-0">
                  <a href='attendance_sheet.php' class="font-weight-bold btn btn-sm "><i
                      class="fas fa fa-arrow-left  text-primary"></i> Back</a>
                  <div class="department p-2">
                    <h5 class="font-weight-bold dept-heading mb-3">
                      UPDATE Record
                    </h5>
                    <?php
                    $as_id = $_GET['id'];
                    $sql = "SELECT attendance_sheet.id, attendance_sheet.student_id, attendance_sheet.course_id, attendance_sheet.teacher_id, student.roll_no, student.name AS student_name, course.name AS course_name, teacher.name AS teacher_name, attendance_sheet.date, attendance_sheet.lec_num, attendance_sheet.attendance_status FROM attendance_sheet INNER JOIN student ON student.id = attendance_sheet.student_id INNER JOIN course ON course.id = attendance_sheet.course_id INNER JOIN teacher ON teacher.id = attendance_sheet.teacher_id WHERE attendance_sheet.id = {$as_id}";
                    $result = mysqli_query($conn, $sql) or die("Query Unsuccessful.");

                    if (mysqli_num_rows($result) > 0) {
                      while ($row = mysqli_fetch_assoc($result)) {
                        ?>
                        <form action="updatedata.php" method="post" enctype="multipart/form-data">
                          <div class="row pb-2">
                            <div class="col-md-12">

                              <div class="form-group">
                                <input type="hidden" name="as_id" value="<?php echo $row['id']; ?>" />
                              </div>
                              <div class="form-group ">
                                <label>Student</label>
                                <?php
                                $sql1 = "SELECT * FROM student";
                                $result1 = mysqli_query($conn, $sql1) or die("Query Unsuccessful.");

                                if (mysqli_num_rows($result1) > 0) {
                                  echo '<select name="student" class="form-group session"disabled>';
                                  while ($row1 = mysqli_fetch_assoc($result1)) {
                                    if ($row['student_id'] == $row1['id']) {
                                      $select = "selected";
                                    } else {
                                      $select = "";
                                    }
                                    echo "<option {$select} value='{$row1['id']}'>{$row1['roll_no']}</option>";
                                  }
                                  echo "</select>";
                                }
                                ?>
                              </div>
                              <div class="form-group">
                                <label>Course</label>
                                <?php
                                $sql1 = "SELECT * FROM course";
                                $result1 = mysqli_query($conn, $sql1) or die("Query Unsuccessful.");

                                if (mysqli_num_rows($result1) > 0) {
                                  echo '<select name="course" class="form-group session"disabled>';
                                  while ($row1 = mysqli_fetch_assoc($result1)) {
                                    if ($row['course_id'] == $row1['id']) {
                                      $select = "selected";
                                    } else {
                                      $select = "";
                                    }
                                    echo "<option {$select} value='{$row1['id']}'>{$row1['name']}</option>";
                                  }
                                  echo "</select>";
                                }
                                ?>
                              </div>
                              <div class="form-group">
                                <label>Teacher</label>
                                <?php
                                $sql1 = "SELECT * FROM teacher";
                                $result1 = mysqli_query($conn, $sql1) or die("Query Unsuccessful.");

                                if (mysqli_num_rows($result1) > 0) {
                                  echo '<select name="teacher" class="form-group session"disabled>';
                                  while ($row1 = mysqli_fetch_assoc($result1)) {
                                    if ($row['teacher_id'] == $row1['id']) {
                                      $select = "selected";
                                    } else {
                                      $select = "";
                                    }
                                    echo "<option {$select} value='{$row1['id']}'>{$row1['name']}</option>";
                                  }
                                  echo "</select>";
                                }
                                ?>
                              </div>
                              <div class="form-group">
                                <label>Date</label>
                                <input type="date" name="date" class="form-group session"
                                  value="<?php echo $row['date']; ?>" readonly />
                              </div>

                              <div class="form-group">
                                <label>Lecture_number</label>
                                <input type="text" name="lec_num" class="form-group session"
                                  value="<?php echo $row['lec_num']; ?>" readonly />
                              </div>
                              <div class="form-group">
                                <label for="attendance_status">Status</label>
                                <label><input type="radio" name="attendance_status" value="P" <?php if ($row['attendance_status'] == 'P')
                                  echo "checked"; ?> required> P</label>
                                <label><input type="radio" name="attendance_status" value="A" <?php if ($row['attendance_status'] == 'A')
                                  echo "checked"; ?> required> A</label>
                              </div>
                              <div class="clearfix">
                                <input class="btn btn-primary float-right px-4" type="submit" value="Update" />
                              </div>

                        </form>

                        <?php
                      }
                    }
                    ?>


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