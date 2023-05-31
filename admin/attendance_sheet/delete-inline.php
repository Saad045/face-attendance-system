<?php
include 'config.php';

$std_id = $_GET['id'];
$sql = "DELETE FROM attendance_sheet WHERE id = {$std_id}";
$result = mysqli_query($conn, $sql) or die("Query Unsuccessful.");
header("Location: attendance_sheet.php");

// header("Location: http://localhost/php/crud%20(student)/");
// mysqli_close($conn);

?>
