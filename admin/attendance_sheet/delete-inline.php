<?php
session_start();
include '../includes/config.php';

$std_id = $_GET['id'];
$sql = "DELETE FROM attendance_sheet WHERE id = {$std_id}";
$result = mysqli_query($conn, $sql) or die("Query Unsuccessful.");
$_SESSION['success'] = "Record deleted successfully!";
header("Location: attendance_sheet.php");
?>
