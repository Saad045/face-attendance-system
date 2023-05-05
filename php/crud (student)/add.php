<?php include 'header.php'; ?>
<div id="main-content" >
    <h2>Add New Record</h2>
    <form class="post-form" action="savedata.php" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label>Student_Name</label>
            <input type="text" name="student_name" />
        </div>
        <div class="form-group">
            <label>Roll_No</label>
            <input type="text" name="roll_no" />
        </div>
        <div class="form-group">
            <label>Department</label>
            <input type="text" name="department" />
        </div>
        <div class="form-group">
            <label>Degree</label>
            <input type="text" name="degree" />
        </div>
        <div class="form-group">
            <label>Session</label>
            <input type="text" name="session" />
        </div>
        <div class="form-group">
            <label>CNIC</label>
            <input type="text" name="cnic" />
        </div>
        <div class="form-group">
            <label>Phone_No</label>
            <input type="text" name="phone" />
        </div>
        <div class="form-group">
            <label>Email</label>
            <input type="email" name="email" />
        </div>
        <div class="form-group">
            <label>Password</label>
            <input type="password" name="password" />
        </div>
        <div class="form-group">
            <label>Shift</label>
            <input type="text" name="shift" />
        </div>
        <div class="form-group">
            <label>Picture</label>
            <input type="file" name="image" />
        </div>
        <input class="submit" type="submit" value="Save"  />
    </form>
    <?php
    // Display the uploaded image
    if(isset($folder)) {
        echo '<img src="$folder" alt="\" style="height: 80px;width:80px;">';
    }
    ?>
</div>
</div>
</body>
</html>
