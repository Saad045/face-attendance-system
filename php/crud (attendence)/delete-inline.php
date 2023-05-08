<?php
include 'config.php';

$as_id = $_GET['id'];
$sql = "DELETE FROM attendance_sheet WHERE id = {$as_id}";
$result = mysqli_query($conn, $sql) or die("Query Unsuccessful.");

header("Location: index.php");
?>
