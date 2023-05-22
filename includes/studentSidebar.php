
        <div class="col-md-2 bg-dark text-white text-center sticky-top sidebar">
            <!-- 180*180 -->
            <img src="../<?php echo $student['picture']; ?>" class="img-fluid px-3 py-3">
            <p class="mb-0"><?php echo $student['name']; ?></p>
            <div class="tab my-3"><a href="timetable.php?student_id=<?php echo $student_id; ?>">Timetable</a></div>
  <?php
  $sqlfortimetable = "SELECT student_timetable.id As id, student.name As student_name, student.roll_no, student.session, student.email As student_email, student.picture As student_picture, course.id As course_id, course.name As course_name, course.credit_hour, slot.slot_time, time_table.day, teacher.name As teacher_name, teacher.email As teacher_email, teacher.qualification, teacher.image As teacher_image FROM student_timetable INNER JOIN student ON student_timetable.student_id = student.id INNER JOIN time_table ON student_timetable.timetable_id = time_table.id INNER JOIN course ON time_table.course_id = course.id INNER JOIN slot ON time_table.slot_id = slot.id INNER JOIN teacher ON time_table.teacher_id = teacher.id WHERE student_timetable.student_id =$student_id GROUP BY course_name ORDER BY course_id ASC";
  $resultfortimetable = mysqli_query($conn,$sqlfortimetable);
  
  
    if (mysqli_num_rows($resultfortimetable) > 0) {
      while ($timetable = mysqli_fetch_array($resultfortimetable)) {

  ?>
    <div class="tab my-3"><a href="subject.php?student_id=<?php echo $student_id; ?>&course_id=<?php echo $timetable['course_id']; ?>"><?php echo $timetable['course_name']; ?></a></div>
  <?php
      }
    }
  ?>
          
        </div>