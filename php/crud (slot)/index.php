<?php
include 'config.php';
include 'header.php';
?>
<div id="main-content">
    <h2>All Records</h2>
    <?php
      $sql = "SELECT * FROM slot";
      $result = mysqli_query($conn, $sql) or die("Query Unsuccessful.");

      if(mysqli_num_rows($result) > 0)  {
    ?>
    <table cellpadding="7px">
      <thead>
        <th>Id</th>
        <th>Slot_Number</th>
        <th>Slot_Time</th>
        <th>Shift</th>
        <th>Action</th>
      </thead>
      <tbody>
        <?php
          while($row = mysqli_fetch_array($result)){
        ?>
          <tr>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['slot_no']; ?></td>
            <td><?php echo $row['slot_time']; ?></td>
            <td><?php echo $row['shift']; ?></td>
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
