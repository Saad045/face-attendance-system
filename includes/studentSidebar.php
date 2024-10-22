<div class="col-md-2 bg-dark text-white sticky-top sidebar" id="sidebar">
<button  id="sidebar-toggle-on-sidebar" onclick="toggleSidebar()" class=" btn btn-outline-light  btn-sm  float-right mt-4" >
      <i class="fas fa-chevron-left   mr-1"></i>
</button> 
<!-- 180*180 -->
  <img src="../admin/<?php echo $student['picture']; ?>" class="img-fluid px-3 py-3">
  <h5 class="mb-0 font-weight-bold text-center">
    <?php echo $student['name']; ?>
</h5>
  <div class="tab my-3 px-4"><a href="timetable.php?student_id=<?php echo $student_id; ?>"><i class="fas fa-calendar-week  mr-2"></i>Timetable</a></div>
  <?php
  $sqlfortimetable = "SELECT student_timetable.id As id, student.name As student_name, student.roll_no, student.session, student.email As student_email, student.picture As student_picture, course.id As course_id, course.name As course_name, course.credit_hour, slot.slot_time, time_table.day, teacher.name As teacher_name, teacher.email As teacher_email, teacher.qualification, teacher.image As teacher_image FROM student_timetable INNER JOIN student ON student_timetable.student_id = student.id INNER JOIN time_table ON student_timetable.timetable_id = time_table.id INNER JOIN course ON time_table.course_id = course.id INNER JOIN slot ON time_table.slot_id = slot.id INNER JOIN teacher ON time_table.teacher_id = teacher.id WHERE student_timetable.student_id =$student_id GROUP BY course_name ORDER BY course_id ASC";
  $resultfortimetable = mysqli_query($conn, $sqlfortimetable);


  if (mysqli_num_rows($resultfortimetable) > 0) {
    while ($timetable = mysqli_fetch_array($resultfortimetable)) {

      ?>
      <div class="tab my-3 px-4"><a
          href="subject.php?student_id=<?php echo $student_id; ?>&course_id=<?php echo $timetable['course_id']; ?>"><i class="fas fa-book   mr-2"></i><?php echo $timetable['course_name']; ?></a></div>
      <?php
    }
  }
  ?>
  <div class="tab my-3 px-4"><a href="student.php?student_id=<?php echo $student_id; ?>"><i class="fas fa-list-check   mr-2"></i>Report</a></div>
  <div class="tab my-3 px-4"><a href="logout.php"><i class="fas fa-sign-out   mr-2"></i>Logout</a></div>
</div>