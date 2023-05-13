<?php
    include 'config.php';
    $course_id = $_POST["course_id"];

    // We have to select teacher against course and then student. It means we have to select teacher using studentTimetable entity rather than timetable entity. Otherwise there is a chance that user will select a teacher who is teaching that course but he is not teaching that course to the selected student.
    // $sql = "SELECT time_table.id, time_table.teacher_id, teacher.name AS teacher_name FROM time_table INNER JOIN teacher ON teacher.id = time_table.teacher_id WHERE time_table.course_id = $course_id GROUP BY teacher_name ORDER BY time_table.id ASC";

    $sql = "SELECT time_table.id, time_table.teacher_id, teacher.name AS teacher_name FROM time_table INNER JOIN teacher ON teacher.id = time_table.teacher_id WHERE time_table.course_id = $course_id GROUP BY teacher_name ORDER BY time_table.teacher_id ASC ";
    $result = mysqli_query($conn,$sql);
?>
<option value="" selected disabled>Select Teacher</option>
<?php
    while($row = mysqli_fetch_array($result)) {
?>
<option value="<?php echo $row["teacher_id"];?>"><?php echo $row["teacher_name"];?></option>
<?php
    }
?>