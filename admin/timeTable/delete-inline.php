<?php
include 'config.php';

$t_id = $_GET['id'];

// Start a transaction to ensure atomicity of the operations
mysqli_begin_transaction($conn);

// Delete related records from dependent tables
$sql_delete_dependent1 = "DELETE FROM student_timetable WHERE timetable_id = {$t_id}";
$result_delete_dependent1 = mysqli_query($conn, $sql_delete_dependent1) or die("Query Unsuccessful.");

// Delete record from parent table
$sql_delete_parent = "DELETE FROM time_table WHERE id = {$t_id}";
$result_delete_parent = mysqli_query($conn, $sql_delete_parent) or die("Query Unsuccessful.");

// If all queries were successful, commit the transaction
if ($result_delete_dependent1 && $result_delete_parent) {
    mysqli_commit($conn);
    header("Location: timeTable.php");
} else{
    // If any of the queries failed, roll back the transaction
    mysqli_rollback($conn);
    die("Query Unsuccessful.");
} 

// mysqli_close($conn);
?>