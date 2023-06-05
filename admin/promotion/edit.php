<?php
session_start();
include '../includes/header.php';
include '../includes/config.php';

$error = $_SESSION['error'] ?? '';
unset($_SESSION['error']);
?>

<body>
  <div class="container-fluid">
    <div class="course_wrapper">
      <div class="row">
        <?php include '../sideBar.php'; ?>

        <div class="col-md-10">

          <div class="row">
            <div class="col-md-6">
              <div class="px-4">
                <h3 class="font-weight-bold my-4  pb-2">
                  Student Time-Table
                </h3>
              </div>
            </div>
          </div>

          <!-- <div class="px-4"><h3 class="font-weight-bold">Courses</h3></div> -->
          <div class="row px-4 ">

            <div class="col-md-5 pb-4 ">
              <!-- Add this HTML code where you want to display the alert message -->
              <div class="alert alert-danger alert-dismissible <?php echo !empty($error) ? 'd-block' : 'd-none'; ?>">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <?php echo $error; ?>
              </div>

              <div class="course p-3">

                <div class="px-0">
                  <a href='student_timetable.php' class="font-weight-bold btn btn-sm "><i
                      class="fas fa fa-arrow-left  text-primary"></i> Back</a>
                  <div class="department p-2">
                    <h5 class="font-weight-bold dept-heading mb-3">
                      UPDATE Record
                    </h5>
                    <?php
                    $st_id = $_GET['id'];

                    $sql = "SELECT student_timetable.id, student_timetable.student_id, student_timetable.timetable_id, course.id As c_id, course.name As course_name, time_table.day FROM ((student_timetable INNER JOIN time_table ON student_timetable.timetable_id = time_table.id) INNER JOIN course ON time_table.course_id = course.id) WHERE student_timetable.id = {$st_id}";
                    $result = mysqli_query($conn, $sql) or die("Query Unsuccessful.");

                    if (mysqli_num_rows($result) > 0) {
                      while ($row = mysqli_fetch_array($result)) {
                        ?>
                        <form class="post-form" action="updatedata.php" method="post">
                          <div class="form-group">

                            <input type="hidden" name="st_id" value="<?php echo $row['id']; ?>" />
                          </div>
                          <div class="form-group">
                            <label>Roll_No</label>
                            <?php
                            $sql1 = "SELECT * FROM student";
                            $result1 = mysqli_query($conn, $sql1) or die("Query Unsuccessful.");

                            if (mysqli_num_rows($result1) > 0) {
                              echo '<select name="student" class="form-group session">';
                              while ($row1 = mysqli_fetch_array($result1)) {
                                if ($row['student_id'] == $row1['id']) {
                                  $select = "selected";
                                } else {
                                  $select = "";
                                }
                                echo "<option {$select} value='{$row1['id']}'>
                                                        {$row1['roll_no']} {$row1['name']}
                                                      </option>";
                              }
                              echo "</select>";
                            }
                            ?>
                          </div>
                          <?php
                          $selected_timetables = array();

                          // Query to retrieve selected timetable IDs for the specific student
                          $sql = "SELECT timetable_id FROM student_timetable WHERE student_id = {$st_id}";
                          $result = mysqli_query($conn, $sql) or die("Query Unsuccessful.");

                          while ($row = mysqli_fetch_assoc($result)) {
                            $selected_timetables[] = $row['timetable_id'];
                          }
                          ?>
                          <label>TimeTable</label>
                          <div class="form-group">

                            <?php
                            $sql1 = "SELECT time_table.id As id, course.name As course_name, slot.slot_time, time_table.day, teacher.name As teacher_name FROM (((time_table INNER JOIN course ON time_table.course_id = course.id) INNER JOIN slot ON time_table.slot_id = slot.id) INNER JOIN teacher ON time_table.teacher_id = teacher.id)";
                            $result1 = mysqli_query($conn, $sql1) or die("Query Unsuccessful.");

                            if (mysqli_num_rows($result1) > 0) {
                              echo '<select name="timetable[]" class="js-example-basic-multiple session" style="height:30vh;" multiple="multiple">';
                              while ($row1 = mysqli_fetch_assoc($result1)) {
                                if (in_array($row1['id'], $selected_timetables)) {
                                  $select = "selected";
                                } else {
                                  $select = "";
                                }
                                echo "<option {$select} value='{$row1['id']}'>
                {$row1['course_name']} {$row1['day']} {$row1['slot_time']} {$row1['teacher_name']}
            </option>";
                              }
                              echo "</select>";
                            }
                            ?>
                          </div>
                          <script>
                            $(document).ready(function () {
                              $('.js-example-basic-multiple').select2();
                            });
                          </script>

                          <input class="btn btn-primary float-right px-4" type="submit" value="Update" /><br>
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