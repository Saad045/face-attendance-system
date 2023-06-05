<?php
session_start();
include '../includes/header.php';
include '../includes/config.php';

$success = $_SESSION['success'] ?? '';
$error = $_SESSION['error'] ?? '';
unset($_SESSION['success']);
unset($_SESSION['error']);
?>

<body>
<div class="container-fluid">
<div class="course_wrapper">
    <div class="row">
    <?php include '../includes/sideBar.php'; ?>

    <div class="col-md-10">
        <div class="row">
            <div class="col-md-6">
                <h3 class="font-weight-bold my-4 px-4 pb-2">
                    <a href="../student/student.php" class=" text-decoration-none"><i class="fas fa-arrow-circle-left   mr-1"></i></a>Student Marks Sheet
                </h3>
            </div>
        </div>

        <div class="row px-4 ">
        <div class="col-md-8 pb-2 ">
            <div class="course list p-3">
                <?php
                $sql = "SELECT mark_sheet.id, course.name As course_name, teacher.name As teacher_name, student.name As student_name, student.roll_no, mark_sheet.mid, mark_sheet.final, mark_sheet.sessional
                FROM (((mark_sheet
                INNER JOIN course ON mark_sheet.course_id=course.id)
                INNER JOIN teacher ON mark_sheet.teacher_id=teacher.id)
                INNER JOIN student ON mark_sheet.student_id=student.id)
                ORDER BY mark_sheet.id ASC";
                $result = mysqli_query($conn, $sql) or die("Query Unsuccessful.");

                if (mysqli_num_rows($result) > 0) {
                ?>
                <table class="table table-borderless ">
                <thead>
                    <tr class="my-border">
                        <th class="text-start pl-3 ">Student</th>
                        <th class="text-start pl-3">Course</th>
                        <th class="text-start">Mid</th>
                        <th class="text-start">Final</th>
                        <th class="text-start pl-3">Sessional</th>
                    </tr>
                </thead>
                <tbody >
                    <?php
                    while ($row = mysqli_fetch_assoc($result)) {
                    ?>
                    <tr><td colspan="15" class="pt-1 "></td></tr>

                    <tr class="row-color">
                        <td class="round-left"><?php echo $row['student_name']; ?><br>
                        <?php echo $row['roll_no']; ?></td>
                        <td><?php echo $row['course_name']; ?><br><?php echo $row['teacher_name']; ?></td>
                        <td><?php echo $row['mid']; ?></td>
                        <td><?php echo $row['final']; ?></td>
                        <td ><?php echo $row['sessional']; ?></td>
                        <td class="text-center round-right">
                            <a href='edit.php?id=<?php echo $row['id']; ?>'><i class="fas fa-edit text-primary"></i></a><br>

                            <a href='delete-inline.php?id=<?php echo $row['id']; ?>'onclick="return checkdelete()"><i class="fas fa-trash text-danger"></i></a>
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
            <!-- Add this HTML code where you want to display the alert message -->
            <div class="alert alert-success alert-dismissible <?php echo !empty($success) ? 'd-block' : 'd-none'; ?>">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <?php echo $success; ?>
            </div>
            <div class="alert alert-danger alert-dismissible <?php echo !empty($error) ? 'd-block' : 'd-none'; ?>">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <?php echo $error; ?>
            </div>

            <div class="course p-3">
            <div class="department p-2">
                <h5 class="font-weight-bold dept-heading mb-3">Add Student Marks</h5>
                <form class="post-form" action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
                    <div class="form-group">
                        <label>Student</label>
                        <select name="roll_no"  class="form-group session"required>
                            <option value="" selected disabled>Select Student</option>
                            <?php
                            $sql = "SELECT * FROM student";
                            $result = mysqli_query($conn, $sql) or die("Query Unsuccessful.");

                            while ($row = mysqli_fetch_array($result)) {
                            ?>
                            <option value="<?php echo $row['id']; ?>"><?php echo $row['roll_no']; ?></option>
                            <?php } ?>
                        </select>
                    </div>

                    <input class="btn btn-primary float-right px-4" type="submit" name="showbtn" value="Add"><br>
                </form>

                <?php
                if (isset($_POST['showbtn'])) {
                $student_id = $_POST['roll_no'];

                $sql1 = "SELECT student.id As student_id, student.roll_no, student.name As student_name FROM (student_timetable INNER JOIN student ON student_timetable.student_id = student.id) WHERE student_timetable.student_id = '" . $student_id . "' GROUP BY student_name";
                $result1 = mysqli_query($conn, $sql1) or die("Query Unsuccessful.");
                if (mysqli_num_rows($result1) > 0) {
                $row1 = mysqli_fetch_array($result1);
                ?>
                <form onsubmit="return validateMarks()" class="post-form" action="savedata.php" method="post">
                    <div class="form-group">
                        <!-- <label>StudentID</label> -->
                        <input type="hidden" name="student" value="<?php echo $row1['student_id']; ?>"/>
                    </div>

                    <div class="form-group">
                        <label for="course">Course</label>
                        <select class="form-group session" id="course" name="course"required>
                            <option value="" selected disabled>Select Course</option>
<?php
$sqlforcourse = "SELECT course.id As course_id, course.name As course_name FROM ((student_timetable INNER JOIN time_table ON time_table.id = student_timetable.timetable_id) INNER JOIN course ON time_table.course_id = course.id) WHERE student_timetable.student_id = $student_id GROUP BY course_name ORDER BY course_id ASC";
$resultforcourse = mysqli_query($conn, $sqlforcourse) or die("Query Unsuccessful.");
while ($course = mysqli_fetch_array($resultforcourse)) {
?>
<option value="<?php echo $course['course_id']; ?>"><?php echo $course["course_name"]; ?></option>
<?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="teacher">Teacher</label>
                        <select class="form-control session" id="teacher" name="teacher"class="form-group session" required></select>
                    </div>

                    <div class="form-group">
                        <label>Mid Term Marks</label>
                        <input type="text" name="mid" class="form-group session" placeholder="Enter marks out of 35"required/>
                    </div>

                    <div class="form-group">
                        <label>Final Term Marks</label>
                        <input type="text" name="final"class="form-group session"  placeholder="Enter marks out of 40"required/>
                    </div>

                    <div class="form-group">
                        <label>Sessional Marks</label>
                        <input type="text" name="sessional" class="form-group session" placeholder="Enter marks out of 25"required/>
                    </div>
                    
                    <input  class="btn btn-primary float-right px-4" type="submit" value="Save" name="submit"><br>
                </form>
                <?php } } ?>
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

    <script>
    function checkdelete() {
        return confirm('Are you sure you want to delete this record ?');
    }
    </script>
    <script type="text/javascript">  
    $(document).ready(function() {
        $('#course').on('change', function() {
            var course_id = this.value;
            var student_id = "<?php echo $row1['student_id']; ?>";
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
    <script>
    function validateMarks() {
    const midTermMarksInput = document.querySelector('input[name="mid"]');
    const finalTermMarksInput = document.querySelector('input[name="final"]');
    const sessionalMarksInput = document.querySelector('input[name="sessional"]');

    const midTermMarksValue = parseFloat(midTermMarksInput.value);
    const finalTermMarksValue = parseFloat(finalTermMarksInput.value);
    const sessionalMarksValue = parseFloat(sessionalMarksInput.value);

    // Check if Mid Term Marks is valid
    if (midTermMarksValue > 35 || midTermMarksValue < 0 || isNaN(midTermMarksValue)) {
    alert("Mid Term Marks should be a number between 0 and 35");
    midTermMarksInput.value = ''; // Clear input field
    midTermMarksInput.focus(); // Set focus on the input field
    return false;
    }

    // Check if Final Term Marks is valid
    if (finalTermMarksValue > 40 || finalTermMarksValue < 0 || isNaN(finalTermMarksValue)) {
    alert("Final Term Marks should be a number between 0 and 40");
    finalTermMarksInput.value = ''; // Clear input field
    finalTermMarksInput.focus(); // Set focus on the input field
    return false;
    }

    // Check if Sessional Marks is valid
    if (sessionalMarksValue > 25 || sessionalMarksValue < 0 || isNaN(sessionalMarksValue)) {
    alert("Sessional Marks should be a number between 0 and 25");
    sessionalMarksInput.value = ''; // Clear input field
    sessionalMarksInput.focus(); // Set focus on the input field
    return false;
    }

    return true;
    }
    </script>
</body>
</html>