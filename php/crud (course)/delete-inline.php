<?php
include 'config.php';

$c_id = $_GET['id'];
$sql = "DELETE FROM course WHERE id = {$c_id}";
$result = mysqli_query($conn, $sql) or die("Query Unsuccessful.");
header("Location: index.php");

// header("Location: http://localhost/php/crud%20(course)/");
// mysqli_close($conn);

?>
