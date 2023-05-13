<?php
include 'config.php';
include 'header.php';
?>
<div id="main-content">
  <h2>All Records</h2>
  <?php
    /*$sql = "SELECT * FROM student JOIN studentclass WHERE student.sclass = studentclass.cid";*/
    $sql = "SELECT time_table.id As t_id, time_table.day, course.name As course_name, slot.slot_time, teacher.name As teacher_name FROM time_table INNER JOIN course ON time_table.course_id = course.id INNER JOIN slot ON time_table.slot_id = slot.id INNER JOIN teacher ON time_table.teacher_id = teacher.id ORDER BY course.id";
    $result = mysqli_query($conn, $sql) or die("Query Unsuccessful.");
    if(mysqli_num_rows($result) > 0)  {
  ?>
  <table cellpadding="7px">
    <thead>
      <th>Id</th>
      <th>Course</th>
      <th>Teacher</th>
      <th>Day</th>
      <th>Slot</th>
      <th>Action</th>
    </thead>
    <tbody>
      <?php
        while($row = mysqli_fetch_array($result)){
      ?>
      <tr>
        <td><?php echo $row['t_id']; ?></td>
        <td><?php echo $row['course_name']; ?></td>
        <td><?php echo $row['teacher_name']; ?></td>
        <td><?php echo $row['day']; ?></td>
        <td><?php echo $row['slot_time']; ?></td>
        <td>
          <a href='edit.php?id=<?php echo $row['t_id']; ?>'>Edit</a>
          <a href='delete-inline.php?id=<?php echo $row['t_id']; ?>'>Delete</a>
        </td>
      </tr>
      <?php } ?>
    </tbody>
  </table>
  <?php }
  else {
    echo "<h2>No Record Found</h2>";
  }
  mysqli_close($conn);
  ?>
</div>
</div>
</body>
</html>
