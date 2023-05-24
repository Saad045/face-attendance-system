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


                                                               <div class="col-md-7 pb-2 ">
                                                                    <div class="course list p-3">
                                                                    
                                                                        <?php
                                                                        $sql = "SELECT attendance_sheet.id, attendance_sheet.student_id, student.roll_no, student.name, attendance_sheet.course_id, course.name AS course_name, attendance_sheet.teacher_id, teacher.name AS teacher_name, attendance_sheet.date, attendance_sheet.lec_num, attendance_sheet.attendance_status FROM attendance_sheet INNER JOIN student ON attendance_sheet.student_id = student.id INNER JOIN teacher ON attendance_sheet.teacher_id = teacher.id INNER JOIN course ON attendance_sheet.course_id = course.id ORDER BY attendance_sheet.id";
                                                                            $result = mysqli_query($conn, $sql) or die("Query Unsuccessful.");
                                                                        
                                                                        if(mysqli_num_rows($result) > 0)  {
                                                                        ?>
                                                                            <table class="table table-borderless ">
                                                                                <thead>
                                                                                    <tr class="my-border">
                                                                                        
                                                                                        <th class="text-start pl-3 ">Id</th>
                                                                                        <th class="text-start pl-3">Student</th>
                                                                                        <th class="text-start pl-3">Course</th>
                                                                                        <th class="text-start">Teacher</th>
                                                                                        <th class="text-start">Lecture_No</th>
                                                                                        <th class="text-start">Date</th>
                                                                                        <th class="text-start pl-3">Status</th>
                                                                                        
                                                                                    </tr>
                                                                                </thead>

                                                                                <tbody >
                                                                                <?php
                                                                                    while($row = mysqli_fetch_assoc($result)){
                                                                                    ?>
                                                                                    <tr>
                                                                                        <td colspan="15" class="pt-1 "></td>
                                                                                    </tr>
                                                                                    <tr class="row-color">
                                                                                        <td class="round-left"><?php echo $row['id']; ?></td>
                                                                                        <td><?php echo $row['roll_no']; ?></td>
                                                                                        <td><?php echo $row['course_name']; ?></td>
                                                                                        <td><?php echo $row['teacher_name']; ?></td>
                                                                                        <td><?php echo $row['lec_num']; ?></td>
                                                                                        <td><?php echo $row['date']; ?></td>
                                                                                        <td ><?php echo $row['attendance_status']; ?></td>
                                                                                        <td class="text-center round-right">
                                                                                            <a href='edit.php?id=<?php echo $row['id']; ?>'><i
                                                                                                    class="fas fa-edit text-primary"></i></a>
                                                                                                    <br>
                                                                                            <a href='delete-inline.php?id=<?php echo $row['id']; ?>'onclick="return checkdelete()"><i
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
     
                                                                <div class="col-md-5 pb-2 ">
                                                                    <div class="course p-3">
                                                                        <div class="px-0">
                                                                            <div class="department p-2">
                                                                                <h5 class="font-weight-bold dept-heading mb-3">Add New Record</h5>
                                                                                    <form class="post-form" action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
                                                                                        <div class="form-group">
                                                                                            <label>Student</label>
                                                                                            <select name="student" class="form-control session"required>
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
                                                                                        <input  class="btn btn-primary float-right px-4" type="submit" name="showbtn" value="Add" /><br>
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
                                                                                                <select class="form-control session" id="course" name="course"required>
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
                                                                                                <select class="form-control session" id="teacher" name="teacher"required></select>
                                                                                            </div>

                                                                                            <div class="form-group">
                                                                                                <label>Date</label>
                                                                                                <input class="form-control session"type="date" name="date"  required/>
                                                                                            </div>

                                                                                            <div class="form-group">
                                                                                                <label>Lecture_No</label>
                                                                                                <input class="form-control session" type="text" name="lec_num"  required/>
                                                                                            </div>

                                                                                            <label>Mark Attendance</label>
                                                                                            <div class="form-control session">
                                                                                                <label style="margin-top: 8px;"></label>
                                                                                                
                                                                                                <label><input type="radio"  style="margin-top: 8px; margin-right:7px;" name="attendance_status" value="P" required > Present</label>
                                                                                                <label><input type="radio"  style="margin-top: 8px; margin-right:5px;" name="attendance_status" value="A" required> Absent</label>
                                                                                            </div><br>
                                                                                            <input  class="btn btn-primary float-right px-4" type="submit" value="Save" name="submit" /><br>
                                                                                        </form>
                                                                                        <?php
                                                                                                    }
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