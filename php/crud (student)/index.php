<?php
include 'config.php';
include 'header.php';
?>
<div id="main-content">
    <h2>All Records</h2>
    <?php
      $sql = "SELECT * FROM student";
      $result = mysqli_query($conn, $sql) or die("Query Unsuccessful.");

      if(mysqli_num_rows($result) > 0)  {
    ?>
    <table cellpadding="7px">
      <thead>
        <th>Id</th>
        <th>Student_Name</th>
        <th>Roll_No</th>
        <th>Department</th>
        <th>Degree</th>
        <!-- <th>Semester</th> -->
        <th>Session</th>
        <th>CNIC</th>
        <th>Phone_No</th>
        <th>Email</th>
        <th>Shift</th>
        <!-- <th>Address</th> -->
        <th>Picture</th>
        <th>Action</th>
      </thead>
      <tbody>
        <?php
          while($row = mysqli_fetch_array($result)){
        ?>
        <tr>
          <td><?php echo $row['id']; ?></td>
          <td><?php echo $row['name']; ?></td>
          <td><?php echo $row['roll_no']; ?></td>
          <td><?php echo $row['department']; ?></td>
          <td><?php echo $row['degree']; ?></td>
          <td><?php echo $row['session']; ?></td>
          <td><?php echo $row['cnic']; ?></td>
          <td><?php echo $row['phone']; ?></td>
          <td><?php echo $row['email']; ?></td>
          <td><?php echo $row['shift']; ?></td>
          <td style="text-align: center;">
            <img src="<?php echo $row['picture']; ?>" alt="profilePicture" style="height: 80px;width:80px">
          </td>
          <td style="text-align: center;">
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
