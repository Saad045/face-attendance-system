<?php
  include '../includes/teacherHeader.php';
  $course_id = $_GET['course_id'];

  $sqlforslot = "SELECT * FROM slot";
  $resultforslot = mysqli_query($conn,$sqlforslot);

  $sqlforcoursetime = "SELECT time_table.id As id, course.id AS course_id, course.name As course_name, course.credit_hour, slot.id As slot_id, slot.slot_time, time_table.day, teacher.name As teacher_name, teacher.email As teacher_email, teacher.qualification, teacher.image As teacher_image FROM time_table INNER JOIN course ON time_table.course_id = course.id INNER JOIN slot ON time_table.slot_id = slot.id INNER JOIN teacher ON time_table.teacher_id = teacher.id WHERE time_table.teacher_id=$teacher_id && time_table.course_id=$course_id";
  // echo $sqlfortimetable;die();
  $resultforcoursetime = mysqli_query($conn,$sqlforcoursetime);
  // print_r($resultforcoursetime);die();

  // $row = mysqli_fetch_array($resultforcoursetime);
  // while ($timetable = mysqli_fetch_array($resultfortimetable)) {
  //   echo "<pre>";
  //   print_r($timetable);
  // }
  // die();
  


?>

<body>
  <div class="container-fluid">
    <div class="timetable_wrapper">
      <div class="row">
        <?php include '../includes/teacherSidebar.php'; ?>
        
        <div class="col-md-10">
          <div class="row">
            <div class="col-md-6">
              <div class="d-flex justify-content-between align-items-center px-4">
                <h5 class="font-weight-bold my-4 py-1">Course Time-Table</h5>
              </div>
            </div>

            <div class="col-md-6">
              <div class="my-4 px-4">
                <input type="text" class="form-control" placeholder="Search.." style="border: 1px solid black;">
              </div>
            </div>
          </div>

          <div class="row px-4 py-4">
            <!-- <div class="col-md-4 pb-4">
              <a href="class.html">
                <div class="course p-3">
                  <h5 class="font-weight-bold mb-1">Introduction To Computing</h5>
                  <h5 class="teacherName mb-1">Teacher Name</h5>
                  <div class="span">
                    <span>Credit Hours</span>
                    <span class="px-4">3</span>
                  </div>
                  <div class="span">
                    <span>Course Code</span>
                    <span class="px-4">CS-432</span>
                  </div>
                </div>
              </a>
            </div> -->
            

            <div class="col-md-12 pb-4">
              <div class="course table-responsive p-3">
                <!-- <table class="table table-bordered table-striped table-hover">
                  <thead class="thead-dark">
                    <tr>
                      <th>Time</th>
                      <th>Day</th>
                      <th>course</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    //foreach ($resultforcoursetime as $coursetime) {
                    ?>
                    <tr class='clickable-row' onclick="window.location='http://localhost/face-attendance-system/teacher/class.php?teacher_id=<?php //echo $teacher_id; ?>&course_id=<?php //echo $course_id; ?>&timetable_id=<?php //echo $coursetime['id']; ?>'">
                      <td><?php //echo $coursetime['slot_time']; ?></td>
                      <td><?php //echo $coursetime['day']; ?></td>
                      <td><?php //echo $coursetime['course_name']; ?></td>
                    </tr>
                    <?php //} ?>
                  </tbody>
                </table> -->


<!-- <td><a href="class.php?teacher_id=<?php //echo $teacher_id; ?>&course_id=<?php //echo $course_id; ?>">IC</a></td> -->
                <table class="table table-bordered table-striped table-hover">
                  <tr>
                    <th>Timing</th>
                    <th>Monday</th>
                    <th>Tuesday</th>
                    <th>Wednesday</th>
                    <th>Thursday</th>
                    <th>Friday</th>
                  </tr>
                  <?php
                  //$days = array('monday','tuseday','wednesday','thursday','friday');
                  //foreach ($resultforcoursetime as $coursetime) {
                  
                  foreach ($resultforslot as $slot) {
                  ?>
                  <tr>
                    <th><?php echo $slot['slot_time'];echo $slot['id']; ?></th>

                    <?php
                    $sql = "SELECT time_table.id, course.name AS course_name FROM time_table INNER JOIN course ON time_table.course_id = course.id WHERE time_table.teacher_id=$teacher_id && time_table.course_id=$course_id && time_table.day='monday' && time_table.slot_id='".$slot['id']."' ";
                    $result = mysqli_query($conn,$sql);
                    $row = mysqli_fetch_array($result);
                    ?>
                    <td onclick="window.location='class.php?teacher_id=<?php echo $teacher_id; ?>&course_id=<?php echo $course_id; ?>&timetable_id=<?php echo $row['id']; ?>'"><?php if (isset($row['course_name'])) {echo $row['course_name'];} else {echo ".....";} ?></td>

                    <?php
                    $sql = "SELECT time_table.id, course.name AS course_name FROM time_table INNER JOIN course ON time_table.course_id = course.id WHERE time_table.teacher_id=$teacher_id && time_table.course_id=$course_id && time_table.day='tuseday' && time_table.slot_id='".$slot['id']."' ";
                    $result = mysqli_query($conn,$sql);
                    $row = mysqli_fetch_array($result);
                    ?>
                    <td onclick="window.location='class.php?teacher_id=<?php echo $teacher_id; ?>&course_id=<?php echo $course_id; ?>&timetable_id=<?php echo $row['id']; ?>'"><?php if (isset($row['course_name'])) {echo $row['course_name'];} else {echo ".....";} ?></td>

                    <?php
                    $sql = "SELECT time_table.id, course.name AS course_name FROM time_table INNER JOIN course ON time_table.course_id = course.id WHERE time_table.teacher_id=$teacher_id && time_table.course_id=$course_id && time_table.day='wednesday' && time_table.slot_id='".$slot['id']."' ";
                    $result = mysqli_query($conn,$sql);
                    $row = mysqli_fetch_array($result);
                    ?>
                    <td onclick="window.location='class.php?teacher_id=<?php echo $teacher_id; ?>&course_id=<?php echo $course_id; ?>&timetable_id=<?php echo $row['id']; ?>'"><?php if (isset($row['course_name'])) {echo $row['course_name'];} else {echo ".....";} ?></td>

                    <?php
                    $sql = "SELECT time_table.id, course.name AS course_name FROM time_table INNER JOIN course ON time_table.course_id = course.id WHERE time_table.teacher_id=$teacher_id && time_table.course_id=$course_id && time_table.day='thursday' && time_table.slot_id='".$slot['id']."' ";
                    $result = mysqli_query($conn,$sql);
                    $row = mysqli_fetch_array($result);
                    ?>
                    <td onclick="window.location='class.php?teacher_id=<?php echo $teacher_id; ?>&course_id=<?php echo $course_id; ?>&timetable_id=<?php echo $row['id']; ?>'"><?php if (isset($row['course_name'])) {echo $row['course_name'];} else {echo ".....";} ?></td>

                    <?php
                    $sql = "SELECT time_table.id, course.name AS course_name FROM time_table INNER JOIN course ON time_table.course_id = course.id WHERE time_table.teacher_id=$teacher_id && time_table.course_id=$course_id && time_table.day='friday' && time_table.slot_id='".$slot['id']."' ";
                    $result = mysqli_query($conn,$sql);
                    $row = mysqli_fetch_array($result);
                    ?>
                    <td onclick="window.location='class.php?teacher_id=<?php echo $teacher_id; ?>&course_id=<?php echo $course_id; ?>&timetable_id=<?php echo $row['id']; ?>'"><?php if (isset($row['course_name'])) {echo $row['course_name'];} else {echo ".....";} ?></td>

                  </tr>
                  <?php }//} ?>
                </table>
              </div>
            </div>

            <!-- <div class="col-md-4 pb-4">
              <div class="course p-3">
                <h5 class="font-weight-bold mb-1">Introduction To Computing</h5>
                <h5 class="teacherName mb-1">Teacher Name</h5>
                <div class="span">
                  <span>Credit Hours</span>
                  <span class="px-4">3</span>
                </div>
                <div class="span">
                  <span>Course Code</span>
                  <span class="px-4">CS-432</span>
                </div>
              </div>
            </div>

            <div class="col-md-4 pb-4">
              <div class="course p-3">
                <h5 class="font-weight-bold mb-1">Introduction To Computing</h5>
                <h5 class="teacherName mb-1">Teacher Name</h5>
                <div class="span">
                  <span>Credit Hours</span>
                  <span class="px-4">3</span>
                </div>
                <div class="span">
                  <span>Course Code</span>
                  <span class="px-4">CS-432</span>
                </div>
              </div>
            </div>

            <div class="col-md-4 pb-4">
              <div class="course p-3">
                <h5 class="font-weight-bold mb-1">Introduction To Computing</h5>
                <h5 class="teacherName mb-1">Teacher Name</h5>
                <div class="span">
                  <span>Credit Hours</span>
                  <span class="px-4">3</span>
                </div>
                <div class="span">
                  <span>Course Code</span>
                  <span class="px-4">CS-432</span>
                </div>
              </div>
            </div> -->
          </div>
        </div>

      </div>
    </div>
  </div>

  <!-- <script type="text/javascript">
  $(document).ready(function() {
    $(".clickable-row").click(function() {
        window.location = $(this).data("href");
    });
  });
  </script> -->

  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.1/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>