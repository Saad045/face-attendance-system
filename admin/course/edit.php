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
                                    Managing Courses
                                </h3>
                            </div>
                        </div>
                    </div>

                    <!-- <div class="px-4"><h3 class="font-weight-bold">Courses</h3></div> -->
                    <div class="row px-4 py-4">

                        <div class="col-md-5 pb-4 ">


                            <div class="course p-3">
                                <div class="px-0">
                                    <a href='course.php' class="font-weight-bold btn btn-sm "><i
                                            class="fas fa fa-arrow-left  text-primary"></i> Back</a>
                                    <div class="department p-2">
                                        <h5 class="font-weight-bold dept-heading mb-3">
                                            UPDATE COURSE
                                        </h5>
                                        <?php
    $c_id = $_GET['id'];
    $sql = "SELECT * FROM course WHERE id = {$c_id}";
    $result = mysqli_query($conn, $sql) or die("Query Unsuccessful.");

    if(mysqli_num_rows($result) > 0)  {
      while($row = mysqli_fetch_array($result)){
    ?>
                                        <form action="updatedata.php" method="post">
                                            <div class="row pb-2">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <input type="hidden" name="id"
                                                            value="<?php echo $row['id']; ?>" />
                                                        <input type="text" name="name" placeholder="Course Name"
                                                            value="<?php echo $row['name']; ?>"
                                                            class="form-control session" required/>
                                                        <!-- <input placeholder="Course Name" type="text" name="course_name" /> -->
                                                    </div>
                                                    <div class="form-group">

                                                        <input type="text" name="course_code" placeholder="Course Code"
                                                            class="form-control session"
                                                            value="<?php echo $row['course_code']; ?>" required/>
                                                    </div>
                                                </div>
                                            </div>



                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <input type="text" name="credit_hour" placeholder="Credit Hour" class="form-control session"
                                                        value="<?php echo $row['credit_hour']; ?>" required/>
                                                </div>

                                                <div class="form-group col-md-6">
                                                    <input type="text" name="hours" placeholder="Lecture Hours" class="form-control session"
                                                        value="<?php echo $row['hours']; ?>" required/>
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