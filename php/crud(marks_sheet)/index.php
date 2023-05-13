<?php
include 'config.php';
include 'header.php';
?>
<div id="main-content">
    <h2>All Records</h2>
    <?php
    $sql = "SELECT mark_sheet.id, course.name As course_name, teacher.name As teacher_name, student.name As student_name, student.roll_no, mark_sheet.mid, mark_sheet.final, mark_sheet.sessional
    FROM (((mark_sheet
    INNER JOIN course ON mark_sheet.course_id=course.id)
    INNER JOIN teacher ON mark_sheet.teacher_id=teacher.id)
    INNER JOIN student ON mark_sheet.student_id=student.id)
    ORDER BY mark_sheet.id ASC";
    $result = mysqli_query($conn, $sql) or die("Query Unsuccessful.");

    if(mysqli_num_rows($result) > 0)  {
    ?>
    <table cellpadding="7px">
      <thead>
        <th>Id</th>
        <th>RollNumber</th>
        <th>Student</th>
        <th>Course</th>
        <th>Teacher</th>
        <th>mid</th>
        <th>final</th>
        <th>sessional</th>
        <th>Action</th>
      </thead>
      <tbody>
        <?php
          while($row = mysqli_fetch_assoc($result)){
        ?>
          <tr>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['roll_no']; ?></td>
            <td><?php echo $row['student_name']; ?></td>
            <td><?php echo $row['course_name']; ?></td>
            <td><?php echo $row['teacher_name']; ?></td>
            <td><?php echo $row['mid']; ?></td>
            <td><?php echo $row['final']; ?></td>
            <td><?php echo $row['sessional']; ?></td>
            <td>
              <a href='edit.php?id=<?php echo $row['id']; ?>'>Edit</a>
              <a href='delete-inline.php?id=<?php echo $row['id']; ?>' onclick="return checkdelete()">Delete</a>
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
  function checkdelete() {
    return confirm('Are you sure you want to delete this record ?');
  }
  </script>
</body>
</html>
