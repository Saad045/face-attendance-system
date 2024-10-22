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
                    <a href="../student/student.php" class=" text-decoration-none"><i class="fas fa-arrow-circle-left mr-1"></i></a> Student Attendance Sheet
                </h3>
            </div>
        </div>

        <div class="row px-4">
        <div class="col-md-8 pb-2">
            <div class="course list p-3">
                <?php
                $sql = "SELECT attendance_sheet.id, attendance_sheet.student_id, student.roll_no, student.name, attendance_sheet.course_id, course.name AS course_name, attendance_sheet.teacher_id, teacher.name AS teacher_name, attendance_sheet.date, attendance_sheet.lec_num, attendance_sheet.attendance_status FROM attendance_sheet INNER JOIN student ON attendance_sheet.student_id = student.id INNER JOIN teacher ON attendance_sheet.teacher_id = teacher.id INNER JOIN course ON attendance_sheet.course_id = course.id ORDER BY attendance_sheet.id";
                $result = mysqli_query($conn, $sql) or die("Query Unsuccessful.");
                if (mysqli_num_rows($result) > 0) {
                ?>
                <table class="table table-borderless ">
                    <thead>
                        <tr class="my-border">
                            <th class="text-start pl-3 ">Id</th>
                            <th class="text-start pl-3">Student</th>
                            <th class="text-start pl-3">Course</th>
                            <th class="text-start">Teacher</th>
                            <!-- <th class="text-start"></th> -->
                            <th class="text-start">Date</th>
                            <th class="text-start pl-3">Lecture Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        while ($row = mysqli_fetch_assoc($result)) {
                        ?>
                            <tr><td colspan="15" class="pt-1 "></td></tr>

                            <tr class="row-color">
                                <td class="round-left"><?php echo $row['id']; ?></td>
                                <td><?php echo $row['roll_no']; ?></td>
                                <td><?php echo $row['course_name']; ?></td>
                                <td><?php echo $row['teacher_name']; ?></td>
                                <!-- <td><?php echo $row['lec_num']; ?></td> -->
                                <td><?php echo $row['date']; ?></td>
                                <td><?php echo $row['lec_num']; ?> <b><?php echo $row['attendance_status']; ?></b>
                                </td>
                                <td class="text-center round-right">
                                    <a href='edit.php?id=<?php echo $row['id']; ?>'><i class="fas fa-edit text-primary"></i></a><br>

                                    <a href='delete-inline.php?id=<?php echo $row['id']; ?>' onclick="return checkdelete()"><i class="fas fa-trash text-danger"></i></a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
                <?php } else {
                    echo '<h2 class="alert alert-light">No Record Found!</h2>';
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
                <h5 class="font-weight-bold dept-heading mb-3">Mark Attendance</h5>
                <form class="post-form" action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
                    <div class="form-group">
                        <label>Student</label>
                        <select name="student" class="form-control session" required>
                            <option value="" selected disabled>Select Roll_no</option>
                            <?php
                            $sql = "SELECT * FROM student";
                            $result = mysqli_query($conn, $sql) or die("Query Unsuccessful.");

                            while ($row = mysqli_fetch_assoc($result)) {
                                ?>
                                <option value="<?php echo $row['id']; ?>"><?php echo $row['roll_no']; ?>
                                </option>
                            <?php } ?>
                        </select>
                    </div>

                    <input class="btn btn-primary float-right px-4" type="submit" name="showbtn" value="Add"><br>
                </form>

                <?php
                if (isset($_POST['showbtn'])) {
                    $student_id = $_POST['student'];

                    $sql1 = "SELECT student_timetable.timetable_id, student.id As student_id, student.roll_no, student.name As student_name FROM (student_timetable INNER JOIN student ON student_timetable.student_id = student.id) WHERE student_timetable.student_id = '" . $student_id . "' GROUP BY student_id";
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
                        <input type="hidden" name="student" id="student" value="<?php echo $row1['student_id']; ?>" />
                        <!-- <label>TimeTableID</label> -->
                        <input type="hidden" name="time_table" value="<?php echo $row1['timetable_id']; ?>" />
                    </div>

                    <div class="form-group">
                        <label for="course">Course</label>
                        <select class="form-control session" id="course" name="course" required>
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
                        <select class="form-control session" id="teacher" name="teacher" required></select>
                    </div>

                    <div class="form-row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Date</label>
                                <input class="form-control session" type="date" name="date"
                                    required />
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Lecture_No</label>
                                <input class="form-control session" type="text" name="lec_num"
                                    required />
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Mark Attendance</label>
                        <div class="form-control ">
                            <label class="mr-5 font-weight-bold"><input type="radio" name="attendance_status" value="P" required> Present</label>

                            <label class="font-weight-bold"><input type="radio" name="attendance_status" value="A" required> Absent</label>
                        </div>
                    </div><br>

                    <input class="btn btn-primary float-right px-4" type="submit" value="Save" name="submit"><br>
                </form>
                <?php
                        }
                    } else {
                        echo '<h3 class="alert alert-light mt-5">No Record Found!</h3>';
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
        $(document).ready(function () {
            $('#course').on('change', function () {
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
                    success: function (result) {
                        $("#teacher").html(result);
                    }
                });
            });
        });
    </script>
</body>

</html>