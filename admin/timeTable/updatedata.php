<?php
session_start(); // Start the session

include 'config.php';

$tt_id = $_POST['t_id'];
$tt_course = $_POST['course'];
$tt_slot = $_POST['slot'];
$tt_day = $_POST['day'];
$tt_teacher = $_POST['teacher'];

// Query to check if the record already exists
$checkQuery = "SELECT * FROM time_table WHERE course_id = '{$tt_course}' AND slot_id = '{$tt_slot}' AND day = '{$tt_day}' AND teacher_id = '{$tt_teacher}' AND id != {$tt_id}";
$checkResult = mysqli_query($conn, $checkQuery);

// If a row is found, display an error message and stop the script
if (mysqli_num_rows($checkResult) > 0) {
    $_SESSION['alertMessage'] = "The Course , Teacher or slot record you entered  already exists.";
    header("Location: edit.php?id={$tt_id}");
    exit();
}

$sql = "UPDATE time_table SET course_id = '{$tt_course}',slot_id = '{$tt_slot}', day = '{$tt_day}',teacher_id = '{$tt_teacher}'WHERE id = {$tt_id}";
$result = mysqli_query($conn, $sql) or die("Query Unsuccessful.");
header("Location: timeTable.php");
mysqli_close($conn);

?>