<?php
  include 'config.php';
  include 'header.php';
?>

<div id="main-content">
  <h2>Update Record</h2>
  <?php
    $ms_id = $_GET['id'];

    $sql = "SELECT * FROM mark_sheet WHERE id = $ms_id ORDER BY mark_sheet.id ASC";
    $result = mysqli_query($conn, $sql) or die("Query Unsuccessful.");
    if(mysqli_num_rows($result) > 0)  {
      while($row = mysqli_fetch_array($result)){
  ?>
  <form class="post-form" action="updatedata.php" method="post">
    <div class="form-group">
      <label>ID</label>
      <input type="hidden" name="ms_id" value="<?php echo $row['id']; ?>"/>
    </div>

    <div class="form-group">
      <label>Teacher</label>
      <?php
        $sql1 = "SELECT * FROM teacher";
        $result1 = mysqli_query($conn, $sql1) or die("Query Unsuccessful.");

        if(mysqli_num_rows($result1) > 0) {
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

    <div class="form-group">
      <label>Course</label>
      <?php
        $sql1 = "SELECT * FROM course";
        $result1 = mysqli_query($conn, $sql1) or die("Query Unsuccessful.");

        if(mysqli_num_rows($result1) > 0) {
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
      <label>Roll Number</label>
      <?php
        $sql1 = "SELECT * FROM student";
        $result1 = mysqli_query($conn, $sql1) or die("Query Unsuccessful.");

        if(mysqli_num_rows($result1) > 0) {
          echo '<select name="roll_no">';
          while($row1 = mysqli_fetch_array($result1)){
            if($row['student_id'] == $row1['id']){
              $select = "selected";
            } else {
              $select = "";
            }
            echo  "<option {$select} value='{$row1['id']}'>{$row1['roll_no']}</option>";
          }
          echo "</select>";
        }
      ?>
    </div>

    <div class="form-group">
      <label>Mid</label>
      <input type="text" name="mid" value="<?php echo $row['mid']; ?>"/>
    </div>

    <div class="form-group">
        <label>Final</label>
        <input type="text" name="final" value="<?php echo $row['final']; ?>"/>
    </div>

    <div class="form-group">
        <label>Sessional</label>
        <input type="text" name="sessional" value="<?php echo $row['sessional']; ?>"/>
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
