<?php
include 'config.php';
include 'header.php';

// if (isset($_POST['time-submit'])) {
//     $timetable_id = $_POST['timetable_id'];
//     $student_id = $_POST['student_id'];

//     foreach($student_id as $id){      
//         $sql = "INSERT INTO student_timetable(id,student_id,timetable_id) VALUES (Null,$id,$timetable)";
//         $result = mysqli_query($conn, $sql) or die("Query Unsuccessful.");
    
//     }
//     header("Location: add.php");
// }
?>
<div id="main-content">
    <h2>Add New Record</h2>
    <form class="post-form" action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
        <div class="form-group">
            <label>Degree</label>
            <select name="degree">
                <option value="" selected disabled>Select Degree</option>
                <?php
                    $sql = "SELECT degree FROM student GROUP BY degree";
                    $result = mysqli_query($conn, $sql) or die("Query Unsuccessful.");

                    while($row = mysqli_fetch_array($result)){
                    ?>
                    <option value="<?php echo $row['degree']; ?>"><?php echo $row['degree']; ?></option>
                <?php } ?>
            </select>
        </div>

        <div class="form-group">
            <label>Session</label>
            <select name="session">
                <option value="" selected disabled>Select Session</option>
                <?php
                    $sql = "SELECT session FROM student GROUP BY session";
                    $result = mysqli_query($conn, $sql) or die("Query Unsuccessful.");

                    while($row = mysqli_fetch_array($result)){
                    ?>
                    <option value="<?php echo $row['session']; ?>"><?php echo $row['session']; ?></option>
                <?php } ?>
            </select>
        </div>

        <div class="form-group">
            <label>Shift</label>
            <select name="shift">
                <option value="" selected disabled>Select Shift</option>
                <?php
                    $sql = "SELECT shift FROM student GROUP BY shift ORDER BY shift DESC";
                    $result = mysqli_query($conn, $sql) or die("Query Unsuccessful.");

                    while($row = mysqli_fetch_array($result)){
                    ?>
                    <option value="<?php echo $row['shift']; ?>"><?php echo $row['shift']; ?></option>
                <?php } ?>
            </select>
        </div>

        <div class="form-group">
            <label for="course">Course</label>
            <select class="form-control" id="course" name="course">
                <option value="" selected disabled>Select Course</option>
                <?php
                $sqlforcourse = "SELECT * FROM course";
                $resultforcourse = mysqli_query($conn, $sqlforcourse) or die("Query Unsuccessful.");
                if (mysqli_num_rows($resultforcourse) > 0) {
                    while($course = mysqli_fetch_array($resultforcourse)) {
                ?>
                <option value="<?php echo $course['id'];?>"><?php echo $course["name"];?></option>
                <?php
                    }
                }
                ?>
            </select>
        </div>
        <div class="form-group">
            <label for="teacher">Teacher</label>
            <select class="form-control" id="teacher" name="teacher"></select>
        </div>

        <input class="submit" type="submit" name="showbtn" value="Show" />
    </form>

    <?php
    if (isset($_POST['showbtn'])) {
        $degree = $_POST['degree'];
        $session = $_POST['session'];
        $shift = $_POST['shift'];
        $course = $_POST['course'];
        $teacher = $_POST['teacher'];

        $sql = "SELECT * FROM student WHERE degree='".$degree."' && session='".$session."' && shift='".$shift."'";
        $result = mysqli_query($conn, $sql) or die("Query Unsuccessful.");
        $count = mysqli_num_rows($result);

        if ($count > 0) {
    ?>
    <form class="post-form" action="savedata.php" method="post">

        <?php
            while($row = mysqli_fetch_array($result)){
            ?>
            <input type="hidden" name="student_id[]" value="<?php echo $row['id'] ?>">
            <!-- $student[]=$row['id']; -->
            <?php
            }
        ?>

        <input type="hidden" name="course_id" value="<?php echo $course; ?>">
        <input type="hidden" name="teacher_id" value="<?php echo $teacher; ?>">

        <div class="form-group">
            <label>Total Students</label>
            <input type="text" value="<?php echo $count; ?>" readonly>
        </div>
        <div class="form-group">
            <label>Students</label>
            <select>
                <option value="" selected disabled>Selected Students</option>
                <?php
                $sql = "SELECT * FROM student WHERE degree='".$degree."' && session='".$session."' && shift='".$shift."'";
                $result = mysqli_query($conn, $sql) or die("Query Unsuccessful.");
                while($row = mysqli_fetch_array($result)){
                ?>
                    <option value="<?php echo $row['id']; ?>" disabled>
                    <?php $row['roll_no'];echo " ";echo $row['name']; ?> 
                    </option>

                <?php } ?>
            </select>
        </div>

        <div class="form-group">
            <label>TimeTable</label>
            <select name="timetable_id">
                <option value="" selected disabled>Select TimeTable</option>
                <?php
                $sql = "SELECT time_table.id, course.name As course_name, slot.slot_time, teacher.name As teacher_name, time_table.day FROM time_table INNER JOIN course ON time_table.course_id = course.id INNER JOIN slot ON time_table.slot_id = slot.id INNER JOIN teacher ON time_table.teacher_id = teacher.id WHERE course.id=$course && teacher.id=$teacher";
                $result = mysqli_query($conn, $sql) or die("Query Unsuccessful.");

                while($row = mysqli_fetch_array($result)){
                ?>
                    <option value="<?php echo $row['id']; ?>">
                        <?php
                        echo $row['course_name']; echo " "; echo $row['day']; echo " "; echo $row['slot_time']; echo " "; echo $row['teacher_name'];
                        ?> 
                    </option>
                <?php } ?>
            </select>
        </div>
        <input class="submit" type="submit" name="time-submit" value="Save"  />
    </form>
    <?php
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
            $.ajax({
                url: "getteacher.php",
                type: "POST",
                data: {
                    course_id: course_id
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
