<?php
include 'config.php';
?>

<!DOCTYPE html>
<html lang="en">

<?php include '../header_files.php';?>

<body>
    <div class="container-fluid">
        <div class="course_wrapper">
            <div class="row">
                <?php include '../sideBar.php';?>

                <div class="col-md-10">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="px-4">
                                <h3 class="font-weight-bold my-4 pb-2">
                                    Record
                                </h3>
                            </div>
                        </div>
                    </div>

                    <!-- <div class="px-4"><h3 class="font-weight-bold">Courses</h3></div> -->
                    <div class="row px-4 ">


                                                               <div class="col-md-8 pb-2 ">
                                                                    <div class="course list p-3">
                                                                    
                                                                    <?php
                                                                    $sql = "SELECT student_timetable.id As st_id, student.roll_no, student.name As student_name, course.name As course_name, teacher.name As teacher_name, slot.slot_time
                                                                    FROM (((((student_timetable
                                                                    INNER JOIN student ON student_timetable.student_id = student.id)
                                                                    LEFT OUTER JOIN time_table ON student_timetable.timetable_id = time_table.id)
                                                                    LEFT OUTER JOIN course ON time_table.course_id = course.id)
                                                                    LEFT OUTER JOIN slot ON time_table.slot_id = slot.id)
                                                                    LEFT OUTER JOIN teacher ON time_table.teacher_id = teacher.id)
                                                                    ORDER BY student.id ASC";
                                                                    
                                                                    $result = mysqli_query($conn, $sql) or die("Query Unsuccessful.");
                                                                    if(mysqli_num_rows($result) > 0)  {
                                                                    ?>
                                                                            <table class="table table-borderless ">
                                                                                <thead>
                                                                                    <tr class="my-border">
                                                                                        
                                                                                        <th class="text-start pl-3 ">Student</th>
                                                                                        
                                                                                        <th class="text-start pl-3">Course</th>
                                                                                        
                                                                                        <th class="text-start">Lec Time</th>
                                                                                        
                                                                                        
                                                                                    </tr>
                                                                                </thead>

                                                                                <tbody >
                                                                                <?php
                                                                                    while($row = mysqli_fetch_array($result)){
                                                                                ?>
                                                                                    <tr>
                                                                                        <td colspan="15" class="pt-1 "></td>
                                                                                    </tr>
                                                                                    <tr class="row-color">
                                                                                        
                                                                                        <td class="round-left">
                                                                                            <?php echo $row['student_name']; ?>
                                                                                            <br>
                                                                                            <?php echo $row['roll_no']; ?>
                                                                                        </td>
                                                                                        
                                                                                        <td>
                                                                                            <?php echo $row['course_name']; ?>
                                                                                            <br>
                                                                                            <?php echo $row['teacher_name']; ?>
                                                                                        </td>
                                                                                       
                                                                                        <td><?php echo $row['slot_time']; ?></td>
                                                                                        
                                                                                        <td class="text-center round-right">
                                                                                            <a href='edit.php?id=<?php echo $row['st_id']; ?>'><i
                                                                                                    class="fas fa-edit text-primary"></i></a>
                                                                                                    <br>
                                                                                            <a href='delete-inline.php?id=<?php echo $row['st_id']; ?>'onclick="return checkdelete()"><i
                                                                                                    class="fas fa-trash text-danger"></i></a>
                                                                                                    <script>
                                                                                                        function checkdelete()
                                                                                                        {
                                                                                                            return confirm('Are you sure you want to delete this record ?');
                                                                                                        }
                                                                                                        </script>
                                                                                        </td>
                                                                                    </tr>
                                                                                <?php } ?>
                                                                                </tbody>
                                                                           </table>
                                                                                    <?php } else {
                                                                                                echo "<h2>No Record Found</h2>";
                                                                                            }
                                                                                    ?>
                                                                    </div>
                                                                </div>
     
                                                                <div class="col-md-4 pb-2 ">
                                                                    <div class="course p-3">
                                                                        <div class="px-0">
                                                                            <div class="department p-2">
                                                                                <h5 class="font-weight-bold dept-heading mb-3">Add New Record</h5>
                                                                                <form class="post-form" action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
                                                                                    <div class="form-group">
                                                                                        <label>Degree</label>
                                                                                        <select name="degree"  class="post-form session" required>
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
                                                                                        <select name="session"  class="post-form session">
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
                                                                                        <select name="shift"  class="post-form session">
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
                                                                                        <select class="post-form session" id="course" name="course" >
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
                                                                                        <select class="post-form session" id="teacher" name="teacher" ></select>
                                                                                    </div>

                                                                                    <input class="btn btn-primary float-right px-4" type="submit" name="showbtn" value="Show" /><br>
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

                                                                                        <div class="form-group">
                                                                                            <label>Total Students</label>
                                                                                            <input  class="post-form session" type="text" value="<?php echo $count; ?>" readonly>
                                                                                        </div>
                                                                                        <div class="form-group">
                                                                                            <label>Students</label>
                                                                                            <select class="post-form session">
                                                                                                <option  value="" selected disabled>Selected Students</option>
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
                                                                                            <select name="timetable_id"class="post-form session">
                                                                                                <option  value="" selected disabled>Select TimeTable</option>
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
                                                                                        <input class="btn btn-primary float-right px-4" type="submit" name="time-submit" value="Save"  /><br>
                                                                                    </form>
                                                                                    <?php
                                                                                        }
                                                                                    }
                                                                                    ?>
                                                                             </div>
                                                                       </div>
                                                                   </div>
                                                               </div>
                                        </div>
                                    </div>
                                </div>
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