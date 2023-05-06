<?php include 'header.php';

?>
<div id="main-content">
    <h2>Add New Record</h2>
    <form class="post-form" action="savedata.php" method="post">
    <div class="form-group">
            <label>Student</label>
            <select name="student"  required>
                <option value="" selected disabled>Select Roll_no</option>
                <?php
                include 'config.php';

                $sql = "SELECT * FROM student";
                $result = mysqli_query($conn, $sql) or die("Query Unsuccessful.");

                while($row = mysqli_fetch_assoc($result)){
                ?>
                <option value="<?php echo $row['id']; ?>"><?php echo $row['roll_no']; ?></option>

              <?php } ?>
            </select>
        </div>
        <div class="form-group">
            <label>Teacher</label>
            <select name="teacher"  required>
                <option value="" selected disabled>Select Teacher_Name</option>
                <?php
                include 'config.php';

                $sql = "SELECT * FROM teacher";
                $result = mysqli_query($conn, $sql) or die("Query Unsuccessful.");

                while($row = mysqli_fetch_assoc($result)){
                ?>
                <option value="<?php echo $row['id']; ?>"><?php echo $row['teacher_name']; ?></option>

              <?php } ?>
            </select>
        </div>
    <div class="form-group">
            <label>Course</label>
            <select name="course"  required>
                <option value="" selected disabled>Select Course</option>
                <?php
                include 'config.php';

                $sql = "SELECT * FROM course";
                $result = mysqli_query($conn, $sql) or die("Query Unsuccessful.");

                while($row = mysqli_fetch_assoc($result)){
                ?>
                <option value="<?php echo $row['id']; ?>"><?php echo $row['course_name']; ?></option>

              <?php } ?>
            </select>
        </div>
        <div class="form-group">
            <label>Date</label>
            <input type="date" name="date"  required/>
        </div>
        <div class="form-group">
            <label>Lecture_No</label>
            <input type="text" name="lec_num"  required/>
        </div>
        <div class="form-group">
        <label>Attendance Status:</label>
        
        <label><input type="radio" name="attendance_status" value="P" required> P</label>
        <label><input type="radio" name="attendance_status" value="A" required> A</label>
        
        </div>
        <input class="submit" type="submit" value="Save"  />
    </form>
</div>
</div>
</body>
</html>
