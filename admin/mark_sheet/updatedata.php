<?php
session_start();
include '../includes/config.php';

$ms_id = $_POST['ms_id'];
$mid = $_POST['mid'];
$final = $_POST['final'];
$sessioanl = $_POST['sessional'];

$sql = "UPDATE mark_sheet SET mid='{$mid }', final='{$final }', sessional='{$sessioanl}' WHERE id = {$ms_id}";
$result = mysqli_query($conn, $sql) or die("Query Unsuccessful.");
$_SESSION['success'] = "Record updated successfully!";
header("Location: mark_sheet.php");
?>
