<?php
include 'config.php';
include 'header.php';
?>
<div id="main-content">
  <h2>Edit Record</h2>
  <form class="post-form" action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
    <div class="form-group">
      <label>Id</label>
      <input type="text" name="t_id" />
    </div>
    <input class="submit" type="submit" name="showbtn" value="Show" />
  </form>

  <?php
    if(isset($_POST['showbtn'])){
      $tt_id = $_POST['t_id'];

      $sql = "SELECT time_table.id, time_table.course_id, course.name As course_name, time_table.day, time_table.slot_id, slot.slot_time, time_table.teacher_id, teacher.name As teacher_name FROM time_table INNER JOIN course ON time_table.course_id = course.id INNER JOIN slot ON time_table.slot_id = slot.id INNER JOIN teacher ON time_table.teacher_id = teacher.id WHERE time_table.id = {$tt_id}";
      $result = mysqli_query($conn, $sql) or die("Query Unsuccessful.");

      if(mysqli_num_rows($result) > 0)  {
        while($row = mysqli_fetch_array($result)){
  ?>
  <form class="post-form" action="updatedata.php" method="post">
    <div class="form-group">
      <label>ID</label>
      <input type="hidden" name="t_id" value="<?php echo $row['id']; ?>"/>
    </div>

    <div class="form-group">
      <label>Course</label>
      <?php
        $sql1 = "SELECT * FROM course";
        $result1 = mysqli_query($conn, $sql1) or die("Query Unsuccessful.");

        if(mysqli_num_rows($result1) > 0)  {
          echo '<select name="course">';
          while($row1 = mysqli_fetch_array($result1)){
            if($row['course_id'] == $row1['id']){
              $select = "selected";
            } else {
              $select = "";
            }
            echo  "<option {$select} value='{$row1['id']}'>{$row1['name']}</option>";
          }
          echo "</select>";
        }
      ?>
    </div>

    <div class="form-group">
      <label>Slot</label>
      <?php
        $sql1 = "SELECT * FROM slot";
        $result1 = mysqli_query($conn, $sql1) or die("Query Unsuccessful.");

        if(mysqli_num_rows($result1) > 0){
          echo '<select name="slot">';
          while($row1 = mysqli_fetch_array($result1)){
            if($row['slot_id'] == $row1['id']){
              $select = "selected";
            } else {
              $select = "";
            }
            echo  "<option {$select} value='{$row1['id']}'>{$row1['slot_time']}</option>";
          }
          echo "</select>";
        }
      ?>
    </div>

    <div class="form-group">
      <label>Day</label>
      <input type="text" name="day" value="<?php echo $row['day']; ?>"/>
    </div>

    <div class="form-group">
      <label>Teacher</label>
      <?php
        $sql1 = "SELECT * FROM teacher";
        $result1 = mysqli_query($conn, $sql1) or die("Query Unsuccessful.");

        if(mysqli_num_rows($result1) > 0){
          echo '<select name="teacher">';
          while($row1 = mysqli_fetch_array($result1)){
            if($row['teacher_id'] == $row1['id']){
              $select = "selected";
            } else {
              $select = "";
            }
            echo  "<option {$select} value='{$row1['id']}'>{$row1['name']}</option>";
          }
          echo "</select>";
        }
      ?>
    </div>
    <input class="submit" type="submit" value="Update"  />
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
