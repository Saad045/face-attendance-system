<?php
session_start();
include 'config.php';

$alertMessage = $_SESSION['alertMessage'] ?? '';
unset($_SESSION['alertMessage']);
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
                            <a href="../teacher/teacher.php" class=" text-decoration-none" >
                                <i class="fas fa-arrow-circle-left   mr-1"></i>
                            </a> 
                                Teacher Time-Table
                            </h3>
                            </div>
                        </div>
                    </div>

                    <!-- <div class="px-4"><h3 class="font-weight-bold">Courses</h3></div> -->
                    <div class="row px-4 ">


                        <div class="col-md-7 pb-2 ">
                            <div class="course list p-3">
                                                    <?php
                                    $sql ="SELECT time_table.id, day, course.name AS course_name, slot.slot_no, teacher.name As t_name
                                    FROM time_table INNER JOIN course 
                                    ON time_table.course_id = course.id 
                                    INNER JOIN slot 
                                    ON time_table.slot_id = slot.id 
                                    INNER JOIN teacher 
                                    ON time_table.teacher_id = teacher.id 
                                    ORDER BY id";
                                    
                                    $result = mysqli_query($conn, $sql) or die("Query Unsuccessful.");

                                    if(mysqli_num_rows($result) > 0)  {
                                    ?>
                                        <table class="table table-borderless ">
                                            <thead>
                                                <tr class="my-border">
                                                    
                                                    <th class="text-start pl-3 ">Id</th>
                                                    <th class="text-start pl-3">Course</th>
                                                    
                                                    <th class="text-start">Teacher</th>

                                                    <th class="text-start">Slot</th>
                                                    <th class="text-start">Day</th>
                                                    <!-- <th class="text-center">Roll No</th> -->
                                                    <!-- <th class="text-center">Department</th>
                                                    <th class="text-center">Degree</th>
                                                    <th class="text-center">Session</th> -->
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
                                                    <td class="round-left"><?php echo $row['id']; ?></td>

                                                    
                                                    
                                                        
                                                    <td><?php echo $row['course_name']; ?></td>
                                                        
                                                    <!-- <td><?php echo $row['roll_no']; ?></td>
                                                    <td><?php echo $row['department']; ?></td>
                                                    <td><?php echo $row['degree']; ?></td>
                                                    <td><?php echo $row['session']; ?></td> -->

                                                    <td>
                                                    
                                                    <?php echo $row['t_name']; ?><br>
                                                    
                                                    </td>
                                                    <td>
                                                    
                                                    <?php echo $row['slot_no']; ?><br>
                                                    
                                                    </td>
                                                    <td>
                                                    
                                                    <?php echo $row['day']; ?><br>
                                                    
                                                    </td>
                                                    

                                                    
                                                    <td class="text-center round-right">
                                                        <a href='edit.php?id=<?php echo $row['id']; ?>'><i
                                                                class="fas fa-edit text-primary"></i></a>
                                                                <br>
                                                        <a href='delete-inline.php?id=<?php echo $row['id']; ?>'onclick="return checkdelete()"><i
                                                                class="fas fa-trash text-danger"></i></a>
                                                                <script>
                                                                    function checkdelete()
                                                                    {
                                                                        return confirm('Are you sure you want to delete this record ?It will delete record of that TimeTable from other tables as well !');
                                                                    }
                                                                    </script>
                                                    </td>
                                                </tr>



                                                <?php } ?>
                                                </tbody>
                                        </table>
                                                    <?php }else{
                                            echo "<h2>No Record Found</h2>";
                                            }
                                            mysqli_close($conn);
                                            ?>
                            </div>
                        </div>
     
                        <div class="col-md-5 pb-2 ">
                            <!-- Add this HTML code where you want to display the alert message -->
                    <div class="alert alert-danger <?php echo !empty($alertMessage) ? 'd-block' : 'd-none'; ?>">
                        <?php echo $alertMessage; ?>
                    </div>
                            <div class="course p-3">
                                <div class="px-0">
                                    <div class="department p-2">
                                        <h5 class="font-weight-bold dept-heading mb-3">
                                            ADD Teacher Time Table
                                        </h5>
                                        <form action="savedata.php" method="post" enctype="multipart/form-data">
                                            <div class="row pb-2">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label>Course</label>
                                                        <select name="course"  class="form-control session" required/>
                                                            <option value="" selected disabled>Select Course</option>
                                                            <?php
                                                            include 'config.php';

                                                            $sql = "SELECT * FROM course";
                                                            $result = mysqli_query($conn, $sql) or die("Query Unsuccessful.");

                                                            while($row = mysqli_fetch_assoc($result)){
                                                            ?>
                                                            <option value="<?php echo $row['id']; ?>"><?php echo $row['name']; ?></option>

                                                         <?php } ?>
                                                        </select>
                                                    </div>
                                                
                                                    <div class="form-group">
                                                        <label>Teacher</label>
                                                        <select name="teacher"  class="form-control session" required/>
                                                            <option value="" selected disabled>Select Teacher</option>
                                                            <?php
                                                            include 'config.php';

                                                            $sql = "SELECT * FROM teacher";
                                                            $result = mysqli_query($conn, $sql) or die("Query Unsuccessful.");

                                                            while($row = mysqli_fetch_assoc($result)){
                                                            ?>
                                                            <option value="<?php echo $row['id']; ?>"><?php echo $row['name']; ?></option>

                                                        <?php } ?>
                                                        </select>
                                                    </div>
                                                    <div class="form-group" >
                                                        <label>Slot</label>
                                                        <select name="slot" class="form-control session" required/>
                                                            <option value="" selected disabled>Select Slot</option>
                                                            <?php
                                                            include 'config.php';

                                                            $sql = "SELECT * FROM slot";
                                                            $result = mysqli_query($conn, $sql) or die("Query Unsuccessful.");

                                                            while($row = mysqli_fetch_assoc($result)){
                                                            ?>
                                                            <option value="<?php echo $row['id']; ?>"><?php echo $row['slot_no']; ?></option>

                                                        <?php } ?>
                                                        </select>
                                                    </div>
                                                    <label>Day</label>
                                                    <select name="day" class="form-control session" required>
                                                    
                                                        <option value="" selected disabled>
                                                            Select Day
                                                        </option>

                                                        <option value="monday">Monday</option>
                                                        <option value="tuesday">Tuesday</option>
                                                        <option value="wednessday">Wednessday</option>



                                                        <option value="thursday">Thursday</option>
                                                        <option value="friday">Friday</option>
                                                    </select>
                                                    
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