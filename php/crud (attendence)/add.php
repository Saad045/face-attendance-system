<?php
    include 'config.php';
    include 'header.php';
?>
<div id="main-content">
    <h2>Add New Record</h2>

    <form class="post-form" action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
        <div class="form-group">
            <label>Student</label>
            <select name="student"  required>
                <option value="" selected disabled>Select Roll_no</option>
                <?php
                $sql = "SELECT * FROM student";
                $result = mysqli_query($conn, $sql) or die("Query Unsuccessful.");

                while($row = mysqli_fetch_assoc($result)){
                ?>
                <option value="<?php echo $row['id']; ?>"><?php echo $row['roll_no']; ?></option>
                <?php } ?>
            </select>
        </div>
        <input class="submit" type="submit" name="showbtn" value="Add" />
    </form>
    <?php
        if (isset($_POST['showbtn'])) {
            $student_id = $_POST['student'];

            $sql1 = "SELECT student_timetable.timetable_id, student.id As student_id, student.roll_no, student.name As student_name FROM (student_timetable INNER JOIN student ON student_timetable.student_id = student.id) WHERE student_timetable.student_id = '".$student_id."' GROUP BY student_id";
            $result1 = mysqli_query($conn, $sql1) or die("Query Unsuccessful.");
            if (mysqli_num_rows($result1) > 0) {
                while ($row1 = mysqli_fetch_array($result1)) {
                    $student_id = $row1['student_id'];
                    // $timetable_id = $row1['timetable_id'];
                // If we use group by in the above query, we get only a single timetable-ID. But here we are getting just student-ID to select courses against that student and we don't need timetable-ID.
    ?>

    <form class="post-form" action="savedata.php" method="post">
        <div class="form-group">
            <!-- <label>StudentID</label> -->
            <input type="hidden" name="student" id="student" value="<?php echo $row1['student_id']; ?>"/>
            <!-- <label>TimeTableID</label> -->
            <input type="hidden" name="time_table" value="<?php echo $row1['timetable_id']; ?>"/>
        </div>

        <div class="form-group">
            <label for="course">Course</label>
            <select class="form-control" id="course" name="course">
                <option value="" selected disabled>Select Course</option>
                <?php
                $sqlforcourse = "SELECT course.id As course_id, course.name As course_name FROM ((student_timetable INNER JOIN time_table ON time_table.id = student_timetable.timetable_id) INNER JOIN course ON time_table.course_id = course.id) WHERE student_timetable.student_id = $student_id GROUP BY course_name ORDER BY course_id ASC";
                $resultforcourse = mysqli_query($conn, $sqlforcourse) or die("Query Unsuccessful.");
                while($course = mysqli_fetch_array($resultforcourse)) {
                ?>
                <option value="<?php echo $course['course_id'];?>"><?php echo $course["course_name"];?></option>
                <?php
                    }
                ?>
            </select>
        </div>
        <div class="form-group">
            <label for="teacher">Teacher</label>
            <select class="form-control" id="teacher" name="teacher"></select>
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
            <label>Mark Attendance</label>
            
            <label><input type="radio" name="attendance_status" value="P" required> Present</label>
            <label><input type="radio" name="attendance_status" value="A" required> Absent</label>
        </div>
        <input class="submit" type="submit" value="Save" name="submit" />
    </form>
    <?php
                }
            }
        }   
    ?>
</div>
</div>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <script type="text/javascript">  
    $(document).ready(function() {
        $('#course').on('change', function() {
            var course_id = this.value;
            var student_id = $('#student').val();
            $.ajax({
                url: "getteacher.php",
                type: "POST",
                data: {
                    course_id: course_id,
                    student_id: student_id
                },
                cache: false,
                success: function(result){
                    $("#teacher").html(result);
                }
            });
        });
    });
    </script>
</body>
</html>
