<?php
include 'config.php';
include 'header.php';
?>
<div id="main-content">
    <h2>Add New Record</h2>

    <form class="post-form" action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
        <div class="form-group">
            <label>Student</label>
            <select name="roll_no"  required>
                <option value="" selected disabled>Select Student</option>
                <?php
                $sql = "SELECT * FROM student";
                $result = mysqli_query($conn, $sql) or die("Query Unsuccessful.");

                while($row = mysqli_fetch_array($result)){
                ?>
                <option value="<?php echo $row['id']; ?>"><?php echo $row['roll_no']; ?></option>

              <?php } ?>
            </select>
        </div>
        <input class="submit" type="submit" name="showbtn" value="Add" />
    </form>
    <?php
        if (isset($_POST['showbtn'])) {
            $student_id = $_POST['roll_no'];

            $sql1 = "SELECT student.id As student_id, student.roll_no, student.name As student_name FROM (student_timetable INNER JOIN student ON student_timetable.student_id = student.id) WHERE student_timetable.student_id = '".$student_id."' GROUP BY student_name";
            $result1 = mysqli_query($conn, $sql1) or die("Query Unsuccessful.");
            if (mysqli_num_rows($result1) > 0) {
                $row1 = mysqli_fetch_array($result1);
    ?>

    <form class="post-form" action="savedata.php" method="post">
        <div class="form-group">
            <!-- <label>StudentID</label> -->
            <input type="hidden" name="student" value="<?php echo $row1['student_id']; ?>"/>
        </div>

        <div class="form-group">
            <label>Course</label>
            <select name="course"  required>
                <option value="" selected disabled>Select Course</option>
                <?php
                $sqlforcourse = "SELECT course.id As course_id, course.name As course_name FROM ((student_timetable INNER JOIN time_table ON time_table.id = student_timetable.timetable_id) INNER JOIN course ON time_table.course_id = course.id) WHERE student_timetable.student_id = '".$student_id."' GROUP BY course_name ORDER BY course_id ASC";
                $resultforcourse = mysqli_query($conn, $sqlforcourse) or die("Query Unsuccessful.");

                while($course = mysqli_fetch_array($resultforcourse)){
                ?>
                    <option value="<?php echo $course['course_id']; ?>"><?php echo $course['course_name']; ?></option>

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
    <?php
            }
        }
    ?>
</div>
</div>
</body>
</html>
