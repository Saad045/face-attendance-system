<?php
session_start();
include '../includes/config.php';
$as_id = $_POST['as_id'];
$a_status = $_POST['attendance_status'];

$sql = "UPDATE attendance_sheet SET attendance_status = '{$a_status}' WHERE id = {$as_id}";
$result = mysqli_query($conn, $sql) or die("Query Unsuccessful.");
$_SESSION['success'] = "Record updated successfully!";
header("Location: attendance_sheet.php");
?>