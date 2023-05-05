<?php
include 'header.php';
include 'config.php';
?>

<div id="main-content">
    <h2>Update Record</h2>
    <?php
    $st_id = $_GET['id'];

    $sql = "SELECT student_timetable.id, student_timetable.student_id, student_timetable.timetable_id, course.id As c_id, course.name As course_name, time_table.day FROM ((student_timetable INNER JOIN time_table ON student_timetable.timetable_id = time_table.id) INNER JOIN course ON time_table.course_id = course.id) WHERE student_timetable.id = {$st_id}";
    $result = mysqli_query($conn, $sql) or die("Query Unsuccessful.");

    if(mysqli_num_rows($result) > 0)  {
      while($row = mysqli_fetch_array($result)){
    ?>
    <form class="post-form" action="updatedata.php" method="post">
    <div class="form-group">
          <label>ID</label>
          <input type="hidden" name="st_id" value="<?php echo $row['id']; ?>"/>
      </div>
    <div class="form-group">
          <label>Roll_No</label>
          <?php
            $sql1 = "SELECT * FROM student";
            $result1 = mysqli_query($conn, $sql1) or die("Query Unsuccessful.");

            if(mysqli_num_rows($result1) > 0)  {
              echo '<select name="student">';
              while($row1 = mysqli_fetch_array($result1)){
                if($row['student_id'] == $row1['id']){
                  $select = "selected";
                }else{
                  $select = "";
                }
                echo  "<option {$select} value='{$row1['id']}'>
                  {$row1['roll_no']} {$row1['name']}
                </option>";
              }
          echo "</select>";
        }
            ?>
      </div>
      <div class="form-group">
          <label>TimeTable</label>
          <?php
            $sql1 = "SELECT time_table.id As id, course.name As course_name, slot.slot_time, time_table.day, teacher.name As teacher_name FROM (((time_table INNER JOIN course ON time_table.course_id = course.id) INNER JOIN slot ON time_table.slot_id = slot.id) INNER JOIN teacher ON time_table.teacher_id = teacher.id)";
            $result1 = mysqli_query($conn, $sql1) or die("Query Unsuccessful.");

            if(mysqli_num_rows($result1) > 0)  {
              echo '<select name="timetable">';
              while($row1 = mysqli_fetch_assoc($result1)){
                if($row['timetable_id'] == $row1['id']){
                  $select = "selected";
                }else{
                  $select = "";
                }
                echo  "<option {$select} value='{$row1['id']}'>
                  {$row1['course_name']} {$row1['day']} {$row1['slot_time']} {$row1['teacher_name']}
                </option>";
              }
          echo "</select>";
        }
            ?>
      </div>
      
      <input class="submit" type="submit" value="Update"/>
    </form>
    <?php
      }
    }
    ?>
</div>
</div>
</body>
</html>
