        
        <div class="col-md-2 container bg-dark text-white text-center sticky-top sidebar">
          <img src="../<?php echo $teacher['image']; ?>" class="img-fluid px-3 py-3"> <!-- 181*181 -->
          <p class="mb-0"><?php echo $teacher['name']; ?></p>
  <?php
  $sqlfortimetable = "SELECT time_table.id As id, course.id AS course_id, course.name As course_name, course.credit_hour, slot.slot_time, time_table.day, teacher.name As teacher_name, teacher.email As teacher_email, teacher.qualification, teacher.image As teacher_image FROM time_table INNER JOIN course ON time_table.course_id = course.id INNER JOIN slot ON time_table.slot_id = slot.id INNER JOIN teacher ON time_table.teacher_id = teacher.id WHERE time_table.teacher_id = $teacher_id GROUP BY course_name ORDER BY course.id ASC";
  $resultfortimetable = mysqli_query($conn,$sqlfortimetable);
  if (mysqli_num_rows($resultfortimetable) > 0) {
    while ($timetable = mysqli_fetch_array($resultfortimetable)) {
  ?>
          <div class="tab my-3">
            <a href="courseTimetable.php?teacher_id=<?php echo $teacher_id; ?>&course_id=<?php echo $timetable['course_id']; ?>">
              <?php echo $timetable['course_name']; ?>
              <!-- <small><?php //echo $row['day'];echo " ";echo $row['slot_time']; ?></small> -->
            </a>
          </div>
  <?php
      }
    } else {
      $info =  "<div class='alert alert-info alert-dismissible'>
        <button type='button' class='close' data-dismiss='alert'>&times;</button>
        No timetable exist!
      </div>";
    }
  ?>
        </div>