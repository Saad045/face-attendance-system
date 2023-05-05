<?php
include 'config.php';

$t_id = $_GET['id'];
$sql = "DELETE FROM teacher WHERE id = {$t_id}";

// $sql = "ALTER TABLE time_table
// ADD CONSTRAINT teacher_id
// FOREIGN KEY (teacher_id) REFERENCES teacher(id)
// ON DELETE CASCADE";
$result = mysqli_query($conn, $sql) or die("Query Unsuccessful.");
header("index.php");

// header("Location: http://localhost/php/crud%20(teacher)/");
// mysqli_close($conn);

?>
