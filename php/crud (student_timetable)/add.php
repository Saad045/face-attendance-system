<?php
include 'config.php';
include 'header.php';
?>
<div id="main-content">
    <h2>Add New Record</h2>
    <form class="post-form" action="savedata.php" method="post">
        <div class="form-group">
            <label>Class</label>
            <select name="roll_no">
                <option value="" selected disabled>Select Roll_No</option>
                <?php
                    $sql = "SELECT * FROM class";
                    $result = mysqli_query($conn, $sql) or die("Query Unsuccessful.");

                    while($row = mysqli_fetch_array($result)){
                    ?>
                    <option value="<?php echo $row['id']; ?>"><?php echo $row['name']; ?></option>
                <?php } ?>
            </select>
        </div>

        <div class="form-group">
            <label>Course</label>
            <select name="course">
                <option value="" selected disabled>Select Course_Name</option>
                <?php
                    $sql = "SELECT time_table.id As tt_id, course.name As course_name, slot.slot_time, teacher.name As teacher_name, time_table.day FROM (((time_table INNER JOIN course ON time_table.course_id = course.id) INNER JOIN slot ON time_table.slot_id = slot.id) INNER JOIN teacher ON time_table.teacher_id = teacher.id)";
                    $result = mysqli_query($conn, $sql) or die("Query Unsuccessful.");

                    while($row = mysqli_fetch_array($result)){
                ?>
                    <option value="<?php echo $row['tt_id']; ?>">
                        <?php
                        echo $row['course_name']; echo " "; echo $row['day']; echo " "; echo $row['slot_time']; echo " "; echo $row['teacher_name'];
                        ?> 
                    </option>

                <?php } ?>
            </select>
        </div>
        <input class="submit" type="submit" value="Save"  />
    </form>
</div>
</div>
</body>
</html>
