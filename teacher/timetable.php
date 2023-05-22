<?php
  include '../includes/teacherHeader.php';

  $sqlforslot = "SELECT * FROM slot";
  $resultforslot = mysqli_query($conn,$sqlforslot);

  $sqlforweeklytime = "SELECT time_table.id As id, course.id AS course_id, course.name As course_name, course.credit_hour, slot.id As slot_id, slot.slot_time, time_table.day, teacher.name As teacher_name, teacher.email As teacher_email, teacher.qualification, teacher.image As teacher_image FROM time_table INNER JOIN course ON time_table.course_id = course.id INNER JOIN slot ON time_table.slot_id = slot.id INNER JOIN teacher ON time_table.teacher_id = teacher.id WHERE time_table.teacher_id=$teacher_id";
  $resultforweeklytime = mysqli_query($conn,$sqlforweeklytime);
?>
<body>
  <div class="container-fluid">
    <div class="subject_wrapper">
      <div class="row">
        <?php include '../includes/teacherSidebar.php'; ?>
        
        <div class="col-md-10">
          <?php
          if (isset($info)) {
            echo $info;
          } //For unknown teacher entry!
          ?>
          <div class="row">
            <div class="col-md-6">
              <div class="d-flex justify-content-between align-items-center px-4">
                <h5 class="font-weight-bold my-4 py-1">Weekly Schedule</h5>
              </div>
            </div>

            <div class="col-md-6">
              <div class="my-4 px-4">
                <input type="text" class="form-control" placeholder="Search.." style="border: 1px solid black;">
              </div>
            </div>
          </div>

          <div class="row px-4 py-4">
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
                    $sql = "SELECT time_table.id, course.name AS course_name FROM time_table INNER JOIN course ON time_table.course_id = course.id WHERE time_table.teacher_id=$teacher_id && time_table.day='monday' && time_table.slot_id='".$slot['id']."' ";
                    $result = mysqli_query($conn,$sql);
                    $row = mysqli_fetch_array($result);
                    ?>
                    <td><?php if (isset($row['course_name'])) {echo $row['course_name'];} else {echo ".....";} ?></td>

                    <?php
                    $sql = "SELECT time_table.id, course.name AS course_name FROM time_table INNER JOIN course ON time_table.course_id = course.id WHERE time_table.teacher_id=$teacher_id && time_table.day='tuseday' && time_table.slot_id='".$slot['id']."' ";
                    $result = mysqli_query($conn,$sql);
                    $row = mysqli_fetch_array($result);
                    ?>
                    <td><?php if (isset($row['course_name'])) {echo $row['course_name'];} else {echo ".....";} ?></td>

                    <?php
                    $sql = "SELECT time_table.id, course.name AS course_name FROM time_table INNER JOIN course ON time_table.course_id = course.id WHERE time_table.teacher_id=$teacher_id && time_table.day='wednesday' && time_table.slot_id='".$slot['id']."' ";
                    $result = mysqli_query($conn,$sql);
                    $row = mysqli_fetch_array($result);
                    ?>
                    <td><?php if (isset($row['course_name'])) {echo $row['course_name'];} else {echo ".....";} ?></td>

                    <?php
                    $sql = "SELECT time_table.id, course.name AS course_name FROM time_table INNER JOIN course ON time_table.course_id = course.id WHERE time_table.teacher_id=$teacher_id && time_table.day='thursday' && time_table.slot_id='".$slot['id']."' ";
                    $result = mysqli_query($conn,$sql);
                    $row = mysqli_fetch_array($result);
                    ?>
                    <td><?php if (isset($row['course_name'])) {echo $row['course_name'];} else {echo ".....";} ?></td>

                    <?php
                    $sql = "SELECT time_table.id, course.name AS course_name FROM time_table INNER JOIN course ON time_table.course_id = course.id WHERE time_table.teacher_id=$teacher_id && time_table.day='friday' && time_table.slot_id='".$slot['id']."' ";
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

  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.1/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>