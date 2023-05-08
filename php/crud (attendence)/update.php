<?php
  include 'config.php';
  include 'header.php';
?>
<div id="main-content">
  <h2>Edit Record</h2>
  <form class="post-form" action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
    <div class="form-group">
      <label>AttendanceSheet Id</label>
      <input type="text" name="as_id" />
    </div>
    <input class="submit" type="submit" name="showbtn" value="Show" />
  </form>

  <?php
  if(isset($_POST['showbtn'])){
    $as_id = $_POST['as_id'];
    $sql = "SELECT attendance_sheet.id, attendance_sheet.student_id, attendance_sheet.course_id, attendance_sheet.teacher_id, student.roll_no, student.name AS student_name, course.name AS course_name, teacher.name AS teacher_name, attendance_sheet.date, attendance_sheet.lec_num, attendance_sheet.attendance_status FROM attendance_sheet INNER JOIN student ON student.id = attendance_sheet.student_id INNER JOIN course ON course.id = attendance_sheet.course_id INNER JOIN teacher ON teacher.id = attendance_sheet.teacher_id WHERE attendance_sheet.id = {$as_id}";
    $result = mysqli_query($conn, $sql) or die("Query Unsuccessful.");

    if(mysqli_num_rows($result) > 0)  {
      while($row = mysqli_fetch_assoc($result)){
  ?>
  <form class="post-form" action="updatedata.php" method="post">
    <div class="form-group">
      <input type="hidden" name="as_id" value="<?php echo $row['id']; ?>"/>
    </div>

    <div class="form-group">
      <label>Student</label>
      <?php
        $sql1 = "SELECT * FROM student";
        $result1 = mysqli_query($conn, $sql1) or die("Query Unsuccessful.");

        if(mysqli_num_rows($result1) > 0)  {
          echo '<select name="student" disabled>';
          while($row1 = mysqli_fetch_assoc($result1)){
            if($row['student_id'] == $row1['id']){
              $select = "selected";
            }else{
              $select = "";
            }
            echo  "<option {$select} value='{$row1['id']}'>{$row1['roll_no']}</option>";
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

        if(mysqli_num_rows($result1) > 0)  {
          echo '<select name="course" disabled>';
          while($row1 = mysqli_fetch_assoc($result1)){
            if($row['course_id'] == $row1['id']){
              $select = "selected";
            }else{
              $select = "";
            }
            echo  "<option {$select} value='{$row1['id']}'>{$row1['name']}</option>";
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

        if(mysqli_num_rows($result1) > 0)  {
          echo '<select name="teacher" disabled>';
          while($row1 = mysqli_fetch_assoc($result1)){
            if($row['teacher_id'] == $row1['id']){
              $select = "selected";
            }else{
              $select = "";
            }
            echo  "<option {$select} value='{$row1['id']}'>{$row1['name']}</option>";
          }
          echo "</select>";
        }
      ?>
    </div>

    <div class="form-group">
        <label>Date</label>
        <input type="date" name="date" value="<?php echo $row['date']; ?>" readonly/>
    </div>

    <div class="form-group">
        <label>Lecture_number</label>
        <input type="text" name="lec_num" value="<?php echo $row['lec_num']; ?>" readonly/>
    </div>

    <div class="form-group">
      <label for="attendance_status">Status</label>
      <label><input type="radio" name="attendance_status" value="P" <?php if($row['attendance_status']=='P') echo "checked"; ?> required> P</label>
      <label><input type="radio" name="attendance_status" value="A" <?php if($row['attendance_status']=='A') echo "checked"; ?> required> A</label>
    </div>

    <input class="submit" type="submit" value="Update" />
  </form>
  <?php
      }
    }
  }
  ?>
</div>
</div>
</body>
</html>
