<?php include 'header.php'; ?>

<div id="main-content">
    <h2>Update Record</h2>
    <?php
    include 'config.php';

    $tt_id = $_GET['id'];

    $sql = "SELECT * FROM attendance WHERE id = {$tt_id}";
    $result = mysqli_query($conn, $sql) or die("Query Unsuccessful.");

    if(mysqli_num_rows($result) > 0)  {
      while($row = mysqli_fetch_assoc($result)){
    ?>
    <form class="post-form" action="updatedata.php" method="post">
    <div class="form-group">
          <input type="hidden" name="id" value="<?php echo $row['id']; ?>"/>
      </div>
      <div class="form-group">
          <label>Student</label>
          <?php
            $sql1 = "SELECT * FROM student";
            $result1 = mysqli_query($conn, $sql1) or die("Query Unsuccessful.");

            if(mysqli_num_rows($result1) > 0)  {
              echo '<select name="student">';
              while($row1 = mysqli_fetch_assoc($result1)){
                if($row['student'] == $row1['id']){
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
          <label>Teacher</label>
          <?php
            $sql1 = "SELECT * FROM teacher";
            $result1 = mysqli_query($conn, $sql1) or die("Query Unsuccessful.");

            if(mysqli_num_rows($result1) > 0)  {
              echo '<select name="teacher">';
              while($row1 = mysqli_fetch_assoc($result1)){
                if($row['teacher'] == $row1['id']){
                  $select = "selected";
                }else{
                  $select = "";
                }
                echo  "<option {$select} value='{$row1['id']}'>{$row1['teacher_name']}</option>";
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
              echo '<select name="course">';
              while($row1 = mysqli_fetch_assoc($result1)){
                if($row['course'] == $row1['id']){
                  $select = "selected";
                }else{
                  $select = "";
                }
                echo  "<option {$select} value='{$row1['id']}'>{$row1['course_name']}</option>";
              }
          echo "</select>";
        }
            ?>
      </div>
      <div class="form-group">
          <label>Date</label>
          <input type="date" name="date" value="<?php echo $row['date']; ?>"/>
      </div>
      <div class="form-group">
          <label>Lecture_number</label>
          <input type="text" name="lec_num" value="<?php echo $row['lec_num']; ?>"/>
      </div>
      <div class="form-group">
        <label for="attendance_status">Attendance Status:</label>
        <label><input type="radio" name="attendance_status" value="P" <?php if($row['attendance_status']=='P') echo "checked"; ?> required> P</label>
        <label><input type="radio" name="attendance_status" value="A" <?php if($row['attendance_status']=='A') echo "checked"; ?> required> A</label>
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
