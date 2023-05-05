<?php
include 'config.php';

$tt_id = $_GET['id'];
$sql = "DELETE FROM time_table WHERE id = {$tt_id}";
$result = mysqli_query($conn, $sql) or die("Query Unsuccessful.");
header("Location: index.php");

// header("Location: http://localhost/php/crud%20(time_table)/index.php");
// mysqli_close($conn);

?>
