<?php
include 'config.php';

$std_id = $_GET['id'];

// Start a transaction to ensure atomicity of the operations
mysqli_begin_transaction($conn);

// Retrieve the image path from the database
$sql = "SELECT image FROM teacher WHERE id = {$std_id}";
$result = mysqli_query($conn, $sql) or die("Query Unsuccessful.");
$row = mysqli_fetch_assoc($result);
$image = $row['image'];

// Delete related records from dependent tables
$sql_delete_dependent1 = "DELETE FROM student_timetable WHERE timetable_id IN (SELECT id FROM time_table WHERE teacher_id = {$std_id})";
$result_delete_dependent1 = mysqli_query($conn, $sql_delete_dependent1) or die("Query Unsuccessful.");

// Delete related records from dependent tables
$sql_delete_dependent2 = "DELETE FROM time_table WHERE teacher_id = {$std_id}";
$result_delete_dependent2 = mysqli_query($conn, $sql_delete_dependent2) or die("Query Unsuccessful.");

// Delete related records from dependent tables
$sql_delete_dependent3 = "DELETE FROM attendance_sheet WHERE teacher_id = {$std_id}";
$result_delete_dependent3 = mysqli_query($conn, $sql_delete_dependent3) or die("Query Unsuccessful.");

// Delete related records from dependent tables
$sql_delete_dependent4 = "DELETE FROM mark_sheet WHERE teacher_id = {$std_id}";
$result_delete_dependent4 = mysqli_query($conn, $sql_delete_dependent4) or die("Query Unsuccessful.");

// Delete record from parent table
$sql_delete_parent = "DELETE FROM teacher WHERE id = {$std_id}";
$result_delete_parent = mysqli_query($conn, $sql_delete_parent) or die("Query Unsuccessful.");

// If all queries were successful, commit the transaction
if ($result_delete_dependent1 && $result_delete_dependent2 && $result_delete_dependent3 && $result_delete_dependent4 && $result_delete_parent) {
    // Delete the image file
    if (file_exists($image)) {
        unlink($image);
    }

    mysqli_commit($conn);
    header("Location: teacher.php");
} else {
    // If any of the queries failed, roll back the transaction
    mysqli_rollback($conn);
    die("Query Unsuccessful.");
}
?>
