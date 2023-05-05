<?php
include 'config.php';
include 'header.php';
?>

<div id="main-content">
  <h2>Update Record</h2>
  <?php
  $s_id = $_GET['id'];
  $sql = "SELECT * FROM slot WHERE id = {$s_id}";
  $result = mysqli_query($conn, $sql) or die("Query Unsuccessful.");

  if(mysqli_num_rows($result) > 0)  {
    while($row = mysqli_fetch_array($result)){
  ?>
  <form class="post-form" action="updatedata.php" method="post">
    <div class="form-group">
      <label>Slot_No</label>
      <input type="hidden" name="id" value="<?php echo $row['id']; ?>"/>
      <input type="text" name="slot_no" value="<?php echo $row['slot_no']; ?>"/>
    </div>
    <div class="form-group">
      <label>Slot_Time</label>
      <input type="text" name="slot_time" value="<?php echo $row['slot_time']; ?>"/>
    </div>
    <div class="form-group">
      <label>Shift</label>
      <input type="text" name="shift" value="<?php echo $row['shift']; ?>"/>
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
