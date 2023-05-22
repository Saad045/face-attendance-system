<?php
  include '../includes/teacherHeader.php';

  $course_id = $_GET['course_id'];
  $sqlforcourse = "SELECT * FROM course WHERE id=$course_id";
  $resultforcourse = mysqli_query($conn,$sqlforcourse);
  if (mysqli_num_rows($resultforcourse) > 0) {
    $course = mysqli_fetch_array($resultforcourse);
  }

  $timetable_id = $_GET['timetable_id'];
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
              <div class="px-4">
                <div class="d-flex justify-content-between align-items-center">
                  <h5 class="font-weight-bold my-4 py-1"><?php echo $course['name']; ?></h5>
                </div>
              </div>
            </div>

            <div class="col-md-6">
              <div class="px-4">
                <div class="my-4">
                  <input type="text" class="form-control" placeholder="Search.." style="border: 1px solid black;">
                </div>
              </div>
            </div>
          </div>

          <div class="px-4 mt-4">
<!--             <a href="attendance.php" class="btn btn-primary">Mark Attendance</a>
            <a href="marks.php" class="btn btn-primary">Add Marks</a> -->
            <button type="submit" form="marks-form" class="btn btn-primary" name="submit"><i class="fa fa-floppy-disk pr-2"></i>Save Marks</button>
          </div>

          <div class="row my-2 px-4">
            <div class="col-md-12 ">
              <form method="post" action="savemarks.php" id="marks-form">
              <table class="table table-borderless table-sm">
                <thead>
                  <tr class="my-border">
                    <th class="text-center pt-4 pb-1">Roll No</th>
                    <th class="text-center pt-4 pb-1">Name</th>

                    <th class="text-center pt-4 pb-1">Marks</th>
                    <th class="text-center pt-4 pb-1">Mid</th>
                    <th class="text-center pt-4 pb-1">Final</th>
                    <th class="text-center pt-4 pb-1">Sessional</th>
                  </tr>
                </thead>
                <tbody>
                      <!-- border: none; outline: none; margin-top: 2px; -->
                  
                  <?php
                  foreach ($resultforclass as $class) {
                    $student_id = $class['student_id'];
                  ?>
                  
                  <tr><td colspan="6" class="py-2"></td></tr>
                  
                  <tr class="row-color">
                    <!-- <a href="studentData.php"></a> -->
                    <td class="text-center td-width round-left"><?php echo $class['roll_no']; ?></td>
                    <td class="text-center td-width"><?php echo $class['student_name']; ?></td>

                    
                      <input type="hidden" name="student_id[]" value="<?php echo $student_id; ?>">
                      <input type="hidden" name="course_id" value="<?php echo $course_id; ?>">
                      <input type="hidden" name="teacher_id" value="<?php echo $teacher_id; ?>">
                      <td class="text-center td-width"> <input type="text" name="total[]" class="marks-input" > </td>
                      <td class="text-center td-width"> <input type="text" name="mid[]" class="marks-input" > </td>
                      <td class="text-center td-width"> <input type="text" name="final[]" class="marks-input" > </td>
                      <td class="text-center td-width round-right"> <input type="text" name="sessional[]" class="marks-input" > </td>
                   
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

  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.1/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>