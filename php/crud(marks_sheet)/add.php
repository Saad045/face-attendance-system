<?php
include 'config.php';
include 'header.php';
?>
<div id="main-content">
    <h2>Add New Record</h2>
    <form class="post-form" action="savedata.php" method="post">
        <!-- <div class="form-group">
            <label>Teacher</label>
            <select name="teacher" required>
                <option value="" selected disabled>Select Teacher</option>
                <?php
                // $sql = "SELECT * FROM teacher";
                // $result = mysqli_query($conn, $sql) or die("Query Unsuccessful.");

                // while($row = mysqli_fetch_array($result)){
                ?>
                <option value="<?php //echo $row['id']; ?>"><?php //echo $row['name']; ?></option>

              <?php //} ?>
            </select>
        </div> -->

        <!-- <div class="form-group">
            <label>Course</label>
            <select name="course" required>
                <option value="" selected disabled>Select Course</option>
                <?php
                // $sql = "SELECT * FROM course";
                // $result = mysqli_query($conn, $sql) or die("Query Unsuccessful.");

                // while($row = mysqli_fetch_array($result)){
                ?>
                <option value="<?php //echo $row['id']; ?>"><?php //echo $row['name']; ?></option>

              <?php //} ?>
            </select>
        </div> -->

        <!-- <div class="form-group">
            <label>Student</label>
            <select name="roll_no"  required>
                <option value="" selected disabled>Select Roll_no</option>
                <?php
                // $sql = "SELECT * FROM student";
                // $result = mysqli_query($conn, $sql) or die("Query Unsuccessful.");

                // while($row = mysqli_fetch_array($result)){
                ?>
                <option value="<?php //echo $row['id']; ?>"><?php //echo $row['roll_no']; ?></option>

              <?php //} ?>
            </select>
        </div> -->

        <div class="form-group">
            <label>Student/Course</label>
            <select name="roll_no"  required>
                <option value="" selected disabled>Select</option>
                <?php
                $sql = "SELECT student_timetable.id, student.roll_no, student.name, course.name As course_name, slot.slot_time, teacher.name As teacher_name, time_table.day FROM (((((student_timetable INNER JOIN student ON student_timetable.student_id = student.id) INNER JOIN time_table ON time_table.id = student_timetable.timetable_id) INNER JOIN course ON time_table.course_id = course.id) INNER JOIN slot ON time_table.slot_id = slot.id) INNER JOIN teacher ON time_table.teacher_id = teacher.id) WHERE student_timetable.student_id = 4 GROUP BY course_name ORDER BY student_timetable.id ASC";
                $result = mysqli_query($conn, $sql) or die("Query Unsuccessful.");

                while($row = mysqli_fetch_array($result)){
                ?>
                <option value="<?php echo $row['id']; ?>">
                    <?php echo $row['roll_no'];echo " ";echo $row['course_name']; ?>
                </option>

              <?php } ?>
            </select>
        </div>

        <div class="form-group">
            <label>Mid</label>
            <input type="text" name="mid" required/>
        </div>
        <div class="form-group">
            <label>Final</label>
            <input type="text" name="final" required/>
        </div>
        <div class="form-group">
            <label>Sessional</label>
            <input type="text" name="sessional" required/>
        </div>
        <input class="submit" type="submit" value="Save"  />
    </form>
</div>
</div>
</body>
</html>
