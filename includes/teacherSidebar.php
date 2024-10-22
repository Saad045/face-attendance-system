
<div class="col-md-2 container bg-dark text-white sticky-top sidebar" id="sidebar">
  <button id="sidebar-toggle-on-sidebar" onclick="toggleSidebar()"
    class=" btn btn-outline-light  btn-sm  float-right mt-4">
    <i class="fas fa-chevron-left   mr-1"></i>
  </button>
  <img src="../admin/<?php echo $teacher['image']; ?>" class="img-fluid px-3 py-3"> <!-- 181*181 -->
  <h5 class="mb-0 font-weight-bold text-center">
    <?php echo $teacher['name']; ?>
</h5>
  <div class="tab my-3 px-4"><a href="timetable.php?teacher_id=<?php echo $teacher_id; ?>"><i class="fas fa-calendar-week   mr-2"></i>Timetable</a></div>
  <?php
  $sqlfortimetable = "SELECT time_table.id As id, course.id AS course_id, course.name As course_name, course.credit_hour, slot.slot_time, time_table.day, teacher.name As teacher_name, teacher.email As teacher_email, teacher.qualification, teacher.image As teacher_image FROM time_table INNER JOIN course ON time_table.course_id = course.id INNER JOIN slot ON time_table.slot_id = slot.id INNER JOIN teacher ON time_table.teacher_id = teacher.id WHERE time_table.teacher_id = $teacher_id GROUP BY course_name ORDER BY course.id ASC";
  $resultfortimetable = mysqli_query($conn, $sqlfortimetable);
  if (mysqli_num_rows($resultfortimetable) > 0) {
    while ($timetable = mysqli_fetch_array($resultfortimetable)) {
      ?>
      <div class="tab my-3 px-4">
        <a
          href="courseTimetable.php?teacher_id=<?php echo $teacher_id; ?>&course_id=<?php echo $timetable['course_id']; ?>">
          <i class="fas fa-book   mr-2"></i>
          <?php echo $timetable['course_name']; ?>
        </a>
      </div>
      <?php
    }
  }
  // else {
  //   $info = "<div class='alert alert-info alert-dismissible'>
  //     <button type='button' class='close' data-dismiss='alert'>&times;</button>
  //     No timetable exist!
  //   </div>";
  // }
  ?>
  <div class="tab my-3 px-4">
    <a href="logout.php"><i class="fas fa-sign-out   mr-2"></i>Logout</a>
  </div>
</div>