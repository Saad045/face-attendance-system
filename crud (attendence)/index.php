<?php
include 'header.php';
?>
<div id="main-content">
    <h2>All Records</h2>
    <?php
      include 'config.php';

      /*$sql = "SELECT * FROM student JOIN studentclass WHERE student.sclass = studentclass.cid";*/
      $sql = "SELECT attendance.id, student.roll_no, teacher.teacher_name, course.course_name, attendance.date, attendance.lec_num, attendance.attendance_status 
      FROM attendance INNER JOIN student 
      ON attendance.student_id = student.id 
      INNER JOIN teacher 
      ON attendance.teacher_id = teacher.id 
      INNER JOIN course 
      ON attendance.course_id = course.id 
      ORDER BY id;
      ";
      $result = mysqli_query($conn, $sql) or die("Query Unsuccessful.");

      if(mysqli_num_rows($result) > 0)  {
    ?>
    <table cellpadding="7px">
        <thead>
        <th>Id</th>
        <th>Student</th>
        <th>Teacher_id</th>
        <th>Course_id</th>
        <th>Date</th>
        <th>Lecture_num</th>
        <th>Attendance_Status</th>
        <th>Action</th>
        </thead>
        <tbody>
          <?php
            while($row = mysqli_fetch_assoc($result)){
          ?>
            <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['roll_no']; ?></td>
                <td><?php echo $row['teacher_name']; ?></td>
                <td><?php echo $row['course_name']; ?></td>
                <td><?php echo $row['date']; ?></td>
                <td><?php echo $row['lec_num']; ?></td>
                <td><?php echo $row['attendance_status']; ?></td>
                <td>
                    <a href='edit.php?id=<?php echo $row['id']; ?>'>Edit</a>
                    <a href='delete-inline.php?id=<?php echo $row['id']; ?>'onclick="return checkdelete()">Delete</a>
<script>
  function checkdelete()
  {
    return confirm('Are you sure you want to delete this record ?');
  }
</script>
                </td>
            </tr>
          <?php } ?>
        </tbody>
    </table>
  <?php }else{
    echo "<h2>No Record Found</h2>";
  }
  mysqli_close($conn);
  ?>
</div>
</div>
</body>
</html>
