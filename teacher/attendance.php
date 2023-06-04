<?php
  include '../includes/teacherHeader.php';

  $course_id = $_GET['course_id'];
  $timetable_id = $_GET['timetable_id'];
  $curdate = date("Y-m-d");   // date("d M Y")

  $sqlforcourse = "SELECT * FROM course WHERE id=$course_id";
  $resultforcourse = mysqli_query($conn,$sqlforcourse);
  if (mysqli_num_rows($resultforcourse) > 0) {
    $course = mysqli_fetch_array($resultforcourse);
  }

  $sqlforclass = "SELECT student_timetable.id, student.id AS student_id, student.roll_no, student.name AS student_name FROM student_timetable INNER JOIN student ON student_timetable.student_id = student.id WHERE student_timetable.timetable_id=$timetable_id GROUP BY student_id ORDER BY roll_no ASC";
  $resultforclass = mysqli_query($conn,$sqlforclass);
?>
<body>
  <div class="container-fluid">
    <div class="subject_wrapper">
      <div class="row">
        <?php include '../includes/teacherSidebar.php'; ?>

        <div class="col-md-10">
          <div class="row">
            <div class="col-md-6">
              <div class="d-flex justify-content-between align-items-center px-4">
                <h4 class="font-weight-bold my-4 py-1"><?php echo $course['name']; ?></h4>
                    <button  id="sidebar-toggle" onclick="toggleSidebar()" class=" btn btn-outline-dark  btn-sm  float-right" >
                      <i class="fas fa-chevron-right   mr-1"></i>
                    </button>
              </div>
            </div>

            <div class="col-md-6">
              <div class="my-4 px-4">
                <input type="text" class="form-control" placeholder="Search.." style="border: 1px solid black;">
              </div>
            </div>
          </div>
          
          <div class="row align-items-center justify-content-between px-5 pt-4">
            <div>
              <div class="custom-control custom-radio custom-control-inline">
                <input type="radio" class="custom-control-input" id="allpresent" name="attendanceAll" value="P" onclick="selectAll(attendanceForm)">
                <label class="custom-control-label" for="allpresent">Mark All Present</label>
              </div>
              <div class="custom-control custom-radio custom-control-inline">
                <input type="radio" class="custom-control-input" id="allabsent" name="attendanceAll" value="A" onClick="selectAll(attendanceForm)">
                <label class="custom-control-label" for="allabsent">Mark All Absent</label>
              </div>
            </div>

            <div>
              <span class="px-4">
                <h6 class="d-inline-block">Date: <?php echo $curdate; ?></h6>
              </span>
              <button type="submit" form="attendanceForm" class="btn btn-primary" name="submit"><i class="fa fa-floppy-disk pr-2"></i>Save Attendance</button>
            </div>
          </div>

          <div class="row my-2 px-4">
            <div class="col-md-9">
              <form method="post" action="saveattendance.php" id="attendanceForm" name="attendanceForm">
                <table class="table table-borderless table-sm">
                  <thead>
                    <tr class="my-border">
                      <th class="text-center pt-4 pb-1">Roll Number</th>
                      <th class="text-center pt-4 pb-1">Name</th>

                      <th class="text-center pt-4 pb-1">Date</th>
                      <th class="text-center pt-4 pb-1">Mark Attendance</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    foreach ($resultforclass as $class) {
                      $student_id = $class['student_id'];
                    ?>
                    <tr><td colspan="6" class="pt-3 pb-2"></td></tr>

                    <tr class="row-color">
                      <td class="text-center round-left"><?php echo $class['roll_no']; ?></td>
                      <td class="text-center"><?php echo $class['student_name']; ?></td>

                      <input type="hidden" name="student_id[]" value="<?php echo $student_id; ?>">
                      <input type="hidden" name="course_id" value="<?php echo $course_id; ?>">
                      <input type="hidden" name="teacher_id" value="<?php echo $teacher_id; ?>">
                      <input type="hidden" name="timetable_id" value="<?php echo $timetable_id; ?>">
                      <td class="text-center"><?php echo $curdate; ?></td>
                      <td class="text-center round-right">
                        <div class="custom-control custom-radio custom-control-inline">
                          <input type="radio" class="custom-control-input" id="present<?php echo $student_id; ?>" name="attendance<?php echo $student_id; ?>[]" value="P">
                          <label class="custom-control-label" for="present<?php echo $student_id; ?>">Present</label>
                        </div>

                        <div class="custom-control custom-radio custom-control-inline">
                          <input type="radio" class="custom-control-input" id="absent<?php echo $student_id; ?>" name="attendance<?php echo $student_id; ?>[]" value="A">
                          <label class="custom-control-label" for="absent<?php echo $student_id; ?>">Absent</label>
                        </div>
                      </td>
                    </tr>
                    <?php } ?>
                  </tbody>
                </table>
              </form>
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>

  <script type="text/javascript">
  function selectAll(attendanceForm) {
    
    var check = document.getElementsByName("attendanceAll"),
    radios = document.attendanceForm.elements;
    
    //If the first radio is checked
    if (check[0].checked) {
    
      for( i = 0; i < radios.length; i++ ) {
        
        //And the elements are radios
        if( radios[i].type == "radio" ) {
          
          //And the radio elements's value are 1
          if (radios[i].value == 'P' ) {
            //Check all radio elements with value = 1
            radios[i].checked = true;
          }
          
        }//if
        
      }//for
      
    //If the second radio is checked
    } else {
      
      for( i = 0; i < radios.length; i++ ) {
        
        //And the elements are radios
        if( radios[i].type == "radio" ) {
          
          //And the radio elements's value are 0
          if (radios[i].value == 'A' ) {
    
            //Check all radio elements with value = 0
            radios[i].checked = true;
    
          }
          
        }//if
        
      }//for
      
    };//if
    return null;
  }
  </script>

  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.1/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>