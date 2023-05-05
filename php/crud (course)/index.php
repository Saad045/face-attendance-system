<?php
include 'header.php';
?>
<div id="main-content">
    <h2>All Records</h2>
    <?php
      include 'config.php';

      $sql = "SELECT * FROM course";
      $result = mysqli_query($conn, $sql) or die("Query Unsuccessful.");

      if(mysqli_num_rows($result) > 0)  {
    ?>
    <table cellpadding="7px">
        <thead>
          <th>Id</th>
          <th>Course_Name</th>
          <th>Course_Code</th>
          <th>Credit_hours</th>
          <th>Lecture_hours</th>
          <th>Action</th>
        </thead>
        <tbody>
          <?php
            while($row = mysqli_fetch_assoc($result)){
          ?>
            <tr>
              <td><?php echo $row['id']; ?></td>
              <td><?php echo $row['name']; ?></td>
              <td><?php echo $row['course_code']; ?></td>
              <td><?php echo $row['credit_hour']; ?></td>
              <td><?php echo $row['hours']; ?></td>
              <td>
                <a href='edit.php?id=<?php echo $row['id']; ?>'>Edit</a>
                <a href='delete-inline.php?id=<?php echo $row['id']; ?>'>Delete</a>
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
