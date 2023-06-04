<?php
session_start();
include 'config.php';

$alertMessage = $_SESSION['alertMessage'] ?? '';
unset($_SESSION['alertMessage']);
?>
<!DOCTYPE html>
<html lang="en">
<?php include '../header_files.php'; ?>

<body>
    <div class="container-fluid">
        <div class="course_wrapper">
            <div class="row">
                <?php include '../sideBar.php'; ?>

                <div class="col-md-10">

                    <div class="row">
                        <div class="col-md-6">
                            <div class="px-4">
                                <h3 class="font-weight-bold my-4  pb-2">
                                    <i class="fas fa-calendar-day  mr-1"></i>
                                    Managing Time For Lectures
                                </h3>
                            </div>
                        </div>
                    </div>

                    <!-- <div class="px-4"><h3 class="font-weight-bold">Courses</h3></div> -->
                    <div class="row px-4 ">


                        <div class="col-md-6 ">
                            <div class="course list p-3">
                                <?php
                                $sql = "SELECT * FROM slot";
                                $result = mysqli_query($conn, $sql) or die("Query Unsuccessful.");

                                if (mysqli_num_rows($result) > 0) {
                                    ?>
                                    <table class="table table-borderless">
                                        <thead>
                                            <tr class="my-border">

                                                <th class="text-start pl-3">Slot Number</th>
                                                <th class="text-center">Time</th>

                                                <th class="text-center">Shift</th>
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
                                                        <?php echo $row['slot_no']; ?>
                                                    </td>

                                                    <td class="text-center">
                                                        <?php echo $row['slot_time']; ?>
                                                    </td>
                                                    <td class="text-center ">
                                                        <?php echo $row['shift']; ?>
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
                            <!-- Add this HTML code where you want to display the alert message -->
                            <div class="alert alert-danger <?php echo !empty($alertMessage) ? 'd-block' : 'd-none'; ?>">
                                <?php echo $alertMessage; ?>
                            </div>
                            <div class="course p-3">

                                <div class="px-0">
                                    <div class="department p-2">
                                        <h5 class="font-weight-bold dept-heading mb-3">
                                            ADD TIME
                                        </h5>

                                        <form action="savedata.php" method="post">
                                            <div class="row pb-2">
                                                <div class="col-md-12">
                                                    <select name="slot_no" class="session" required>
                                                        <option value="" selected disabled>
                                                            Lecture Number
                                                        </option>

                                                        <option value="First">first</option>
                                                        <option value="Second">second</option>
                                                        <option value="Third">third</option>



                                                        <option value="Fourth">fourth</option>
                                                        <option value="Fifth">fifth</option>
                                                        <option value="Sixth">sixth</option>
                                                        <option value="Morning off">Morning Off</option>

                                                        <option value="OFF">OFF</option>



                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label>
                                                        <h5>Start time</h5>
                                                    </label>
                                                    <input type="time" name="tstart" class="form-control" required />
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label>
                                                        <h5>End time</h5>
                                                    </label>
                                                    <input type="time" name="tend" class="form-control" required />
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="shift">
                                                        <div class="form-check-inline">
                                                            <label class="form-check-label" for="morning">
                                                                <input type="radio" class="form-check-input"
                                                                    id="morning" name="shift" value="morning"
                                                                    checked />Morning
                                                            </label>
                                                        </div>


                                                        <div class="form-check-inline">
                                                            <label class="form-check-label" for="afternoon">
                                                                <input type="radio" class="form-check-input"
                                                                    id="afternoon" name="shift"
                                                                    value="afternoon" />Afternoon
                                                            </label>
                                                        </div>


                                                    </div>
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