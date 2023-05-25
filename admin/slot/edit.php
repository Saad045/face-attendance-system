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
                                <h3 class="font-weight-bold my-4 pb-2">
                                    Managing Time For Slot
                                </h3>
                            </div>
                        </div>
                    </div>

                    <!-- <div class="px-4"><h3 class="font-weight-bold">Courses</h3></div> -->
                    <div class="row px-4 py-4">

                        <div class="col-md-6 pb-4">

                            <!-- Add this HTML code where you want to display the alert message -->
                            <div class="alert alert-danger <?php echo !empty($alertMessage) ? 'd-block' : 'd-none'; ?>">
                                <?php echo $alertMessage; ?>
                            </div>
                            <div class="course p-3">

                                <div class="px-0">
                                    <div class="department p-2">
                                        <a href='slot.php' class="font-weight-bold btn btn-sm mb-2"><i
                                                class="fas fa fa-arrow-left  text-primary"></i> Back</a>
                                        <h5 class="font-weight-bold dept-heading mb-3">
                                            UPDATE TIME
                                        </h5>
                                        <?php
                                        $s_id = $_GET['id'];
                                        $sql = "SELECT * FROM slot WHERE id = {$s_id}";
                                        $result = mysqli_query($conn, $sql) or die("Query Unsuccessful.");

                                        if (mysqli_num_rows($result) > 0) {
                                            while ($row = mysqli_fetch_array($result)) {
                                                ?>
                                                <form action="updatedata.php" method="post">
                                                    <div class="row pb-2">
                                                        <div class="col-md-12">
                                                            <select name="slot_no" class="session">
                                                                <option value="<?php echo $row['slot_no']; ?>" selected>
                                                                    <?php echo $row['slot_no']; ?>
                                                                </option>

                                                                <option value="first">first</option>
                                                                <option value="second">second</option>
                                                                <option value="third">third</option>
                                                                <option value="first shift-off">
                                                                    first shift-off
                                                                </option>
                                                                <option value="fourth">fourth</option>
                                                                <option value="fifth">fifth</option>
                                                                <option value="sixth">sixth</option>
                                                                <option value="off">off</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">

                                                        <input type="hidden" name="id" value="<?php echo $row['id']; ?>" />
                                                        <input type="text" name="slot_time" placeholder="Time"
                                                            class="form-control session"
                                                            value="<?php echo $row['slot_time']; ?>" required />
                                                    </div>

                                                    <div class="form-group">
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
                                                                        <label class="form-check-label" for="1stoff">
                                                                            <input type="radio" class="form-check-input"
                                                                                id="MorningOFF" name="shift"
                                                                                value="MorningOFF " />Morning OFF
                                                                        </label>
                                                                    </div>

                                                                    <div class="form-check-inline">
                                                                        <label class="form-check-label" for="afternoon">
                                                                            <input type="radio" class="form-check-input"
                                                                                id="afternoon" name="shift"
                                                                                value="afternoon" />Afternoon
                                                                        </label>
                                                                    </div>
                                                                    <div class="form-check-inline">
                                                                        <label class="form-check-label" for="off">
                                                                            <input type="radio" class="form-check-input"
                                                                                id="OFF" name="shift" value="OFF " />OFF
                                                                        </label>
                                                                    </div>

                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>
                                                    <div class="clearfix">
                                                        <input class="btn btn-primary float-right px-4" type="submit"
                                                            value="Update" />
                                                    </div>

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
</body>

</html>