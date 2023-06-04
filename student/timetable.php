<?php
  include '../includes/studentHeader.php';

  $sqlforslot = "SELECT * FROM slot";
  $resultforslot = mysqli_query($conn,$sqlforslot);

  $sqlforweeklytime = "SELECT student_timetable.id As id, course.id AS course_id, course.name As course_name, course.credit_hour, slot.id As slot_id, slot.slot_time, time_table.day, teacher.name As teacher_name, teacher.email As teacher_email, teacher.qualification, teacher.image As teacher_image FROM student_timetable INNER JOIN time_table ON student_timetable.timetable_id = time_table.id INNER JOIN course ON time_table.course_id = course.id INNER JOIN slot ON time_table.slot_id = slot.id INNER JOIN teacher ON time_table.teacher_id = teacher.id WHERE student_timetable.student_id=$student_id";
  $resultforweeklytime = mysqli_query($conn,$sqlforweeklytime);
?>
<body>
  
  <div class="container-fluid">
    <div class="subject_wrapper">
      <div class="row">
        <?php include '../includes/studentSidebar.php'; ?>
        
        <div class="col-md-10">
          <div class="row justify-content-between px-4">
            <div class="col-md-6 d-flex justify-content-between align-items-center">
              <h5 class="font-weight-bold my-4">Weekly Schedule</h5>
              <button href="#" id="sidebar-toggle" onclick="toggleSidebar()" class=" btn btn-outline-dark  btn-sm  float-right" >
                      <i class="fas fa-chevron-left   mr-1"></i>
                  </button>
            </div>

            <div class="col-md-5">
              <div class="my-4">
                <input type="text" class="form-control" placeholder="Search.." style="border: 1px solid black;">
              </div>
            </div>
          </div>

          <div class="row px-5 my-5">
            <div class="col-md-12">
              <div class="course table-responsive p-3">
                <table class="table table-bordered table-striped table-hover">
                  <thead class="thead-dark">
                    <tr>
                      <th>Timing</th>
                      <th>Monday</th>
                      <th>Tuesday</th>
                      <th>Wednesday</th>
                      <th>Thursday</th>
                      <th>Friday</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    foreach ($resultforslot as $slot) {
                    ?>
                    <tr>
                      <th><?php echo $slot['slot_time']; ?></th>

                      <?php
                      $sql = "SELECT student_timetable.id, course.name AS course_name FROM student_timetable INNER JOIN time_table ON student_timetable.timetable_id = time_table.id INNER JOIN course ON time_table.course_id = course.id WHERE student_timetable.student_id=$student_id && time_table.day='monday' && time_table.slot_id='".$slot['id']."' ";
                      $result = mysqli_query($conn,$sql);
                      $row = mysqli_fetch_array($result);
                      ?>
                      <td><?php if (isset($row['course_name'])) {echo $row['course_name'];} else {echo ".....";} ?></td>

                      <?php
                      $sql = "SELECT student_timetable.id, course.name AS course_name FROM student_timetable INNER JOIN time_table ON student_timetable.timetable_id = time_table.id INNER JOIN course ON time_table.course_id = course.id WHERE student_timetable.student_id=$student_id && time_table.day='tuseday' && time_table.slot_id='".$slot['id']."' ";
                      $result = mysqli_query($conn,$sql);
                      $row = mysqli_fetch_array($result);
                      ?>
                      <td><?php if (isset($row['course_name'])) {echo $row['course_name'];} else {echo ".....";} ?></td>

                      <?php
                      $sql = "SELECT student_timetable.id, course.name AS course_name FROM student_timetable INNER JOIN time_table ON student_timetable.timetable_id = time_table.id INNER JOIN course ON time_table.course_id = course.id WHERE student_timetable.student_id=$student_id && time_table.day='wednesday' && time_table.slot_id='".$slot['id']."' ";
                      $result = mysqli_query($conn,$sql);
                      $row = mysqli_fetch_array($result);
                      ?>
                      <td><?php if (isset($row['course_name'])) {echo $row['course_name'];} else {echo ".....";} ?></td>

                      <?php
                      $sql = "SELECT student_timetable.id, course.name AS course_name FROM student_timetable INNER JOIN time_table ON student_timetable.timetable_id = time_table.id INNER JOIN course ON time_table.course_id = course.id WHERE student_timetable.student_id=$student_id && time_table.day='thursday' && time_table.slot_id='".$slot['id']."' ";
                      $result = mysqli_query($conn,$sql);
                      $row = mysqli_fetch_array($result);
                      ?>
                      <td><?php if (isset($row['course_name'])) {echo $row['course_name'];} else {echo ".....";} ?></td>

                      <?php
                      $sql = "SELECT student_timetable.id, course.name AS course_name FROM student_timetable INNER JOIN time_table ON student_timetable.timetable_id = time_table.id INNER JOIN course ON time_table.course_id = course.id WHERE student_timetable.student_id=$student_id && time_table.day='friday' && time_table.slot_id='".$slot['id']."' ";
                      $result = mysqli_query($conn,$sql);
                      $row = mysqli_fetch_array($result);
                      ?>
                      <td><?php if (isset($row['course_name'])) {echo $row['course_name'];} else {echo ".....";} ?></td>
                    </tr>
                    <?php } ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>

</body>
</html>