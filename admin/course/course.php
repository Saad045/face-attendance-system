<?php
session_start();
include 'config.php';

$alertMessage = $_SESSION['alertMessage'] ?? '';
unset($_SESSION['alertMessage']);
?>
<!DOCTYPE html>
<html lang="en">

<?php include '../header_files.php'; ?>
</head>

<body>
    <div class="container-fluid">
        <div class="course_wrapper">
            <div class="row">
                <?php include '../sideBar.php'; ?>

                <div class="col-md-10">
                    <!-- Add this HTML code where you want to display the alert message -->
                    <div class="alert alert-danger <?php echo !empty($alertMessage) ? 'd-block' : 'd-none'; ?>">
                        <?php echo $alertMessage; ?>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="px-4">
                                <h3 class="font-weight-bold my-4 pb-2">
                                    Managing Courses
                                </h3>
                            </div>
                        </div>
                    </div>

                    <!-- <div class="px-4"><h3 class="font-weight-bold">Courses</h3></div> -->
                    <div class="row px-4 py-4">


                        <div class="col-md-7 pb-4">
                            <div class="course list p-3">
                                <?php
                                $sql = "SELECT * FROM course";
                                $result = mysqli_query($conn, $sql) or die("Query Unsuccessful.");

                                if (mysqli_num_rows($result) > 0) {
                                    ?>
                                    <table class="table table-borderless">
                                        <thead>
                                            <tr class="my-border">

                                                <th class="text-start pl-3">Id</th>
                                                <th class="text-center">Name</th>

                                                <th class="text-center">Course Code</th>
                                                <th class="text-center">Credit Hours</th>
                                                <th class="text-center">Lecture time</th>
                                                <th class="text-center">Action</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <?php
                                            while ($row = mysqli_fetch_array($result)) {
                                                ?>
                                                <tr>
                                                    <td colspan="15" class="pt-1 "></td>
                                                </tr>
                                                <tr class="row-color">

                                                    <td class="text-center round-left">
                                                        <?php echo $row['id']; ?>
                                                    </td>

                                                    <td class="text-center">
                                                        <?php echo $row['name']; ?>
                                                    </td>
                                                    <td class="text-center ">
                                                        <?php echo $row['course_code']; ?>
                                                    </td>
                                                    <td class="text-center ">
                                                        <?php echo $row['credit_hour']; ?>
                                                    </td>
                                                    <td class="text-center ">
                                                        <?php echo $row['hours']; ?>
                                                    </td>
                                                    <td class="text-center round-right">
                                                        <a href='edit.php?id=<?php echo $row['id']; ?>'><i
                                                                class="fas fa-edit text-primary"></i></a>
                                                        <a href='delete-inline.php?id=<?php echo $row['id']; ?>'
                                                            onclick="return checkdelete()"><i
                                                                class="fas fa-trash text-danger"></i></a>
                                                        <script>
                                                            function checkdelete() {
                                                                return confirm('Are you sure you want to delete this record ? This record will be deleted from all other tables as well !');
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
                                mysqli_close($conn);
                                ?>
                            </div>
                        </div>
                        <div class="col-md-5 pb-4 ">
                            <div class="course p-3">
                                <div class="px-0">
                                    <div class="department p-2">
                                        <h5 class="font-weight-bold dept-heading mb-3">
                                            ADD COURSE
                                        </h5>
                                        <form action="savedata.php" method="post">
                                            <div class="row pb-2">
                                                <div class="col-md-12">
                                                    <div class="form-group">

                                                        <input placeholder="Course Name" type="text" name="course_name"
                                                            class="form-control session" required />
                                                    </div>
                                                    <div class="form-group">

                                                        <input placeholder="Course Code" type="text" name="course_code"
                                                            class="form-control session" required />
                                                    </div>
                                                </div>
                                            </div>



                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <input placeholder="Credit Hours" type="text" name="credit_hour"
                                                        class="form-control session" required />
                                                </div>

                                                <div class="form-group col-md-6">
                                                    <input placeholder="Lecture Hours" type="text" name="hours"
                                                        class="form-control session" required />
                                                </div>
                                            </div>

                                            <div class="clearfix">
                                                <input class="btn btn-primary float-right px-4" type="submit"
                                                    value="Save" />
                                            </div>

                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>