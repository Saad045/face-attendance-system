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
                                    Profile
                                </h3>
                            </div>
                        </div>
                    </div>

                    <!-- <div class="px-4"><h3 class="font-weight-bold">Courses</h3></div> -->
                    <div class="row px-4 ">

                        <div class="col-md-5 pb-4 ">


                            <div class="course p-3">
                                <div class="px-0">
                                    <a href='mark_sheet.php' class="font-weight-bold btn btn-sm "><i
                                            class="fas fa fa-arrow-left  text-primary"></i> Back</a>
                                    <div class="department p-2">
                                        <h5 class="font-weight-bold dept-heading mb-3">
                                            UPDATE Record
                                        </h5>
                                        <?php
                                          $ms_id = $_GET['id'];

                                          $sql = "SELECT mark_sheet.id, student.roll_no, student.name AS student_name, course.name AS course_name, teacher.name AS teacher_name, mark_sheet.mid, mark_sheet.final, mark_sheet.sessional FROM mark_sheet INNER JOIN student ON mark_sheet.student_id = student.id INNER JOIN course ON mark_sheet.course_id = course.id INNER JOIN teacher ON mark_sheet.teacher_id = teacher.id WHERE mark_sheet.id = $ms_id";
                                          $result = mysqli_query($conn, $sql) or die("Query Unsuccessful.");
                                          if(mysqli_num_rows($result) > 0)  {
                                            while($row = mysqli_fetch_array($result)){
                                        ?>
                                        <form onsubmit="return validateMarks()" action="updatedata.php" method="post" enctype="multipart/form-data">
                                            <div class="row pb-2">
                                                <div class="col-md-12">
                                                  
                                                  <div class="form-group">
                                                    <!-- <label>MarkSheetID</label> -->
                                                    <input type="hidden" name="ms_id" value="<?php echo $row['id']; ?>"/>
                                                  </div>
                                                  <div class="form-group">
                                                    <label>Student</label>
                                                    <input type="text" class="form-group session"name="student" value="<?php echo $row['roll_no'];echo " ";echo $row['student_name']; ?>" readonly/>
                                                  </div>

                                                  <div class="form-group">
                                                    <label>Course</label>
                                                    <input type="text" class="form-group session"name="course" value="<?php echo $row['course_name']; ?>" readonly/>
                                                  </div>
                                                  <!-- Make sure on the time of adding that we could not add marks of a student against a single subject two or more times -->

                                                  <div class="form-group">
                                                    <label>Teacher</label>
                                                    <input type="text" class="form-group session"name="teacher" value="<?php echo $row['teacher_name']; ?>" readonly/>
                                                  </div>

                                                  <div class="form-group">
                                                    <label>Mid Term Marks</label>
                                                    <input type="text" class="form-group session"name="mid" value="<?php echo $row['mid']; ?>"required/>
                                                  </div>

                                                  <div class="form-group">
                                                      <label>Final Term Marks</label>
                                                      <input type="text" class="form-group session"name="final" value="<?php echo $row['final']; ?>"required/>
                                                  </div>

                                                  <div class="form-group">
                                                      <label>Sessional Marks</label>
                                                      <input type="text" class="form-group session"name="sessional" value="<?php echo $row['sessional']; ?>"required/>
                                                  </div>
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