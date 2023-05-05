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

        $std_id = $_POST['id'];

        $sql = "SELECT * FROM student WHERE id = {$std_id}";
        $result = mysqli_query($conn, $sql) or die("Query Unsuccessful.");

        if(mysqli_num_rows($result) > 0)  {
          while($row = mysqli_fetch_array($result)){
    ?>
    <form class="post-form" action="updatedata.php" method="post" enctype="multipart/form-data">
      <div class="form-group">
        <label>Student_Name</label>
        <input type="hidden" name="id" value="<?php echo $row['id']; ?>"/>
        <input type="text" name="student_name" value="<?php echo $row['name']; ?>"/>
      </div>
      <div class="form-group">
        <label>Roll_No</label>
        <input type="text" name="roll_no" value="<?php echo $row['roll_no']; ?>"/>
      </div>
      <div class="form-group">
        <label>Department</label>
        <input type="text" name="department" value="<?php echo $row['department']; ?>"/>
      </div>
      <div class="form-group">
        <label>Degree</label>
        <input type="text" name="degree" value="<?php echo $row['degree']; ?>"/>
      </div>
      <div class="form-group">
        <label>Session</label>
        <input type="text" name="session" value="<?php echo $row['session']; ?>"/>
      </div>
      <div class="form-group">
        <label>CNIC</label>
        <input type="text" name="cnic" value="<?php echo $row['cnic']; ?>"/>
      </div>
      <div class="form-group">
        <label>Phone</label>
        <input type="text" name="phone" value="<?php echo $row['phone']; ?>"/>
      </div>
      <div class="form-group">
        <label>Email</label>
        <input type="text" name="email" value="<?php echo $row['email']; ?>"/>
      </div>
      <div class="form-group">
        <label>Password</label>
        <input type="text" name="password" value="<?php echo $row['password']; ?>"/>
      </div>
      <div class="form-group">
        <label>Shift</label>
        <input type="text" name="shift" value="<?php echo $row['shift']; ?>"/>
      </div>
      <div class="form-group">
        <label>Image</label>
        <input type="file" name="image"/>
      </div>
      <div>
        <label for=""></label>
        <span>
            <img src="./<?php echo $row['picture']; ?>" alt="profilePicture" style="height: 80px;width:80px">
        </span>   
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
