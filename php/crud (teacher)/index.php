<?php
include 'config.php';
include 'header.php';
?>
<div id="main-content">
    <h2>All Records</h2>
    <?php
      $sql = "SELECT * FROM teacher";
      $result = mysqli_query($conn, $sql) or die("Query Unsuccessful.");

      if(mysqli_num_rows($result) > 0)  {
    ?>
    <table cellpadding="7px">
      <thead>
        <th>Id</th>
        <th>Teacher_Name</th>
        <th>Email</th>
        <th>Password</th>
        <th>Mobile_No</th>
        <th>CNIC</th>
        <th>Qualification</th>
        <th>Address</th>
        <th>Image</th>
        <th>Action</th>
      </thead>
      <tbody>
        <?php
          while($row = mysqli_fetch_array($result)){
        ?>
        <tr>
          <td><?php echo $row['id']; ?></td>
          <td><?php echo $row['name']; ?></td>
          <td><?php echo $row['email']; ?></td>
          <td><?php echo $row['password']; ?></td>
          <td><?php echo $row['mobile_no']; ?></td>
          <td><?php echo $row['cnic']; ?></td>
          <td><?php echo $row['qualification']; ?></td>
          <td><?php echo $row['address']; ?></td>
          <td>
            <!-- <img src="./images/Ahmad.jpeg" alt="Profile" style="height: 80px;width:80px"> -->
            <img src="<?php echo $row['image']; ?>" alt="" style="height: 80px;width:80px">
          </td>
          <td>
            <a href='edit.php?id=<?php echo $row['id']; ?>'>Edit</a>
            <a href='delete-inline.php?id=<?php echo $row['id']; ?>'>Delete</a>
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
