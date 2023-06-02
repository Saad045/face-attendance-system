<?php
include 'config.php';

$std_id = $_GET['id'];

// Start a transaction to ensure atomicity of the operations
mysqli_begin_transaction($conn);

// Retrieve the image path from the database
$sql = "SELECT picture FROM student WHERE id = {$std_id}";
$result = mysqli_query($conn, $sql) or die("Query Unsuccessful.");
$row = mysqli_fetch_assoc($result);
$image = $row['picture'];

// Delete related records from dependent tables
$sql_delete_dependent1 = "DELETE FROM student_timetable WHERE student_id = {$std_id}";
$result_delete_dependent1 = mysqli_query($conn, $sql_delete_dependent1) or die("Query Unsuccessful.");

// Delete related records from dependent tables
$sql_delete_dependent2 = "DELETE FROM attendance_sheet WHERE student_id = {$std_id}";
$result_delete_dependent2 = mysqli_query($conn, $sql_delete_dependent2) or die("Query Unsuccessful.");

// Delete related records from dependent tables
$sql_delete_dependent3 = "DELETE FROM mark_sheet WHERE student_id = {$std_id}";
$result_delete_dependent3 = mysqli_query($conn, $sql_delete_dependent3) or die("Query Unsuccessful.");

// Delete record from parent table
$sql_delete_parent = "DELETE FROM student WHERE id = {$std_id}";
$result_delete_parent = mysqli_query($conn, $sql_delete_parent) or die("Query Unsuccessful.");

// If all queries were successful, delete the image and commit the transaction
if ($result_delete_dependent1 && $result_delete_dependent2 && $result_delete_dependent3 && $result_delete_parent) {
    // Delete the image file
    if (file_exists($image)) {
        unlink($image);

        // Delete the QR code file
        $qr_folder = "qrcode/" . $std_id . ".png";
        if (file_exists($qr_folder)) {
            unlink($qr_folder);
        }
    }

    mysqli_commit($conn);
    header("Location: student.php?success=Record Deleted!");
} else {
    // If any of the queries failed, roll back the transaction
    mysqli_rollback($conn);
    die("Query Unsuccessful.");
}
?>