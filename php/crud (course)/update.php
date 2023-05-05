<?php include 'header.php'; ?>
<div id="main-content">
    <h2>Edit Record</h2>
    <form class="post-form" action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
        <div class="form-group">
            <label>Id</label>
            <input type="text" name="id" />
        </div>
        <input class="submit" type="submit" name="showbtn" value="Show" />
    </form>

    <?php
      if(isset($_POST['showbtn'])){
        include 'config.php';

        $c_id = $_POST['id'];

        $sql = "SELECT * FROM course WHERE id = {$c_id}";
        $result = mysqli_query($conn, $sql) or die("Query Unsuccessful.");

        if(mysqli_num_rows($result) > 0)  {
          while($row = mysqli_fetch_array($result)){
    ?>
    <form class="post-form" action="updatedata.php" method="post">
        <div class="form-group">
            <label for="">Course_Name</label>
            <input type="hidden" name="id"  value="<?php echo $row['id']; ?>" />
            <input type="text" name="name" value="<?php echo $row['name']; ?>" />
        </div>
        <div class="form-group">
            <label>Course_Code</label>
            <input type="text" name="course_code" value="<?php echo $row['course_code']; ?>" />
        </div>
        <div class="form-group">
            <label>Credit_Hours</label>
            <input type="text" name="credit_hour" value="<?php echo $row['credit_hour']; ?>" />
        </div>
        <div class="form-group">
            <label>Lecture_Hours</label>
            <input type="text" name="hours" value="<?php echo $row['hours']; ?>" />
        </div>
    <input class="submit" type="submit" value="Update"  />
    </form>
    <?php
  }
}
}

    ?>
</div>
</div>
</body>
</html>
