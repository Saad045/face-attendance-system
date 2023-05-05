<?php
include 'config.php';
include 'header.php';
?>
<div id="main-content">
    <h2>All Records</h2>
    <?php
    $sql = "SELECT student_timetable.id As st_id, student.roll_no, course.name As course_name
    FROM (((((student_timetable
    INNER JOIN student ON student_timetable.student_id = student.id)
    LEFT OUTER JOIN time_table ON student_timetable.timetable_id = time_table.id)
    LEFT OUTER JOIN course ON time_table.course_id = course.id)
    LEFT OUTER JOIN slot ON time_table.slot_id = slot.id)
    LEFT OUTER JOIN teacher ON time_table.teacher_id = teacher.id)
    ORDER BY student_timetable.id ASC";
      
    $result = mysqli_query($conn, $sql) or die("Query Unsuccessful.");
    if(mysqli_num_rows($result) > 0)  {
    ?>
    <table cellpadding="7px">
        <thead>
            <th>Id</th>
            <th>Roll_No</th>     
            <th>Course_name</th>
            <th>Action</th>
        </thead>
        <tbody>
            <?php
                while($row = mysqli_fetch_array($result)){
            ?>
            <tr>
                <td><?php echo $row['st_id']; ?></td>
                <td><?php echo $row['roll_no']; ?></td>
                <td><?php echo $row['course_name']; ?></td>
                <td>
                    <a href='edit.php?id=<?php echo $row['st_id']; ?>'>Edit</a>
                    <a href='delete-inline.php?id=<?php echo $row['st_id']; ?>'>Delete</a>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
    <?php } else {
        echo "<h2>No Record Found</h2>";
    }
    ?>
</div>
</div>
</body>
</html>
