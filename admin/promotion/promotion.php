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
                <?php include '../sideBar.php'; ?>

                <div class="col-md-10">
                    <div class="row">
                        <div class="col-md-6">
                            <h3 class="font-weight-bold my-4 px-4 pb-2"><a href="../student/student.php"
                                    class=" text-decoration-none"><i
                                        class="fas fa-arrow-circle-left   mr-1"></i></a>Student Promotion</h3>
                        </div>
                    </div>

                    <!-- <div class="px-4"><h3 class="font-weight-bold">Courses</h3></div> -->
                    <div class="row px-4">

                        <div class="col-md-12 pb-2 ">
                            <!-- Add this HTML code where you want to display the alert message -->
                            <div
                                class="alert alert-success alert-dismissible <?php echo !empty($success) ? 'd-block' : 'd-none'; ?>">
                                <button type="button" class="close" data-dismiss="alert">&times;</button>
                                <?php echo $success; ?>
                            </div>
                            <div
                                class="alert alert-danger alert-dismissible <?php echo !empty($error) ? 'd-block' : 'd-none'; ?>">
                                <button type="button" class="close" data-dismiss="alert">&times;</button>
                                <?php echo $error; ?>
                            </div>

                            <div class="course p-3">
                                <div class="department p-2">
                                    <h5 class="font-weight-bold dept-heading mb-3">Add Time-Table</h5>
                                    <form class="post-form" action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
                                        <div class="form-group">
                                            <label>Degree</label>
                                            <select name="degree" class="post-form session" required>
                                                <option value="" selected disabled>Select Degree</option>
                                                <?php
                                                $sql = "SELECT degree FROM student GROUP BY degree";
                                                $result = mysqli_query($conn, $sql) or die("Query Unsuccessful.");
                                                while ($row = mysqli_fetch_array($result)) {
                                                    ?>
                                                    <option value="<?php echo $row['degree']; ?>"><?php echo $row['degree']; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label>Session</label>
                                            <select name="session" class="post-form session">
                                                <option value="" selected disabled>Select Session</option>
                                                <?php
                                                $sql = "SELECT session FROM student GROUP BY session";
                                                $result = mysqli_query($conn, $sql) or die("Query Unsuccessful.");
                                                while ($row = mysqli_fetch_array($result)) {
                                                    ?>
                                                    <option value="<?php echo $row['session']; ?>"><?php echo $row['session']; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label>Shift</label>
                                            <select name="shift" class="post-form session">
                                                <option value="" selected disabled>Select Shift</option>
                                                <?php
                                                $sql = "SELECT shift FROM student GROUP BY shift ORDER BY shift DESC";
                                                $result = mysqli_query($conn, $sql) or die("Query Unsuccessful.");
                                                while ($row = mysqli_fetch_array($result)) {
                                                    ?>
                                                    <option value="<?php echo $row['shift']; ?>"><?php echo $row['shift']; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>

                                        <!-- <div class="form-group">
                                            <label for="course">Course</label>
                                            <select class="post-form session" id="course" name="course">
                                                <option value="" selected disabled>Select Course</option>
                                                <?php
                                                $sqlforcourse = "SELECT * FROM course";
                                                $resultforcourse = mysqli_query($conn, $sqlforcourse) or die("Query Unsuccessful.");
                                                if (mysqli_num_rows($resultforcourse) > 0) {
                                                    while ($course = mysqli_fetch_array($resultforcourse)) {
                                                        ?>
                                                        <option value="<?php echo $course['id']; ?>"><?php echo $course["name"]; ?></option>
                                                    <?php }
                                                } ?>
                                            </select>
                                        </div> -->
                                        <div class="form-group">
                                            <label>Semester</label>
                                            <select name="semester" class="post-form session">
                                                <option value="" selected disabled>Select Semester</option>
                                                <?php
                                                $sql = "SELECT semester FROM student GROUP BY semester ORDER BY semester DESC";
                                                $result = mysqli_query($conn, $sql) or die("Query Unsuccessful.");
                                                while ($row = mysqli_fetch_array($result)) {
                                                    ?>
                                                    <option value="<?php echo $row['semester']; ?>"><?php echo $row['semester']; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <!-- <div class="form-group">
                                            <label for="teacher">Teacher</label>
                                            <select class="post-form session" id="teacher" name="teacher"
                                                required></select>
                                        </div> -->

                                        <input class="btn btn-primary float-right px-4" type="submit" name="showbtn"
                                            value="Show" /><br>
                                    </form>

                                    <?php
                                    if (isset($_POST['showbtn'])) {
                                        $degree = $_POST['degree'];
                                        $session = $_POST['session'];
                                        $shift = $_POST['shift'];

                                        $semester = $_POST['semester'];

                                        $sql = "SELECT * FROM student WHERE degree='" . $degree . "' && session='" . $session . "' && shift='" . $shift . "' && semester='" . $semester . "'";
                                        $result = mysqli_query($conn, $sql) or die("Query Unsuccessful.");
                                        $count = mysqli_num_rows($result);
                                        if ($count > 0) {
                                            ?>
                                            <form class="post-form" action="change_semester.php" method="post">

                                                <?php while ($row = mysqli_fetch_array($result)) { ?>
                                                    <input type="hidden" name="student_id[]" value="<?php echo $row['id']; ?>">
                                                    <!-- $student[]=$row['id']; -->
                                                    <!-- <input type="hidden" name="course_id" value="<?php echo $course; ?>">
                                                    <input type="hidden" name="teacher_id" value="<?php echo $teacher; ?>"> -->
                                                <?php } ?>

                                                <div class="form-group">
                                                    <label>Total Students</label>
                                                    <input class="post-form session" type="text" value="<?php echo $count; ?>"
                                                        readonly>
                                                </div>

                                                <div class="form-group">
                                                    <label>Students</label>
                                                    <select class="post-form session">
                                                        <option value="" selected disabled>Selected Students</option>
                                                        <?php
                                                        $sql = "SELECT * FROM student WHERE degree='" . $degree . "' && session='" . $session . "' && shift='" . $shift . "' && semester='" . $semester . "'";
                                                        $result = mysqli_query($conn, $sql) or die("Query Unsuccessful.");
                                                        while ($row = mysqli_fetch_array($result)) {
                                                            ?>
                                                            <option value="<?php echo $row['id']; ?>" disabled> <?php $row['roll_no'];
                                                               echo " ";
                                                               echo $row['name']; ?> </option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label>New Semester</label>
                                                    <select name="new_semester" class="post-form session" required>
                                                        <option value="" selected disabled>Select New Semester</option>
                                                        <!-- Add options for the available semesters -->


                                                        <option value="first">first</option>
                                                        <option value="second">second</option>
                                                        <option value="third">third</option>



                                                        <option value="fourth">fourth</option>
                                                        <option value="fifth">fifth</option>
                                                        <option value="sixth">sixth</option>
                                                        <option value="sixth">seventh</option>
                                                        <option value="sixth">eightth</option>
                                                        <option value="sixth">ninth</option>
                                                        <option value="sixth">tenth</option>


                                                    </select>
                                                </div>

                                                <input class="btn btn-primary float-right px-4" type="submit" name="time-submit"
                                                    value="Save"><br>
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

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <script>
        function checkdelete() {
            return confirm('Are you sure you want to delete this record ?');
        }
    </script>
    <script>
        $(document).ready(function () {
            $('.js-example-basic-multiple').select2();
        });
    </script>
    <script type="text/javascript">
        $(document).ready(function () {
            $('#course').on('change', function () {
                var course_id = this.value;
                $.ajax({
                    url: "getteacher.php",
                    type: "POST",
                    data: {
                        course_id: course_id
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