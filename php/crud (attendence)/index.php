<?php
include 'header.php';
include 'config.php';
?>
<div id="main-content">
  <h2>All Records</h2>
  <?php
  $sql = "SELECT attendance_sheet.id, attendance_sheet.student_id, student.roll_no, student.name, attendance_sheet.course_id, course.name AS course_name, attendance_sheet.teacher_id, teacher.name AS teacher_name, attendance_sheet.date, attendance_sheet.lec_num, attendance_sheet.attendance_status FROM attendance_sheet INNER JOIN student ON attendance_sheet.student_id = student.id INNER JOIN teacher ON attendance_sheet.teacher_id = teacher.id INNER JOIN course ON attendance_sheet.course_id = course.id ORDER BY attendance_sheet.id";
    $result = mysqli_query($conn, $sql) or die("Query Unsuccessful.");

  if(mysqli_num_rows($result) > 0)  {
  ?>
  <table cellpadding="7px">
    <thead>
      <th>Id</th>
      <th>Student</th>
      <th>Course</th>
      <th>Teacher</th>
      <th>Lecturen No</th>
      <th>Date</th>
      <th>Status</th>
      <th>Action</th>
    </thead>
    <tbody>
      <?php
      while($row = mysqli_fetch_assoc($result)){
      ?>
      <tr>
        <td><?php echo $row['id']; ?></td>
        <td><?php echo $row['roll_no']; ?></td>
        <td><?php echo $row['course_name']; ?></td>
        <td><?php echo $row['teacher_name']; ?></td>
        <td><?php echo $row['lec_num']; ?></td>
        <td><?php echo $row['date']; ?></td>
        <td><?php echo $row['attendance_status']; ?></td>
        <td>
          <a href='edit.php?id=<?php echo $row['id']; ?>'>Edit</a>
          <a href='delete-inline.php?id=<?php echo $row['id']; ?>'onclick="return checkdelete()">Delete</a>
        </td>
      </tr>
      <?php } ?>
    </tbody>
  </table>
  <?php } else {
    echo "<h2>No Record Found</h2>";
  }
  ?>
</div>
</div>
  <script>
  function checkdelete(){
    return confirm('Are you sure you want to delete this record ?');
  }
  </script>
</body>
</html>
