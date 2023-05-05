<?php
    include 'config.php';

    $tt_course = $_POST['course'];
    $tt_slot = $_POST['slot'];
    $tt_day = $_POST['day'];
    $tt_teacher = $_POST['teacher'];

    // Cannot add or update a child row: a foreign key constraint fails??????
    $sql = "INSERT INTO time_table (id,day,course_id,slot_id,teacher_id) VALUES (Null,'{$tt_day}','{$tt_course}','{$tt_slot}','{$tt_teacher}')";
    $result = mysqli_query($conn, $sql) or die("Query Unsuccessful.");
    header("Location: index.php");
?>
